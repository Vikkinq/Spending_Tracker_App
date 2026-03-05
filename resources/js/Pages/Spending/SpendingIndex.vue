<script setup>
    import { Link } from '@inertiajs/vue3';


    defineProps({
        expenses: Array,
    })

</script>

<template>
    <div>
        <Link :href="route('expenses.create')">Create</Link>
    </div>
    <div v-for="expense in expenses">
        <h1>{{ expense.title }}</h1>
    </div>
</template>