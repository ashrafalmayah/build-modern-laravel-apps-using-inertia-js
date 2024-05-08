<script setup>
defineProps({
    name: String,
    frameworks: Array,
})
</script>
<template>
<h1>Hello {{ name }}</h1>
<h3>The frameworks we will use: </h3>
<ul>
    <li v-for="framework in frameworks">{{ framework }}</li>
</ul>
</template>
