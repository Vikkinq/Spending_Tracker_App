<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";

import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

defineOptions({
    layout: AppLayout,
});

defineProps({
    expenses: Array,
    user: Object,
});

const formatDate = (dateString) => {
    return dayjs(dateString).format("MMM DD, YYYY");
};

const formatDateTime = (dateString) => {
    return dayjs(dateString).format("MMM DD, YYYY HH:mm");
};

const timeAgo = (date) => {
    return dayjs(date).fromNow();
};

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

            <!-- <Link
                :href="route('expenses.create')"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition"
            >
                + Create Expense
            </Link> -->
        </div>

        <!-- Table Container -->
        <div
            class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden"
        >
            <table class="min-w-full divide-y divide-gray-200">
                <!-- Table Header -->
                <thead
                    class="bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider"
                >
                    <tr>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Amount</th>
                        <th class="px-6 py-3">Category</th>
                        <th class="px-6 py-3">Spent On</th>
                        <th class="px-6 py-3">Notes</th>
                        <th class="px-6 py-3">Created</th>
                        <th class="px-6 py-3">Updated</th>
                        <th class="px-6 py-3 text-right">Action</th>
                    </tr>
                </thead>

                <!-- Table Body -->
                <tbody class="divide-y divide-gray-100">
                    <tr
                        v-for="expense in expenses"
                        :key="expense.id"
                        class="hover:bg-gray-50 transition hover:cursor-pointer"
                    >
                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ expense.title }}
                        </td>

                        <td class="px-6 py-4 text-gray-700">
                            ₱{{ expense.amount }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{
                                expense.category ? expense.category.name : "N/A"
                            }}
                        </td>

                        <td class="px-6 py-4 text-gray-600 font-bold">
                            {{ formatDate(expense.spent_on) }}
                        </td>

                        <td class="px-6 py-4 text-gray-600">
                            {{ expense.notes ? expense.notes : "N/A" }}
                        </td>

                        <td class="px-6 py-4 text-gray-500 text-sm">
                            {{ formatDateTime(expense.created_at) }}
                        </td>

                        <td class="px-6 py-4 text-gray-500 text-sm">
                            {{ timeAgo(expense.updated_at) }}
                        </td>

                        <!-- Action Column -->
                        <td class="px-6 py-4 text-right space-x-2">
                            <button
                                @click="onShow(expense.id)"
                                class="px-3 py-1 text-sm bg-green-500 text-white rounded hover:bg-green-600"
                            >
                                Show
                            </button>
                            <button
                                @click="onEdit(expense.id)"
                                class="px-3 py-1 text-sm bg-blue-500 text-white rounded hover:bg-blue-600"
                            >
                                Edit
                            </button>

                            <button
                                @click="onDelete(expense.id)"
                                class="px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer
        <div class="mt-6">
            <Link
                :href="route('logout')"
                method="post"
                class="text-red-600 hover:underline"
            >
                Logout
            </Link>
        </div> -->
    </div>
</template>
```
