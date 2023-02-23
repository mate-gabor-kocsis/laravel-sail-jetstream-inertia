<script setup>
import {Head, Link, useForm} from '@inertiajs/vue3';
import {ref, reactive} from "vue";
import AppLayout from '@/Layouts/AppLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    event: Object,
});

const form = useForm({
    title: props.event.title,
    start_date: props.event.start_date,
    end_date: props.event.end_date,
});

const submit = () => {
    form.put(route('events.update', props.event.id), {preserveScroll:true});
};
</script>

<template>
    <AppLayout title="Edit event">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit event
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-12">
                    <form @submit.prevent="submit">
                        <div>
                            <InputLabel for="title" value="Title"/>
                            <TextInput
                                id="title"
                                v-model="form.title"
                                type="text"
                                class="mt-1 block w-full"
                                required
                                autofocus
                                autocomplete="username"
                            />
                            <InputError class="mt-2" :message="form.errors.title"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="start_date" value="Start date"/>
                            <TextInput
                                id="start_date"
                                v-model="form.start_date"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.start_date"/>
                        </div>

                        <div class="mt-4">
                            <InputLabel for="end_date" value="End date"/>
                            <TextInput
                                id="end_date"
                                v-model="form.end_date"
                                type="text"
                                class="mt-1 block w-full"
                                required
                            />
                            <InputError class="mt-2" :message="form.errors.end_date"/>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <Link :href="route('events')"
                                  class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                cancel
                            </Link>

                            <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                           :disabled="form.processing">
                                Save
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
