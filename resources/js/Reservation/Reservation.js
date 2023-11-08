import { Button, Container, Grid, Typography } from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import CustomToast from "../components/CustomToast";
import { DataGrid } from "@mui/x-data-grid";
import { api } from "../../config/api";
import moment from "moment";
import DeleteIcon from "@mui/icons-material/Delete";

const columns = [
    { field: "id", headerName: "ID", width: 90 },
    {
        field: "className",
        headerName: "Class Name",
        width: 150,
        editable: true,
        renderCell: (cellValue) => {
            return cellValue.row.schedule.class_name;
        },
    },
    {
        field: "dateStart",
        headerName: "Date Start",
        width: 200,
        editable: true,
        renderCell: (cellValue) => {
            return moment(cellValue.row.schedule.date_time_start).format(
                "LL hh:mmA"
            );
        },
    },
    {
        field: "dateEnd",
        headerName: "Date End",
        width: 200,
        editable: true,
        renderCell: (cellValue) => {
            return moment(cellValue.row.schedule.date_time_end).format(
                "LL hh:mmA"
            );
        },
    },
    {
        field: "numberOfAttendees",
        headerName: "Number Of Attendees",
        width: 150,
        editable: true,
        renderCell: (cellValue) => {
            return cellValue.row.schedule.number_of_attendees;
        },
    },
    {
        field: "actions",
        headerName: "Actions",
        width: 150,
        renderCell: (cellValue) => {
            return (
                <>
                    <Button
                        onClick={() => {
                            console.log("test");
                        }}
                    >
                        <DeleteIcon />
                    </Button>
                </>
            );
        },
    },
];

const Reservation = (props) => {
    const [data, setData] = useState([]);
    useEffect(() => {
        console.log(props);
        api.get(`getuserreservations?id=${props.user_id}`)
            .then((response) => {
                setData(response.data);
                console.log(response.data);
            })
            .catch((err) => {
                console.log(err.response);
            });
    }, []);

    return (
        <Container sx={{ marginTop: 3 }}>
            <CustomToast />
            <Grid
                container
                direction={`row`}
                alignItems={"center"}
                justifyContent={`space-between`}
                py={4}
            >
                <Grid item>
                    <Typography variant="h4">Reservations</Typography>
                </Grid>
            </Grid>
            <DataGrid
                rows={data}
                columns={columns}
                initialState={{
                    pagination: {
                        paginationModel: {
                            pageSize: 5,
                        },
                    },
                }}
                pageSizeOptions={[5]}
                disableRowSelectionOnClick
            />
        </Container>
    );
};

export default Reservation;

if (document.getElementById("ReservationPage")) {
    const element = document.getElementById("ReservationPage");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Reservation {...props} />,
        document.getElementById("ReservationPage")
    );
}
