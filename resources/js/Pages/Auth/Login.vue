<script setup>
import { Head, useForm } from "@inertiajs/vue3";

defineOptions({
    layout: null,
});

let form = useForm({
    email: '',
    password: '',
});

let submit = () => {
    form.post('/login');
};
</script>
<template>
    <Head title="Login" />
    <main class="grid place-items-center min-h-screen">
        <section
            class="mx-auto w-96 rounded-lg border border-gray-200 bg-gray-100"
        >
            <h1 class="mt-6 text-center text-4xl font-bold text-gray-900">
                Log In
            </h1>
            <form @submit.prevent="submit" method="POST">
                <div class="mb-4 px-8">
                    <label class="my-2 block text-lg" for="email">Email</label>

                    <input
                        class="block w-full rounded-md px-4 py-2"
                        :class="form.errors.email ? 'border-red-500' : ''"
                        type="email"
                        autocomplete="username"
                        v-model="form.email"
                        name="email"
                        id="email"
                    />
                    <div
                        v-if="form.errors.email"
                        class="text-xs text-red-500 mt-1"
                        v-text="form.errors.email"
                    />
                </div>
                <div class="mb-4 px-8">
                    <label class="my-2 block text-lg" for="password"
                        >Password</label
                    >

                    <input
                        class="block w-full rounded-md px-4 py-2"
                        :class="form.errors.password ? 'border-red-500' : ''"
                        type="password"
                        autocomplete="new-password"
                        v-model="form.password"
                        name="password"
                        id="password"
                    />
                    <div
                        v-if="form.errors.password"
                        class="text-xs text-red-500 mt-1"
                        v-text="form.errors.password"
                    />
                </div>

                <div class="mb-4 px-8 text-center">
                    <button
                        type="submit"
                        class="rounded-full bg-blue-500 px-10 py-2 text-sm uppercase text-white transition-colors duration-300 hover:bg-blue-600"
                    >
                        Log In
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>
