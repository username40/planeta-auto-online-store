<template>
    <a href="#" class="call-us-link H2-Bold-white grey-border"><img src="/icons/call-btn.svg" alt="позвонить иконка"><span>Позвонить</span></a>
</template>

<script>
// узнать номер по которому будет звонить пользователь
export default {
    
}
</script>

<style scoped>
    .call-us-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        background-color: var(--blueberry);
        padding-top: 8px;
        padding-bottom: 10px;
        padding-left: 22px;
        padding-right: 22px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        text-align: center;
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color .2s linear
    }

    .call-us-link > img {
        width: 32px;
        height: 32px;
    }

    .call-us-link:hover {
        background-color: var(--blueberry_lite);
    }

    .call-us-link:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }
</style>

