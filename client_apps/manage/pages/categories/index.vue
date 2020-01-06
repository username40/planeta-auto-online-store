<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/categories'"
                :fields="fields"
                :updateFormParams="updateFormParams"
        >
        </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import TextField from "../../components/crud/field-components/Text";


    const pageTitle = 'Категории';

    export default {
        components: {AppCrud},
        name: 'CategoryManagement',
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
                    value: 'guid',
                    sortable: true,
                    text: 'GUID',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'name',
                    sortable: true,
                    text: 'Название',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'parent_id',
                    sortable: false,
                    text: 'Родительская категория',
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
