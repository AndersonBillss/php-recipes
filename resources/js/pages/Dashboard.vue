<template>
    <div>
        {{ JSON.stringify(data) }}
    </div>
</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData } from '@/types/user';

const props = defineProps<{data: userData}>()
const data = props.data
console.log(props)

const userStore = useUserStore();
userStore.isLoggedIn = true

</script>
<style lang="">

</style>