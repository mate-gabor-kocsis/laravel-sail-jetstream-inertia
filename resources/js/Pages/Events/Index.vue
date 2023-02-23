<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link, useForm} from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import {watch} from "vue";
import debounce from 'lodash/debounce';

const props = defineProps({
    events: Object,
})

const filterForm = useForm({
    // fix values for testing filtering
    search: "",
    start_date: "2023-02-20",
    end_date: "2023-03-05",
});

watch(
    () => filterForm,
    debounce(() => {
        filterForm.get(route('events'), {preserveScroll: true, replace: true});
    }, 500),
    {deep: true}
);
</script>

<template>
    <AppLayout title="Events">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Events
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-1 mb-2 bg-gray-100 shadow-sm sm:rounded-lg border-gray-300 border">
                    <div class="flex items-center w-full p-2">
                        <TextInput v-model="filterForm.search" type="text" class="mx-1 block w-48"
                                   placeholder="Search..."/>
                        <div class="p-2 rounded-sm">Search events between:</div>
                        <TextInput v-model="filterForm.start_date" type="text" class="mx-1 block w-32 text-center"/>
                        <TextInput v-model="filterForm.end_date" type="text" class="mx-1 block w-32 text-center"/>
                    </div>
                </div>

                <div class="p-4 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div v-for="event in events"
                         class="p-2 flex justify-between items-center w-full border-b odd:bg-gray-50">

                        <span class="w-60">{{ event.title }}</span>
                        <!--<Link class="w-60 text-blue-500" :href="route('events.edit', event.id)">{{ event.title }}</Link>-->

                        <span>{{ event.start_date }}</span>
                        <span>{{ event.end_date }}</span>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
