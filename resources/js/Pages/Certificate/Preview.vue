<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import TextArea from "@/Components/TextArea.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Head, useForm, usePage } from "@inertiajs/vue3";

const certificate = usePage().props.certificate.valueOf();
</script>

<template>
    <div v-html="certificate.html"></div>
</template>
