<template>
    <button class="Body-16-Prime header__action-button grey-border">
        <img src="/icons/compare-btn.svg" alt="сравнить кнопка" class="header-action-button__icon">
        <slot></slot>
    </button>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .header__action-button {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        cursor: pointer;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        background-color: var(--just_white);
        border: none;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .header-action-button__icon {
        width: 24px;
        height: 24px;
        margin-right: 4px;
    }
</style>