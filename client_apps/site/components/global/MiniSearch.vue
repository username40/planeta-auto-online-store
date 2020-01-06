<template>
    <form action="" class="search-form">
        <app-search-field></app-search-field>
        <app-find-button class="find-btn"></app-find-button>
    </form>
</template>

<script>
    import FindButton from '~/components/global/FindButton'
    import SearchField from '~/components/global/SearchField'
    export default {
        name: "MiniSearch",
        components: {
            appFindButton: FindButton,
            appSearchField: SearchField
        }
    }
</script>

<style scoped>
    .search-form {
        position: relative;
        z-index: 5;
        width: 100%;
    }

    .search-form__input {
        width: 100%;
        padding-left: 20px;
        padding-top: 17px;
        padding-bottom: 16px;
        padding-right: 167px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .find-btn {
        background-color: var(--blueberry)!important;
        -webkit-border-radius: 6px!important;
        border-radius: 6px!important;
        font-size: 24px!important;
        font-weight: bold!important;
        font-style: normal!important;
        font-stretch: normal!important;
        line-height: 1.33!important;
        letter-spacing: normal!important;
        color: var(--just_white)!important;
        padding: 8px 22px!important;
        position: absolute!important;
        z-index: 2!important;
        top: 4px!important;
        right: 4px!important;
    }
</style>