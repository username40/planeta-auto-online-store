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
                        Аккумуляторы
                </span>
                </p>
            </div>
        </div>
            <h1 class="container mt30px h1">Найдено 361 товар в категории «Шины и диски»</h1>
        <app-list-to-search-result-categories class="mt20px"/>
        <main class="content mt50px">
            <div class="container">
                <div class="row">
                    <aside class="col-3">
                        <nav class="aside-link-nav mt20px">
                            <h3 class="h3">Аккумуляторы</h3>
                            <ul class="aside-link-list mt10px first-link-list">
                                <li class="aside-link-list__item" v-for="category in ListAccuCategories" :key="category.id">
                                    <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                                </li>

                            </ul>
                            <ul class="aside-link-list" v-show="showListAccu">
                                <li class="aside-link-list__item" v-for="category in ListAccuMoreCategories" :key="category.id">
                                    <nuxt-link :to="category.link" class="Body-16 aside-link-list__item-link">{{ category.title }}</nuxt-link>
                                </li>

                            </ul>
                            <button class="aside-link-list__show-more-btn Body-16-Prime" @click.prevent="showListAccu = !showListAccu" v-show="!showListAccu">
                                <span>Еще {{ ListAccuMoreCategories.length }} категории товаров</span>
                                <img
                                        src="/icons/breadcrumbs-arrow-right.svg"
                                        alt="" class="show-more-list-links">
                            </button>
                        </nav>
                        <h3 class="h3 mt20px">Учитывать автомобиль</h3>
                        <div class="mt10px">
                        <multiselect
                                v-model="value"
                                :options="options"
                                track-by="name"
                                label="name"
                                :show-labels="false"
                                open-direction="bottom"
                                placeholder="Марка, Модель авто"
                                :options-limit="6">
                            <template slot="afterList">
                                <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
                                    Уточните запрос, чтобы увидеть все.</p></template>
                        </multiselect>
                        </div>
                        <div class="mt30px">
                            <h3 class="h3">Емкость, Ач</h3>
                            <app-double-range></app-double-range>
                        </div>
                        <h2 class="h3 mt30px">Производитель</h2>
                        <app-checkbox :name="item.value" v-for="item in manufacturers" :key="item.id">{{ item.value }}</app-checkbox>
                        <div class="other-checkbox" v-show="showVendors">
                            <app-checkbox :name="item.value" v-for="item in moreManufactorers" :key="item.id">{{ item.value }}</app-checkbox>
                        </div>
                        <button class="show-more-btn_nano Body-16-Prime" @click.prevent="showVendors = !showVendors" v-show="!showVendors">
                            <span>Ещё {{ moreManufactorers.length }}</span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                        <div class="mt30px">
                            <app-range></app-range>
                        </div>
                        <div class="mt30px">
                            <h3 class="h3">Полярность</h3>
                            <app-radio
                            name="polarity"
                            :identifier="'any'">Любая</app-radio>
                            <app-radio
                                    name="polarity"
                                    :identifier="'straight'">Прямая</app-radio>
                            <app-radio
                                    name="polarity"
                                    :identifier="'reverse'">Обратная</app-radio>
                        </div>
                        <div class="mt30px">
                            <h3 class="h3">Пусковой ток, А</h3>
                            <app-range-around/>
                        </div>
                        <div class="mt30px">
                            <h2 class="h3">Габариты, мм</h2>
                            <multiselect
                                    v-model="gabaritesLenghtAccuValue"
                                    :options="gabaritesLenghtAccu"
                                    track-by="gabaritesLenght"
                                    label="gabaritesLenght"
                                    :show-labels="false"
                                    open-direction="bottom"
                                    placeholder="Длина"
                                    class="mt10px"
                            >
                            </multiselect>
                            <multiselect
                                    v-model="gabaritesWidthAccuValue"
                                    :options="gabaritesWidthAccu"
                                    track-by="gabaritesWidth"
                                    label="gabaritesWidth"
                                    :show-labels="false"
                                    open-direction="bottom"
                                    placeholder="Ширина"
                                    class="mt10px"
                            >
                            </multiselect>
                                <multiselect
                                        v-model="gabaritesHeightAccuValue"
                                        :options="gabaritesHeightAccu"
                                        track-by="gabaritesHeight"
                                        label="gabaritesHeight"
                                        :show-labels="false"
                                        open-direction="bottom"
                                        placeholder="Высота"
                                        class="mt10px"
                                >
                                </multiselect>
                        </div>
                        <div class="mt30px">
                            <h2 class="h3">Тип Клемм</h2>
                            <app-checkbox :name="item.value" v-for="item in cleatType" :key="item.id">{{ item.value }}</app-checkbox>
                        </div>
                    <h2 class="h3 mt30px">Магазины рядом</h2>
                        <img src="/demo-images/map_small.jpg" alt="" class="mt10px">
                        <app-show-more-button :class="'mt30px width100'">Подобрать товары</app-show-more-button>
                        <div class="mt30px grey-line"></div>
                        <div class="d-flex justify-content-between mt10px">
                            <p class="h3">Выбрано</p>
                            <button class="drop-chosen-brands Body-14-Prime">Сбросить выбор</button>
                        </div>

                    </aside>
                    <div class="page-content col-9 ">
                        <div class="page-content__view-method-params">
                            <div></div>
                            <div class="right-side">
                                <app-checkbox
                                        :name="'nearest-shop-first'">Сначала в ближайших магазинах</app-checkbox>
                                <div class="change-view-container">
                                    <input type="radio" name="change-view" v-model="showMethod" value="grid" id="change-view_grid" class="change-view-radio">
                                    <label for="change-view_grid" class="change-view_left grey-border"><span class="change-view__icon change-view__icon_grid"></span></label>
                                    <input type="radio" name="change-view" v-model="showMethod" value="list" id="change-view_list" class="change-view-radio" checked="checked">
                                    <label for="change-view_list" class="change-view_right grey-border"><span class="change-view__icon change-view__icon_list"></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="goods-grid" v-show="showMethod === 'grid'">
                            <div class="" v-for="product in products.slice(0, 12)" :key="product.id">
                                <app-good-item-grid-small :product="product"/>
                            </div>
                        </div>
                        <div class="goods-list" v-show="showMethod === 'list'">
                            <div v-for="product in products.slice(0, 12)" :key="product.id">
                                <app-good-item-list :product="product"/>
                            </div>
                        </div>
                        <p class="Tag-16-60 mt60px text-center">Просмотрено {{ products.length }} товаров из 17540</p>
                        <app-show-more-button :class="'width100 show-more-btn_blue-btn mt20px'">Показать еще</app-show-more-button>
                    </div>
                    <app-slider-view-story class="mt80px"/>
                </div>
            </div>
        </main>

    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import Multiselect from 'vue-multiselect'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import GoodItemList from '~/components/global/goodItems/GoodItemList'
    import Radio from '~/components/global/radio-&-checkbox/Radio'
    import Range from "~/components/global/ranges/Range"
    import RangeAround from "~/components/global/ranges/RangeAround"
    import DoubleRange from "~/components/global/ranges/DoubleRange"
    import SliderViewStory from "~/components/global/sliders/SliderViewStory"
    import ListToSearchResultCategories from '~/components/global/navigation-lists/ListToSearchResultCategories'

    import ContactLists from '~/components/global/ContactLists'
    import MainMenuButton from '~/components/global/MainMenuButton'
    import SelectInputNano from '~/components/global/SelectInputNano'
    import Checkbox from '~/components/global/Checkbox'
    import ChangeViewRadio from '~/components/global/ChangeViewRadio'
    import PriceButton from '~/components/global/PriceButton'
    import PriceButtonGreySmall from '~/components/global/PriceButtonGreySmall'
    import DiscountTag from '~/components/global/DiscountTag'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import Select from '~/components/global/Select'
    import ShowMoreButton from "~/components/global/ShowMoreButton"
    import Tag from "~/components/global/Tag"
    import PriceButtonGreyBig from "~/components/global/PriceButtonGreyBig"


    export default {
        name: "search-result-by-car",
        components: {
            showAllFilters: true,
            appHeader: Header,
            appMiniSearch: MiniSearch,
            Multiselect,
            appSliderViewStory: SliderViewStory,
            appGoodItemGridSmall: GoodItemGridSmall,
            appGoodItemList: GoodItemList,
            appRadio: Radio,
            appRangeAround: RangeAround,
            appDoubleRange: DoubleRange,
            appListToSearchResultCategories: ListToSearchResultCategories,

            appContactLists: ContactLists,
            appMainMenuButton: MainMenuButton,
            appSelectInputNano: SelectInputNano,
            appCheckbox: Checkbox,
            appChangeViewRadio: ChangeViewRadio,
            appPriceButton: PriceButton,
            appDiscountTag: DiscountTag,
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appPriceButtonGreySmall: PriceButtonGreySmall,
            appSelect: Select,
            appShowMoreButton: ShowMoreButton,
            appTag: Tag,
            appPriceButtonGreyBig: PriceButtonGreyBig,
            appRange: Range,
        },
        data() {
            return {
                manufacturers: [
                    {id: 1,
                    value: 'Bosch'
                    },
                    {id: 2,
                    value: 'Delta battery'
                    },
                    {id: 3,
                    value: 'Exide'
                    },
                    {id: 4,
                    value: 'Furukawa'
                    },
                    {id: 5,
                    value: 'Varta'
                    },
                    {id: 6,
                    value: 'Аком'
                    }
                ],
                moreManufactorers: [
                    {id: 1,
                    value: 'Тюменский Медведь'
                    },
                    {id: 2,
                    value: 'Dock'
                    },
                    {id: 3,
                    value: 'Electron'
                    },
                    {id: 4,
                    value: 'Flagman'
                    },
                    {id: 5,
                    value: 'General Technologies'
                    },
                    {id: 6,
                    value: 'Mega Batt'
                    },
                    {id: 7,
                    value: 'Mutlu'
                    },
                    {id: 8,
                    value: 'Reactor'
                    },
                    {id: 9,
                    value: 'Sebang'
                    },
                    {id: 10,
                    value: 'Storm'
                    },
                    {id: 11,
                    value: 'Space'
                    },
                    {id: 12,
                    value: 'Ultimatum'
                    }
                ],
                gabaritesLenghtAccu: [
                    {
                        id: 1,
                        gabaritesLenght: 50
                    },
                    {
                        id: 2,
                        gabaritesLenght: 60
                    },
                    {
                        id: 3,
                        gabaritesLenght: 70
                    },
                    {
                        id: 4,
                        gabaritesLenght: 80
                    },
                    {
                        id: 5,
                        gabaritesLenght: 90
                    },
                    {
                        id: 6,
                        gabaritesLenght: 100
                    },
                ],
                gabaritesWidthAccu: [
                    {
                        id: 1,
                        gabaritesWidth: 110
                    },
                    {
                        id: 2,
                        gabaritesWidth: 120
                    },
                    {
                        id: 3,
                        gabaritesWidth: 130
                    },
                    {
                        id: 4,
                        gabaritesWidth: 140
                    },
                    {
                        id: 5,
                        gabaritesWidth: 150
                    },
                    {
                        id: 6,
                        gabaritesWidth: 160
                    },
                ],
                gabaritesHeightAccu: [
                    {
                        id: 1,
                        gabaritesHeight: 170
                    },
                    {
                        id: 2,
                        gabaritesHeight: 180
                    },
                    {
                        id: 3,
                        gabaritesHeight: 190
                    },
                    {
                        id: 4,
                        gabaritesHeight: 200
                    },
                    {
                        id: 5,
                        gabaritesHeight: 210
                    },
                    {
                        id: 6,
                        gabaritesHeight: 220
                    },
                ],
                gabaritesLenghtAccuValue: null,
                gabaritesWidthAccuValue: null,
                gabaritesHeightAccuValue: null,
                value: null,
                options: [
                    {id: 1, name: 'Skoda Rapid'},
                    {id: 2, name: 'Skoda Fabia'},
                    {id: 3, name: 'Audi Q7'},
                    {id: 4, name: 'Audi TT'},
                    {id: 5, name: 'Chevrolet Camaro'},
                    {id: 6, name: 'Ford Focus'},
                    {id: 7, name: 'Volkswagen Jetta'},
                    {id: 8, name: 'Volkswagen Touareg'},
                ],
                showListAccu: false,
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
                ],
                showVendors: false,
                goods: [
                    {
                        id: 1,
                        smallImage: "/demo-images/video-registrator.jpg",
                        bigImage: "/demo-images/wheel-disk.jpg",
                        oldPrice: "102 360",
                        price: "102 360",
                        name: "Моторное масло MEGA-OIL Super 10W-40 4 л канистра...",
                        category: "Масла",
                    }
                ],
                cleatType: [
                    {
                        id: 1,
                        value: 'Европейская'
                    },
                    {
                        id: 2,
                        value: 'Боковая'
                    },
                    {
                        id: 3,
                        value: 'Болт внешний'
                    },
                    {
                        id: 4,
                        value: 'Болт внутренний'
                    },
                    {
                        id: 5,
                        value: 'Тонкая пластина'
                    },
                ],
                showMethod: 'list',
                gridV: [
                    {
                        id: 1,
                        src: '/demo-images/oils/01.jpg',
                        name:'Масло моторное 5w40 1л A3/B4 (синт.)'
                    },
                    {
                        id: 2,
                        src: '/demo-images/oils/02.png',
                        name: 'Масло моторное 5w40 4л A3/B4(синт.).'
                    },
                    {
                        id: 3,
                        src: '/demo-images/oils/03.jpg',
                        name: 'Масло моторное 0w30 A3/B4 1л (синт)'
                    },
                    {
                        id: 4,
                        src: '/demo-images/oils/04.png',
                        name: 'Масло моторное 5w40 синт. 1л'
                    },
                    {
                        id: 5,
                        src: '/demo-images/oils/05.jpg',
                        name: 'Масло моторное 5w40 синт. 4л'
                    },
                    {
                        id: 6,
                        src: '/demo-images/oils/06.png',
                        name: 'Масло моторное 5w30 синт. 5л'
                    },
                    {
                        id: 7,
                        src: '/demo-images/oils/07.jpg',
                        name: 'Масло моторное 0w-20 (1л)'
                    },
                    {
                        id: 8,
                        src: '/demo-images/oils/08.png',
                        name:'Масло моторное 5w40 1л A3/B4 (синт.)'
                    },
                    {
                        id: 9,
                        src: '/demo-images/oils/09.jpg',
                        name: 'Масло моторное 5w30 синт. 5л'
                    },
                    {
                        id: 10,
                        src: '/demo-images/oils/10.png',
                        name: 'Масло моторное 0w-20 (1л)'
                    },
                    {
                        id: 11,
                        src: '/demo-images/oils/11.jpg',
                        name: 'Масло моторное 5w40 4л A3/B4(синт.).'
                    },
                    {
                        id: 12,
                        src: '/demo-images/oils/12.png',
                        name: 'Масло моторное 5w40 синт. 4л'
                    },
                    {
                        id: 13,
                        src: '/demo-images/oils/13.jpg',
                        name: 'Масло моторное 5w40 синт. 4л'
                    },
                    {
                        id: 14,
                        src: '/demo-images/oils/14.png',
                        name: 'Масло моторное 5w40 синт. 1л'
                    },
                    {
                        id: 15,
                        src: '/demo-images/oils/15.jpg',
                        name: 'Масло моторное 5w40 синт. 1л'
                    },
                    {
                        id: 16,
                        src: '/demo-images/oils/16.png',
                        name: 'Масло моторное 0w-20 (1л)'
                    },
                    {
                        id: 17,
                        src: '/demo-images/oils/17.jpg',
                        name:'Масло моторное 5w40 1л A3/B4 (синт.)'
                    },
                    {
                        id: 18,
                        src: '/demo-images/oils/18.png',
                        name: 'Масло моторное 5w40 4л A3/B4(синт.).'
                    },
                    {
                        id: 19,
                        src: '/demo-images/oils/19.jpg',
                        name: 'Масло моторное 0w-20 (1л)'
                    },
                    {
                        id: 20,
                        src: '/demo-images/oils/20.jpg',
                        name: 'Масло моторное 5w40 синт. 1л'
                    },
                ],

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
                    console.log(this.$store.state['cart/viewStory'].length)
                } catch (e) {
                    console.log(error(e))
                }
            }

        }
    }
</script>

<style scoped>
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

    .breadcrumbs-arrow {
        width: 14px;
        height: 14px;
        margin-bottom: -3px;
    }


    .categories-links {
        width: 100%;
        display: flex;
        overflow-x: hidden;
        border-right: 1px solid #918dae;
        max-height: 60px;
        box-sizing: border-box;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .categories-links > .main-menu-btn:not(:first-child) {
        margin-left: 10px;
    }

    .check{
        margin-right: 16px;
    }

    .right-side {
        display: flex;
        align-items: center;
    }

    .page-content__view-method-params{
        display: flex;
        justify-content: space-between;
    }

    .goods-grid {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }
    .good-item-grid {
        margin-top: 25px;
    }

    .show-more-btn_nano {
        margin-top: 8px;
        padding: 0;
        border:none;
        background-color: transparent;
    }
    .show-more-list-links {
        transform: rotate(90deg);
        width: 17px;
        height: 17px;
        margin-bottom: -3px;
    }

    .grey-line {
        height: 1px;
        background-color: var(--asphalt_light);
    }

    .drop-chosen-brands {
        padding: 2px;
        cursor: pointer;
        border: none;
        background-color: transparent;
        box-sizing: border-box;
        border: 0.5px solid transparent;
        border-radius: 5px;
    }

    .drop-chosen-brands:hover {
        border: 0.5px solid #e4e4e4;
    }

    .story__container {
        padding-top: 20px;
        padding-bottom: 20px;
        overflow-x: hidden;
        border-right: 1px solid var(--blueberry-grey);
    }
    .story__container > .good-item-grid {
        margin-right: 5px;
    }

    /*change view radio styles*/
    .change-view-container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .change-view-radio {
        position: absolute;
        z-index: -1;
        opacity: 0;
        margin: 10px 0 0 7px;
    }

    label {
        width: 32px;
        height: 28px;
        background-color: #ffffff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    label:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .change-view-radio + label {
        position: relative;
        cursor: pointer;
    }

    .change-view-radio:checked + label {
        background-color: #2c3170;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        border: 0.5px solid #e4e4e4!important;
    }

    .sq {
        width: 10px;
        height: 10px;
        background-color: red;
    }

    .change-view-radio:checked + label > .change-view__icon_grid {
        background-image: url('/icons/change-view__grid_white.svg');
    }

    .change-view-radio:checked + label > .change-view__icon_list{
        background-image: url('/icons/change-view__list_white.svg');
    }

    .change-view_left {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .change-view_right {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .change-view__icon {
        width: 24px;
        height: 24px;
        display: block;
    }

    .change-view__icon_grid {
        background-image: url('/icons/change-view__grid_blue.svg');
    }

    .change-view__icon_list {
        background-image: url('/icons/change-view__list_blue.svg');
    }


</style>