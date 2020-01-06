<template>
    <v-select
            :items="localItems"
            :error="error"
            :rules="rules"
            :label="label"
            :chips="chips"
            :multiple="multiple"

            :value="fieldValue"
            :item-text="textColumn"
            :item-value="keyColumn"
            @change="updateItem"
    ></v-select>
</template>

<script>
    export default {
        name: "SelectField",
        props: {
            fieldValue: Array,
            row: Array,
            label: {type: String, default: null},
            error: Boolean,
            rules: Array,
            chips: {default: false, type: Boolean},
            multiple: {default: false, type: Boolean},
            items: {type: Array, default: () => []},

            dataAction: {default: null, type: String},
            keyColumn: {default: 'id', type: String},
            textColumn: {default: 'text', type: String},
        },
        data: () => ({
            localValue: null,
            localItems: []
        }),
        mounted: function () {
            this.localValue = this.fieldValue;
            this.localItems = this.items;
            let app = this;
            if( (app.localItems.length === 0) && this.dataAction) {
                var searchParams = {search: {}};
                app.$axios.get(app.dataAction, {params: searchParams}).then(res => {
                    if(res.data.data[0]) {
                        app.localItems = res.data.data;
                    }
                });
            }
        },
        watch: {
            fieldValue: function (val) {
                this.localValue = val;
            },
        },
        methods: {
            updateItem: function (values) {
                this.localValue = values;
                this.$emit('update-item-value', this.localValue);
            },
        }
    }
</script>

<style scoped>

</style>
