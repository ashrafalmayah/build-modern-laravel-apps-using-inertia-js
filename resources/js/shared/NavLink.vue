<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    active: Boolean,
});
</script>

<template>
    <Link
        class="text-blue-600 hover:underline text-lg"
        :class="{
            'font-bold underline': active,
        }"
    >
        <slot />
    </Link>
</template>
