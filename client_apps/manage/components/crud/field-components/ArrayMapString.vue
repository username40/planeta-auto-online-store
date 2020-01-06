<template>
    <span>{{visibleValue}}</span>
</template>

<script>
    export default {
        name: "ArrayMapString",
        props: {
            fieldValue: String,
            items: {required: true, type: Array},
            idColumn: {default: 'id', type: String},
            labelColumn: {default: 'label', type: String},
        },
        computed: {
            visibleValue: function () {
                for (var i = 0; i < this.items.length; i++) {
                    // console.log(this.fieldValue);
                    // console.log(this.idColumn);
                    if(this.items[i][this.idColumn] === this.fieldValue) {
                        return this.items[i][this.labelColumn];
                    }
                }
            },
        },
    }
</script>

<style scoped>

</style>
