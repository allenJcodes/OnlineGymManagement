import { Box, Button, Container, Grid, Modal, Typography } from "@mui/material";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import CustomToast from "../components/CustomToast";
import { DataGrid } from "@mui/x-data-grid";
import { api } from "../../config/api";
import PaymentsIcon from "@mui/icons-material/Payments";
import CustomTextInput from "../components/CustomTextInput";
import { toast } from "react-toastify";

const Payments = (props) => {
    const [data, setData] = useState([]);
    const [referenceNo, setReferenceNo] = useState("");
    const [selectedId, setSelectedId] = useState("");
    const [open, setOpen] = useState(false);

    const columns = [
        { field: "id", headerName: "ID", width: 90 },
        {
            field: "payment_price",
            headerName: "Class Name",
            width: 150,
            editable: true,
            renderCell: (cellValue) => {
                return `₱${cellValue.value}`;
            },
        },
        {
            field: "payment_reference_no",
            headerName: "Class Name",
            width: 150,
            editable: true,
            renderCell: (cellValue) => {
                if (cellValue.value === null) {
                    return "--";
                } else {
                    return cellValue.value;
                }
            },
        },
        {
            field: "actions",
            headerName: "Actions",
            width: 150,
            renderCell: (cellValue) => {
                if (cellValue.row.payment_reference_no === null) {
                    return (
                        <>
                            <Button
                                onClick={() => {
                                    setOpen(true);
                                    setSelectedId(cellValue.row.id);
                                }}
                            >
                                <PaymentsIcon />
                            </Button>
                        </>
                    );
                }
            },
        },
    ];

    useEffect(() => {
        api.get(`getuserpayments?id=${props.user_id}`)
            .then((response) => {
                console.log(response.data);
                setData(response.data);
            })
            .catch((err) => {
                console.log(err.response);
            });
    }, []);

    const handleSubmitPayment = () => {
        if (referenceNo != "") {
            api.post("updatereferencenumber", {
                id: selectedId,
                referenceNo: referenceNo,
            })
                .then((response) => {
                    window.location.reload();
                })
                .catch((err) => {
                    console.log(err.response);
                });
        } else {
            toast("Please fill in the reference number", {
                type: "error",
            });
        }
    };

    return (
        <Container sx={{ marginTop: 3 }}>
            <CustomToast />
            <Modal open={open} onClose={() => setOpen(false)}>
                <Box
                    sx={{
                        position: "absolute",
                        top: "50%",
                        left: "50%",
                        transform: "translate(-50%, -50%)",
                        width: 550,
                        bgcolor: "background.paper",
                        border: "2px solid #000",
                        boxShadow: 24,
                        p: 4,
                    }}
                >
                    <div className="my-2">
                        <Typography
                            variant="h5"
                            fontWeight={"700"}
                            className="text-sky-600"
                        >
                            GCash Payment
                        </Typography>
                    </div>
                    <CustomTextInput
                        value={referenceNo}
                        onChangeValue={(e) => setReferenceNo(e.target.value)}
                        label={`GCash Reference Number`}
                        errors={{ numbers: true }}
                    />
                    <div className="my-2 flex justify-end">
                        <Button
                            variant="contained"
                            onClick={handleSubmitPayment}
                        >
                            Submit
                        </Button>
                    </div>
                </Box>
            </Modal>
            <Grid
                container
                direction={`row`}
                alignItems={"center"}
                justifyContent={`space-between`}
                py={4}
            >
                <Grid item>
                    <Typography variant="h4">Payments</Typography>
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
                // onRowClick={(row) => handleOpenModal(row.row)}
                disableRowSelectionOnClick
            />
        </Container>
    );
};

export default Payments;

if (document.getElementById("PaymentPage")) {
    const element = document.getElementById("PaymentPage");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <Payments {...props} />,
        document.getElementById("PaymentPage")
    );
}
