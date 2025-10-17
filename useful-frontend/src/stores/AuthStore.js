import { defineStore } from "pinia";
import api from "@/api";

export const useAuthStore = defineStore('Auth', {
    state: () => ({
        login: {
            email: '',
            password: '',
            loading: false,
        },
        register: {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            loading: false,
        }
    }),
    actions: {

        async p(login) {
            const res = await api.post('/login', login)
            console.log(res)
        },

        async register(register) {
            try {
                register.loading = true;
                const response = await api.post('/register', register);
                console.log('Register :', response.data);
                register.loading = false;
            } catch (error) {
                console.error('Erreur de Register :', error);
            }
        },
        
        async login(login) {
            try {
                const response = await api.post('/login', login);
                console.log('Login :', response.data);
                const authToken = response.data;
                localStorage.setItem('accessToken', authToken);
            } catch (error) {
                console.error('Erreur de login :', error);
            }
        }
    }
});