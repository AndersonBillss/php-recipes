<template>
  <div class="flex flex-col">
    <label v-if="label">{{ label }}</label>
    <Combobox v-if="options && options.length" v-model="localValue">
      <div class="relative">
        <ComboboxInput
        class="w-full rounded-md border-gray-300 border-3 px-3 py-2 text-sm focus:border-amber-500 outline-none transition-colors duration-200"
        @change="query = $event.target.value" />
        <ComboboxOptions class="absolute w-full h-25 overflow-y-scroll bg-gray-200 rounded-b-md z-5">
          <ComboboxOption
          class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 cursor-pointer px-2 py-1"
            v-for="item in options"
            :key="item"
            :value="item"
          >
            {{ item }}
          </ComboboxOption>
        </ComboboxOptions>
      </div>
    </Combobox>
    <input v-else
      :placeholder="placeholder"
      :value="modelValue"
      @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)"
      class="w-full rounded-md border-gray-300 border-3 px-3 py-2 text-sm focus:border-amber-500 outline-none transition-colors duration-200"
    />
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import {
  Combobox,
  ComboboxInput,
  ComboboxOptions,
  ComboboxOption,
} from '@headlessui/vue'

const props = defineProps<{
  modelValue?: string
  placeholder?: string
  label?: string
  options?: string[]
}>()

const query = ref('')
const localValue = ref(props.modelValue ?? '')

defineEmits<{
  (e: 'update:modelValue', value: string): void
}>()
</script>