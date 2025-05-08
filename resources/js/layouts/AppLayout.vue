<template lang="">
    <div class="flex px-6 p-4 bg-amber-600 animate-in fade-in slide-in-from-top-8 duration-500 justify-between">
        APP LAYOUT
    </div>
    <slot />
</template>
<script lang="ts">
import { Link } from '@inertiajs/vue3'

export default {
  components: {
    Link
  }
}
</script>