<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, usePage, Link } from "@inertiajs/vue3";

const form = useForm({
    uuid: "",
    html: "",
});

const certificate = usePage().props.certificate.valueOf();
if (certificate) {
    form.uuid = certificate.uuid;
    form.html = certificate.html;
}

function refreshPreview() {
    var iframe = document.getElementById("preview");
    iframe.src = iframe.src;
}

const submit = () => {
    let self = this;
    form.post(
        route("certificate.builder.update", {
            uuid: form.uuid,
        }),
        {
            onFinish: () => refreshPreview(),
        }
    );
};
</script>

<template>
    <Head title="Certificate" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Certificate Builder - {{ certificate.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto p-5">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <div class="p-5">
                            <InputLabel for="html" value="HTML" class="mb-2" />

                            <TextArea
                                id="html"
                                type="text"
                                class="mb-2 block w-full"
                                v-model="form.html"
                                required
                            />
                            <div v-pre>{{ firstname }}, {{ lastname }}</div>

                            <InputError
                                class="mt-1 mb-2"
                                :message="form.errors.html"
                            />
                            <PrimaryButton
                                ref="saveButton"
                                :class="{ 'opacity-25': form.processing }"
                                :disabled="form.processing"
                            >
                                Save
                            </PrimaryButton>
                        </div>
                    </form>

                    <div>
                        <Link
                            :href="
                                route('certificate.assets', {
                                    uuid: form.uuid,
                                })
                            "
                            class="text-sm text-gray-700 dark:text-gray-500 underline p-5"
                            >Certificate Assets</Link
                        >

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
                                            class="mr-2"
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <fieldset>
                        <legend>
                            Preview -
                            {{
                                route("certificate.preview", {
                                    uuid: certificate.uuid,
                                })
                            }}
                        </legend>
                        <iframe
                            id="preview"
                            :src="
                                route('certificate.preview', {
                                    uuid: certificate.uuid,
                                })
                            "
                            frameborder="0"
                            width="100%"
                            height="1000px"
                        ></iframe>
                    </fieldset>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
0
