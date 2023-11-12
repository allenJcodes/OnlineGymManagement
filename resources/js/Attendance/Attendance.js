import { Container } from "@mui/material";
import React from "react";
import ReactDOM from "react";

const Attendance = () => {
    return (
        <Container>
            <div>test</div>
        </Container>
    );
};

export default Attendance;

if (document.getElementById("AttendancePage")) {
    const element = document.getElementById("AttendancePage");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Attendance {...props} />,
        document.getElementById("AttendancePage")
    );
}
