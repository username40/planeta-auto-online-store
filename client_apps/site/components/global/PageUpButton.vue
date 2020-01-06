<template>
    <button class="page-up-button"><img src="/icons/page-up-button.svg" alt="кнопка наверх"></button>
</template>

<script>
    export default {
        name: "PageUpButton"
    }
</script>

<style scoped>
    .page-up-button {
        -webkit-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        transform: rotate(-90deg);
        position: absolute;
        z-index: 2;
        right: 0;
        top: 0;
        background-color: transparent;
        border: none;
    }
</style>