import React from "react";
import { ToastContainer } from "react-toastify";

const CustomToast = () => {
    return (
        <ToastContainer
            position="top-right"
            autoClose={5000}
            hideProgressBar={false}
            newestOnTop={true}
            closeOnClick
            rtl={false}
        />
    );
};

export default CustomToast;
