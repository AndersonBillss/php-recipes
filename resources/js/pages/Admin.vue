<template>
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Admin Control Panel
    </h1>
    <div class="flex flex-wrap">
        <Card class="m-4 p-4">
            <h2>
                Add an Ingredient
            </h2>
            <TextInput class="my-4" v-model="ingredientName" placeholder="Ingredient title" label="Ingredient Name" />
            <Button class="w-fit text-white">Create</Button>
        </Card>
        <Card class="m-4 p-4">
            <h2>
                Add Units
            </h2>
            <TextInput class="my-4" v-model="unitName" placeholder="Unit Name" label="Unit Name" />
            <TextInput class="my-4" v-model="unitAbbreviation" placeholder="Unit Abbreviation" label="Unit Abbreviation" />
            <Button class="w-fit text-white">Create</Button>
        </Card>
    </div>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData } from '@/types/user';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import { ref } from 'vue';

const props = defineProps<{data: userData}>()
const data: userData = props.data

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.data.is_admin

const ingredientName = ref("");
const unitName = ref("");
const unitAbbreviation = ref("");

</script>
<style lang="">

</style>