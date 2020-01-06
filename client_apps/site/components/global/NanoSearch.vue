<template>
    <form action="" class="search-form">
        <app-search-field></app-search-field>
        <app-nano-find-button></app-nano-find-button>
    </form>
</template>

<script>
    import SearchField from '~/components/global/SearchField'
    import NanoFindButton from '~/components/global/NanoFindButton'

    export default {
        name: "NanoSearch",
        components: {
            appSearchField: SearchField,
            appNanoFindButton: NanoFindButton
        }
    }
</script>

<style scoped>
    .search-form {
        position: relative;
        box-sizing: border-box;
    }
    .search-form__input {
        width: 100%;
        padding-top: 3px;
        padding-bottom: 3px;
        padding-left: 38px;
        padding-right: 10px;
        color: rgba(50, 55, 125, 0.9);
    }

    .search-form__input::-webkit-input-placeholder {
        color: rgba(50, 55, 125, 0.6);
    }

    .search-form__input:-ms-input-placeholder {
        color: rgba(50, 55, 125, 0.6);
    }

    .search-form__input::-ms-input-placeholder {
        color: rgba(50, 55, 125, 0.6);
    }

    .search-form__input::placeholder {
        color: rgba(50, 55, 125, 0.6);
    }
    .nano-find-button {
        position: absolute;
        z-index: 3;
        left: 2px;
        top: 2px;
    }
</style>