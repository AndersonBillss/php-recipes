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
            <TextInput label="Title" placeholder="Title" v-model="recipe.title"></TextInput>
            <TextInput label="Description" placeholder="Description" v-model="recipe.description"></TextInput>
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
                v-for="(item, index) of recipe.ingredients"
                >
                    <NumInput class="w-30" placeholder="Amount"
                    v-model="recipe.ingredients[index].amount"
                    />
                    <TextInput placeholder="Units"
                    :get-option-label="(item) => item === null ? 'No Units (countable)' : item.name" :options=allUnits 
                    v-model="recipe.ingredients[index].unit"
                    />
                    <TextInput class="w-30"  placeholder="Ingredients"
                    :get-option-label="(item) => item.name" :options=allIngredients 
                    v-model="recipe.ingredients[index].ingredient"
                    />
                    <TextInput placeholder="notes"
                    v-model="recipe.ingredients[index].note" 
                    />
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
                v-for="(item, index) of recipe.steps"
                >
                    <div class="mr-2">{{ index + 1 }} - </div>
                    <TextInput placeholder="Title" v-model="recipe.steps[index].title"></TextInput>
                    <TextInput placeholder="Text" v-model="recipe.steps[index].text"></TextInput>
                    <Button 
                    class="text-white w-8 h-6 flex items-center justify-center text-2xl font-bold ml-2"
                    @click="() => recipe.steps.splice(index, 1)"
                    >-</Button>
                </li>
            </ul>
            <Button class="w-fit text-white mt-4" @click="submitRecipe">Create</Button>
        </div>
    </Card>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { UserData, IngredientData, UnitData, recipeData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { Ref, ref, resolveComponent } from 'vue';
import BackButton from '@/components/BackButton.vue';
import NumInput from '@/components/NumInput.vue';

const props = defineProps<{user: UserData, units: UnitData[], ingredients: IngredientData[]}>()

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = props.user.is_admin
const allIngredients = ref<IngredientData[]>([...props.ingredients])
const allUnits = ref<(UnitData | null)[]>([...props.units])
allUnits.value.unshift(null)

const recipe: Ref<recipeData> = ref({
    title: "",
    description: "",
    ingredients: [],
    steps: []
})

function addIngredient(){
    recipe.value.ingredients.push({
        amount: 0,
        note: ''
    })
}
function addStep(){
    recipe.value.steps.push({
        title: '',
        text: ''
    })
}

function submitRecipe(){
    console.log("submitting recipe:", JSON.parse(JSON.stringify(recipe.value)))
    axios.post(`${apiURL}/recipe`, recipe.value).then(res => {
        console.log(res)
    })
}
</script>
<style lang="">

</style>