<script lang="ts">
import axios from 'axios'
import { apiURL } from '@/env.dev'
import { router } from '@inertiajs/vue3'

export default {
    
    data() {
        return {
            username: 'Anderson',
            password: '11111111',
        }
    },
    methods: {
        onSubmit(){
            console.log("Username:",this.username)
            console.log("Password:",this.password)
            axios.post(`${apiURL}/login`, {name: this.username, password: this.password})
            .then(() => {router.visit('/dashboard')})
        }
    }
}

</script>

<template>
    <div>
        Log into recipes app
        <input type="text" placeholder="username" v-model="username">
        <input type="text" placeholder="password" v-model="password">
        <button @click="onSubmit">Login</button>
    </div>
</template>