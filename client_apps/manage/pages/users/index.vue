<template>
    <div>
            <app-crud
                    :preloadData="preloadData"
                    :crudUrl="'/manage/users'"
                    :fields="fields"
            >
            </app-crud>
    </div>
</template>

<script>
    import AppCrud from '~/components/crud/Crud';
    import Switch from "~/components/crud/field-components/Switch";
    import TextField from "../../components/crud/field-components/Text";

    const pageTitle = 'Список пользователей';
    export default {
        components: {AppCrud},
        head() {
            return {title: pageTitle}
        },
        meta: {
            breadcrumbs: [{text: pageTitle}]
        },
        data: () => ({
            title: 'Список пользователей',
            preloadData: {},
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
                    value: 'name',
                    sortable: true,
                    text: 'Имя',
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'email',
                    text: 'E-Mail',
                    sortable: true,
                    components: {
                        filter: {component: TextField, params: {}},
                    }
                },
                {
                    value: 'password',
                    text: 'Пароль',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextField, params: {type: 'password'}},
                    }
                },
                {
                    value: 'password_confirmation',
                    text: 'Подтверждение пароля',
                    components: {
                        table_cell: {hidden: true},
                        update_form: {component: TextField, params: {type: 'password'}},
                    }
                },
                {
                    value: 'status',
                    text: 'Активный',
                    components: {
                        table_cell: {component: Switch, params: {}},
                        update_form: {component: Switch, params: {}},
                    }
                },
            ],
        }),

        async asyncData({app }) {
            let data = await app.$axios.get(`manage/users`);
            return {
                preloadData: data.data
            }
        }
    }
</script>

<style scoped>

</style>
