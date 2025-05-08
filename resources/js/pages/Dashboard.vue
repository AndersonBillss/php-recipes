<template>
    <div>
        {{ JSON.stringify(data) }}
    </div>
</template>
<script setup lang="ts">
    import { userData } from '@/types/user';

    const props = defineProps<{data: userData}>()
    const data = props.data
    console.log(props)

</script>
<style lang="">

</style>