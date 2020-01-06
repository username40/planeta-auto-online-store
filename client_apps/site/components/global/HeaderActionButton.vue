<template>
    <button class="header__action-button grey-border">
        <img src="/icons/compare-btn.svg" alt="сравнить кнопка" class="header-action-button__icon">

    </button>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .header__action-button {
        cursor: pointer;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        background-color: var(--just_white);
        border: none;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 15px;
        padding-right: 15px;
        transition: all var(--animation);
    }
    .header__action-button:hover {
        box-shadow: var(--shadow-6-prime);
    }
    .header-action-button__icon {
        width: 24px;
        height: 24px;
    }

    .header__action-button:not(:first-child) {
        margin-left: 30px;
    }
</style>