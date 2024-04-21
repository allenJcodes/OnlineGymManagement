import axios from "axios";

export const DEV_URL = "http://127.0.0.1:8000/";
export const PROD_URL = "https://japsgym.online/";


export const api = axios.create({
    baseURL: PROD_URL,
});

api.defaults.timeout = 60000;

