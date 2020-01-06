<template>
    <div id="app">
        <app-header/>
        <app-list-to-categories-links/>
        <app-big-search class="mt130px"/>
        <app-list-to-special-offers-links class="mt100px"/>
        <app-select-parts-by-car-brand class="mt100px"/>
        <article class="discounts-and-supersales mt100px">
            <div class="container"><h2 class="h1">Рекомендуем для вас</h2></div>
            <app-slider-with-goods :id="'slid'">
                <app-slider-banner/>
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="discounts-and-supersales mt100px">
            <div class="container"><h2 class="h1">Хит продаж</h2></div>
            <app-slider-with-goods :id="'megaHitGoods'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <app-list-goods-for-your-car class="mt100px"/>
        <app-slider-view-story class="mt100px"/>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import SliderBanner from '~/components/global/banners/SliderBanner'
    import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
    import ListToSpecialOffersLinks from '~/components/global/navigation-lists/ListToSpecialOffersLinks'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import ListGoodsForYourCar from '~/components/global/navigation-lists/ListGoodsForYourCar'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import SliderViewStory from '~/components/global/sliders/SliderViewStory'
    import BigSearch from '~/components/global/search-forms/BigSearch'
    import RadioSearchSelect from '~/components/global/RadioSearchSelect'
    import Checkbox from '~/components/global/Checkbox'
    import SelectPartsByCarBrand from '~/components/global/selectForms/SelectPartsByCarBrand'
    import Multiselect from 'vue-multiselect'
    export default {
        name: "index",
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appListToSpecialOffersLinks: ListToSpecialOffersLinks,
            appSliderWithGoods: SliderWithGoods,
            appListGoodsForYourCar: ListGoodsForYourCar,
            appGoodItemGridSmall: GoodItemGridSmall,
            appSliderViewStory: SliderViewStory,
            appBigSearch: BigSearch,
            appRadioSearchSelect: RadioSearchSelect,
            appCheckbox: Checkbox,
            appSelectPartsByCarBrand: SelectPartsByCarBrand,
            appSliderBanner: SliderBanner,
            Multiselect
        },
        data() {
            return {

            }
        },
        methods: {
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            },
            viewStory() {
                try {
                    return this.$store.getters['cart/viewStory']

                } catch (e) {
                    console.log(error(e))
                }
            }
        },
    }
</script>

<style scoped>


</style>