<template>
    <!--<span>{{item[fieldName]}}</span>-->
    <ul>
        <li v-for="(list_item, index) in item[fieldName]">{{ list_item.name }}</li>
    </ul>
</template>

<script>
    export default {
        name: "List",
        props: {
            item: Array,
            field: Object,
            fieldName: String,
        },
    }
</script>

<style scoped>

</style>
