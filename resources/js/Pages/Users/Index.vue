<script setup>
import { ref, watch } from "vue";
import Pagination from "../../shared/Pagination.vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash/debounce";
let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search);

watch(search, debounce(function (value) {
    router.get(
        "/users",
        {
            search: value,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
}, 300));
</script>

<template>
    <Head title="Users" />

    <div class="flex justify-between mb-4">
        <div class="flex items-center space-x-6">
            <h1 class="font-bold text-2xl">Users</h1>
            <Link
                href="/users/create"
                class="rounded-md bg-blue-500 px-8 py-1 text-sm font-bold text-white transition-colors duration-300 hover:bg-blue-600"
            >
                New user
            </Link>
        </div>

        <input
            class="border rounded-lg px-2"
            type="text"
            v-model="search"
            placeholder="Search..."
        />
    </div>

    <div class="overflow-x-auto">
        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-for="user in users.data" :key="user.id">
                        <td
                            class="px-4 py-4 w-full text-sm text-gray-500 whitespace-nowrap"
                        >
                            <div class="flex items-center gap-x-2">
                                <img
                                    class="object-cover w-8 h-8 rounded-full"
                                    :src="
                                        'https://i.pravatar.cc/50?u=' + user.id
                                    "
                                    alt=""
                                />
                                <div>
                                    <h2
                                        class="text-sm font-medium text-gray-800"
                                    >
                                        {{ user.name }}
                                    </h2>
                                    <p
                                        class="text-xs font-normal text-gray-600"
                                    >
                                        {{ user.email }}
                                    </p>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            <div class="flex items-center gap-x-6">
                                <Link
                                    :href="`users/${user.id}/edit`"
                                    class="text-gray-500 transition-colors duration-200 hover:text-indigo-500 focus:outline-none"
                                >
                                    Edit
                                </Link>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <Pagination :links="users.links" />
</template>
