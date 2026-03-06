<script setup>
    const props = defineProps({
        expense: Object,
    })
</script>

<template>
    <div>
        <h1>Spending Show -- {{ expense.title }}</h1>
    </div>
</template>