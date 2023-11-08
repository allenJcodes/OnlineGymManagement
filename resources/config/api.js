import axios from "axios";

export const DEV_URL = "http://127.0.0.1:8000/";

export const api = axios.create({
    baseURL: DEV_URL,
});

api.defaults.timeout = 60000;
