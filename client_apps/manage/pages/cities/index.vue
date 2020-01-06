<template>
    <div>
        <app-crud
                :preloadData="preloadData"
                :crudUrl="'/manage/cities'"
                :fields="fields"
                readonly
                :updateFormParams="updateFormParams"
        >
        </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import TextField from "../../components/crud/field-components/Text";


    const pageTitle = 'Города';

    export default {
        components: {AppCrud},
        name: 'PageManagement',
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
                    value: 'name_ru',
                    sortable: true,
                    text: 'Название города',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'lat',
                    sortable: false,
                    text: 'Широта',
                },
                {
                    value: 'lon',
                    sortable: false,
                    text: 'Долгота',
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
