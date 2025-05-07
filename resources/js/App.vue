<script>
import axios from 'axios';
import Login from './pages/Login.vue';
import Register from './pages/Register.vue';
import { apiURL } from './env.dev';

export default {
  components: {
    Login,
    Register
  },
  methods: {
        getUser(){
            axios.get(`${apiURL}/user`, {
              headers: {
                Authorization: `Bearer ${localStorage.getItem("token")}`
            }
          })
        }
    }
}

</script>

<template>
  <div>
      THIS IS A VUE APP
      <h1 class="mt-3">Login</h1>
      <Login />
      <h1 class="mt-3">Register</h1>
      <Register />

      <h1 class="mt-3">User</h1>
      <button @click="getUser()">Get User Data</button>
  </div>
</template>