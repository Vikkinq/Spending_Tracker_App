<script setup>
import "primeicons/primeicons.css";
import Button from "primevue/button";

const props = defineProps({
    expense: Object,
});
</script>

<template>
    <div>
        <h1>Spending Show -- {{ expense.title }}</h1>
        <Button label="Verify" />
    </div>
</template>
