import { Button, MenuItem, Paper, TextField } from "@mui/material";
import React from "react";

const Page = ({
    label1,
    label2,
    label3,
    selectVal,
    setSelectVal,
    nameValue,
    setNameValue,
    concernValue,
    setConcernValue,
    options,
}) => {
    return (
        <Paper
            elevation={3}
            style={{
                paddingLeft: 20,
                paddingRight: 20,
                paddingTop: 10,
                paddingBottom: 10,
            }}
        >
            <TextField
                variant="outlined"
                select
                label={label1}
                style={{ width: 300 }}
                onChange={(e) => {
                    setSelectVal(e.target.value);
                    console.log(e.target);
                }}
                value={selectVal}
            >
                {options.map((item, index) => {
                    return (
                        <MenuItem key={index} value={item.value}>
                            {item.label}
                        </MenuItem>
                    );
                })}
            </TextField>
            <TextField
                label={label2}
                value={nameValue}
                onChange={(e) => setNameValue(e.target.value)}
                variant="outlined"
                style={{ width: 300 }}
            />
            <TextField
                label={label3}
                value={concernValue}
                onChange={(e) => setConcernValue(e.target.value)}
                variant="outlined"
                style={{ width: 300 }}
            />
        </Paper>
    );
};

export default Page;
