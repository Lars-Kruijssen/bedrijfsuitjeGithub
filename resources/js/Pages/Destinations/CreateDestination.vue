<script setup>
import { useForm, Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const form = useForm({
    name: "",
    flight_time: "",
});

const submit = () => {
    form.post(route("destinations.store"));
};
</script>

<template>
    <Head title="Dashboard" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 mb-1"
                        for="name"
                        >Bestemming</label
                    >
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <div
                        v-if="form.errors.name"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.name }}
                    </div>
                </div>

                <div>
                    <label
                        class="block text-sm font-medium text-gray-700 mb-1"
                        for="flight_time"
                        >Vliegtijd (in minuten)</label
                    >
                    <input
                        id="flight_time"
                        v-model="form.flight_time"
                        type="number"
                        class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    />
                    <div
                        v-if="form.errors.flight_time"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.flight_time }}
                    </div>
                </div>

                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition"
                >
                    Opslaan
                </button>
            </form>
        </div>
    </div>
</template>
