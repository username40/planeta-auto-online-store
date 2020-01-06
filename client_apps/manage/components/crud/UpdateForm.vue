<template>
    <v-dialog v-model="show" width="900" :fullscreen="fullscreen">

        <v-toolbar v-if="fullscreen" dark color="primary">
            <v-btn icon dark @click="show = false">
                <v-icon>close</v-icon>
            </v-btn>
            <v-toolbar-title>
                {{title}}
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items>
                <v-btn dark flat @click="sendForm" v-if="!readonly">Сохранить</v-btn>
            </v-toolbar-items>
        </v-toolbar>

        <v-card>
            <v-card-title v-if="!fullscreen" class="headline grey lighten-2" primary-title>
                {{title}}
            </v-card-title>

            <v-card-text>


                <form @submit.prevent="sendForm" class="crud-update-form">
                    <v-tabs fixed-tabs

                            v-model="currentTab"
                            v-bind:class="{ 'hidden-tabs': Object.keys(tabs).length <= 1 }"
                    >
                        <v-tab  v-for="(tab, tabIndex) in tabs" :key="tabIndex" ripple>
                            {{tab.label}}
                        </v-tab>
                        <v-tab-item v-for="(tab, tabIndex) in tabs" :key="tabIndex">
                            <v-flex v-for="(field, fieldIndex) in tab.fields" :key="fieldIndex">
                                <component v-bind:is="field.component"
                                           v-bind="field.componentParams"

                                           :error="form.errors.has(field.key)"
                                           :rules="form.errors.only(field.key)"

                                           :label="field.text"
                                           :field-value.sync="localRow[field.key]"
                                           :upload-file.sync="uploadFiles[field.key]"
                                           v-on:update-item-value="localRow[field.key] = $event"
                                >
                                </component>
                            </v-flex>
                        </v-tab-item>
                    </v-tabs>


                    <v-btn color="success" type="submit" v-if="!readonly">Сохранить</v-btn>
                </form>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
    import TextField from '~/components/crud/field-components/Text';
    import Form from 'vform';

    export default {
        name: "CrudUpdateForm",
        components: {TextField},
        data: () => ({
            localRow: [],
            uploadFiles: {},
            form: new Form(), // форма для валидаций
            currentTab: 0,
            tabs: {},
        }),
        props: {
            item: Object,
            fields: Array,
            url: String,
            visible: Boolean,
            fullscreen: {type: Boolean, default: false},
            readonly: {type: Boolean, default: false},
            createMode: {
                default: false,
                type: Boolean
            }
        },

        created: function () {
            /**
             * Формирование вкладок (tabs) с необходимыми полями
             */
            let app = this;
            this.fields.forEach(function (fieldElement) {
                if (app.$objectGetProperty(fieldElement, 'components.update_form.hidden')) {
                    return;
                }

                let component = app.$objectGetProperty(fieldElement, 'components.update_form.component');
                if (!component) {
                    component = TextField;
                }
                let componentParams = app.$objectGetProperty(fieldElement, 'components.update_form.params');
                if (!componentParams) {
                    componentParams = [];
                }
                let tabName = app.$objectGetProperty(fieldElement, 'components.update_form.tab');
                let addedField = {
                    key: fieldElement.value,
                    text: fieldElement.text,
                    component: component,
                    componentParams: componentParams,
                };
                if (!tabName) {
                    if (!app.tabs.main) {
                        app.tabs.main = {label: "Основное", fields: []}
                    }
                    app.tabs.main.fields.push(addedField);

                } else {
                    let tabKey = app.$textToSlug(tabName);
                    if (!app.tabs[tabKey]) {
                        app.tabs[tabKey] = {label: tabName, fields: []}
                    }
                    app.tabs[tabKey].fields.push(addedField);
                }
            });
        },

        mounted: function () {
            if (this.createMode) {
                let newItem = {};
                this.fields.forEach(function (fieldElement) {
                    // todo: add default value
                    newItem[fieldElement.value] = null;
                });
                this.localRow = Object.assign(newItem);
            }
        },
        watch: {
            item: function (newItem) {
                if (newItem) {
                    this.localRow = Object.assign({}, newItem);
                }
            },
        },
        methods: {
            async sendForm() {
                try {
                    this.form = new Form(this.localRow);
                    if (this.createMode) {
                        await this.form.post(this.url);
                    } else {
                        await this.form.put(this.url + '/' + this.localRow.id);
                    }
                    this.show = false;
                    this.$emit('update-item');
                } catch (e) {
                }
            },
            checkVisibleField(item, field) {
                if (!item) {
                    return false;
                }
                return !this.$objectGetProperty(field, 'components.update_form.hidden');
            },
            checkCustomComponent(field) {
                return this.$objectCheckProperty(field, 'components.update_form.component');
            }
        },
        computed: {
            title: function() {
                if(this.createMode) {
                    return 'Новая запись'
                }
                if(this.readonly) {
                    return 'Просмотр записи'
                } else {
                    return 'Обновить запись'
                }
            },
            show: {
                get() {
                    return this.visible;
                },
                set(value) {
                    if (!value) {
                        this.$emit('close')
                    }
                }
            }
        },
    }
</script>

<style scoped>

</style>
