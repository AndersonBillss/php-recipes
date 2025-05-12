<template lang="">
    <div class="flex flex-col h-full">
        <LoggedInAdminLayout v-if="userStore.isLoggedIn && userStore.isAdmin" />
        <LoggedInLayout v-if="userStore.isLoggedIn && !userStore.isAdmin" />
        <LoggedOutLayout v-if="!userStore.isLoggedIn"/>
        <div class="mx-6 my-4">
            <slot />
        </div>
    </div>
</template>

<script lang="ts">
import { Link } from '@inertiajs/vue3'
import LoggedInAdminLayout from './LoggedInAdminLayout.vue';
import LoggedInLayout from './LoggedInLayout.vue';
import LoggedOutLayout from './LoggedOutLayout.vue';
import { useUserStore } from '@/stores/user';

export default {
    components: {
        Link,
        LoggedInAdminLayout,
        LoggedInLayout,
        LoggedOutLayout
    },
    data() {
        return {
            userStore: {}
        }
    },
    created() {
        this.userStore = useUserStore()
    },
}
</script>