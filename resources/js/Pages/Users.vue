<script setup>
import { Link } from "@inertiajs/vue3";
import Nav from "../shared/Nav.vue";

defineProps({
    time: String
})
</script>
<template>
    <h1>Users</h1>

    <Nav />

    <div class="mt-[700px]">
        <p>The time is {{ time }}.</p>

        <Link class="text-blue-600 hover-underline" preserve-scroll href="/users">Refresh</Link>
    </div>
</template>
