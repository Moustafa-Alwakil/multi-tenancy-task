<script setup>
import { Head, router } from '@inertiajs/vue3'

defineProps({
    merchants: {
        required: true,
        type: String
    },
})

const logout = () => router.post('/logout')
</script>

<template>
  <Layout>
    <Head title="Welcome" />
    <div class="text-center mt-5">
        <button class="btn btn-warning" @click="logout">Logout</button>
    </div>
    <div class="container mt-5 bg-secondary-subtle">
        <div class="col-md-12 rounded p-5">
            <p class="text-center h1">Merchants</p>
            <table class="table table-hover text-center">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Domain</th>
                    <th>Options</th>
                </thead>
                <tbody>
                    <tr v-for="merchant in merchants">
                        <td>{{ merchant.id }}</td>
                        <td>{{ merchant.name }}</td>
                        <td>{{ merchant.email }}</td>
                        <td>{{ merchant.tenant.domain }}</td>
                        <td><a class="btn btn-primary" :href="`/users/${merchant.id}`">Show Users</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </Layout>
</template>
