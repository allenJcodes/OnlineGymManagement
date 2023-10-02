import { Box, Button, Container, Grid, Typography } from "@mui/material";
import React from "react";
import ReactDOM from "react-dom";
import { DataGrid } from "@mui/x-data-grid";
import FullCalendar from "@fullcalendar/react";
import dayGridPlugin from "@fullcalendar/daygrid";
const Schedules = () => {
    const handleAddButton = () => {
        window.location.replace("/scheduling/create");
    };
    return (
        <Container>
            <Grid
                container
                direction={`row`}
                alignItems={"center"}
                justifyContent={`space-between`}
                py={2}
            >
                <Grid item>
                    <Typography variant="h4">Scheduling</Typography>
                </Grid>
                <Grid item>
                    <Button variant="contained" onClick={handleAddButton}>
                        Add Schedule
                    </Button>
                </Grid>
            </Grid>
            <FullCalendar
                plugins={[dayGridPlugin]}
                headerToolbar={{ start: "", center: "title" }}
                titleFormat={{ year: "numeric", month: "short" }}
            />
        </Container>
    );
};

export default Schedules;

if (document.getElementById("schedule")) {
    ReactDOM.render(<Schedules />, document.getElementById("schedule"));
}
