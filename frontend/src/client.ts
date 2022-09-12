import axios from "axios";

const axiosConfig = {
    baseURL: 'http://localhost:8000/api'
}

const client = axios.create(axiosConfig)

export default client