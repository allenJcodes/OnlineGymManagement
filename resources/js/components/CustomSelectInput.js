import { InputLabel, MenuItem, Select } from "@mui/material";
import React, { useEffect, useState } from "react";

const CustomSelectInput = ({ label, options, value, onChange }) => {
    return (
        <>
            <InputLabel id="1">{label}</InputLabel>
            <Select
                labelId={`1`}
                value={value}
                label={label}
                onChange={onChange}
                style={{ width: "100%" }}
            >
                {JSON.parse(options).length > 0
                    ? JSON.parse(options).map((item, index) => {
                          return (
                              <MenuItem key={item.id} value={item.id}>
                                  {item.name}
                              </MenuItem>
                          );
                      })
                    : null}
            </Select>
        </>
    );
};

export default CustomSelectInput;
