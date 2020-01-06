<template>
    <v-radio-group
            v-model="localValue" :row="row"
            @change="updateItem"
            :label="label"
            :error="error"
            :rules="rules"
    >
        <template v-for="item in items">
            <v-radio :label="item.label" :value="item.id"></v-radio>
        </template>
    </v-radio-group>
</template>

<script>
    export default {
        name: "SwitchField",
        props: {
            fieldValue: {type: String},
            label: {type: String, default: null},
            error: Boolean,
            rules: Array,

            row: {type: Boolean, default: true},
            first: {type: Boolean, default: false},
            items: {required: true, type: Array}
        },
        data: () => ({
            localValue: null
        }),
        mounted: function () {
            this.localValue = this.fieldValue;
            if(this.items && this.first && !this.localValue) {
                console.log(this.items[0].id);
                this.localValue = this.items[0].id;
            }
        },
        watch: {
            fieldValue: function (val) {
                this.localValue = val;

            },
        },

        methods: {
            updateItem: function () {
                this.$emit('update-item-value', this.localValue);
            },
        }
    }
</script>

<style scoped>

</style>
