import {
    Box,
    Button,
    Container,
    FormControl,
    InputLabel,
    OutlinedInput,
    TextField,
    Typography,
} from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import CustomSelectInput from "../components/CustomSelectInput";
import { DateTimePicker, LocalizationProvider } from "@mui/x-date-pickers";
import { DemoContainer } from "@mui/x-date-pickers/internals/demo";
import { AdapterDayjs } from "@mui/x-date-pickers/AdapterDayjs";
import moment from "moment";
import CustomTextInput from "../components/CustomTextInput";
import { ToastContainer, toast } from "react-toastify";
import CustomDatePicker from "../components/CustomDatePicker";
import { api } from "../../config/api";

const AddSchedule = ({ trainers, isedit }) => {
    const [title, setTitle] = useState("");
    const [trainer, setTrainer] = useState("");
    const [dateTimeStart, setDateTimeStart] = useState(null);
    const [dateTimeEnd, setDateTimeEnd] = useState(null);
    const [numberOfClients, setNumberOfClients] = useState("");

    useEffect(() => {
        if (isedit !== undefined) {
            api.get(`getspecificschedule?id=${isedit}`)
                .then((response) => {
                    const editVal = response.data;
                    console.log(editVal);
                    setTitle(editVal.class_name);
                    setTrainer(editVal.instructor.id);
                    setDateTimeStart(moment(editVal.date_time_start));
                    setDateTimeEnd(moment(editVal.date_time_end));
                    setNumberOfClients(editVal.number_of_attendees);
                })
                .catch((err) => {
                    console.log(err.response);
                });
        }
    }, []);

    const handleSubmitSchedule = () => {
        if (
            title == "" ||
            trainer == "" ||
            dateTimeStart == null ||
            dateTimeEnd == null ||
            numberOfClients == ""
        ) {
            toast("Please complete the form!", {
                type: "error",
            });
        } else if (moment(dateTimeStart).isAfter(moment(dateTimeEnd))) {
            toast("Invalid Date!", {
                type: "error",
            });
        } else {
            api.post("scheduling", {
                instructor_id: trainer,
                class_name: title,
                date_time_start: dateTimeStart,
                date_time_end: dateTimeEnd,
                max_clients: 0,
                number_of_attendees: numberOfClients,
            })
                .then((response) => {
                    toast("Schedule Added!", {
                        type: "success",
                    });
                })
                .catch((err) => {
                    console.log(err.response);
                });
        }
    };

    return (
        <Container>
            <ToastContainer
                position="top-right"
                autoClose={5000}
                hideProgressBar={false}
                newestOnTop={true}
                closeOnClick
                rtl={false}
            />
            <LocalizationProvider dateAdapter={AdapterDayjs}>
                <Box paddingTop={10}>
                    <Typography variant="h4">Add Schedule</Typography>
                    <CustomTextInput
                        errors={{ letters: true }}
                        label={`Name of Class`}
                        value={title}
                        onChangeValue={(e) => setTitle(e.target.value)}
                        my={8}
                    />
                    <FormControl
                        style={{ width: "100%", marginTop: 8, marginBottom: 8 }}
                    >
                        <CustomSelectInput
                            label={`Trainer`}
                            value={trainer}
                            onChange={(e) => setTrainer(e.target.value)}
                            options={trainers}
                        />
                    </FormControl>
                    <CustomDatePicker
                        label={`Date and Time Start`}
                        value={dateTimeStart}
                        my={1}
                        onChange={(value) => {
                            setDateTimeStart(value);
                        }}
                    />
                    <CustomDatePicker
                        label={`Date and Time End`}
                        value={dateTimeEnd}
                        my={1}
                        onChange={(value) => {
                            setDateTimeEnd(value);
                        }}
                    />
                    <CustomTextInput
                        id={`clients-label`}
                        errors={{ numbers: true }}
                        label={`Number of Clients`}
                        value={numberOfClients}
                        onChangeValue={(e) =>
                            setNumberOfClients(e.target.value)
                        }
                        my={8}
                    />
                    <div className="flex justify-end items-center">
                        <Button
                            onClick={handleSubmitSchedule}
                            variant="contained"
                        >
                            Submit
                        </Button>
                    </div>
                </Box>
            </LocalizationProvider>
        </Container>
    );
};

export default AddSchedule;

if (document.getElementById("addSchedule")) {
    const element = document.getElementById("addSchedule");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <AddSchedule {...props} />,
        document.getElementById("addSchedule")
    );
}
