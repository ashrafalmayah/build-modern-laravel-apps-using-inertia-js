<script setup>
let props = defineProps({
    links: Array,
});

let filteredLinks = props.links.filter(function (link) {
    return ! isNaN(link.label);
});

let previousUrl = props.links[0].url;
let nextUrl = props.links[props.links.length - 1].url;
</script>

<template>
    <div class="flex items-center justify-between mt-6">
        <Component
            :is="previousUrl ? 'Link' : 'span'"
            :href="previousUrl"
            class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 border rounded-md gap-x-2 hover:bg-gray-100"
            :class="{
                'bg-gray-100': !previousUrl,
                'bg-white': previousUrl,
            }"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 rtl:-scale-x-100"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18"
                />
            </svg>

            <span> previous </span>
        </Component>

        <div class="items-center hidden md:flex gap-x-3">
            <Link
                v-for="link in filteredLinks"
                :href="link.url"
                :key="link.label"
                v-html="link.label"
                class="px-2 py-1 text-sm rounded-md"
                :class="{
                    'text-blue-500 bg-blue-100/60': link.active,
                    'text-gray-500 hover:bg-gray-100': !link.active,
                }"
            />
        </div>

        <Component
            :is="nextUrl ? 'Link' : 'span'"
            :href="nextUrl"
            class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 border rounded-md gap-x-2 hover:bg-gray-100"
            :class="{
                'bg-gray-100': !nextUrl,
                'bg-white': nextUrl,
            }"
        >
            <span> Next </span>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-5 h-5 rtl:-scale-x-100"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                />
            </svg>
        </Component>
    </div>
</template>
