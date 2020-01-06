<template>
    <div class="text-editor-field">
        <label class="v-label theme--light">{{label}}</label>
        <v-input :error="error" :rules="rules">
            <ckeditor :editor="editor" :value="localValue" :config="editorConfig" @input="updateItem"></ckeditor>
        </v-input>
    </div>
</template>

<script>
    import CkEditor from '@ckeditor/ckeditor5-build-classic';
    const routePrefix = '/manage/filemanager';

    export default {
        name: "TextEditorField",
        props: {
            fieldValue: {type: String | Number},
            label: {type: String, default: null},
            error: Boolean,
            rules: Array,
        },
        data: (app) => ({
            editor: CkEditor,
            editorConfig: {
                language: 'ru',
                extraPlugins: [function (editor) {
                    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                        return new app.UploadAdapter(loader);
                    };
                }],
            },

            UploadAdapter: function (loader) {
                this.loader = loader;
                // let app = this;
                this.upload = () => {
                    return this.loader.file
                        .then(uploadedFile => {
                                return new Promise((resolve, reject) => {
                                    const data = new FormData();
                                    data.append('upload', uploadedFile);
                                    console.log(app);
                                    app.$axios.post(routePrefix + '/upload', data)
                                    .then(res => {
                                        if(res.data.file_url) {
                                            resolve( {
                                                default: app.fileUrl(res.data.file_url)
                                            } );
                                        } else {
                                            reject(res.data);
                                        }
                                    })
                                    .catch(response => {
                                        reject(response.data);
                                    });
                                });
                            }
                        );
                };
            },

            localValue: null
        }),
        watch: {
            fieldValue: function (val) {
                this.localValue = val;
            },
        },
        methods: {
            fileUrl: function(filePath) {
                let url = filePath ? this.apiUrl+'/storage/'+filePath.replace('public/', '/') : null;
                console.log(filePath);
                console.log(url);
                return url;
            },
            updateItem: function ($event) {
                this.localValue = $event;
                this.$emit('update-item-value', this.localValue);
            },
            // MyCustomUploadAdapterPlugin ( editor ) {
            //     editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            //         return new UploadAdapter( loader );
            //     };
            // },
        },
        computed: {
            apiUrl: function () {
                return process.env.apiUrl;
            },
        },
        components: {
            CkEditor
        },
    }
</script>

<style scoped>
</style>
