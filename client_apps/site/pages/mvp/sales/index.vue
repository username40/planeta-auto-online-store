<template>
    <div>
        <app-header/>
        <app-list-to-categories-links/>
        <div class="container mt100px">
            <app-mini-search/>
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Акции
                </span>
                </p>
            </div>
        </div>
        <h1 class="mt30px container h1">Акции в наших магазинах и автосервисах</h1>
<!--        <div class="container mt20px">-->
<!--            <div class="row">-->
<!--            <div class="col-7 select-goods-container">-->
<!--                <div class="radio-select grey-border radio-select_left-border-radius">-->
<!--                    <input  class="radio-select__input"-->
<!--                            type="radio"-->
<!--                            id="all"-->
<!--                            value="All"-->
<!--                            v-model="typeSale"-->
<!--                            name="typeSale"-->
<!--                            hidden>-->
<!--                    <label  for="all"-->
<!--                            class="radio-select__label Body-18-Prime radio-select_left-border-radius">Все акции</label>-->
<!--                </div>-->
<!--                <div class="radio-select grey-border">-->
<!--                    <input-->
<!--                            class="radio-select__input"-->
<!--                            type="radio"-->
<!--                            id="stores"-->
<!--                            value="InStores"-->
<!--                            name="typeSale"-->
<!--                            v-model="typeSale"-->
<!--                            hidden>-->
<!--                    <label-->
<!--                            for="stores"-->
<!--                            class="radio-select__label Body-18-Prime">Скидки в магазинах</label>-->
<!--                </div>-->
<!--                <div class="radio-select grey-border radio-select_right-border-radius">-->
<!--                <input-->
<!--                        class="radio-select__input"-->
<!--                        type="radio"-->
<!--                        id="service"-->
<!--                        value="InService"-->
<!--                        name="typeSale"-->
<!--                        v-model="typeSale"-->
<!--                        hidden>-->
<!--                    <label for="service" class="radio-select__label Body-18-Prime radio-select_right-border-radius">Акции на услуги и сервис</label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-5 multi">-->
<!--                <multiselect-->
<!--                    v-model="value"-->
<!--                    :options="storeTypes"-->
<!--                    track-by="type"-->
<!--                    label="type"-->
<!--                    :show-labels="false"-->
<!--                    open-direction="bottom"-->
<!--                    placeholder="Все магазины и автосервисы"-->
<!--                    :options-limit="6">-->
<!--                </multiselect>-->
<!--            </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="container sales-list mt30px">
            <div class="row" v-if="typeSale === 'All'">
                <app-sales-banner v-for="promobanner in banners" :key="promobanner.id" :promobanner="promobanner"/>
            </div>
            <div class="row" v-if="typeSale === 'InStores'">
                <app-sales-banner v-if="promobanner.storeSale" v-for="promobanner in banners" :key="promobanner.id" :promobanner="promobanner"/>
            </div>
            <div class="row" v-if="typeSale === 'InService'">
                <app-sales-banner v-if="!promobanner.storeSale" v-for="promobanner in banners" :key="promobanner.id" :promobanner="promobanner"/>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '~/components/global/headers/Header'
import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
import MiniSearch from '~/components/global/search-forms/MiniSearch'
import SalesBanner from '~/components/global/banners/SalesBanner'
import Multiselect from 'vue-multiselect'

export default {
    name: 'sales',
    components: {
        appHeader: Header,
        appListToCategoriesLinks: ListToCategoriesLinks,
        appMiniSearch: MiniSearch,
        appSalesBanner: SalesBanner,
        Multiselect
    },
    data() {
        return {
            typeSale: 'All',
            storeTypes: [
                {id: 1, type: "Все магазины и автосервисы"},
                {id: 2, type: "Все магазины"},
                {id: 3, type: "Все автосервисы"},
            ],
            value: null,
        }
    },
    computed: {
        banners() {
                try {
                    return this.$store.getters['promobanner/banners']
                } catch (e) {
                    console.log(error(e))
                }
            },
    }
}
</script>

<style scoped>

    .select {
        border: 1px solid #918dae;
        border-radius: 6px;
        background-color: var(--just_white);
        margin-left: auto;
        outline: none;
        padding: 7px 171px 9px 16px;
    }

    .radio-select {
        cursor: pointer;
    }
    .radio-select__label {
        display: block;
        height: 100%;
        padding: 11px 20px 8px 20px;
    }

    .radio-select__label:hover {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__label.active { 
        background-color: var(--blueberry);
        color: var(--just_white); 
    }

    .radio-select__input:checked + .radio-select__label {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .cross-between-selects {
        position: absolute;
        left: 49%;
        top: 53%;
    }

    .radio-select_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .radio-select_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .select-goods-container {
        display: flex;
    }

</style>
