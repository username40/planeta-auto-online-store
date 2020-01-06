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
        <div class="container mt50px">
            <h2 class="h1">Выберите категорию</h2>
            <div class="row">
                <div class="choose-category__item col-3 mt20px" v-for="item in chooseCategory" :key="item.id">
                    <nuxt-link to="/" class="choose-category__item-image"></nuxt-link>
                    <p class="Body-18">{{ item.name }} ({{ item.value }})</p>
                </div>
            </div>
        </div>
        <article class="mt80px">
            <h2 class="h1 container">Популярные товары по вашему запросу</h2>
            <app-slider-with-goods :id="'popularOnYourQuery'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="mt100px">
            <h2 class="h1 container">Акции и скидки по вашему запросу</h2>
            <app-slider-with-goods :id="'discountOnYourQuery'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </article>
        <article class="container mt80px">
            <h2 class="h1">Популярные бренды и производители</h2>
            <div class="d-flex align-items-center justify-content-around mt20px">
                <nuxt-link
                        to="/"
                        v-for="item in popularBrands"
                        :key="item.id">
                    <img
                            :src="'/demo-images/brands-logo/' + item.src + '.svg'"
                            alt="бренд лого">
                </nuxt-link>
            </div>
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
        name: "search-result-more-five-cats",
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appMiniSearch: MiniSearch,
            appListToSearchResultCategories: ListToSearchResultCategories,
            appSliderWithGoods: SliderWithGoods,
            appGoodItemGridSmall: GoodItemGridSmall
        },
        data() {
            return {
                chooseCategory: [
                    {
                        id: 1,
                        name: "Шины",
                        value: 381
                    },
                    {
                        id: 2,
                        name: "Масла и жидкости",
                        value: 107
                    },
                    {
                        id: 3,
                        name: "Диски",
                        value: 503
                    },
                    {
                        id: 4,
                        name: "Аккумуляторы ",
                        value: 49
                    },
                    {
                        id: 5,
                        name: "Жидкость для стеклоомывателя",
                        value: 2
                    },
                    {
                        id: 6,
                        name: "Зарядные и пуско-зарядные устройства",
                        value: 602
                    },
                    {
                        id: 7,
                        name: "Шины",
                        value: 17
                    },
                    {
                        id: 8,
                        name: "Масла и жидкости",
                        value: 990
                    }
                ],
                popularBrands: [
                    {
                        id: 1,
                        src: 'nokian'
                    },
                    {
                        id: 2,
                        src: 'yokohama'
                    },
                    {
                        id: 3,
                        src: 'michelin'
                    },
                    {
                        id: 4,
                        src: 'lukoil'
                    },
                    {
                        id: 5,
                        src: 'castrol'
                    },
                ]
            }
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
    .choose-category__item-image {
        display: block;
        width: 100%;
        height: 140px;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 0.6), #e3e3e3);
    }
</style>