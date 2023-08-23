import axios from "axios";


const axiosInstance = axios.create({
    baseURL: process.env.API_BASE_URL || process.env.NEXT_PUBLIC_API_BASE_URL,
    headers: {
        // apikey: process.env.API_KEY || process.env.NEXT_PUBLIC_API_KEY,
        'Content-Type': 'application/json',
    },
});

export default axiosInstance