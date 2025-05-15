<template>
    <BackButton />
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Recipe
    </h1>
    <Card class="m-4 p-4 flex">
        <div>
            <h2>
                Create a Recipe
            </h2>
            <TextInput label="Title" placeholder="Title"></TextInput>
            <TextInput label="Ingredients" placeholder="Ingredients"></TextInput>
            <TextInput label="Units" placeholder="Units"></TextInput>
            <TextInput label="Quantity" placeholder="Quantity"></TextInput>
            <TextInput label="Steps" placeholder="Steps"></TextInput>
            <TextInput label="Title" placeholder="Title"></TextInput>
            <Button class="w-fit text-white" @click="submitRecipe">Create</Button>
        </div>
    </Card>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData, ingredientData, unitData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { ref } from 'vue';
import BackButton from '@/components/BackButton.vue';

const props = defineProps<{user: userData, units: unitData[], ingredients: ingredientData[]}>()

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.user.is_admin

const ingredients = ref<ingredientData[]>([...props.ingredients])

function submitRecipe(){
    console.log("submitting recipe")
}
</script>
<style lang="">

</style>