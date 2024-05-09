<script setup>
defineProps({
    time: String,
});
</script>

<template>
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
</template>
