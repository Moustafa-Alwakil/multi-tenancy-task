<script setup>
import { Head,router } from '@inertiajs/vue3'
import { reactive } from 'vue'

defineProps({ errors: Object })

const form = reactive({
  email: null,
  password: null
})

const submit = () => router.post('/login', form)

</script>

<template>
    <Head title="Login" />
    <div class="container mt-5 bg-secondary-subtle">
        <div class="col-md-12 rounded p-5">
            <p class="text-center h1">Login</p>
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" v-model="form.email" class="form-control" required id="email" placeholder="Email">
                    <p v-if="errors.email" class="text-danger mt-2">* {{ errors.email }}</p>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password *</label>
                    <input type="password" v-model="form.password" class="form-control" required id="password" placeholder="Password">
                    <p v-if="errors.password" class="text-danger mt-2">* {{ errors.password }}</p>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary" :disabled="form.processing">Login</button>
                </div>
            </form>
        </div>
    </div>
</template>
