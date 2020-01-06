<template>
    <span>{{fieldValue[property]}}</span>
</template>

<script>
    export default {
        name: "ObjectString",
        props: {
            fieldValue: Object,
            property: {required: true, type: String},
        },
        // computed: function key(val) {
        //     // console.log(val);
        // }
    }
</script>

<style scoped>

</style>
