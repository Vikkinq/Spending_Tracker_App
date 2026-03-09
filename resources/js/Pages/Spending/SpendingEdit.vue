<script setup>
    import { computed } from 'vue';
    import { Link, useForm } from '@inertiajs/vue3';

    const props = defineProps({
        expense: Object,
        user: Object,
        categories: {
            type: Array,
            default: () => []
        }
    })

    const defaultCategories = ['Food', 'Travel', 'Entertainment'];

    const allCategories = computed(() => {
        const userCategories = props.categories || []
        return [...new Set([...defaultCategories, ...userCategories])]
    })

    const form = useForm({
        title: props.expense.title,
        amount: props.expense.amount,
        category: props.expense.categories,
        spent_on: props.expense.spent_on,
        notes: props.expense.notes,
    })

    const updateData = (id) => {
        try{
            form.put(`/spending/${id}/update`, {
                onSuccess: () => {
                    form.reset();
                    console.log("Successfully Updated!");
                }
            })
        } catch(err){
            console.log(err)
        }
    }

</script>

<template>
    <div class="min-h-screen bg-gray-50 py-12 px-4">
        <h1>{{ user.name }}</h1>
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            <h1 class="text-3xl font-bold text-center mb-8 text-gray-900">Update Expenditure</h1>
            <form @submit.prevent="updateData(expense.id)" class="space-y-5">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                    <input v-model="form.title" type="text" id="title" placeholder="Enter title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>

                <!-- Amount -->
                <div>
                    <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Amount</label>
                    <input v-model="form.amount" type="number" id="amount" placeholder="Enter amount" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>

                <!-- Category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select v-model="form.category" class="input">
                        <option disabled value="">Select a Category</option>
                        <option v-for="cat in allCategories" :key="cat" :value="cat" >{{ cat }}</option>
                    </select>
                </div>

                <!-- Date -->
                <div>
                    <label for="spent_on" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                    <input v-model="form.spent_on" type="date" id="spent_on" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition">
                </div>

                <!-- Note -->
                <div>
                    <label for="note" class="block text-sm font-medium text-gray-700 mb-2">Note</label>
                    <textarea v-model="form.notes" id="note" placeholder="Add a note..." rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none transition resize-none"></textarea>
                </div>

                <button type="submit" class="w-full mt-6 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Save Changes
                </button>

                <p>{{ form.category }}</p>
                <p>5: {{ allCategories }}</p>
                <p>{{ expense.id }}</p>
            </form>
        </div>
    </div>
</template>