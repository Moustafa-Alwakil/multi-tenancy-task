<script setup>
import { Head, router } from '@inertiajs/vue3'

const logout = () => router.post('/logout')

</script>

<template>
  <Layout>
    <Head title="Dashboard" />
    <div class="text-center mt-5">
        <button class="btn btn-warning" @click="logout">Logout</button>
    </div>
    <div class="container mt-5">
        <h1>Hello User</h1>
    </div>
  </Layout>
</template>
