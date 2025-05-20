<template>
  <div class="flex flex-col">
    <label v-if="label">{{ label }}</label>
    <input
      :placeholder="placeholder"
      v-model="displayValue"
      type="number"
      class="w-full rounded-md border-gray-300 border-3 px-3 py-2 text-sm focus:border-amber-500 outline-none transition-colors duration-200"
    />
  </div>
</template>

<script setup lang="ts">
import { ref, watch } from 'vue';


const props = defineProps<{
  modelValue?: number
  placeholder?: string
  label?: string
}>()

const displayValue = ref(props.modelValue ? formatNumber(props.modelValue) : props.modelValue);

watch(displayValue, (newVal) => {
  if(!newVal) return
  const parsed = formatNumber(newVal);
  if (!isNaN(parsed)) {
    displayValue.value = parsed
    emit('update:modelValue', parsed)
  };
});

function formatNumber(n: number) {
  if(!n) n=0
  const truncated = parseInt(`${n * 100}`.split('.')[0]) / 100;
  return truncated
}

const emit = defineEmits<{
  (e: 'update:modelValue', value: number): void
}>()
</script>