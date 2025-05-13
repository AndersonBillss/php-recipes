<template>
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Admin Control Panel
    </h1>
    <div class="flex flex-wrap">
        <Card class="m-4 mb-8 p-4">
            <h2 class="mb-4">
                Ingredient Tool
            </h2>
            <Link href="/createIngredient">
                <Button class="w-fit text-white">GO</Button>
            </Link>
        </Card>
        <Card class="m-4 mb-8 p-4">
            <h2 class="mb-4">
                Unit Tool
            </h2>
            <Link href="/createUnit">
                <Button class="w-fit text-white">GO</Button>
            </Link>
        </Card>
    </div>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps<{data: userData}>()
const user: userData = props.data

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = user.is_admin


</script>
<style lang="">

</style>