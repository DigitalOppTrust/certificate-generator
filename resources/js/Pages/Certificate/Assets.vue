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
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-5">
                        <div class="p-5"></div>
                        <ImageUploader @upload="addAsset" label="Add Asset" />
                        <div
                            v-for="asset in certificate.assets"
                            :key="asset.uuid"
                        >
                            <img
                                :src="'/storage/' + asset.path"
                                :alt="asset.name"
                                width="100"
                                height="100"
                                class="mr-2"
                            />
                            <PrimaryButton
                                @click="deleteAsset(asset.uuid)"
                                class="text-red-500"
                                >Delete Asset</PrimaryButton
                            >
                        </div>
                    </form>
                </div>
                {{ certificate.assets }}
            </div>
        </div>
    </AuthenticatedLayout>
</template>
