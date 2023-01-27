<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";

const certificates = usePage().props.certificates.valueOf();

const editCertificate = (uuid) => {
    window.location.href = route("certificate.upsert", {
        uuid: uuid,
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <Link
                        :href="route('certificate.upsert')"
                        class="text-sm text-gray-700 dark:text-gray-500 underline p-5"
                        >Create a new certificate</Link
                    >
                </div>

                <div>
                    <div
                        v-for="certificate in certificates"
                        :key="certificate.id"
                        class="flex flex-row mb-1"
                    >
                        <div class="grow">
                            {{ certificate.name }}
                        </div>
                        <div
                            class="bg-blue-300 hover:bg-blue-500 text-white p-2 flex-none rounded"
                        >
                            <button @click="editCertificate(certificate.uuid)">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
