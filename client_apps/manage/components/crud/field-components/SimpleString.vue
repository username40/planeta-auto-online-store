<template>
    <span>{{fieldValue}}</span>
</template>

<script>
    export default {
        name: "SimpleString",
        props: {
            fieldValue: Number|String,
        },
    }
</script>

<style scoped>

</style>
