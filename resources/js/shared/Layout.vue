<script setup>
import { usePage } from "@inertiajs/vue3";
import Nav from "./Nav.vue";
import { computed } from "vue";

let username = computed(() => usePage().props.auth.user.username);
</script>

<template>
    <header class="bg-gray-200 p-4 flex space-x-6 items-center justify-center">
        <div class="absolute left-6 flex items-center space-x-2">
            <h1 class="font-bold text-xl">My App</h1>
            <p class="text-lg">Welcome Back, {{ username }}!</p>
        </div>

        <Nav />
    </header>

    <section class="p-6">
        <div class="max-w-5xl mx-auto">
            <slot />
        </div>
    </section>
</template>
