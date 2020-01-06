<template>
    <button class="Body-16-Prime header__action-button grey-border" :class="className">
        <img src="/icons/like-button.svg" alt="лайкнуть кнопка" class="header-action-button__icon">
        <slot/>
    </button>
</template>

<script>
    export default {
        name: "LikeButton",
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
</style>