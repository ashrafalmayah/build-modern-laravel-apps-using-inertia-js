<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    name: "",
    email: "",
    password: "",
});
let submit = () => {
    form.post("/users");
};
</script>

<template>
    <Head title="Create User" />

    <h1 class="font-bold text-2xl pb-2 border-b mb-4">Create New User</h1>

    <form
        @submit.prevent="submit"
        method="POST"
        class="max-w-lg mx-auto space-y-8"
    >
        <div class="px-8">
            <label class="my-2 block text-md font-semibold uppercase" for="name"
                >Name</label
            >

            <input
                class="block w-full rounded-md px-4 py-2 border"
                :class="form.errors.name ? 'border-red-500' : ''"
                type="text"
                autocomplete="name"
                v-model="form.name"
                name="name"
                id="name"
                required
            />
            <div
                v-if="form.errors.name"
                class="text-xs text-red-500 mt-1"
                v-text="form.errors.name"
            />
        </div>
        <div class="px-8">
            <label
                class="my-2 block text-md font-semibold uppercase"
                for="email"
                >Email</label
            >

            <input
                class="block w-full rounded-md px-4 py-2 border"
                :class="form.errors.email ? 'border-red-500' : ''"
                type="email"
                autocomplete="username"
                v-model="form.email"
                name="email"
                id="email"
                required
            />
            <div
                v-if="form.errors.email"
                class="text-xs text-red-500 mt-1"
                v-text="form.errors.email"
            />
        </div>
        <div class="px-8">
            <label
                class="my-2 block text-md font-semibold uppercase"
                for="password"
                >Password</label
            >

            <div class="relative">
                <input
                    class="block w-full rounded-md px-4 py-2 border"
                    :class="form.errors.password ? 'border-red-500' : ''"
                    type="password"
                    autocomplete="new-password"
                    v-model="form.password"
                    name="password"
                    id="password"
                    required
                />
            </div>
            <div
                v-if="form.errors.password"
                class="text-xs text-red-500 mt-1"
                v-text="form.errors.password"
            />
        </div>
        <div class="px-8">
            <button
                type="submit"
                class="rounded-full bg-blue-500 px-10 py-2 text-sm font-bold uppercase text-white transition-colors duration-300 hover:bg-blue-600"
                :disabled="form.processing"
            >
                Create
            </button>
        </div>
    </form>
</template>
