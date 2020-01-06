<template>
    <v-dialog
            ref="dialog1"
            v-model="modal1"
            :return-value.sync="localValue"
            persistent
            lazy
            full-width
            width="290px"
    >
        <v-text-field
                slot="activator"
                v-model="localValue"
                :label="label"
                :error="error"
                :rules="rules"
                prepend-icon="event"
                readonly
                @change="updateItem"
        ></v-text-field>
        <v-date-picker
                v-model="localValue"
                scrollable
                locale="ru"
        >
            <v-spacer></v-spacer>
            <v-btn flat color="primary" @click="modal1 = false">Закрыть</v-btn>
            <v-btn flat color="primary"
                   @click="$refs.dialog1.save(localValue); updateItem()">OK
            </v-btn>
        </v-date-picker>
    </v-dialog>
</template>

<script>
    export default {
        name: "DateField",
        props: {
            fieldValue: String|Number,
            label: {
                type: String,
                default: null,
            },
            type: {
                type: String,
                default: 'text',
            },
            error: Boolean,
            rules: Array,
        },
        data: () => ({
            localValue: null,
            modal1: false
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
