<template lang="">
    <LoggedInAdminLayout v-if="userStore.isLoggedIn && userStore.isAdmin" />
    <LoggedInLayout v-if="userStore.isLoggedIn && !userStore.isAdmin" />
    <LoggedOutLayout v-if="!userStore.isLoggedIn"/>
    <slot />
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