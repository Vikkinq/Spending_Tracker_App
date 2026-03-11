<script setup>
import { router, Link } from "@inertiajs/vue3";

const props = defineProps({
    links: {
        type: Array,
        required: true,
    },
});

const visit = (url) => {
    if (!url) return;
    router.visit(url, {
        preserveScroll: true,
        preserveState: true,
    });
};
</script>

<template>
    <div class="flex justify-end mt-6 space-x-1">
        <Link
            v-for="(link, index) in links"
            :key="index"
            v-html="link.label"
            @click="visit(link.url)"
            :disabled="!link.url"
            :class="[
                'px-3 py-1 border rounded text-sm',
                link.active
                    ? 'bg-indigo-500 text-white border-indigo-500'
                    : 'bg-white text-gray-700 hover:bg-gray-100',
                !link.url ? 'opacity-50 cursor-not-allowed' : '',
            ]"
        />
    </div>
</template>
