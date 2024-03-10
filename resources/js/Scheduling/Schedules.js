import { Box, Button, Container, Grid, Modal, Typography } from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { DataGrid } from "@mui/x-data-grid";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import { api } from "../../config/api";
import moment from "moment";
import { toast } from "react-toastify";
import CustomToast from "../components/CustomToast";
const Schedules = (props) => {
    const [events, setEvents] = useState([]);
    const [open, setOpen] = useState(false);
    const [event, setEvent] = useState(null);
    const handleAddButton = () => {
        window.location.replace("/scheduling/create");
    };
    const handleClickEvent = (info) => {
        api.get(`getspecificschedule?id=${info.event.id}`)
            .then((response) => {
                setEvent(response.data);
            })
            .catch((err) => {
                console.log(err.response);
            });
        setOpen(true);
    };
    useEffect(() => {
        console.log(props.user_role);
        api.get("getallschedules")
            .then((response) => {
                const tempEvents = response.data;
                let eventsArr = [];
                tempEvents.map((item, index) => {
                    eventsArr.push(...eventsArr, {
                        id: item.id,
                        title: item.class_name,
                        instructor: item.instructor,
                        start: item.date_time_start,
                        end: item.date_time_end,
                        display: "block",
                    });
                });
                setEvents(eventsArr);
            })
            .catch((err) => {
                console.log(err.response);
            });
    }, []);
    return (
        <>
            <CustomToast />
            <div className="flex flex-col pt-16 gap-5 text-background">
                <Modal open={open} onClose={() => setOpen(false)}>
                    <Box
                        sx={{
                            position: "absolute",
                            top: "50%",
                            left: "50%",
                            transform: "translate(-50%, -50%)",
                            width: 550,
                            bgcolor: "background.paper",
                            border: "2px solid #000",
                            boxShadow: 24,
                            p: 4,
                        }}
                    >
                        <Typography variant="h6" component="h2" fontWeight={700}>
                            Class Title: {event && event.class_name}
                        </Typography>
                        <Typography variant="h6" component="h2">
                            Instructor:{" "}
                            {event && event.instructor && event.instructor.name}
                        </Typography>
                        <Typography variant="h6">
                            Date Start:{" "}
                            {event &&
                                moment(event.date_time_start).format("LL | hh:mmA")}
                        </Typography>
                        <Typography variant="h6">
                            Date End:{" "}
                            {event &&
                                moment(event.date_time_end).format("LL | hh:mmA")}
                        </Typography>
                        {props.user_role != 3 ? (
                            <div className="flex justify-end items-center mt-5">
                                <Button
                                    variant="contained"
                                    color="warning"
                                    style={{ marginLeft: 8, marginRight: 8 }}
                                    onClick={() => {
                                        window.location.replace(
                                            `/editschedule/${event.id}`
                                        );
                                    }}
                                >
                                    Edit
                                </Button>
                                <Button
                                    variant="contained"
                                    color="error"
                                    onClick={() => {
                                        api.post("deleteschedule", {
                                            id: event.id,
                                        })
                                            .then((response) => {
                                                toast("Schedule deleted!", {
                                                    type: "success",
                                                });
                                                window.location.reload();
                                            })
                                            .catch((err) => {
                                                console.log(err.response);
                                            });
                                    }}
                                >
                                    Delete
                                </Button>
                            </div>
                        ) : (
                            <div className="flex justify-end items-center mt-5">
                                <Button
                                    variant="contained"
                                    color="success"
                                    style={{ marginLeft: 8, marginRight: 8 }}
                                    onClick={() => {
                                        api.post("reserve", {
                                            user_id: props.user_id,
                                            schedule_id: event.id,
                                        })
                                            .then((response) => {
                                                console.log(response.data);
                                                if (response.data == "created") {
                                                    toast(
                                                        "Reservation has been made!",
                                                        {
                                                            type: "success",
                                                        }
                                                    );
                                                } else {
                                                    toast(
                                                        "You already reserved this spot",
                                                        {
                                                            type: "error",
                                                        }
                                                    );
                                                }
                                            })
                                            .catch((err) => {
                                                console.log(err.response);
                                            });
                                    }}
                                >
                                    Reserve
                                </Button>
                            </div>
                        )}
                    </Box>
                </Modal>
                <div class="flex items-start w-full justify-between ">

                    <h1 className="text-2xl font-bold">Scheduling</h1>

                    <button onClick={handleAddButton} class="primary-button">
                        Add Schedule +
                    </button>

                </div>

                <div class="card">
                    <FullCalendar
                        plugins={[dayGridPlugin]}
                        initialView="dayGridMonth"
                        headerToolbar={{ start: "", center: "title" }}
                        titleFormat={{ year: "numeric", month: "short" }}
                        events={events}
                        eventClick={handleClickEvent}
                    />
                </div>
            </div>
        </>
    );
};

export default Schedules;

if (document.getElementById("schedule")) {
    const element = document.getElementById("schedule");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Schedules {...props} />,
        document.getElementById("schedule")
    );
}
