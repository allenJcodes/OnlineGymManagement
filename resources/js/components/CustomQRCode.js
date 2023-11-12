import React, { useEffect } from "react";
import ReactDOM from "react-dom";
import QRCode from "react-qr-code";

const CustomQRCode = (props) => {
    useEffect(() => {
        console.log(JSON.parse(props.attendance));
    }, []);
    return (
        <div
            style={{
                height: "auto",
                margin: "0 auto",
                maxWidth: 64,
                width: "100%",
            }}
        >
            <QRCode
                size={256}
                style={{ height: "auto", maxWidth: "100%", width: "100%" }}
                value={props.attendance}
                viewBox={`0 0 256 256`}
            />
        </div>
    );
};

export default CustomQRCode;

if (document.getElementById("QRCode")) {
    const element = document.getElementById("QRCode");
    const props = Object.assign({}, element.dataset);
    ReactDOM.render(
        <CustomQRCode {...props} />,
        document.getElementById("QRCode")
    );
}
