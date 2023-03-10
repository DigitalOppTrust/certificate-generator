<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import ImageUploader from "@/Components/ImageUploader.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";

const form = useForm({
    uuid: "",
    name: "",
    asset: "",
});

const certificate = usePage().props.certificate.valueOf();

if (certificate) {
    form.uuid = certificate.uuid;
    form.name = certificate.name;
}

const addAsset = (file) => {
    form.asset = file;

    form.post(
        route("certificate.asset.add", {
            certificate: form.uuid,
        }),
        {
            onFinish: (response) => {
                // Force a reload
                window.location.reload();
            },
        }
    );
};

const deleteAsset = (uuid) => {
    form.delete(
        route("certificate.asset.delete", {
            asset: uuid,
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
                Certificate Assets - {{ certificate.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5"
                >
                    <form @submit.prevent="submit" class="mb-5">
                        <div class="p-5"></div>
                        <ImageUploader
                            @upload="addAsset"
                            label="Add Asset"
                            class="mb-5"
                        />
                        <div
                            v-for="asset in certificate.assets"
                            :key="asset.uuid"
                        >
                            <div class="flex">
                                <div>
                                    <a
                                        :href="'/storage/' + asset.path"
                                        target="_blank"
                                    >
                                        <img
                                            :src="'/storage/' + asset.path"
                                            :alt="asset.name"
                                            width="100"
                                            height="100"
                                            class="mr-2"
                                        />
                                    </a>
                                </div>
                                <div>
                                    <PrimaryButton
                                        @click="deleteAsset(asset.uuid)"
                                        class=""
                                        >Delete Asset</PrimaryButton
                                    >
                                </div>
                            </div>
                        </div>
                    </form>
                    <div v-if="certificate.uuid">
                        <Link
                            :href="
                                route('certificate.builder', {
                                    uuid: form.uuid,
                                })
                            "
                            class="text-sm text-gray-700 dark:text-gray-500 underline p-5"
                            >Certificate Builder</Link
                        >
                        <Link
                            :href="
                                route('certificate.upsert', {
                                    uuid: form.uuid,
                                })
                            "
                            class="text-sm text-gray-700 dark:text-gray-500 underline p-5"
                            >Certificate Setup</Link
                        >
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
