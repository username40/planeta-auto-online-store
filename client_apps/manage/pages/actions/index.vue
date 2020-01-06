<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/actions'"
                :fields="fields"
                fullscreen
        >
        </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import Switch from "~/components/crud/field-components/Switch";
    import TextField from "../../components/crud/field-components/Text";
    import DateField from "~/components/crud/field-components/Date";
    import DateRangeFilter from "~/components/crud/field-components/DateRangeFilter";
    import TextEditor from "../../components/crud/field-components/TextEditor";
    import ImageField from "../../components/crud/field-components/ImageField";
    import Select from "../../components/crud/field-components/Select";

    const pageTitle = 'Акции';

    export default {
        components: {AppCrud},
        name: 'ActionManagement',
        head() {
            return {title: pageTitle}
        },
        meta: {
            breadcrumbs: [{text: pageTitle}]
        },

        data: () => ({
            title: 'Акции',
            preloadData: {},
            updateFormParams: {
                fullscreen: true
            },
            fields: [
                {
                    value: 'id',
                    sortable: true,
                    text: 'ID',
                    components: {
                        update_form: {hidden: true},
                    },
                },
                {
                    value: 'publicated_at',
                    text: 'Дата публикации',
                    components: {
                        update_form: {component: DateField, params: {}},
                        filter: {component: DateRangeFilter, params: {}}
                    }
                },
                {
                    value: 'expiration_at',
                    text: 'Дата окончания',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: DateField, params: {}}
                    }
                },
                {
                    value: 'preview_img',
                    text: 'Картинка превью',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: ImageField, params: {folder: 'news'}},
                    }
                },
                {
                    value: 'title',
                    sortable: true,
                    text: 'Имя',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'slug',
                    text: 'Slug',
                    sortable: true,
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'content',
                    text: 'Контент',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextEditor, params: {}},
                    }
                },
                {
                    value: 'seo_title',
                    text: 'seo_title',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextField, params: {}, tab: 'Seo'},
                    }
                },
                {
                    value: 'seo_keywords',
                    text: 'seo_keywords',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextField, params: {}, tab: 'Seo'},
                    }
                },
                {
                    value: 'seo_description',
                    text: 'seo_description',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextField, params: {}, tab: 'Seo'},
                    }
                },
                {
                    value: 'archive',
                    text: 'Архив',
                    components: {
                        table_cell: {component: Switch, params: {}},
                        update_form: {component: Switch, params: {}},
                    }
                },
                {
                    value: 'show',
                    text: 'Показать',
                    components: {
                        table_cell: {component: Switch, params: {}},
                        update_form: {component: Switch, params: {}},
                    }
                },
                {
                    value: 'department_ids',
                    text: 'Отделения',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: Select, params: {
                            multiple: true,
                            chips: true,
                            dataAction: '/manage/departments',
                            textColumn: 'address'
                        }},
                    }
                },
            ],

        }),
    }
</script>

<style scoped>
    table td {
        vertical-align: middle;
    }
</style>
