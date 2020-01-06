<template>
    <router-link :to="to">
        <slot/>
    </router-link>
</template>

<script>
    export default {
        name: "RoutLink",
        props: ['to']
    }
</script>

<style scoped>

</style>