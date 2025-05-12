<script setup lang="ts">
import axios from 'axios'
import { apiURL } from '@/env.dev'
import { ref } from 'vue'
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';

let username = 'Anderson'
let password = '11111111'
let email = 'abc@abc.abc'

function onSubmit(){
    axios.post(`${apiURL}/register`, {name: username, password, email})
}
</script>

<template>
    <Card class="p-4">
        <h2>Register an account</h2>
        <TextInput class="w-xs m-2" placeholder="username" label="Username" v-model="username" />
        <TextInput class="w-xs m-2" placeholder="email" label="Email" v-model="email" />
        <TextInput class="w-xs m-2" placeholder="password" label="Password" v-model="password" />
        <Button class="m-2 w-fit text-white" @click="onSubmit">Register</Button>
    </Card>
</template>