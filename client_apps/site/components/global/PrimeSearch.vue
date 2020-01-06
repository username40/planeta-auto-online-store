<template>
    <form action="" class="search-form search-form_prime search-form-overlay container">
        <h2 class="search-form__title h1">{{ searchTitle }}</h2>
        <div class="radio-select-container">
        <slot/>
        </div>
        <span class="search-form__type-of-car">{{ typeOfCar }}</span>
        <app-search-field></app-search-field>
        <div class="search-form__find-button-container"><app-find-button
        :class="'find-btn_prime'"></app-find-button></div>
        
    </form>    
</template>

<script>
import FindButton from '~/components/global/FindButton'
import RadioSearchSelect from '~/components/global/RadioSearchSelect'
import SearchField from '~/components/global/SearchField'

export default {
    data() {
        return {
            searchTitle: 'Поиск',
            typeOfCar: 'Марка, модель, год выпуска'
        }
    },
    components: {
        appFindButton: FindButton,
        appRadioSearchSelect: RadioSearchSelect,
        appSearchField: SearchField
    }
}
</script>

<style>

</style>

<style scoped>
    /* search form overlay class inside basic css file */
    .search-form_prime {
        padding-top: 20px;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 94px;
        -webkit-border-radius: 20px;
        border-radius: 20px;

    }

    .search-form__title {
        float: left;
        margin-right: 24px;
    }

    .search-form__input {
        margin-top: 35px;
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
        margin-left: -171px;

    }

    .search-form__type-of-car {
        display: table;
        margin-top: 10px;
        padding: 0;
        margin-left: auto;
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--blueberry);
    }
</style>


