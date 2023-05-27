import axios from 'axios'

export const http = axios.create({
    baseURL: 'http://localhost/fullstack/back_end/public/api/'
})