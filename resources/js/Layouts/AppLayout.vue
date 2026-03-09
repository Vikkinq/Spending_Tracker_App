<template>
    <div class="h-screen w-full flex bg-white">
        <!-- Sidebar -->
        <Sidebar />

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header
                class="h-16 border-b border-gray-200 bg-white flex items-center px-8 flex-shrink-0"
            >
                <div class="w-full flex items-center justify-between">
                    <!-- Mobile Menu Toggle -->
                    <button
                        class="hidden md:hidden bg-none border-none cursor-pointer text-gray-600 p-2 rounded-lg transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                    >
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <!-- Spacer -->
                    <div class="flex-1"></div>

                    <!-- Top Bar Actions -->
                    <div class="flex items-center gap-4">
                        <!-- Notifications Button -->
                        <button
                            class="relative bg-none border-none cursor-pointer text-gray-600 p-2 rounded-lg transition-all duration-200 hover:bg-gray-100 hover:text-gray-900"
                            aria-label="Notifications"
                        >
                            <i class="fas fa-bell text-lg"></i>
                            <span
                                class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"
                            ></span>
                        </button>

                        <!-- User Menu -->
                        <div class="relative group">
                            <button
                                class="bg-none border-none cursor-pointer p-0 flex items-center justify-center"
                            >
                                <div
                                    class="w-9 h-9 rounded-lg bg-gradient-to-br from-indigo-600 to-purple-700 text-white font-bold text-sm flex items-center justify-center transition-transform duration-200 group-hover:scale-105"
                                >
                                    {{ user.name[0].toUpperCase() }}
                                </div>
                            </button>

                            <!-- Dropdown Menu -->
                            <div
                                class="absolute top-full right-0 mt-2 w-40 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50"
                            >
                                <a
                                    href="#"
                                    class="flex items-center gap-2 px-4 py-2.5 text-gray-600 text-sm transition-all duration-200 hover:bg-gray-50 hover:text-gray-900 first:rounded-t-lg"
                                >
                                    <i class="fas fa-user w-4"></i>
                                    Profile
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center gap-2 px-4 py-2.5 text-gray-600 text-sm transition-all duration-200 hover:bg-gray-50 hover:text-gray-900"
                                >
                                    <i class="fas fa-sliders-h w-4"></i>
                                    Preferences
                                </a>
                                <a
                                    href="#"
                                    class="flex items-center gap-2 px-4 py-2.5 text-gray-600 text-sm transition-all duration-200 hover:bg-gray-50 hover:text-gray-900 last:rounded-b-lg"
                                >
                                    <i class="fas fa-sign-out-alt w-4"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

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
import { usePage } from "@inertiajs/vue3";

const { props } = usePage();

const user = props.auth.user;
</script>
