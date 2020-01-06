<template>
    <form action="" class="search-form search-form-overlay">
        <h2 class="search-form__title h1">{{ searchTitle }}</h2>
        <app-search-field></app-search-field>
        <div class="search-form__find-button-container">
            <app-find-button
                :class="'find-btn'"></app-find-button>
        </div>

    </form>
</template>

<script>
    import FindButton from '~/components/global/FindButton'
    import SearchField from '~/components/global/SearchField'

    export default {
        data() {
            return {
                searchTitle: 'Поиск',
            }
        },
        components: {
            appFindButton: FindButton,
            appSearchField: SearchField
        }
    }
</script>

<style scoped>
    /* search form overlay class inside basic css file */
    .search-form {
        padding-top: 30px;
        padding-bottom: 38px;
        padding-left: 40px;
        padding-right: 40px;
        -webkit-border-radius: 20px;
        border-radius: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .search-form__title {
        color: var(--just_black);
        float: left;
        margin-right: 24px;
    }
    .search-form__input {
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 16px;
        padding-bottom: 18px;
        box-sizing: border-box;
    }
    .search-form__find-button-container {
        position: absolute;
        z-index: 5;
        bottom: -25px;
        left: 50%;
        margin-left: -111px;
    }
    .search-field-container {
        position: relative;
        width: 100%;
        margin-left: 20px;
    }
</style>