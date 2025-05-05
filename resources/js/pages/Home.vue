<script setup lang="ts">
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { onMounted, Ref, ref } from 'vue';

const data: Ref<string | null> = ref(null)
const error: Ref<Error | null> = ref(null)

onMounted(async () => {
    try {
        const res = await axios.get<string>(`${apiURL}/hello`);
        data.value = res.data
    } catch (err) {
        error.value = err as Error;
    }
})

</script>

<template>
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] dark:bg-[#0a0a0a] lg:justify-center lg:p-8">
        Home
        {{ error?.message }}
        {{ data?data:"LOADING..." }}
    </div>
</template>
