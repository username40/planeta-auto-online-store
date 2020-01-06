<template>
    <div id="app">
        <app-header/>
        <app-list-to-categories-links/>
        <div class="container mt140px">
            <app-mini-search/>
        </div>
        <div class="container bread-crumbs mt10px">
            <p class="Tag-12">
                <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Результаты поиска
                </span>
            </p>
        </div>
        <h2 class="h1 container mt30px">Найдено 2365 товаров в 24 категориях</h2>
        <app-list-to-search-result-categories class="mt20px"/>
        <article class="mt50px">
            <div class="container d-flex justify-content-between">
                <h2 class="h1">Легковые шины (102)</h2>
                <nuxt-link to="/" class="Body-17-Prime show-all-link">
                    <img src="/images/icons/show-all.svg" alt="показать все иконка">
                    Показать все (102)
                </nuxt-link>
            </div>
            <app-slider-with-goods :id="'carTyres'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="mt110px">
            <div class="container d-flex justify-content-between">
                <h2 class="h1">Шины для грузовиков (93)</h2>
                <nuxt-link to="/" class="Body-17-Prime show-all-link">
                    <img src="/images/icons/show-all.svg" alt="показать все иконка">
                    Показать все (93)
                </nuxt-link>
            </div>
            <app-slider-with-goods :id="'truckTyres'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="mt110px">
            <div class="container d-flex justify-content-between">
                <h2 class="h1">Мотошины (7)</h2>
                <nuxt-link to="/" class="Body-17-Prime show-all-link">
                    <img src="/images/icons/show-all.svg" alt="показать все иконка">
                    Показать все (7)
                </nuxt-link>
            </div>
            <app-slider-with-goods :id="'motoTyres'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="mt110px">
            <div class="container d-flex justify-content-between">
                <h2 class="h1">Шины для спецтехники (209)</h2>
                <nuxt-link to="/" class="Body-17-Prime show-all-link">
                    <img src="/images/icons/show-all.svg" alt="показать все иконка">
                    Показать все (209)
                </nuxt-link>
            </div>
            <app-slider-with-goods :id="'specialTyres'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="mt110px">
            <div class="container d-flex justify-content-between">
                <h2 class="h1">Пуско-зарядные устройства (42)</h2>
                <nuxt-link to="/" class="Body-17-Prime show-all-link">
                    <img src="/images/icons/show-all.svg" alt="показать все иконка">
                    Показать все (42)
                </nuxt-link>
            </div>
            <app-slider-with-goods :id="'startDevice'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import ListToSearchResultCategories from '~/components/global/navigation-lists/ListToSearchResultCategories'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    export default {
        name: "search-result-short-variant",
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appMiniSearch: MiniSearch,
            appListToSearchResultCategories: ListToSearchResultCategories,
            appSliderWithGoods: SliderWithGoods,
            appGoodItemGridSmall: GoodItemGridSmall
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            }
        },
    }
</script>

<style scoped>
    .show-all-link {
        display: flex;
        align-items: center;
        text-decoration: none;
    }
</style>