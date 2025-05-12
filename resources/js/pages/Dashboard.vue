<template>
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Welcome Back, {{ data.name }}
    </h1>
    <div class="flex flex-wrap">
        <Card class="m-4 p-4">
            <h2>
                Find a recipe
            </h2>
            <p class="mb-4">
                Find a new recipe by entering in ingredients.
            </p>
            <Button class="w-fit text-white">
                GO
            </Button>
        </Card>
        <Card class="m-4 p-4">
            <h2>
                Create a recipe
            </h2>
            <p class="mb-4">
                Create a new recipe for other users to see and use.
            </p>
            <Button class="w-fit text-white">
                GO
            </Button>
        </Card>
    </div>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData } from '@/types/user';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';

const props = defineProps<{data: userData}>()
const data: userData = props.data

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.data.is_admin

</script>
<style lang="">

</style>