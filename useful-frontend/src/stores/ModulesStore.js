import { defineStore } from "pinia";
import api from "@/api";

export const useModuleStore = defineStore('Module', {
    state: () => ({
        module: {
            name: '',
            description: '',
            loading: false,
        },
    }),
    actions: {

        async getModules() {
            this.module.loading = true;
            const response = await api.post('/modules')
            console.log(response.data)
            this.module = response.data
        },
    }
});