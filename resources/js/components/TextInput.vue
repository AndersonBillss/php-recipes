<template>
  <div class="flex flex-col">
    <label v-if="label">{{ label }}</label>
    <input
      :placeholder="placeholder"
      :value="modelValue"
      @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
      class="w-full rounded-md border-gray-300 border-3 px-3 py-2 text-sm focus:border-amber-500 outline-none transition-colors duration-200"
    />
  </div>
</template>

<script setup lang="ts">
defineProps<{
  modelValue?: string
  placeholder?: string
  label?: string
}>()

defineEmits<{
  (e: 'update:modelValue', value: string): void
}>()
</script>