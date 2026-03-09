<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ExpensesTable from "@/Components/Expenses/ExpensesTable.vue";
import { router } from "@inertiajs/vue3";

defineOptions({
    layout: AppLayout,
});

defineProps({
    expenses: Array,
    user: Object,
});

const onEdit = (id) => {
    try {
        console.log(`ID is: ${id}`);
        router.get(`/spending/${id}/edit`);
    } catch (err) {
        console.log("Expenses doesnt Exist");
    }
};

const onDelete = (id) => {
    console.log(`ID ${id} will be Deleted?`);
    router.delete(`/spending/${id}/delete`);
};

const onShow = (id) => {
    console.log(`ID ${id} will Show`);
    router.get(`/spending/${id}`);
};
</script>

```vue
<template>
    <div class="min-h-screen bg-gray-50 p-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Welcome, {{ user.name }}
            </h1>
        </div>

        <!-- Table Container -->
        <div
            class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden"
        >
            <ExpensesTable
                :expenses="expenses"
                :onEdit="onEdit"
                :onDelete="onDelete"
                :onShow="onShow"
            />
        </div>
    </div>
</template>
```
