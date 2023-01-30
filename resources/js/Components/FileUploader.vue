<template>
    <div>
        <input
            type="file"
            ref="fileInput"
            @change="uploadFile"
            style="display: none"
        />
        <button @click="openFileDialog">Upload File</button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            fileName: null,
        };
    },
    methods: {
        openFileDialog() {
            this.$refs.fileInput.click();
        },
        async uploadFile() {
            const input = this.$refs.fileInput;
            if (input.files && input.files[0]) {
                this.fileName = input.files[0].name;
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.$emit("upload", input.files[0]);
                };
                reader.readAsDataURL(input.files[0]);
            }
        },
        removeImage() {
            this.fileName = null;
        },
    },
};
</script>
