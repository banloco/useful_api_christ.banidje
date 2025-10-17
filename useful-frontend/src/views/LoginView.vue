<template>
    <div>
        <form @submit.prevent="login" class="">
            <input type="email" v-model="email">
            <input type="password" v-model="password">
            <button type="submit">Login</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useAuthStore } from '@/stores/AuthStore';

const email = ref('');
const password = ref('');

const authStore = useAuthStore()

function login() {
    const login = {
        email: email.value,
        password: password.value
    }
    authStore.login(login)
}
</script>