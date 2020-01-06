<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/departments/markets'"
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
    import SelectInput from "../../../site/components/global/SelectInput";
    import Autocomplete from "../../components/crud/field-components/Autocomplete";
    import SimpleString from "../../components/crud/field-components/SimpleString";
    import ObjectString from "../../components/crud/field-components/ObjectString";


    const pageTitle = 'Отделы';

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
                    value: 'city',
                    text: 'Город',
                    components: {
                        table_cell: {component: ObjectString, params: {property: 'name_ru'}},
                        update_form: {hidden: true},
                    }
                },
                {
                    value: 'city_id',
                    text: 'Город',
                    components: {
                        update_form: {component: Autocomplete, params: {dataAction: '/manage/cities', keyColumn: 'id', textColumn: 'name_ru'}},
                        table_cell: {hidden: true},
                    }
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
                        table_cell: {hidden: true},
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
