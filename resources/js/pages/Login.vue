<script lang="ts" setup>
import "tailwindcss"
import axios from 'axios'
import { apiURL } from '@/env.dev'
import { router } from '@inertiajs/vue3'
import { useUserStore } from '@/stores/user';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';

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
    <Card class="p-4">

        <h2>Log into recipes app</h2>
        <TextInput class="w-xs m-2" placeholder="email" label="Email" v-model="email" />
        <TextInput class="w-xs m-2" placeholder="password" label="Password" v-model="password" />
        <Button class="m-2 w-fit text-white" @click="onSubmit">Login</Button>
    </Card>
</template>