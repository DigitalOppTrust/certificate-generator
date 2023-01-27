<template>
    <div>
        <input
            type="file"
            ref="fileInput"
            @change="uploadImage"
            style="display: none"
        />
        <button @click="openFileDialog">Upload Image</button>
        <div v-if="uploadedImage">
            <img :src="uploadedImage" :alt="fileName" />
            <!-- <button @click="removeImage">Remove Image</button> -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            uploadedImage: null,
            fileName: null,
        };
    },
    methods: {
        openFileDialog() {
            this.$refs.fileInput.click();
        },
        async uploadImage() {
            const input = this.$refs.fileInput;
            if (input.files && input.files[0]) {
                this.fileName = input.files[0].name;
                const reader = new FileReader();
                reader.onload = (e) => {
                    // this.uploadedImage = e.target.result;
                    this.$emit("upload", input.files[0]);
                };
                reader.readAsDataURL(input.files[0]);
                this.uploadedImage = null;
            }
        },
        removeImage() {
            this.uploadedImage = null;
            this.fileName = null;
        },
    },
};
</script>
