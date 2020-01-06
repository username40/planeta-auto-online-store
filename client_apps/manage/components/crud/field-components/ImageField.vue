<template>
    <div class="image-field">
        <label class="v-label theme--light">{{label}}</label>

        <v-input :error="error" :rules="rules" >
            <upload-button v-if="!preview"
                    @file-update="selectImage"
                    icon
            >
                <template slot="icon">
                    <v-icon>add</v-icon>
                </template>
            </upload-button>

            <v-avatar v-if="preview">
                <img :src="preview" :alt="label">
            </v-avatar>

            <v-icon v-if="preview" icon class="image-upload-clear" @click="clearImage">clear</v-icon>
        </v-input>
    </div>
</template>

<script>
    import UploadButton from 'vuetify-upload-button';
    import VButton from "../../../../site/components/global/Button";

    export default {
        name: "ImageField",
        components: {VButton, UploadButton},
        props: {
            fieldValue: String|Number,
            label: {type: String, default: null},
            type: {
                type: String,
                default: 'text',
            },
            error: Boolean,
            rules: Array,
            folder: {type: String, default: 'photos'}
        },
        data: () => ({
            localValue: null,
            preview: null,
            // cover: null,
        }),
        mounted: function () {
            this.localValue = this.fieldValue;
        },
        watch: {
            fieldValue: function (val) {
                this.preview = this.fileUrl(val);
                this.localValue = val;
            },
        },
        computed: {
            apiUrl: function () {
                return process.env.apiUrl;
            },
        },
        methods: {
            fileUrl: function(filePath) {
                return filePath ? this.apiUrl+'/storage/'+filePath.replace('public/', '/') : null;
            },
            async selectImage(file) {
                var reader = new FileReader();
                let app = this;
                reader.onload = function (e) {
                    app.preview = e.target.result;
                };
                reader.readAsDataURL(file);
                let formData = new FormData();
                formData.append('folder', this.folder);
                formData.append('upload', file);

                await this.$axios.post(app.apiUrl+'/manage/filemanager/upload', formData, {
                    headers: {'Content-Type': 'multipart/form-data'}
                })  .then(res => {
                    if(res.data.file_url) {
                        app.localValue = res.data.file_url;
                        console.log('uv', app.localValue);
                        this.$emit('update-item-value', app.localValue);
                    } else {
                        // reject(res.data);
                    }
                })
                    .catch(response => {
                        // reject(response.data);
                    });
            },
            clearImage: function() {
                let app = this;
                let formData = new FormData();
                formData.append('path', app.localValue);
                this.$axios.post(app.apiUrl+'/manage/filemanager/delete', formData, {
                })  .then(res => {
                    this.$emit('update-item-value', null);
                });

                this.preview = null;
                return false;
            }
        }
    }
</script>

<style scoped>

</style>
