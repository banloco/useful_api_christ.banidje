<template>
    <div>
        <form @submit.prevent="register" class="">
            <input type="text" v-model="name">
            <input type="email" v-model="email">
            <input type="password" v-model="password">
            <input type="password" v-model="password_confirmation">
            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useAuthStore } from '@/stores/AuthStore';

const name = ref('');
const email = ref('');
const password = ref('');
const password_confirmation = ref('');

const authStore = useAuthStore()

function register() {
    const register = {
        name: name.value,
        email: email.value,
        password: password.value,
        password_confirmation: password_confirmation.value
    }
    authStore.register(register)
}
</script>