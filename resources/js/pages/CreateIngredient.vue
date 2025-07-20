<template>
    <BackButton />
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Edit Ingredients
    </h1>
    <Card class="m-4 p-4 flex">
        <div>
            <h2>
                Add an Ingredient
            </h2>
            <TextInput class="my-4" v-model="ingredientName" placeholder="Ingredient Name" label="Ingredient Name" />
            <Button class="w-fit text-white" @click="submitIngredient">Create</Button>
        </div>
        <ul class="ml-4">
            <li v-for="ingredient of ingredients">
                {{ ingredient.name }}
            </li>
        </ul>
    </Card>

</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { UserData, IngredientData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { computed, ref } from 'vue';
import BackButton from '@/components/BackButton.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps<{user: UserData, ingredients: IngredientData[]}>()
const user: UserData = props.user

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = user.is_admin

const ingredients = computed(() => props.ingredients)
const ingredientName = ref("");

function submitIngredient(){
    axios.post(`${apiURL}/ingredient`, {name: ingredientName.value}).then(res => {
        if(`${res.status}`[0] !== '2') return
        ingredientName.value = ""
        router.reload();
    })
}
</script>
<style lang="">

</style>