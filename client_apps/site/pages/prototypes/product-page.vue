<template>
    <div id="app">
        <app-hint>
            <template v-slot:hintText>Добавьте товар в корзину. Оформите покупку.</template>
        </app-hint>
        <app-header class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
            <template v-slot:testslot>{{ goodsNumber }}</template>
        </app-header>
        <nav class="navigation">
            <ul class="container navigation__main-menu-list">
                <li>
                    <app-main-menu-button class="no-border no-shadow" pathForPage="/prototypes/catalog-upper-lvl">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-all-categories.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Все категории</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-parts.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Запчасти</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-tyres.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Шины</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-wheels.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Диски</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-liquid.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Масла и жидкости</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-accu.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Аккумуляторы</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-other.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Прочее</template>
                    </app-main-menu-button></li>

            </ul>
        </nav>
        <div class="bread-crumbs mt10px container">
            <p class="Tag-12">
                <nuxt-link to="/prototypes/" class="Tag-12">Главная</nuxt-link>
                <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/prototypes/catalog" class="Tag-12">Товары со скидкой</nuxt-link>

                </span>
                <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип
                </span>
            </p>
        </div>
        <main class="content">
        <div class="container mt20px">
            <app-item-in-good-page-b>
                <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                <template v-slot:howMany>{{ goodsNumber }}</template>
                <template v-slot:buyButtons>
                    <div class="add-to-cart-buttons" v-if="toCartButtons">
                        <button @click="changeButton" class="big-price-btn big-price-btn_blueberry Price-White">102 360 ₽</button>
                    </div>
                    <div class="add-to-cart-buttons" v-if="!toCartButtons">
                        <app-link-to-cart :class="'big-paddings'"><slot name="howMany"/>{{ goodsNumber }}</app-link-to-cart>
                        <button class="add-more grey-border" @click="addGoods"><img src="/icons/add-more-icon.svg" alt="добавить еще иконка"></button>
                    </div>
                </template>
            </app-item-in-good-page-b>
        </div>
        <article class="container mt100px analogs">
            <header class="analogs__header">
                <h2 class="h1">Аналоги и заменители других производителей</h2>
                <a href="#" class="analogs__all-link Body-18-Prime">Открыть все (132)</a>
            </header>
            <div class="slider-container mt10px">
                <app-good-item-grid :class="'mw190px'" v-for="goodItem in otherGoods" :key="goodItem.id">
                    <template v-slot:image>
                        <img :src="goodItem.src" alt="изображение товара" style="width: 190px; height: 190px">
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
            <article class="detail-info mt90px container">
                <header class="detail-info__header">
                    <a href="#description" class="h1 detail-info__tab detail-info__tab_active">Характеристики и описание</a>
                    <a href="#available" class="h1 detail-info__tab">Наличие</a>
                    <a href="#feedback" class="h1 detail-info__tab">Отзывы</a>
                    <a href="#warranty" class="h1 detail-info__tab">Гарантия</a>
                </header>
                <div class="detail-info__description mt20px" id="description">
                    <h3 class="h3">VAG 030 115 561 AN· Фильтр масляный для двигателя</h3>
                    <p class="Body-18">Шины Blizzak VRX – это лучшее, что Bridgestone создал в линейке нешипованных шин. Представляя собой воплощение самых передовых функций, шины были созданы с использованием различных японских технологий, в том числе, резиновой смеси Multi-Cell Compound. Новый резиновый состав Multi-Cell Compound Bridgestone усовершенствовала эту технологию еще больше, благодаря чему удалось создать новый состав Multi-Cell Compound. Особое гидрофильное покрытие этих пор позволило улучшить абсорбирующие свойства. Новый состав может поглощать больше воды с поверхности льда, что позволяет водителю реализовывать тормозные свойства более уверенно. Новый асимметричный рисунок протектора повышает проходимость в снегу, обеспечивая полный контакт с заснеженными дорогами. Форма блоков протектора в виде стрелы позволяет добиться равномерного зацепления, а перекрестные канавки эффективно захватывают снег.</p>
                </div>
                <div class="container detail-info__params mt20px">
                    <h3 class="h3">Характеристики</h3>
                    <div class="row">
                        <ul class="col-4">
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Тип двигателя</span>
                                <span class="Body-18">Бензиновый</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Внешний диаметр, мм</span>
                                <span class="Body-18">103</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Внутренний диаметр, мм</span>
                                <span class="Body-18">72</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Высота, мм</span>
                                <span class="Body-18">204</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Тип резьбы</span>
                                <span class="Body-18">M26x1.5</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="Body-18">Производитель</span>
                                <span class="Body-18">Корея</span>
                            </li>
                        </ul>
                        <div class="offset-md-1 col-2">
                            <p class="Body-18">Cовместимость</p>
                            <app-select class="mt10px" v-model="brandCompatible">
                                <option value="Skoda" selected>Skoda</option>
                                <option value="Ford">Ford</option>
                                <option value="Mazda">Mazda</option>
                                <option value="Kia">Kia</option>
                            </app-select>
                        </div>
                        <div class="col-2">
                            <ul class="mt40px">
                                <li class="Body-18">Fabia</li>
                                <li class="Body-18">Fabia RS</li>
                                <li class="Body-18">Fabia Combi</li>
                                <li class="Body-18">Rapid</li>
                                <li class="Body-18">Octavia</li>
                                <li class="Body-18">Octavia Combi</li>
                                <li class="Body-18">Octavia RS</li>
                                <li class="Body-18">Octavia Combi RS</li>
                                <li class="Body-18">RS</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="detail-info__complectation mt20px">
                    <h3 class="h3">Комплектация</h3>
                    <p class="Body-18">Шина Bridgestone Blizzak VRX 185/65 R15 88S, зимняя, 1шт.</p>
                </div>
                <div id="available" class="detail-info__available mt20px">
                    <h3 class="h3">Наличие в магазинах (Всего 209)</h3>
                    <ul>
                        <li class="Body-18">Берёзовский, Берёзовский тракт, 2  — 12 штук</li>
                        <li class="Body-18">Екатеринбург, Комсомольская, 5      — 97 штук</li>
                        <li class="Body-18">Екатеринбург, Сибирский тракт, 21  — 105 штук</li>
                    </ul>
                </div>
                    <div id="feedback" class="detail-info__feedback mt20px">
                        <h3 class="h3">Отзывы (12)</h3>
                        <div class="detail-info__feedback-item">
                            <p class="Placeholder">Александр Ф. (30 февраля 2019)</p>
                            <div class="feedback-item-description">
                            <div class="stars">
                                <img src="/icons/star_yellow.svg" alt="">
                                <img src="/icons/star_yellow.svg" alt="">
                                <img src="/icons/star_yellow.svg" alt="">
                                <img src="/icons/star_yellow.svg" alt="">
                                <img src="/icons/star_empty.svg" alt="">
                            </div>
                            <p class="Body-18">Отличные ездовые качества, крепко сидят шипы, мягкая, хорошо едет не только по с…</p>
                                <button class="read-full-feedback Body-18-Prime">Прочитать отзыв</button>
                            </div>
                        </div>
                        <div class="detail-info__feedback-item">
                            <p class="Placeholder">Николай Р. (12 мая 2018)</p>
                            <div class="feedback-item-description">
                                <div class="stars">
                                    <img src="/icons/star_yellow.svg" alt="">
                                    <img src="/icons/star_yellow.svg" alt="">
                                    <img src="/icons/star_yellow.svg" alt="">
                                    <img src="/icons/star_yellow.svg" alt="">
                                    <img src="/icons/star_empty.svg" alt="">
                                </div>
                                <p class="Body-18">Отличные ездовые качества, крепко сидят шипы, мягкая, хорошо едет не только по с…</p>
                                <button class="read-full-feedback Body-18-Prime">Прочитать отзыв</button>
                            </div>
                        </div>
                        <div class="container">
                        <div class="row mt20px">
                                <app-show-more-button class="col-4" :class="'show-more-btn_blue-btn'">Показать все отзывы</app-show-more-button>
                        </div>
                        </div>
                    </div>
                <div id="warranty" class="detail-info__warranty mt40px">
                    <h2 class="h3">Гарантия</h2>
                    <p class="Body-18">Все товары, реализуемые интернет-магазином, являются абсолютно новыми и имеютсрок гарантийного обслуживания в сервисных центрах производителей или в сервисных центрах «VIANOR» и «Планета АВТО»</p>

                </div>
            </article>
            <article class="satellite-goods mt100px container">
                <h2 class="h1">Сопутствующие товары для ТО</h2>
                <div class="slider-container">
                    <app-good-item-grid :class="'mw190px'" v-for="goodItem in otherGoods" :key="goodItem.id">
                        <template v-slot:image>
                            <img :src="goodItem.src" alt="изображение товара" style="width: 190px; height: 190px">
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
            <article class="views-story mt100px container">
                <h2 class="h1">История просмотра</h2>
                <div class="slider-container">
                    <app-good-item-grid :class="'mw190px'" v-for="goodItem in otherGoods" :key="goodItem.id">
                        <template v-slot:image>
                            <img :src="goodItem.src" alt="изображение товара" style="width: 190px; height: 190px">
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
        </main>

    </div>
</template>

<script>
    import Header from '~/components/global/Header'
    import MainMenuButton from '~/components/global/MainMenuButton'
    import ItemInGoodPageB from '~/components/global/ItemInGoodPageB'
    import GoodItemGrid from '~/components/global/GoodItemGrid'
    import ShowMoreButton from '~/components/global/ShowMoreButton'
    import Footer from '~/components/global/Footer'
    import ContactLists from '~/components/global/ContactLists'
    import PriceButtonGreySmall from '~/components/global/PriceButtonGreySmall'
    import DiscountTag from '~/components/global/DiscountTag'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import PriceButton from '~/components/global/PriceButton'
    import Select from '~/components/global/Select'
    import LinkToCart from '~/components/global/LinkToCart'
    import Hint from '~/components/global/Hint'

    export default {
        name: "product-page",
        components: {
            appHeader: Header,
            appMainMenuButton: MainMenuButton,
            appItemInGoodPageB: ItemInGoodPageB,
            appGoodItemGrid: GoodItemGrid,
            appShowMoreButton: ShowMoreButton,
            appFooter: Footer,
            appContactLists: ContactLists,
            appPriceButtonGreySmall: PriceButtonGreySmall,
            appDiscountTag: DiscountTag,
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appPriceButton: PriceButton,
            appSelect: Select,
            appLinkToCart: LinkToCart,
            appHint: Hint
        },
        data() {
            return {
                brandCompatible: 'Skoda',
                goodsNumber: '',
                num: 0,
                toCartButtons: true,
                otherGoods: [
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
            addGoods() {
                this.num += 1;
                this.goodsNumber = `${this.num} шт`
            },
            changeButton() {
                this.toCartButtons = !this.toCartButtons
                this.num += 1;
                this.goodsNumber = `${this.num} шт`
            }
        }
    }

</script>

<style scoped>
    .navigation {
        margin-top: 16px;
    }

    .navigation__main-menu-list {
        display: flex;
        justify-content: space-between;
    }

    .analogs__header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
    }
    .analogs__all-link {
        text-decoration: none;
    }
    .analogs__all-link:hover {
        text-decoration: underline;
    }



    .detail-info__header {
        display: flex;
        justify-content: space-between;
    }

    .detail-info__tab {
        text-decoration: none;
        color: var(--blueberry);
        opacity: 0.6;
        transition: all var(--animation);
    }

    .detail-info__tab:hover {
        text-decoration: none;
        color: var(--just_black);
    }



    .detail-info__tab_active {
        color: var(--just_black);
        opacity: 1;
    }

    .detail-info__params {
        padding-left: 0!important;
        padding-right: 0!important;
    }
    .read-full-feedback {
        background-color: transparent;
        border: none;
        flex: 1;
        text-align: right;
    }
    .feedback-item-description {
        display: flex;
    }

    .detail-info__feedback-item:not(:first-child) {
        margin-top: 20px;
    }
</style>