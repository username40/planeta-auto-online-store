<template>
    <v-text-field
            v-model="localValue"
            :label="label"
            :error="error"
            :rules="rules"
            :type="type"
            @change="updateItem()"
    ></v-text-field>
</template>

<script>
    export default {
        name: "TextField",
        props: {
            fieldValue: String|Number,
            label: {type: String, default: null},
            type: {type: String, default: 'text'},
            error: Boolean,
            rules: Array,
        },
        data: () => ({
            localValue: null
        }),
        mounted: function () {
            this.localValue = this.fieldValue;
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
