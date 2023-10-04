import {
    FormControl,
    FormHelperText,
    InputLabel,
    TextField,
} from "@mui/material";
import React, { useEffect, useState } from "react";
import "./styles.css";

const CustomTextInput = ({
    variant,
    label,
    value,
    onChangeValue,
    errors,
    my,
    id,
}) => {
    const [errorValues, setErrorValues] = useState([]);

    useEffect(() => {
        if (errors?.numbers) {
            const letters = /[a-zA-Z!@#$%^&*(),.]/g;
            if (letters.test(value)) {
                // setErrorValues([
                //     { label: `${label} should only include numbers` },
                // ]);
                setErrorValues(true);
            } else {
                setErrorValues(false);
            }
        }
        console.log(errorValues);
    }, [value]);

    return (
        <FormControl fullWidth>
            {/* <InputLabel htmlFor={id}>{label}</InputLabel> */}
            <TextField
                key={id}
                variant="outlined"
                error={errorValues}
                fullWidth
                id={id}
                label={label}
                name={label}
                value={value}
                onChange={onChangeValue}
                style={{ marginTop: my, marginBottom: my }}
                InputProps={{
                    style: {
                        border: "none",
                    },
                }}
            />
            {errorValues.length > 0 &&
                errorValues.map((item, index) => {
                    return (
                        <FormHelperText
                            color="#dc3545"
                            style={{ color: "#dc3545" }}
                        >
                            {item.label}
                        </FormHelperText>
                    );
                })}
        </FormControl>
    );
};

export default CustomTextInput;
