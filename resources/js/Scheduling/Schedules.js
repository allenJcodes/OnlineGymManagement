import { Box, Button, Container, Grid, Modal, Typography } from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { DataGrid } from "@mui/x-data-grid";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from '@fullcalendar/timegrid'
import { api } from "../../config/api";
import moment from "moment";
import { toast } from "react-toastify";
import CustomToast from "../components/CustomToast";

const Schedules = (props) => {
    const {user_role} = props;

    const [events, setEvents] = useState([]);
    const [open, setOpen] = useState(false);
    const [event, setEvent] = useState(null);

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
        api.get("getallschedules")
            .then((response) => {
                const tempEvents = response.data;

                const eventsArr = tempEvents.map((item) => (
                    {
                        id: item.id,
                        title: item.class_name,
                        instructor: item.instructor,
                        start: item.date_time_start,
                        end: item.date_time_end,
                    }
                ));

                setEvents(eventsArr);
            })
            .catch((err) => {
                console.log(err.response);
            });
    }, []);
    return (
        <>
            <CustomToast />
            <NewModal isOpen={open} setOpen={setOpen}>
                
                <div className="flex flex-col text-background gap-3 flex-1">
                    <h2 className="text-lg font-bold"> Class Schedule</h2>

                    <div className="flex flex-col">
                        <p className="text-dark-gray-800 text-xs">Class Name</p>
                        <h2>{event?.class_name}</h2>
                    </div>

                    <div className="flex flex-col">
                        <p className="text-dark-gray-800 text-xs">Instructor</p>
                        <h2>{event?.instructor?.user?.full_name}</h2>
                    </div>
                    
                    <div className="flex flex-col">
                        <p className="text-dark-gray-800 text-xs">Start Date</p>
                        <h2>{event && moment(event.date_time_start).format("LL | hh:mmA")}</h2>
                    </div>
                    <div className="flex flex-col">
                        <p className="text-dark-gray-800 text-xs">End Date</p>
                        <h2>{event && moment(event.date_time_end).format("LL | hh:mmA")}</h2>
                    </div>

                    <div className="flex self-end mt-auto gap-2">
                        <button onClick={() => setOpen(false)} className="outline-button">Back</button>

                        {user_role != 3 && <a className="primary-button" href={`/scheduling/${event?.id}/edit`}>Edit Schedule</a>}
                    </div>
                </div>

            </NewModal>


            <div className="card">
                <FullCalendar
                    plugins={[dayGridPlugin, timeGridPlugin]}
                    initialView="dayGridMonth"
                    headerToolbar={{ start: "title", center: "", right: "today,prev,next,dayGridMonth,timeGridDay" }}
                    titleFormat={{ year: "numeric", month: "short", day: "numeric" }}
                    events={events}
                    eventClick={handleClickEvent}
                />
            </div>
        </>
    );
};

const NewModal = ({children, isOpen, setOpen}) => {
    return(
        <div className={`${isOpen ? 'flex' : 'hidden'} items-center justify-center fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-screen w-screen bg-black/20 backdrop-blur-sm`} onClick={() => setOpen(false)}>
            <div className='flex flex-col bg-off-white p-5 h-fit rounded-lg min-w-[50vw] min-h-[30vh] max-h-[90vh] max-w-[80vw]' onClick={(e) => e.stopPropagation()}>
                {children}

            </div>
        </div>
    )
}

export default Schedules;

if (document.getElementById("schedule")) {
    const element = document.getElementById("schedule");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Schedules {...props} />,
        document.getElementById("schedule")
    );
}
