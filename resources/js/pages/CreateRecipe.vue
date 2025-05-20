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
            <h2 class="flex align-center mt-4 mb-2">
                Add Ingredient
                <Button 
                class="text-white w-8 h-8 mx-4 flex items-center justify-center text-2xl font-bold"
                @click="addIngredient"
                >+</Button>
            </h2>
            <ul>
                <li 
                class="flex items-center"
                v-for="(item, index) of ingredients"
                >
                    <NumInput v-model="ingredients[index].amount" class="w-30" type="number" placeholder="Amount"></NumInput>
                    <TextInput placeholder="Units" :options=unitNames></TextInput>
                    <TextInput class="w-30" placeholder="Ingredients" :options=ingredientNames></TextInput>
                    <TextInput v-model="ingredients[index].note" placeholder="notes"></TextInput>
                    <Button 
                    class="text-white w-8 h-6 flex items-center justify-center text-2xl font-bold ml-2"
                    @click="() => ingredients.splice(index, 1)"
                    >-</Button>
                </li>
            </ul>
            <h2 class="flex align-center mt-4 mb-2">
                Add Step
                <Button 
                class="text-white w-8 h-8 mx-4 flex items-center justify-center text-2xl font-bold"
                @click="addStep"
                >+</Button>
            </h2>
            <ul>
                <li 
                class="flex items-center"
                v-for="(item, index) of steps"
                >
                    <div class="mr-2">{{ index + 1 }} - </div>
                    <TextInput placeholder="Title"></TextInput>
                    <TextInput placeholder="Text"></TextInput>
                    <Button 
                    class="text-white w-8 h-6 flex items-center justify-center text-2xl font-bold ml-2"
                    @click="() => steps.splice(index, 1)"
                    >-</Button>
                </li>
            </ul>
            <Button class="w-fit text-white mt-4" @click="submitRecipe">Create</Button>
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
import NumInput from '@/components/NumInput.vue';

const props = defineProps<{user: userData, units: unitData[], ingredients: ingredientData[]}>()

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.user.is_admin
const allIngredients = ref<ingredientData[]>([...props.ingredients])
const allUnits = ref<unitData[]>([...props.units])
const unitNames: string[] = allUnits.value.map((item: any) => item.name)
const ingredientNames: string[] = allIngredients.value.map((item: any) => item.name)

const title: Ref<string> = ref("")
const ingredients: Ref<{
    ingredient?: ingredientData,
    unit?: unitData,
    amount?: number,
    note: string
}[]> = ref([])
const steps: Ref<step[]> = ref([])

function addIngredient(){
    ingredients.value.push({
        amount: 0,
        note: ''
    })
}
function addStep(){
    steps.value.push({
        title: '',
        text: ''
    })
}

function submitRecipe(){
    console.log("submitting recipe")
}
</script>
<style lang="">

</style>