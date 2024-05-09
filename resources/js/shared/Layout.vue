<script setup>
import Nav from "./Nav.vue";
</script>

<template>
    <header class="bg-gray-200 p-4 flex space-x-6 items-center justify-center">
        <h1 class="font-bold text-xl absolute left-6">My App</h1>

        <Nav />
    </header>

    <section class="p-6">
        <div class="max-w-5xl mx-auto">
            <slot />
        </div>
    </section>
</template>
