<script setup>
import { Head, router, Link } from "@inertiajs/vue3";

const props = defineProps({
    destinations: Array,
    user: Object,
    votes: Array,
});

const submitVote = (destinationId, voteValue) => {
    router.post("/votes", {
        destination_id: destinationId,
        vote: voteValue,
    });
};

const hasVoted = (destinationId) => {
    return props.votes.some((vote) => vote.destination_id === destinationId);
};
const getVoteForDestination = (destinationId) => {
    const vote = props.votes.find((v) => v.destination_id === destinationId);
    return vote?.vote;
};
</script>

<template>
    <Head title="Dashboard" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div>
                <Link
                    v-if="user.role_id === 1"
                    href="/destinations/create"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition mr-2"
                >
                    Nieuwe bestemming
                </Link>

                <Link
                    :href="route('logout')"
                    method="post"
                    class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition"
                >
                    Uitloggen
                </Link>
            </div>

            <div
                v-for="destination in destinations"
                :key="destination.id"
                class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6 mt-4"
            >
                <div
                    class="-mt-4 flex flex-wrap items-center justify-between sm:flex-nowrap"
                >
                    <div class="mt-4">
                        <div class="flex items-center">
                            <div>
                                <h3
                                    class="text-base font-semibold text-gray-900"
                                    :class="{
                                        'text-green-500':
                                            getVoteForDestination(
                                                destination.id
                                            ) === 1,
                                        'text-red-500':
                                            getVoteForDestination(
                                                destination.id
                                            ) === 0,
                                        'text-gray-200':
                                            getVoteForDestination(
                                                destination.id
                                            ) === undefined,
                                    }"
                                >
                                    {{ destination.name }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    Vliegtijd: {{ destination.flight_time }} min
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex shrink-0">
                        <div
                            v-if="!hasVoted(destination.id)"
                            class="mt-3 flex gap-2"
                        >
                            <button
                                @click="submitVote(destination.id, true)"
                                class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition"
                            >
                                Ja
                            </button>
                            <button
                                @click="submitVote(destination.id, false)"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                            >
                                Nee
                            </button>
                        </div>
                        <div v-else class="mt-3 text-sm text-gray-500 italic">
                            Je hebt al gestemd
                        </div>
                    </div>
                </div>
                <div
                    v-if="user.role_id === 1"
                    class="mt-2 text-sm text-gray-600"
                >
                    Ja:
                    <span class="font-medium text-green-600">{{
                        destination.yes_votes
                    }}</span>
                    Nee:
                    <span class="font-medium text-red-600">{{
                        destination.no_votes
                    }}</span>
                </div>
            </div>
        </div>
    </div>
</template>
