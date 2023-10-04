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

const AddSchedule = ({ trainers }) => {
    const [trainer, setTrainer] = useState("");
    const [dateTime, setDateTime] = useState("");
    const [numberOfClients, setNumberOfClients] = useState("");

    const handleSubmitSchedule = () => {
        console.log(trainer);
        console.log(moment(dateTime.$d).format("YYYY-MM-DDThh:mm:ss")); //format ng full js calendar
        console.log(numberOfClients);
        toast("Wow so easy!");
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
                    <FormControl style={{ width: "100%" }}>
                        <CustomSelectInput
                            label={`Trainer`}
                            value={trainer}
                            onChange={(e) => setTrainer(e.target.value)}
                            options={trainers}
                        />
                    </FormControl>
                    <DemoContainer components={["DateTimePicker"]}>
                        <DateTimePicker
                            label="Date and Time"
                            value={dateTime}
                            disablePast
                            onChange={(value) => setDateTime(value)}
                        />
                    </DemoContainer>
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
                    <Button onClick={handleSubmitSchedule} variant="contained">
                        Submit
                    </Button>
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
