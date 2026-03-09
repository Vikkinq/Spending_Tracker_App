<template>
    <div class="h-screen w-full flex bg-white">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <Topbar />

            <!-- Page Content -->
            <div
                class="flex-1 overflow-y-auto overflow-x-hidden px-8 py-8 bg-gray-50"
            >
                <slot />
            </div>
        </main>
    </div>
</template>

<script setup>
import Sidebar from "@/Components/Navigations/Sidebar.vue";
import Topbar from "@/Components/Navigations/Topbar.vue";
import { usePage } from "@inertiajs/vue3";

const { props } = usePage();

const user = props.auth.user;
</script>
