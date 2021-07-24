<template>
    <div class="p-4">
        <div class="m-8">
            <inertia-link class="bg-blue-500 hover:bg-blue-700 px-8 py-4" href="/dashboard">Dashboard</inertia-link>
        </div>


        <h1 class="text-lg font-bold">ユーザ一覧</h1>
        <ul>
            <li v-for="user in users" :key="user.id">{{ user.name }}</li>
        </ul>

    </div>
</template>
<script>
    export default {
        props:{
            users: {
                type: Array,
            }
        }
    }
</script>
