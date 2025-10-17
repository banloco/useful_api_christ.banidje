import axios from 'axios';

const api = axios.create({
  baseURL: 'http://localhost:8000/api',
  headers: {
    common: {
      'Authorization': `Bearer ${localStorage.getItem('accessToken')}`
    },
    post: {
      'Content-Type': 'application/json'
    }
  }
});

export default api;