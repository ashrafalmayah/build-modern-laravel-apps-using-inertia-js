<script setup>
import Pagination from "../shared/Pagination.vue";
defineProps({
    users: Object,
});
</script>

<template>
    <Head title="Users" />

    <h1 class="font-bold text-2xl">Users</h1>

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
