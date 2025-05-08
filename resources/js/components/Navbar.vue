<template lang="">
    <div class="flex px-6 p-4 bg-amber-600 animate-in fade-in slide-in-from-top-8 duration-500 justify-between">
        <Button class="mx-2">
            <Link href="/">
                Home
            </Link>
        </Button>
        <div class="flex">
            <Button class="mx-2">
                <Link href="/login">
                    Login
                </Link>
            </Button>
            
            <Button class="mx-2">
                <Link href="/register">Sign up
                </Link>
            </Button>
        </div>
    </div>
</template>
<script>
import Button from './Button.vue';
import { Link } from '@inertiajs/vue3'

export default {
  components: {
    Button,
    Link
  }
}
</script>