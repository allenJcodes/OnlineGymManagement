import {
    DateField,
    DateTimeField,
    DateTimePicker,
    LocalizationProvider,
} from "@mui/x-date-pickers";
import { AdapterMoment } from "@mui/x-date-pickers/AdapterMoment";
import React from "react";

const CustomDatePicker = ({ label, value, onChange, my }) => {
    return (
        <LocalizationProvider dateAdapter={AdapterMoment}>
            <DateTimePicker
                sx={{ marginTop: my, marginBottom: my, width: "100%" }}
                label={label}
                value={value}
                onChange={onChange}
                fullWidth
            />
        </LocalizationProvider>
    );
};

export default CustomDatePicker;
