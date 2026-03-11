<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import ExpensesTable from "@/Components/Expenses/ExpenseTable/ExpensesTable.vue";
import Pagination from "@/Components/Global/Pagination.vue";
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";

defineOptions({
    layout: AppLayout,
});

const props = defineProps({
    expenses: {
        type: Object,
        required: true,
    },
    user: Object,
    filters: Object,
});

const searchQuery = ref(props.filters.search || "");
const sortOption = ref(props.filters.sort || "");

watch([searchQuery, sortOption], ([search, sort]) => {
    router.get(
        "/spending",
        {
            search: search,
            sort: sort,
        },
        {
            preserveState: true,
            replace: true,
        },
    );
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
    try {
        if (confirm("Are you sure you want to delete this?")) {
            console.log(`ID ${id} will be Deleted?`);
            router.delete(`/spending/${id}/delete`);
        }
    } catch (err) {
        console.log("Error: ", err);
    }
};

const onShow = (id) => {
    try {
        console.log(`ID ${id} will Show`);
        router.get(`/spending/${id}`);
    } catch (err) {
        console.log("Error: ", err);
    }
};
</script>

<template>
    <div class="min-h-screen bg-gray-50 p-8">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Welcome, {{ user.name }}
            </h1>

            <!-- Search and Sort Controls -->
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search..."
                        class="pl-10 pr-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                        v-model="searchQuery"
                    />
                    <span
                        class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"
                    >
                        <i class="fas fa-search"></i>
                    </span>
                </div>

                <!-- Sort -->
                <div>
                    <select
                        v-model="sortOption"
                        class="border rounded-lg py-2 px-3 text-sm shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="" selected>All</option>
                        <option value="dateAsc">Date ↑</option>
                        <option value="dateDesc">Date ↓</option>
                        <option value="abcAsc">ABC ↑</option>
                        <option value="abcDesc">ABC ↓</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table Container -->
        <div
            class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden"
        >
            <ExpensesTable
                :expenses="expenses.data"
                :onEdit="onEdit"
                :onDelete="onDelete"
                :onShow="onShow"
            />
        </div>

        <!-- Pagination -->
        <Pagination :links="expenses.links" />
    </div>
</template>
