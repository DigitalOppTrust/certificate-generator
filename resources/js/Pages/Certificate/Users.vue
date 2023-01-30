<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import FileUploader from "@/Components/FileUploader.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";

const form = useForm({
    uuid: "",
    csv: "",
});

const certificate = usePage().props.certificate.valueOf();
const users = usePage().props.certificate.users.valueOf();

const addAsset = (file) => {
    form.csv = file;

    form.post(
        route("certificate.users.addcsv", {
            certificate: certificate.uuid,
        }),
        {
            onFinish: (response) => {
                // Force a reload
                window.location.reload();
            },
        }
    );
};
</script>

<template>
    <Head title="Certificate" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Certificate Users - {{ certificate.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-5">
                        <div class="p-5">
                            <FileUploader
                                @upload="addAsset"
                                label="Add Asset"
                                class="mb-5"
                            />
                            .csv needs to have firstname, lastname and email as
                            headers
                        </div>
                    </form>

                    <Link
                        v-if="certificate.uuid"
                        :href="
                            route('certificate.builder', {
                                uuid: form.uuid,
                            })
                        "
                        class="text-sm text-gray-700 dark:text-gray-500 underline p-5"
                        >Certificate Builder</Link
                    >
                </div>
            </div>
            {{ users }}
        </div>
    </AuthenticatedLayout>
</template>
