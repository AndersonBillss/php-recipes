<template lang="">
    <button class="bg-amber-600 hover:bg-amber-700 active:bg-amber-500 transition-colors duration-200 cursor-pointer px-2 py-1 w-10 h-10 rounded-full flex items-center justify-center" @click="goBack">
        <svg height="24px" viewBox="0 -960 960 960" width="24px" fill="#ffffff"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
    </button>
</template>

<script setup lang="ts">
function goBack() {
  if(window.history.length > 1) window.history.back()
}
</script>