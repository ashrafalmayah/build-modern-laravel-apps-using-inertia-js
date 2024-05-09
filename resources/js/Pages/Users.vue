<script setup>
import { Link } from "@inertiajs/vue3";
import Layout from "../shared/Layout.vue";

defineProps({
    time: String,
});
</script>
<template>
    <Layout>
        <h1 class="font-bold text-2xl">Users</h1>

        <div class="mt-[700px]">
            <p>The time is {{ time }}.</p>

            <Link
                class="text-blue-600 hover-underline"
                preserve-scroll
                href="/users"
                >Refresh</Link
            >
        </div>
    </Layout>
</template>
