<template>
    <div id="app">
        <app-header/>
        <div class="container mt60px">
            <app-mini-search/>
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/catalog" class="Tag-12">Каталог</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Все разделы
                </span>
                </p>
            </div>
        </div>
        <main class="content-container container mt20px">
            <div class="row">
                <aside class="aside-lists col-3">
                    <nav class="aside-link-nav first-link-nav">
                        <h3 class="h3">Шины и диски</h3>
                        <ul class="aside-link-list first-link-list">
                            <li class="aside-link-list__item" v-for="category in ListTyresAndWheelsTopCategories" :key="category.id">
                                <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>
                        </ul>
                        <ul class="aside-link-list" v-show="showListParts">
                            <li class="aside-link-list__item" v-for="category in ListTyresAndWheelsMoreCategories" :key="category.id">
                                <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>
                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListParts = !showListParts" v-show="!showListParts">
                            <span>Сопутствующие товары</span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>

                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Масла и тех. жидкости</h3>
                        <ul class="aside-link-list mt10px first-link-list">
                            <li class="aside-link-list__item" v-for="category in ListTechLiquidsCategories" :key="category.id">
                                <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>
                        </ul>
                        <ul class="aside-link-list" v-show="showListTyres">
                            <li class="aside-link-list__item" v-for="category in ListTechLiquidsMoreCategories" :key="category.id">
                                <nuxt-link :to="category.title" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>
                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListTyres = !showListTyres" v-show="!showListTyres">
                            <span>Ещё {{ ListTechLiquidsMoreCategories.length }} </span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                    </nav>
                    <nav class="aside-link-nav mt20px">
                        <h3 class="h3">Аккумуляторы</h3>
                        <ul class="aside-link-list mt10px first-link-list">
                            <li class="aside-link-list__item" v-for="category in ListAccuCategories" :key="category.id">
                                <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>

                        </ul>
                        <ul class="aside-link-list" v-show="showListTools">
                            <li class="aside-link-list__item" v-for="category in ListAccuMoreCategories" :key="category.id">
                                <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                            </li>

                        </ul>
                        <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListTools = !showListTools" v-show="!showListTools">
                            <span>Сопутствующие товары</span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                    </nav>
                    <h3 class="h3 mt20px">Ближайшие магазины</h3>
                    <img class="aside-map__picture mt10px" src="/demo-images/small-map-for-aside.jpg" alt="мини карта">
                </aside>
                <div class="content col-9">
                    <article class="popular-categories">
                        <h2 class="h1">Популярные категории товаров</h2>
                        <div class="popular-categories__container">
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/images/popular-categories-banner/tyres.png" alt="Шины категория" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Шины</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/images/popular-categories-banner/oils.png" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Масла и Жидкости</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                            <nuxt-link to="/prototypes/catalog" class="popular-categories__item">
                                <img src="/images/popular-categories-banner/wheels.png" alt="" class="popular-categories__item-background">
                                <p class="H2-White popular-categories__item-title">Диски</p>
                                <span class="gradient-bottom"></span>
                            </nuxt-link>
                        </div>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Хиты продаж</h2>
                            <app-slider-with-goods :id="'salesHits'">
                                <div class="swiper-slide" v-for="product in products" :key="product.id">
                                    <app-good-item-grid-small :product="product"/>
                                </div>
                            </app-slider-with-goods>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Скидки на шины и диски</h2>
                        <app-slider-with-goods :id="'tyresAndWheelsDiscount'">
                            <div class="swiper-slide" v-for="product in products" :key="product.id">
                                <app-good-item-grid-small :product="product"/>
                            </div>
                        </app-slider-with-goods>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Акции на масла и технические жидкости</h2>
                        <app-slider-with-goods :id="'oilsActions'">
                            <div class="swiper-slide" v-for="product in products" :key="product.id">
                                <app-good-item-grid-small :product="product"/>
                            </div>
                        </app-slider-with-goods>
                    </article>
                    <article class="discounts-and-supersales mt90px">
                        <h2 class="h1">Распродажа аккумуляторов</h2>
                        <app-slider-with-goods :id="'accuSales'">
                            <div class="swiper-slide" v-for="product in products" :key="product.id">
                                <app-good-item-grid-small :product="product"/>
                            </div>
                        </app-slider-with-goods>
                    </article>
                    <article class="brands-article">
                        <h2 class="h1">Популярные бренды и производители</h2>
                        <div class="brands__logo-container mt20px">
                            <nuxt-link to="/"><img src="/demo-images/brands-logo/nokian.svg" alt="бренд лого"></nuxt-link>
                            <nuxt-link to="/"><img src="/demo-images/brands-logo/yokohama.svg" alt="бренд лого"></nuxt-link>
                            <nuxt-link to="/"><img src="/demo-images/brands-logo/michelin.svg" alt="бренд лого"></nuxt-link>
                            <nuxt-link to="/"><img src="/demo-images/brands-logo/lukoil.svg" alt="бренд лого"></nuxt-link>
                            <nuxt-link to="/"><img src="/demo-images/brands-logo/castrol.svg" alt="бренд лого"></nuxt-link>
                        </div>
                    </article>
                </div>
            </div>
        </main>

    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'

    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'

    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import GoodItemGrid from '~/components/global/GoodItemGrid'
    import Footer from '~/components/global/Footer'
    import ContactLists from '~/components/global/ContactLists'
    import PriceButton from '~/components/global/PriceButton'
    import DiscountTag from '~/components/global/DiscountTag'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    export default {
        name: "catalog-upper-lvl",
        data() {
            return {
                showListParts: false,
                showListTyres: false,
                showListTools: false,
                ListTyresAndWheelsTopCategories: [
                    {
                        id: 1,
                        title: 'Легковые шины',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Шины для грузовиков',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Мотошины',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Шины для спецтехники',
                        link: '/prototypes/catalog'
                    },
                ],
                ListTyresAndWheelsMoreCategories: [
                    {
                        id: 1,
                        title: 'Шины для Марсоходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Шины для Луноходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Шины для где-угодно Ходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Шины для Болидов F1',
                        link: '/prototypes/catalog'
                    },
                ],
                ListTechLiquidsCategories: [
                    {
                        id: 1,
                        title: 'Моторные масла',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Масло трансмиссионное',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Гидравлическое масло',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Масло трансмиссионное',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 5,
                        title: 'Гидравлическое масло',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 6,
                        title: 'Промывочное масло',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 7,
                        title: 'Специальные масла',
                        link: '/prototypes/catalog'
                    }
                ],
                ListTechLiquidsMoreCategories: [
                    {
                        id: 1,
                        title: 'Масла для Марсоходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Масла для Луноходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Масла для где-угодно Ходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Масла для Болидов F1',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 5,
                        title: 'Масла для самолетов',
                        link: '/prototypes/catalog'
                    },
                ],
                ListAccuCategories: [
                    {
                        id: 1,
                        title: 'Для легковых автомобилей',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Мото аккумуляторы',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Для грузовиков',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Тяговые аккумуляторы',
                        link: '/prototypes/catalog'
                    }
                ],
                ListAccuMoreCategories: [
                    {
                        id: 1,
                        title: 'Аккумуляторы для Марсоходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 2,
                        title: 'Аккумуляторы для Луноходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 3,
                        title: 'Аккумуляторы для где-угодно Ходов',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 4,
                        title: 'Аккумуляторы для Болидов F1',
                        link: '/prototypes/catalog'
                    },
                    {
                        id: 5,
                        title: 'Аккумуляторы для самолетов',
                        link: '/prototypes/catalog'
                    },
                ]

            }
        },
        components: {
            appHeader: Header,

            appSliderWithGoods: SliderWithGoods,
            appGoodItemGridSmall: GoodItemGridSmall,

            appMiniSearch: MiniSearch,
            appGoodItemGrid: GoodItemGrid,
            appFooter: Footer,
            appContactLists: ContactLists,
            appPriceButton: PriceButton,
            appDiscountTag: DiscountTag,
            appDiscountLabelDropDown: DiscountLabelDropDown,
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            }
        }
    }
</script>

<style scoped>
    .breadcrumbs-arrow {
        width: 14px;
        height: 14px;
        margin-bottom: -3px;
    }

    .popular-categories__container {
        margin-top: 5px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .popular-categories__item {
        border-radius: 8px;
        position: relative;
        margin-top: 15px;
        width: 265px;
        height: 140px;
        text-decoration: none;
    }
    .popular-categories__item-background {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }

    .popular-categories__item-title {
        position: absolute;
        z-index: 4;
        bottom: 10px;
        left: 16px;
    }

    .gradient-bottom {
        position: absolute;
        height: 70px;
        width: 100%;
        z-index: 3;
        background-image: linear-gradient(to top, rgba(0, 0, 0, 0.6), rgba(69, 240, 170, 0));
        bottom: 0;
        border-bottom-right-radius: 8px;
        border-bottom-left-radius: 8px;
    }
    .discounts-and-supersales__container {
        display: flex;
        border-right: 1px solid #918dae;
        overflow-x: hidden;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .good-item-grid:first-child {
        margin-left: 10px;
    }
    .good-item-grid:not(:first-child) {
        margin-left: 30px;
    }

    .first-link-nav {
        margin-top: 14px;
    }

    .aside-link-list__item {
        margin-top: 4px;
        text-decoration: none;
    }

    .aside-link-list__item-link {
        text-decoration: none;
    }

    .aside-link-list__item-link:hover {
        text-decoration: underline;
    }

    .aside-link-list__show-more-btn {
        margin-top: 8px;
        padding: 0;
        border:none;
        background-color: transparent;
    }

    .aside-link-list__item-links-container > span {
        line-height: 1;
    }

    .aside-map__picture {
        border-radius: 2px;
    }

    .brands-article {
        margin-top: 80px;
    }

    .brands__logo-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .show-more-list-links {
        transform: rotate(90deg);
        width: 17px;
        height: 17px;
        margin-bottom: -3px;
    }
</style>