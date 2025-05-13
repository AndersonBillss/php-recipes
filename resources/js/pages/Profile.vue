<template>
    <div class="flex justify-between items-center">
        <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
            {{ data.name }}
        </h1>

        <Button class="h-fit text-white" @click="logout">
            Log Out
        </Button>
    </div>
</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData } from '@/types/api';
import { apiURL } from '@/env.dev'
import { router } from '@inertiajs/vue3'
import axios from 'axios'
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';

const props = defineProps<{data: userData}>()
const data: userData = props.data

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.data.is_admin

async function logout(){
    axios.post<string>(`${apiURL}/logout`).then(async (data) => {
        if(`${data.status}`[0] === '2') router.visit('/login')
    })
}

</script>
<style lang="">

</style>