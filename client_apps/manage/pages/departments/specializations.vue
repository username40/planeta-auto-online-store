<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/departments/specializations'"
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
    import ImageField from "../../components/crud/field-components/ImageField";
    import Radio from "../../components/crud/field-components/Radio";
    import ArrayMapString from "../../components/crud/field-components/ArrayMapString";


    const pageTitle = 'Специализации отделений';
    const departmentTypes = [
        {id: 'market', label: 'Маркет'},
        {id: 'service', label: 'Сервис'},
    ];

    export default {
        components: {AppCrud},
        name: 'SpecializationManagement',
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
                        filter: {hidden: true},
                    },
                },
                {
                    value: 'type',
                    text: 'Тип',
                    components: {
                        update_form: {component: Radio, params: {items: departmentTypes}},
                        filter: {component: Radio, params: {items: departmentTypes, row: false}},
                        table_cell: {component: ArrayMapString, params: {items: departmentTypes}},
                    }
                },
                {
                    value: 'name',
                    sortable: true,
                    text: 'Имя',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'code',
                    sortable: true,
                    text: 'Код',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'img',
                    sortable: true,
                    text: 'Изображение',
                    components: {
                        update_form: {component: ImageField, params: {folder: 'specialization'}},
                        table_cell: {hidden: true}
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
