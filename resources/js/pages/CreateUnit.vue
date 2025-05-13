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
import { unitData, userData } from '@/types/api';
import Card from '@/components/Card.vue'
import Button from '@/components/Button.vue';
import TextInput from '@/components/TextInput.vue';
import axios from 'axios';
import { apiURL } from '@/env.dev';
import { ref } from 'vue';
import BackButton from '@/components/BackButton.vue';

const props = defineProps<{user: userData, units: unitData[]}>()
const user: userData = props.user

const userStore = useUserStore();
userStore.isLoggedIn = true
userStore.isAdmin = user.is_admin

let unitName = ref("");
let unitAbbreviation = ref("");
const units = ref<unitData[]>([...props.units])

function submitUnit(){
    axios.post(`${apiURL}/unit`, {
        name: unitName.value,
        abbreviation: unitAbbreviation.value
    }).then(res => {
        if(`${res.status}`[0] !== '2') return
        unitName.value = ""
        unitAbbreviation.value = ""
        units.value = res.data.units
    })
}

</script>
<style lang="">

</style>