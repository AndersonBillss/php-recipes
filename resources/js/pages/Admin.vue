<template>
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Admin Control Panel
    </h1>
    <div class="flex flex-wrap">
        <Card class="m-4 mb-8 p-4">
            <h2 class="mb-4">
                Ingredient Tool
            </h2>
            <Link href="/ingredient">
                <Button class="w-fit text-white">GO</Button>
            </Link>
        </Card>
        <Card class="m-4 mb-8 p-4">
            <h2 class="mb-4">
                Unit Tool
            </h2>
            <Link href="/unit">
                <Button class="w-fit text-white">GO</Button>
            </Link>
        </Card>
    </div>
</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { UserData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import { Link } from '@inertiajs/vue3'

const props = defineProps<{data: UserData}>()
const user: UserData = props.data

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = user.is_admin


</script>
<style lang="">

</style>