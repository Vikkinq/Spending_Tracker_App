<script setup>
import { Link, router } from "@inertiajs/vue3";

import dayjs from "dayjs";
import relativeTime from "dayjs/plugin/relativeTime";

dayjs.extend(relativeTime);

const props = defineProps({
    expenses: {
        type: Array,
        default: () => [],
    },
    onEdit: Function,
    onDelete: Function,
    onShow: Function,
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
</script>

<template>
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
                v-for="(expense, index) in expenses"
                :key="index"
                class="hover:bg-gray-50 transition hover:cursor-pointer"
            >
                <td class="px-6 py-4 font-medium text-gray-800">
                    {{ expense.title }}
                </td>

                <td class="px-6 py-4 text-gray-700">₱{{ expense.amount }}</td>

                <td class="px-6 py-4 text-gray-600">
                    {{ expense.category ? expense.category.name : "N/A" }}
                </td>

                <td class="px-6 py-4 text-gray-600 font-bold">
                    {{ formatDate(expense.spent_on) }}
                </td>

                <td class="px-6 py-4 text-gray-600 text-xs">
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
</template>
