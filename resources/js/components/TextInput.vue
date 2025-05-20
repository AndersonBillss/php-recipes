<template>
  <div class="flex flex-col">
    <label v-if="label">{{ label }}</label>
    <Combobox v-if="options && options.length" v-model="localValue">
      <div class="relative">
        <ComboboxInput
        class="w-full rounded-md border-gray-300 border-3 px-3 py-2 text-sm focus:border-amber-500 outline-none transition-colors duration-200"
        :placeholder="placeholder"
        @change="query = $event.target.value" 
        />
        
        <ComboboxOptions class="absolute w-full h-25 overflow-y-scroll bg-gray-200 rounded-b-md z-5">
          <ComboboxOption
          class="bg-gray-200 hover:bg-gray-300 transition-colors duration-200 cursor-pointer px-2 py-1"
            v-for="item in options"
            :key="getOptionLabel(item)"
            :value="getOptionLabel(item)"
          >
            {{ getOptionLabel(item) }}
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
import { ref, watch } from 'vue';
import {
  Combobox,
  ComboboxInput,
  ComboboxOptions,
  ComboboxOption,
} from '@headlessui/vue'

const props = defineProps<{
  modelValue?: any
  placeholder?: string
  label?: string
  options?: any[]
  getOptionLabel?: (item: any) => string
}>()

function getOptionLabel(item: any){
  return props.getOptionLabel && props.getOptionLabel(item)
}

const localValue = ref(props.modelValue ?? '')

watch(localValue, (newVal) => {
  if(!props.options) return
  const val: any = props.options.filter(op => getOptionLabel(op) == newVal)[0]
  if(!val) return
  emit('update:modelValue', val)
})

const query = ref('')

const emit = defineEmits<{
  (e: 'update:modelValue', value: any): void
}>()
</script>