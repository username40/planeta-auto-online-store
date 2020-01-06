<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/departments'"
                :fields="fields"
                fullscreen
        >
        </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import TextField from "../../components/crud/field-components/Text";
    import TextEditor from "../../components/crud/field-components/TextEditor";


    const pageTitle = 'Отделения сервисов';

    export default {
        components: {AppCrud},
        name: 'DepartmentManagement',
        head() {
            return {title: pageTitle}
        },
        meta: {
            breadcrumbs: [{text: pageTitle}]
        },

        data: () => ({
            public_path: '/',
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
                        filter: {component: TextField, params: {}},
                    },
                },
                {
                    value: 'address',
                    sortable: true,
                    text: 'Адрес',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'phone',
                    sortable: true,
                    text: 'Телефон',
                },
                {
                    value: 'email',
                    sortable: true,
                    text: 'E-Mail',
                },
                {
                    value: 'text',
                    sortable: true,
                    text: 'Текст',
                    components: {
                        update_form: {component: TextEditor, params: {}},
                    },
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
