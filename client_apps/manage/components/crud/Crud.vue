<template>
    <v-layout row wrap>
        <v-flex xs2>
            <app-search :fields="fields"
                        v-on:apply-search="search = $event; getItems()"
            ></app-search>
        </v-flex>

        <v-flex xs10>
            <v-data-table
                    :items="items"
                    :headers="headers"
                    :total-items="pagination.total"
                    :pagination.sync="pagination"
                    :loading="loading"
                    :no-results-text="'Нет данных для отображения'"
                    hide-actions
                    class="crud-table">

                <template slot="items" slot-scope="props">
                    <td v-for="(field, index) in headers" :key="index">
                        <template v-if="checkVisibleField(props.item, field)">
                            <component v-if="checkCustomComponent(field)"
                                       v-bind:is="field.components.table_cell.component"
                                       v-bind="field.components.table_cell.params"
                                       :field-value.sync="props.item[field.value]"
                                       v-on:update-item-value="setItemValue(props.item, field.value, $event)"
                            >
                            </component>
                            <simple-string v-else :field-value.sync="props.item[field.value]"></simple-string>
                        </template>
                    </td>

                    <td class="justify-center layout px-0">
                        <v-btn v-if="!readonly" fab small outline color="default" @click="showEditForm = true; selectItem = props.item">
                            <v-icon>edit</v-icon>
                        </v-btn>

                        <v-btn v-if="!readonly" fab small outline color="danger" @click="deleteItem(props.item)">
                            <v-icon>delete</v-icon>
                        </v-btn>
                    </td>
                </template>
            </v-data-table>

            <div class="text-xs-center pt-2">
                <v-flex xs12 v-if="pagination.total > pagination.per_page">
                    <v-pagination
                            v-model="pagination.current_page"
                            :length="pagination.last_page"
                            :total-visible="pagination.last_page < 15 ? pagination.last_page : 15"
                            @input="getItems(crudUrl)"
                            @previous="getItems(pagination.prev_page_url)"
                            @next="getItems(pagination.next_page_url)"
                            circle
                    ></v-pagination>
            </v-flex>
            <template v-if="!pagination.total">
                Нет данных для отображения
            </template>
        </div>

        </v-flex>
        <v-btn  v-if="!readonly"
                fixed
                dark
                bottom
                right
                fab
                color="success"
                @click="showAddForm=true"
        >
            <span><v-icon>add</v-icon></span>
        </v-btn>

        <app-update-form v-if="!readonly"
                         create-mode
                         :fullscreen="fullscreen"
                         :fields="fields"
                         :url="crudUrl"
                         :visible="showAddForm"
                         @close="showAddForm=false"
                         :update-form="updateForm"
                         v-on:update-item="getItems">
        </app-update-form>
        <app-update-form
                        :fields="fields"
                        :fullscreen="fullscreen"
                        :readonly="readonly"
                        :url="crudUrl"
                         :item="selectItem"
                         :visible="showEditForm"
                         @close="showEditForm=false"
                         :update-form="updateForm"
                         v-on:update-item="getItems">
        </app-update-form>


    </v-layout>
</template>

<script>
    import SimpleString from '~/components/crud/field-components/SimpleString'
    import AppUpdateForm from "./UpdateForm";
    import AppSearch from "./Search";

    import Form from 'vform'
    export default {
        name: "Crud",
        components: {AppUpdateForm, SimpleString, AppSearch},
        data: () => ({
            loading: false,
            pagination: {},
            search: {},
            items: [],
            selectItem: null,
            updateForm: new Form(),
            showEditForm: false,
            showAddForm: false,
            searchFields: {},

        }),
        computed: {
            headers: function (context) {
                let headers = [];
                this.fields.forEach(function (element) {
                    if (!context.$objectGetProperty(element, "components.table_cell.hidden")) {
                        headers.push(element);
                    }
                });
                return headers;
            }
        },
        watch: {
            pagination: {
                handler() {
                    this.getItems();

                },
            },
        },
        created() {
            if (this.preloadData) {
                this.items = this.preloadData.data;
                this.makePagination(this.preloadData);
            }
        },

        methods: {
            async getItems(url, searchParams = []) {
                if (this.loading) {
                    return false;
                }
                this.loading = true;
                let app = this;
                url = url || this.crudUrl;
                let params = {
                    sortBy: this.pagination.sortBy,
                    descending: this.pagination.descending,
                    page: this.pagination.current_page,
                };

                if(this.search) {
                    params.search = this.search;
                }

                let data = await app.$axios.get(url, {params: params}).then(res => {
                    this.items = res.data.data;
                    this.makePagination(res.data);
                    this.loading = false;
                });
            },
            setItemValue(item, field, value) {
                item[field] = value;
                this.updateItem(item);
            },
            updateItem(updatedItem) {
                let app = this;
                app.$axios
                    .put(this.crudUrl + '/' + updatedItem.id, updatedItem)
                    .then(res => {
                        this.item = updatedItem;
                    });
            },

            deleteItem(item) {
                let app = this;
                app.$axios
                    .delete(this.crudUrl + '/' + item.id)
                    .then(res => {
                        app.getItems();
                    })
            },

            makePagination(data) {
                let pagination = {
                    current_page: data.current_page,
                    last_page: data.last_page,
                    next_page_url: data.next_page_url,
                    prev_page_url: data.prev_page_url,
                    per_page: data.per_page,
                    total: data.total,
                };
                this.pagination = Object.assign(this.pagination, pagination);
            },
            changeSort(column) {
                if (this.pagination.sortBy === column) {
                    this.pagination.descending = !this.pagination.descending
                } else {
                    this.pagination.sortBy = column;
                    this.pagination.descending = false
                }
            },
            checkVisibleField(item, field) {
                if (!item) {
                    return false;
                }
                return !this.$objectGetProperty(field, 'components.table_cell.hidden');
            },
            checkCustomComponent(field) {
                return this.$objectCheckProperty(field, 'components.table_cell.component');
            }
        },

        props: {
            // items: Array,
            readonly: {type: Boolean, default: false},
            fullscreen: {type: Boolean, default: false},
            preloadData: Object,
            crudUrl: String,
            fields: Array,
            controller: String
        },
    }
</script>

<style scoped>
    .actionButton {
        color: #007bff;
        margin-right: 10px;
    }


</style>
