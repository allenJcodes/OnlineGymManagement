import { Box, Button, Container, FormControl, Typography } from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import CustomSelectInput from "../components/CustomSelectInput";
import { DateTimePicker, LocalizationProvider } from "@mui/x-date-pickers";
import { DemoContainer } from "@mui/x-date-pickers/internals/demo";
import { AdapterDayjs } from "@mui/x-date-pickers/AdapterDayjs";
import moment from "moment";
const AddSchedule = ({ trainers }) => {
    const [trainer, setTrainer] = useState("");
    const [dateTime, setDateTime] = useState("");

    const handleSubmitSchedule = () => {
        console.log(trainer);
        console.log(moment(dateTime.$d).format("YYYY-MM-DDThh:mm:ss")); //format ng full js calendar
    };

    return (
        <Container>
            <LocalizationProvider dateAdapter={AdapterDayjs}>
                <Typography variant="h4">Add Schedule</Typography>
                <Box>
                    <FormControl style={{ width: "100%" }}>
                        <CustomSelectInput
                            label={`Trainer`}
                            value={trainer}
                            onChange={(e) => setTrainer(e.target.value)}
                            options={trainers}
                        />
                        <DemoContainer components={["DateTimePicker"]}>
                            <DateTimePicker
                                label="Date and Time"
                                value={dateTime}
                                disablePast
                                onChange={(value) => setDateTime(value)}
                            />
                        </DemoContainer>
                        <Button
                            onClick={handleSubmitSchedule}
                            variant="contained"
                        >
                            Submit
                        </Button>
                    </FormControl>
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
