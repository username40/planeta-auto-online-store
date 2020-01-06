<template>
    <v-switch v-model="localValue"
              @change="updateItem"
              :label="label"
              :error="error"
              :rules="rules"
    >

    </v-switch>
</template>

<script>
    export default {
        name: "SwitchField",
        props: {
            fieldValue: {type: Boolean, default: false},
            label: {type: String, default: null,},
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
                // если не задано, то преобразуем null в false
                if(val === null) {
                    this.$emit('update-item-value', false);
                }
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
