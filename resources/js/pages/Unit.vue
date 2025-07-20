<template>
    <BackButton />
    <h1 class="w-fit pr-6 border-b-4 border-b-cyan-800">
        Edit Units
    </h1>
    <Card class="m-4 p-4 flex">
        <div>
            <h2>
                Add Units
            </h2>
            <TextInput class="my-4" v-model="unitName" placeholder="Unit Name" label="Unit Name" />
            <TextInput class="my-4" v-model="unitAbbreviation" placeholder="Unit Abbreviation" label="Unit Abbreviation" />
            <Button class="w-fit text-white" @click="submitUnit">Create</Button>
        </div>
        <ul class="ml-4">
            <li v-for="unit of units">
                {{ unit.name }} ({{ unit.abbreviation }})
            </li>
        </ul>
    </Card>
</template>
<script setup lang="ts">
import { useUserStore } from '@/stores/user';
import { UnitData, UserData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { computed, ref } from 'vue';
import BackButton from '@/components/BackButton.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps<{user: UserData, units: UnitData[]}>()
const user: UserData = props.user

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = user.is_admin

let unitName = ref("");
let unitAbbreviation = ref("");
const units = computed(() => props.units)

function submitUnit(){
    axios.post(`${apiURL}/unit`, {
        name: unitName.value,
        abbreviation: unitAbbreviation.value
    }).then(res => {
        if(`${res.status}`[0] !== '2') return
        unitName.value = ""
        unitAbbreviation.value = ""
        router.reload();
    })
}

</script>
<style lang="">

</style>