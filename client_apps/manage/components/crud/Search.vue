<template>
    <v-layout row wrap class="crud-search" v-if="show">
        <h2>Фильтр</h2>
        <v-flex v-for="(field, index) in searchFields" :key="index" xs10>
            <component
                    v-bind:is="field.component"
                    v-bind="field.componentParams"
                    :label="field.label"
                    v-on:update-item-value="field.value = $event; search()"
            >
            </component>
        </v-flex>
    </v-layout>

</template>

<script>
    export default {
        name: "Search",
        props: {
            fields: Array
        },
        data: () => ({
            searchFields: {},
            show: false
        }),
        created: function () {
            let app = this;
            this.fields.forEach(function (fieldElement) {
                if (app.checkVisibleField(fieldElement)) {
                    app.searchFields[fieldElement.value] = {
                        key: fieldElement.value,
                        component: fieldElement.components.filter.component,
                        componentParams: fieldElement.components.filter.params ? fieldElement.components.filter.params : {},
                        label: fieldElement.text,
                        value: null
                    };
                    app.show = true;
                }
                // todo: add default value
            });
        },
        methods: {
            search() {
                let queryParams = {};
                for (var prop in this.searchFields) {
                    if(this.searchFields[prop].value !== null && typeof this.searchFields[prop].value !== "undefined") {
                        if (typeof this.searchFields[prop].value === 'object') {
                            queryParams[this.searchFields[prop].key] = {from: this.searchFields[prop].value.from, to: this.searchFields[prop].value.to};

                        } else {
                            queryParams[this.searchFields[prop].key] = this.searchFields[prop].value;
                        }
                    }
                }
                if(queryParams) {
                    this.$emit('apply-search', queryParams);
                }

            },
            checkVisibleField(field) {
                return this.$objectCheckProperty(field, 'components.filter.component');
            },
        }
    }
</script>

<style scoped>

</style>
