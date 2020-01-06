<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/products'"
                :fields="fields"
                :updateFormParams="updateFormParams"
                fullscreen
        >
        </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import TextField from "../../components/crud/field-components/Text";
    import TextEditor from "../../components/crud/field-components/TextEditor";


    const pageTitle = 'Товары';

    export default {
        components: {AppCrud},
        name: 'ProductManagement',
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
                    value: 'article',
                    text: 'Артикул',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'market_id',
                    text: 'Маркет',
                    components: {
                        table_cell: {hidden: true},
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
                    value: 'description',
                    text: 'Описание',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextEditor, params: {}},
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
