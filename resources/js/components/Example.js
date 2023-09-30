import {
    Alert,
    Box,
    Button,
    MenuItem,
    Paper,
    Step,
    StepLabel,
    Stepper,
    TextField,
    Typography,
} from "@mui/material";
import React, { useState } from "react";
import ReactDOM from "react-dom";
import Page from "./Page";

const steps = ["Select 1", "Select 2"];

function Example() {
    //FORM STATES
    // FIRST PAGE STATES
    const [selectVal1, setSelectVal1] = useState(0);
    const [name1, setName1] = useState("");
    const [concern1, setConcern1] = useState("");
    // SECOND PAGE STATES
    const [selectVal2, setSelectVal2] = useState(0);
    const [name2, setName2] = useState("");
    const [concern2, setConcern2] = useState("");

    const [activeStep, setActiveStep] = useState(0);
    const [skipped, setSkipped] = React.useState(new Set());
    const isStepOptional = (step) => {
        return step === 1;
    };

    const isStepSkipped = (step) => {
        return skipped.has(step);
    };
    const [alertState, setAlertState] = useState(true);
    const [selectType1Value, setSelectType1Value] = useState(null);
    const [selectType2Value, setSelectType2Value] = useState(null);
    const [page, setPage] = useState(1);
    const selectType1 = [
        {
            value: 1,
            label: "option 1",
        },
        {
            value: 2,
            label: "option 2",
        },
        {
            value: 3,
            label: "option 3",
        },
        {
            value: 4,
            label: "option 4",
        },
    ];

    const handleNext = () => {
        if (activeStep === 0) {
            if (selectVal1 === 0 || name1 === "" || concern1 === "") {
                setAlertState(false);
            } else {
                let newSkipped = skipped;
                if (isStepSkipped(activeStep)) {
                    newSkipped = new Set(newSkipped.values());
                    newSkipped.delete(activeStep);
                }

                setAlertState(true);
                setActiveStep((prevActiveStep) => prevActiveStep + 1);
                setSkipped(newSkipped);
            }
        } else if (activeStep === 1) {
            if (selectVal2 === 0 || name2 === "" || concern2 === "") {
                setAlertState(false);
            } else {
                let newSkipped = skipped;
                if (isStepSkipped(activeStep)) {
                    newSkipped = new Set(newSkipped.values());
                    newSkipped.delete(activeStep);
                }

                setAlertState(true);
                setActiveStep((prevActiveStep) => prevActiveStep + 1);
                setSkipped(newSkipped);
            }
        }
    };

    const handleBack = () => {
        setActiveStep((prevActiveStep) => prevActiveStep - 1);
    };

    const onSubmit = () => {
        console.log(selectVal1);
        console.log(name1);
        console.log(concern1);
        console.log(selectVal2);
        console.log(name2);
        console.log(concern2);
    };

    return (
        <div className="container">
            <Alert hidden={alertState} severity="error">
                This is an error alert — check it out!
            </Alert>
            <Stepper activeStep={activeStep}>
                {steps.map((item, index) => {
                    const stepProps = {};
                    const labelProps = {};
                    return (
                        <Step key={index} {...stepProps}>
                            <StepLabel {...labelProps}>{item}</StepLabel>
                        </Step>
                    );
                })}
            </Stepper>
            {activeStep === steps.length ? (
                <React.Fragment>
                    <Typography sx={{ mt: 2, mb: 1 }}>
                        All steps completed - you&apos;re finished
                    </Typography>
                    <Box sx={{ display: "flex", flexDirection: "row", pt: 2 }}>
                        <Box sx={{ flex: "1 1 auto" }} />
                        <Button onClick={onSubmit}>Submit</Button>
                    </Box>
                </React.Fragment>
            ) : (
                <React.Fragment>
                    {activeStep === 0 ? (
                        <Page
                            label1={`Select 1`}
                            selectVal={selectVal1}
                            setSelectVal={setSelectVal1}
                            label2={`Name 1`}
                            nameValue={name1}
                            setNameValue={setName1}
                            label3={`Concern 1`}
                            concernValue={concern1}
                            setConcernValue={setConcern1}
                            options={selectType1}
                        />
                    ) : (
                        <Page
                            label1={`Select 2`}
                            selectVal={selectVal2}
                            setSelectVal={setSelectVal2}
                            label2={`Name 2`}
                            nameValue={name2}
                            setNameValue={setName2}
                            label3={`Concern 2`}
                            concernValue={concern2}
                            setConcernValue={setConcern2}
                            options={selectType1}
                        />
                    )}
                    <Box sx={{ display: "flex", flexDirection: "row", pt: 2 }}>
                        <Button
                            color="inherit"
                            disabled={activeStep === 0}
                            onClick={handleBack}
                            sx={{ mr: 1 }}
                        >
                            Back
                        </Button>
                        <Box sx={{ flex: "1 1 auto" }} />

                        <Button onClick={handleNext}>
                            {activeStep === steps.length - 1
                                ? "Finish"
                                : "Next"}
                        </Button>
                    </Box>
                </React.Fragment>
            )}
        </div>
    );
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
