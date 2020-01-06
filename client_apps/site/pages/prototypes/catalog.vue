<template>
    <div id="app">
        <app-hint>
            <template v-slot:hintText>Найдите моторное масло и добавьте его в корзину. Оформите покупку.</template>
        </app-hint>
        <app-header-no-search class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
        </app-header-no-search>
        <div class="container mt20px">
            <app-mini-search></app-mini-search>
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/prototypes/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/prototypes/catalog" class="Tag-12">Каталог</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Товары со скидкой
                </span>
                </p>
            </div>
        </div>
        <div class="container mt30px">
            <h1 class="h1">Товары со скидкой в Екатерибурге</h1>
            <div class="categories-links">
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-parts.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Запчасти</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-tyres.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Шины</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-wheels.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Диски</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-liquid.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Масла и жидкости</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-accu.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Аккумуляторы</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/tools.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Инструменты</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                    <template v-slot:image>
                        <img src="/icons/lamps.svg" alt="">
                    </template>
                    <template v-slot:buttonName><span>Лампы и освещение</span></template>
                </app-main-menu-button>
            </div>
        </div>
        <main class="content mt50px">
            <div class="container">
                <div class="row">
                    <aside class="col-3">
                        <h2 class="h3">Учитывать автомобиль</h2>
                        <app-select disabled="disabled">
                            <option value="Марка, модель, год">Марка, модель, год</option>
                        </app-select>
                        <h2 class="h3 mt30px">Производитель</h2>
                        <app-checkbox :name="'CASTROL'">CASTROL</app-checkbox>
                        <app-checkbox :name="'ELF'">ELF</app-checkbox>
                        <app-checkbox :name="'TOTAL'">TOTAL</app-checkbox>
                        <app-checkbox :name="'ZIC'">ZIC</app-checkbox>
                        <app-checkbox :name="'IDEMITSU'">IDEMITSU</app-checkbox>
                        <app-checkbox :name="'MOBIL'">MOBIL</app-checkbox>
                        <div class="other-checkbox" v-show="showVendors">
                            <app-checkbox :name="'ГАЗПРОМНЕФТЬ'">ГАЗПРОМНЕФТЬ</app-checkbox>
                            <app-checkbox :name="'ЛУКОЙЛ'">ЛУКОЙЛ</app-checkbox>
                            <app-checkbox :name="'MOTUL'">MOTUL</app-checkbox>
                            <app-checkbox :name="'PEMCO'">PEMCO</app-checkbox>
                            <app-checkbox :name="'SHELL'">SHELL</app-checkbox>
                            <app-checkbox :name="'TOTACHI'">TOTACHI</app-checkbox>
                        </div>
                        <button class="show-more-btn_nano Body-16-Prime" @click.prevent="showVendors = !showVendors" v-show="!showVendors">
                            <span>Ещё 12 </span>
                            <img
                                    src="/icons/breadcrumbs-arrow-right.svg"
                                    alt="" class="show-more-list-links">
                        </button>
                    <h2 class="h3 mt30px">Магазины рядом</h2>
                        <img src="/demo-images/map_small.jpg" alt="" class="mt10px">
                        <div class="mt30px d-flex range-input-container">
                            <p class="h3 range-input-title">Цена</p>
                            <app-range></app-range>
                        </div>

                        <app-show-more-button :class="'mt30px width100'">Показать товары</app-show-more-button>
                        <div class="mt30px grey-line"></div>
                        <div class="d-flex justify-content-between mt10px">
                            <p class="h3">Выбрано</p>
                            <button class="drop-chosen-brands Body-14-Prime">Сбросить выбор</button>
                        </div>
                        <div class="mt10px d-flex">
                            <app-tag>Уралавтошина</app-tag>
                        </div>



                    </aside>
                    <div class="page-content col-9 ">
                        <div class="page-content__view-method-params">
                                <app-select-input-nano></app-select-input-nano>
                            <div class="right-side">
                                <app-checkbox
                                        :name="'nearest-shop-first'">Сначала в ближайших магазинах</app-checkbox>
                                <div class="change-view-container">
                                    <input type="radio" name="change-view" v-model="showMethod" value="grid" id="change-view_grid" class="change-view-radio" checked="checked">
                                    <label for="change-view_grid" class="change-view_left grey-border"><span class="change-view__icon change-view__icon_grid"></span></label>
                                    <input type="radio" name="change-view" v-model="showMethod" value="list" id="change-view_list" class="change-view-radio">
                                    <label for="change-view_list" class="change-view_right grey-border"><span class="change-view__icon change-view__icon_list"></span></label>
                                </div>
                            </div>
                        </div>
                        <div class="goods-grid" v-show="showMethod === 'grid'">
                            <app-good-item-grid :class="'mw190px'" v-for="goodCards in gridV" :key="goodCards.id">
                                <template v-slot:image>
                                    <img :src="goodCards.src" alt="изображение товара" style="width: 160px; height: 160px">
                                </template>
                                <template v-slot:goodName>{{ goodCards.name }}</template>
                                <template v-slot:goodsCategory>Масла</template>
                                <template v-slot:discountTag>
                                    <div style="height: 28px!important">
                                        <app-discount-tag
                                                :class="'discount-tag_azalea Body-16-White'" style="display: flex; padding: 3px 13px">
                                            <img src="/icons/percent.svg" alt="">
                                        </app-discount-tag>
                                    </div>
                                </template>
                                <template v-slot:price><h2 class="h1" style="text-align: center">102 360 ₽</h2></template>
                                <template v-slot:priceButton>
                                    <app-price-button-grey-small @click.stop=""
                                        >В корзину</app-price-button-grey-small></template>
                            </app-good-item-grid>

                        </div>
                        <div class="goods-list" v-show="showMethod === 'list'">
                            <app-good-item-list v-for="goodCards in gridV" :key="goodCards.id">
                                <template v-slot:image>
                                    <img :src="goodCards.src" alt="" class="def-img" style="width: 255px; height: 255px">
                                </template>
                                <template v-slot:oldPrice>102 790 ₽</template>
                                <template v-slot:goodName>{{ goodCards.name }}</template>
                                <template v-slot:specLists>
                                    <ul class="Body-14 good-item-list__short-spec">
                                        <li>• полусинтетическое моторное масло</li>
                                        <li>• объем упаковки 4 л</li>
                                        <li>• класс вязкости 10W-40</li>
                                        <li>• класс API — SG</li>
                                    </ul>
                                    <ul class="Body-14 good-item-list__short-spec">
                                        <li>• полусинтетическое моторное масло</li>
                                        <li>• объем упаковки 4 л</li>
                                        <li>• класс вязкости 10W-40</li>
                                        <li>• класс API — SG</li>
                                    </ul>
                                </template>
                                <template v-slot:price>
                                    <h2 class="h1" style="line-height: 1; margin-right: 16px">101 950 ₽</h2>
                                </template>
                                <template v-slot:discountTags>
                                    <app-discount-tag :class="'discount-tag_azalea'">−5%</app-discount-tag>
                                    <app-discount-tag :class="'discount-tag_glory'">+Подарок</app-discount-tag>
                                </template>
                                <template v-slot:PriceButton>
                                    <app-price-button-grey-big>Добавить в корзину</app-price-button-grey-big>
                                </template>
                            </app-good-item-list>
                        </div>
                        <p class="Tag-16-60 mt60px text-center">Просмотрено 20 товаров из 17 540</p>
                        <app-show-more-button :class="'width100 show-more-btn_blue-btn mt20px'">Показать еще</app-show-more-button>
                    </div>
                    <article class="story mt80px">
                        <h2 class="h1">История просмотра</h2>
                        <div class="story__container d-flex container">
                            <app-good-item-grid :class="'mw190px'" v-for="goodItem in viewStory" :key="goodItem.id">
                                <template v-slot:image>
                                    <img :src="goodItem.src" alt="изображение товара" style="width: 160px; height: 160px">
                                </template>
                                <template v-slot:goodName>{{ goodItem.name }}</template>
                                <template v-slot:goodsCategory>Масла</template>
                                <template v-slot:discountTag>
                                    <div style="height: 28px!important">
                                        <app-discount-tag
                                                :class="'discount-tag_azalea Body-16-White'" style="display: flex; padding: 3px 13px">
                                            <img src="/icons/percent.svg" alt="">
                                        </app-discount-tag>
                                    </div>
                                </template>
                                <template v-slot:price>
                                    <p class="h1" style="text-align: center">102 360 ₽</p>
                                </template>
                                <template v-slot:priceButton>
                                    <app-price-button-grey-small>В корзину</app-price-button-grey-small>
                                </template>
                            </app-good-item-grid>

                        </div>
                    </article>
                </div>
            </div>
        </main>

    </div>
</template>

<script>
    import HeaderNoSearch from '~/components/global/HeaderNoSearch'
    import MiniSearch from '~/components/global/MiniSearch'
    import GoodItemGrid from '~/components/global/GoodItemGrid'
    import Footer from '~/components/global/Footer'
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
    import GoodItemList from "~/components/global/GoodItemList"
    import PriceButtonGreyBig from "~/components/global/PriceButtonGreyBig"
    import Range from "~/components/global/Range"
    import Hint from "~/components/global/Hint"

    export default {
        name: "catalog",
        components: {
            appHeaderNoSearch: HeaderNoSearch,
            appMiniSearch: MiniSearch,
            appGoodItemGrid: GoodItemGrid,
            appFooter: Footer,
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
            appGoodItemList: GoodItemList,
            appPriceButtonGreyBig: PriceButtonGreyBig,
            appRange: Range,
            appHint: Hint
        },
        data() {
            return {
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
                showMethod: 'grid',
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
                viewStory: [
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
                    }
                ]
            }
        },
        methods: {

        }
    }
</script>

<style scoped>
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


    .range-input-title {

    }

    .range-input-container {
        align-items: flex-end;
        justify-content: space-between;
    }
</style>