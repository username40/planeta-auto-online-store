<!--
todo: Возможно стоит лучше проработать передачу/формирование элементов items
-->

<template>
    <v-autocomplete
            :items="items"
            :error="error"
            :rules="rules"
            :label="label"

            :loading="loading"
            :search-input.sync="search"
            v-model="localValue"
            hide-no-data

            :item-text="textColumn"
            :item-value="keyColumn"

            @change="updateItem"
    ></v-autocomplete>
</template>

<script>
    export default {
        name: "SelectField",
        props: {
            fieldValue: String|Number,
            row: Array,
            label: {type: String, default: null},
            error: Boolean,
            rules: Array,

            dataAction: {required: true, type: String},
            keyColumn: {default: 'id', type: String},
            textColumn: {required: true, type: String},
            // items: {default: [], type: Array}
        },
        data: () => ({
            loading: false,
            model: null,
            entries: [],
            search: null,
            localValue: null,
            items: [],
        }),
        mounted: function () {
            this.localValue = this.fieldValue;
        },
        watch: {
            fieldValue: function (val) {
                let app = this;
                var searchParams = {search: {}};
                searchParams.search[app.keyColumn] = val;
                let data = app.$axios.get(app.dataAction, {params: searchParams}).then(res => {
                    if(res.data.data[0]) {
                        app.items = res.data.data;
                        app.search = res.data.data[0][app.textColumn];
                    }
                });
                this.localValue = val;
            },

            search (val) {
                let app = this;
                if (this.loading) return;
                this.loading = true;
                var searchParams = {search: {}};
                searchParams.search[app.textColumn] = val;
                let data = app.$axios.get(app.dataAction, {params: searchParams}).then(res => {
                    this.items = res.data.data;
                    this.loading = false;
                });
            }
        },
        methods: {
            updateItem: function (val) {
                if(val) {
                    this.localValue = val;
                    this.$emit('update-item-value', this.localValue);
                }
            },
        }
    }
</script>

<style scoped>

</style>
