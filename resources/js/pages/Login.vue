<script lang="ts">
import axios from 'axios'
import { apiURL } from '@/env.dev'

export default {
    data() {
        return {
            username: 'Anderson',
            password: '11111111',
            email: 'abc@abc.abc'
        }
    },
    methods: {
        onSubmit(){
            console.log("Username:",this.username)
            console.log("Email:",this.email)
            console.log("Password:",this.password)

            axios.post(`${apiURL}/register`, {name: this.username, password: this.password, email: this.email})
        }
    }
}

</script>

<template>
    <div>
        Log into recipes app
        <input type="text" placeholder="username" v-model="username">
        <input type="text" placeholder="email" v-model="email">
        <input type="text" placeholder="password" v-model="password">
        <button @click="onSubmit">register</button>
    </div>
</template>