<script lang="ts" setup>
import "tailwindcss"
import axios from 'axios'
import { apiURL } from '@/env.dev'
import { router } from '@inertiajs/vue3'
import { useUserStore } from '@/stores/user';

function onSubmit(){
    axios.post(`${apiURL}/login`, {email, password})
    .then(() => {router.visit('/dashboard')})
}

let email = 'abc@abc.abc'
let password = '11111111'

const userStore = useUserStore()
userStore.isLoggedIn = false
userStore.isAdmin = false

</script>

<template>
    Log into recipes app
    <input type="text" placeholder="email" v-model="email">
    <input type="text" placeholder="password" v-model="password">
    <button @click="onSubmit">Login</button>
</template>