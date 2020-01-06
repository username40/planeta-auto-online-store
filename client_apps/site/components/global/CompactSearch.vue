<template>
    <form action="" class="search-form">
        <h2 class="search-form__title h1">{{ searchTitle }}</h2>
        <div class="search-field-container">
            <app-search-field></app-search-field>
            <app-find-button></app-find-button>
        </div>
    </form>
</template>

<script>
    import SearchField from '~/components/global/SearchField'
    import FindButton from '~/components/global/FindButton'
    export default {
        data() {
            return {
                searchTitle: 'Поиск',
            }
        },
        components: {
            appSearchField: SearchField,
            appFindButton: FindButton
        }
    }
</script>

<style scoped>
    .search-form {
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
        font-size: 32px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.34;
        letter-spacing: normal;
        color: var(--just_black);
        float: left;
        margin-right: 24px;
    }

    .search-field-container {
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
        box-sizing: border-box;
    }

    .find-btn {
        background-color: var(--blueberry);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        font-size: 24px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--just_white);
        padding: 8px 22px;
        position: absolute;
        z-index: 2;
        top: 4px;
        right: 4px;
    }
</style>