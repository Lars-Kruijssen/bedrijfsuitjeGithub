<script setup>
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Welkom" />

    <div class="bg-gray-900 h-screen">
        <div class="relative isolate overflow-hidden pt-14 h-screen">
            <img
                src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2830&q=80&blend=111827&sat=-100&exp=15&blend-mode=multiply"
                alt=""
                class="absolute inset-0 -z-10 size-full object-cover"
            />
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                    <div class="text-center">
                        <h1
                            class="text-balance text-5xl font-semibold tracking-tight text-white sm:text-7xl"
                        >
                            Waar gaan we samen naartoe?
                        </h1>
                        <p
                            class="mt-8 text-pretty text-lg font-medium text-gray-400 sm:text-xl/8"
                        >
                            Onze website maakt stemmen simpel: kies jouw
                            favoriete bestemming – of laat weten waar je liever
                            niet heen wilt – en bepaal samen ons volgende
                            bedrijfsuitje.
                        </p>
                        <div
                            class="mt-10 flex items-center justify-center gap-x-6"
                        >
                            <a
                                :href="route('login')"
                                class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-400"
                                >Inloggen</a
                            >
                            <a
                                :href="route('register')"
                                class="text-sm/6 font-semibold text-white"
                                >Registreren
                                <span aria-hidden="true">→</span></a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
