<script lang="ts">
import "tailwindcss"
import axios from 'axios'
import { apiURL } from '@/env.dev'
import { router } from '@inertiajs/vue3'

export default {
    
    data() {
        return {
            email: 'abc@abc.abc',
            password: '11111111',
        }
    },
    methods: {
        onSubmit(){
            console.log("Email:",this.email)
            console.log("Password:",this.password)
            axios.post(`${apiURL}/login`, {email: this.email, password: this.password})
            .then(() => {router.visit('/dashboard')})
        }
    },
}

</script>

<template>
    Log into recipes app
    <input type="text" placeholder="email" v-model="email">
    <input type="text" placeholder="password" v-model="password">
    <button @click="onSubmit">Login</button>
</template>