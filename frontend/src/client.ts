import axios from "axios";

const axiosConfig = {
    baseURL: import.meta.env.VITE_BASE_URL_API
}

const client = axios.create(axiosConfig)

export default client