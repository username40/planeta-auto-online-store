<template>
    <button class="Body-16-Prime header__action-button" :class="className">
        <img src="/icons/add-to-favorites-btn.svg" alt="добавить в избранное кнопка" class="header-action-button__icon">
        <slot/>
    </button>
</template>

<script>
    export default {
        props: ['className']
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
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .header-action-button__icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }
</style>