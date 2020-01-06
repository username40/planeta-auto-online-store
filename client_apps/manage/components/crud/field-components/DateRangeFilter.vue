<template>
    <div>
            <v-menu
                    ref="menu1"
                    v-model="menu1"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    lazy
                    transition="scale-transition"
                    offset-y
                    full-width
                    max-width="290px"
                    min-width="290px"
            >
                <template v-slot:activator="{ on }">
                    <v-text-field
                            v-model="dateFromRow"
                            :label="label +' (от)'"
                            prepend-icon="event"
                            @blur="dateFrom = parseDate(dateFromRow)"
                            v-on="on"
                    ></v-text-field>
                </template>
                <v-date-picker v-model="dateFrom" locale="ru" no-title @input="menu1 = false"></v-date-picker>
            </v-menu>

            <v-menu
                    v-model="menu2"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    lazy
                    transition="scale-transition"
                    offset-y
                    full-width
                    max-width="290px"
                    min-width="290px"
            >
                <template v-slot:activator="{ on }">
                    <v-text-field
                            v-model="dateToRow"
                            :label="label +' (до)'"
                            prepend-icon="event"
                            @blur="dateTo = parseDate(dateToRow)"
                            v-on="on"
                    ></v-text-field>
                </template>
                <v-date-picker v-model="dateTo" locale="ru" no-title @input="menu2 = false"></v-date-picker>
            </v-menu>
    </div>
</template>

<script>
    export default {
        name: "DateRangeFilter",
        fieldValue: String | Number,
        props: {
            label: {
                type: String,
                default: null,
            },
        },
        data: vm => ({
            dateFrom: null,
            dateTo: null,

            dateFromRow: null,
            dateToRow: null,

            menu1: false,
            menu2: false
        }),

        watch: {
            dateFrom(val) {
                this.dateFromRow = this.dateFrom;
                this.syncValue();
            },
            dateTo(val) {
                this.dateToRow = this.dateTo;
                this.syncValue();
            }
        },

        methods: {
            formatDate(date) {
                if (!date) return null;

                const [year, month, day] = date.split('-');
                return `${year}-${month}-${day}`
            },
            parseDate(date) {
                let returnDate = null;
                if (!date) return null;
                try {
                    const [year, month, day] = date.split('-');
                    returnDate = `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`;
                } catch (e) {

                }
                return returnDate;
            },
            async syncValue() {
                let params = {};
                if(this.dateFrom) {
                    params.from = this.dateFrom;
                }
                if(this.dateTo) {
                    params.to = this.dateTo;
                }
                this.$emit('update-item-value', params);
            }
        }
    }
</script>

<style scoped>

</style>
