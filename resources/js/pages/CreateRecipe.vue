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
            <TextInput label="Title" placeholder="Title" v-model="title"></TextInput>
            <h2>ingredients</h2>
            <Button 
            class="text-white w-8 h-8 flex items-center justify-center text-2xl font-bold"
            @click="addIngredient"
            >+</Button>
            <ul>
                <li 
                class="flex"
                v-for="(item, index) of ingredients">
                    <TextInput :options=ingredientNames></TextInput>
                    <Button 
                    class="text-white w-8 h-6 flex items-center justify-center text-2xl font-bold ml-4"
                    @click="() => ingredients.splice(index, 1)"
                    >-</Button>
                </li>
            </ul>
            <TextInput label="Ingredients" placeholder="Ingredients"></TextInput>
            <TextInput label="Units" placeholder="Units"></TextInput>
            <TextInput label="Quantity" placeholder="Quantity"></TextInput>
            <TextInput label="Steps" placeholder="Steps"></TextInput>
            <Button class="w-fit text-white" @click="submitRecipe">Create</Button>
        </div>
    </Card>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { userData, ingredientData, unitData, step } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { Ref, ref } from 'vue';
import BackButton from '@/components/BackButton.vue';

const props = defineProps<{user: userData, units: unitData[], ingredients: ingredientData[]}>()

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.user.is_admin
const allIngredients = ref<ingredientData[]>([...props.ingredients])
const ingredientNames: string[] = allIngredients.value.map((item: any) => item.name)

const title: Ref<string> = ref("")
const ingredients: Ref<{
    ingredient: ingredientData | null,
    unit: unitData | null,
    amount: number,
    note: string
}[]> = ref([])
const steps: Ref<step[]> = ref([])

function addIngredient(){
    ingredients.value.push({
        ingredient: null,
        unit: null,
        amount: 0,
        note: ''
    })
}

function submitRecipe(){
    console.log("submitting recipe")
}
</script>
<style lang="">

</style>