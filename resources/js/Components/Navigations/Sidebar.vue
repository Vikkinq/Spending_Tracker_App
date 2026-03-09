<template>
    <aside
        class="h-screen w-64 bg-gradient-to-b from-slate-50 to-white border-r border-gray-200 flex flex-col overflow-hidden overflow-y-auto"
    >
        <!-- Header -->
        <div class="px-5 py-6 border-b border-gray-200 flex-shrink-0">
            <div class="flex items-center gap-3">
                <!-- Logo -->
                <div
                    class="w-10 h-10 bg-gradient-to-br from-indigo-600 to-purple-700 rounded-lg flex items-center justify-center text-white shadow-lg shadow-indigo-500/20 flex-shrink-0"
                >
                    <i class="fas fa-th text-sm"></i>
                </div>
                <!-- App Name -->
                <h1 class="text-base font-bold text-gray-900 tracking-tight">
                    YourApp
                </h1>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto px-3 py-4 space-y-1">
            <!-- Main Section -->
            <div class="space-y-1">
                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-indigo-600 text-sm font-semibold transition-all duration-200 cursor-pointer relative bg-gradient-to-r from-indigo-50 to-purple-50 before:absolute before:left-0 before:top-1/2 before:w-0.5 before:h-5 before:bg-gradient-to-b before:from-indigo-600 before:to-purple-700 before:rounded-r before:-translate-y-1/2"
                >
                    <i class="fas fa-chart-line w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">Dashboard</span>
                </a>

                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                >
                    <i class="fas fa-briefcase w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">Projects</span>
                </a>

                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                >
                    <i class="fas fa-users w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">Team</span>
                </a>
            </div>

            <!-- Divider -->
            <div class="h-px bg-gray-200 my-3"></div>

            <!-- Secondary Section -->
            <div class="space-y-1">
                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                >
                    <i class="fas fa-plus w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">Add New</span>
                </a>

                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                >
                    <i class="fas fa-clock w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">Activity</span>
                </a>

                <a
                    href="#"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
                >
                    <i class="fas fa-history w-5 h-5"></i>
                    <span class="text-sm font-medium truncate">History</span>
                </a>
            </div>
        </nav>

        <!-- Footer -->
        <div class="px-3 py-4 border-t border-gray-200 flex-shrink-0 space-y-1">
            <a
                href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
            >
                <i class="fas fa-question-circle w-5 h-5"></i>
                <span class="text-sm font-medium truncate">Help</span>
            </a>

            <a
                href="#"
                class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-600 text-sm font-medium transition-all duration-200 cursor-pointer hover:bg-gray-100 hover:text-gray-900"
            >
                <i class="fas fa-cog w-5 h-5"></i>
                <span class="text-sm font-medium truncate">Settings</span>
            </a>
        </div>
    </aside>
</template>

<script setup>
// Font Awesome will be loaded via your main.js or layout.php
</script>
