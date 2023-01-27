<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";

import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";

const form = useForm({
    uuid: "",
    name: "",
});

const certificate = usePage().props.certificate.valueOf();

if (certificate) {
    form.uuid = certificate.uuid;
    form.name = certificate.name;
}

const submit = () => {
    form.post(
        route("certificate.upsert", {
            uuid: form.uuid,
        }),
        {
            // onFinish: () => form.reset('password', 'password_confirmation'),
        }
    );
};
</script>

<template>
    <Head title="Certificate" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Certificate - {{ certificate.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" class="mb-5">
                        <div class="p-5">
                            <InputLabel for="name" value="Name" class="mb-2" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mb-2 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                            />

                            <InputError
                                class="mt-1 mb-2"
                                :message="form.errors.name"
                            />
                            <PrimaryButton
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </PrimaryButton>
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
        </div>
    </AuthenticatedLayout>
</template>
