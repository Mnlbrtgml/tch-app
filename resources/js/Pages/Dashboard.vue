<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    cats: Array,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <  512x512.png" alt="Logo"> -->
                    <div class="flex justify-center p-4">
                        <div
                            class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700"
                        >
                            <a href="#">
                                <h5
                                    class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                                >
                                    {{ cats.length }}
                                    {{ cats.length > 1 ? "cats" : "cat" }}
                                    available for adoption.
                                </h5>
                            </a>
                            <div class="flex items-center justify-between">
                                <span class="z-10 font-bold text-2xl">
                                    <p
                                        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                                    >
                                        PROMOTES ADOPTION AND
                                    </p>
                                    <p
                                        class="mb-3 font-normal text-gray-700 dark:text-gray-400"
                                    >
                                        SPAYING / NEUTERING
                                    </p>
                                </span>
                                <img
                                    class="w-60 relative z-0 right-10"
                                    src="https://thecathouse.netlify.app/img/logo/android-chrome-512x512.png"
                                    alt="Logo"
                                />
                            </div>

                            <a
                                :href="route('adopts.client')"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            >
                                See more
                                <svg
                                    aria-hidden="true"
                                    class="w-4 h-4 ml-2 -mr-1"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
