<script setup>
import { Head, router } from '@inertiajs/vue3'

defineProps({
    users: {
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
            <p class="text-center h1">Users</p>
            <table class="table table-hover text-center">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Domain</th>
                </thead>
                <tbody>
                    <tr v-for="user in users">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.tenant.domain }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </Layout>
</template>
