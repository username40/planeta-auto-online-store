<template>
    <div>
        <app-header/>
        <app-list-to-categories-links/>
        <div class="bread-crumbs mt130px container">
            <p class="Tag-12">
                <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/catalog" class="Tag-12">Шины и диски</nuxt-link>
                </span>
                <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/catalog" class="Tag-12">Шины</nuxt-link>
                </span>
                <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/catalog" class="Tag-12">Легковые шины</nuxt-link>
                </span>
                <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        {{ product.name }}
                </span>
            </p>
        </div>
        <h1 class="h1 container mt20px">{{ product.name }}</h1>
        <div class="container">
            <div class="item-in-good-page">
                <h2 class="h1 item-in-good-page__title"><slot name="goodName"/></h2>
                <div class="item-in-good-page__properties">
                    <p class="Body-16 vendor-code">Артикул: {{ product.article }}</p>
                    <span class="discount-tag discount-tag_glory">Экстра Бонус</span>
                    <span class="discount-tag discount-tag_glory discount-tag_lemon discount-tag_text-color-blue">Сезонный товар</span>
                    <div class="good-item-list-small__description-actions">
                        <div class="reviews">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_empty.svg" alt="отметка звезда">
                            <p class="Body-16-Prime count-reviews"><span>23</span> отзыва</p>
                        </div>
                        <div class="action-btns">
                            <button class="Body-16-Prime header__action-button">
                                <img src="/icons/compare-btn.svg" alt="сравнить кнопка" class="header-action-button__icon">
                                Сравнить
                            </button>
                            <button class="Body-16-Prime header__action-button">
                                <img src="/icons/add-to-favorites-btn.svg" alt="добавить в избранное кнопка" class="header-action-button__icon">
                                В избранное
                            </button>
                            <button class="Body-16-Prime header__action-button">
                                <img src="/icons/share-btn.svg" alt="сравнить кнопка" class="header-action-button__icon">
                                Поделиться
                            </button>
                        </div>
                    </div>

                </div>
                <div class="item-in-good-page__content">
                    <div class="item-in-good-page__image-slider" v-if="product.images.length > 0">

                        <img v-for="item in product.images.slice(0,1)" :key="item.id" :src="'https://lapi.planetavto.ru' + item.url" alt="изображение товара большое" class="big-image" id="bigImage">
                        <img
                                @click="showSmallImageInBig"
                                v-for="item in product.images"
                                :key="item.id"
                                :src="'https://lapi.planetavto.ru' + item.url"
                                alt="изображение товара маленькое"
                                class="small-image">
                    </div>
                    <div v-if="product.images.length == 0" class="default-slider-container">
                        <img src="/images/goods/default.svg" alt="картинка" class="big-image default-slide">
                    </div>
                    <div class="content-overlay">
                        <div class="item-in-good-page__order-conditions grey-border">
                            <div class="left-column">
                                <div class="add-to-cart-buttons" v-if="toCartButtons">
                                    <button v-if="product.price" @click.once="changeButton" class="big-price-btn big-price-btn_blueberry Price-White">{{ product.price }} ₽</button>
                                    <p v-if="!product.price" class="Price grey-border no-goods">Нет в наличии</p>
                                </div>
                                <div class="add-to-cart-buttons" v-if="!toCartButtons">
                                    <nuxt-link to="/mvp/cart/" class="go-to-cart-link H2-Bold-white grey-border big-paddings">В корзине {{ goodsNumber }} шт</nuxt-link>
                                    <button class="add-more grey-border" @click="addGoods"><img src="/icons/add-more-icon.svg" alt="добавить еще иконка"></button>
                                </div>
                                <p v-if="product.price" class="Body-16 added-bonus">+<span>2000</span> Бонусов будет зачислено</p>
                            </div>
                            <div class="right-column" v-if="countItemsInAllStores">
                                <div class="item-in-good-page__order-conditions-row">
                                    <p class="Body-14 item-in-good-page__order-conditions-description">
                                        <img src="/icons/available.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                        В наличии в {{product.availableStoresId.length}} магазин<app-ending-count-in-stores :nums="product.availableStoresId.length"/>
                                    </p>
                                </div>
                                <div class="item-in-good-page__order-conditions-row">
                                    <p class="Body-14 item-in-good-page__order-conditions-description">
                                        <img src="/icons/pickup.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                        Самовывоз — Бесплатно
                                    </p>
                                    <p class="Body-14 conditions-description__date">С <span>12</span> по <span>17</span> <span>мая</span></p>
                                </div>
                                <div class="item-in-good-page__order-conditions-row">
                                    <p class="Body-14 item-in-good-page__order-conditions-description">
                                        <img src="/icons/delivery.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                        Доставка — от 300 ₽
                                    </p>
                                    <p class="Body-14 conditions-description__date">С <span>11</span> <span>мая</span>, или в другой день</p>
                                </div>
                            </div>
                        </div>
                        <div class="consumer-properties">
                            <div class="consumer-properties__about">
                                <h3 class="h3 consumer-properties__title">О товаре</h3>
                                <table class="consumer-properties__table">
                                    <tbody>
                                    <tr>
                                        <td class="Body-14">Тип авто</td>
                                        <td class="Body-14">Внедорожник</td>
                                    </tr>
                                    <tr>
                                        <td class="Body-14">Монтаж</td>
                                        <td class="Body-14">Безкамерный</td>
                                    </tr>
                                    <tr>
                                        <td class="Body-14">Индекс нагрузки</td>
                                        <td class="Body-14">775 кг</td>
                                    </tr>
                                    <tr>
                                        <td class="Body-14">Индекс скрости</td>
                                        <td class="Body-14">до 190 км\ч</td>
                                    </tr>
                                    <tr>
                                        <td class="Body-14">Название</td>
                                        <td class="Body-14">Hakkapeliitta 7 SUV</td>
                                    </tr>
                                    <tr>
                                        <td class="Body-14">Страна производства</td>
                                        <td class="Body-14">Корея</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="consumer-properties__show-more-link">Все товары Bridgestone</a>
                            </div>
                            <div class="consumer-properties__compatibility">
                                <h3 class="h3 consumer-properties__title">Совместимость</h3>
                                <ul class="compatibility-list">
                                    <li class="Body-14">Skoda Fabia</li>
                                    <li class="Body-14">Skoda Fabia Combi</li>
                                    <li class="Body-14">Skoda Rapid</li>
                                    <li class="Body-14">Volkswagen Polo</li>
                                    <li class="Body-14">Volkswagen Caddy</li>
                                    <li class="Body-14 more-compatibility-list">Ещё <span>16</span> моделей</li>
                                </ul>
                                <a href="#" class="consumer-properties__show-more-link">Перейти к описанию характеристик</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt100px container d-flex justify-content-between">
            <h2 class="h1">Аналоги и заменители других производителей</h2>
            <nuxt-link to="/" class="Body-17-Prime d-flex align-items-center show-all-link">
                <img src="/images/icons/show-all.svg" alt="показать все иконка">
                Открыть все (132)
            </nuxt-link>
        </div>
        <app-slider-with-goods :id="'analogs'">
            <div class="swiper-slide" v-for="product in products" :key="product.id">
                <app-good-item-grid-small :product="product"/>
            </div>
        </app-slider-with-goods>
        <article class="detail-info mt90px container">
            <div id="available" class="detail-info__available mt20px">
                <h1 class="h1">Наличие</h1>
                <h3 class="h3 mt20px">Всего {{countItemsInAllStores}} штук<app-ending-count-in-stock :nums="countItems"/> в {{product.availableStoresId.length}} магазин<app-ending-count-in-stores :nums="product.availableStoresId.length"/></h3>
                <ul>
                    <li class="Body-18" v-for="storeItem in getstoresOfProduct">
                        <p v-if="storeItem.pivot">{{ storeItem.name }} — {{ storeItem.pivot.quantity }} штук<app-ending-count-in-stock :nums="storeItem.pivot.quantity"/></p>
                    </li>
                </ul>
            </div>
            <h1 class="h1 mt60px">Характеристики и описание</h1>
            <div class="detail-info__description mt20px" id="description">
                <h3 class="h3">{{ product.name }}</h3>
                <p class="Body-18">{{ product.description }}</p>
            </div>
            <div class="detail-info__params mt20px">

                <h3 class="h3">Характеристики</h3>
                <div class="row">
                    <ul class="col-4">
                        <li class="d-flex justify-content-between" v-for="item in product.properties">
                            <span class="Body-18">{{ item.name }}</span>
                            <span class="Body-18">{{ item.value }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="detail-info__complectation mt20px">
                <h3 class="h3">Комплектация</h3>
                <p class="Body-18">Шина Bridgestone Blizzak VRX 185/65 R15 88S, зимняя, 1шт.</p>
            </div>

            <div id="warranty" class="detail-info__warranty mt20px">
                <h2 class="h3">Гарантия</h2>
                <p class="Body-18">Все товары, реализуемые интернет-магазином, являются абсолютно новыми и имеютсрок гарантийного обслуживания в сервисных центрах производителей или в сервисных центрах «VIANOR» и «Планета АВТО»</p>

            </div>
        </article>
        <article class="container mt100px">
            <h2 class="h1">Сопутствующие товары</h2>
        <app-slider-with-goods :id="'satelliteGoods'">
            <div class="swiper-slide" v-for="product in products" :key="product.id">
                <app-good-item-grid-small :product="product"/>
            </div>
        </app-slider-with-goods>
        </article>
        <app-slider-view-story class="mt100px"/>
    </div>
</template>


<script>
    import Header from '~/components/global/headers/Header'
    import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
    import ItemInGoodPage from '~/components/global/goodItems/ItemInGoodPage'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import SliderViewStory from '~/components/global/sliders/SliderViewStory'
    import Multiselect from 'vue-multiselect'
    import EndingCountInStock from "~/components/global/endings/EndingCountInStock";
    import EndingCountInStores from "~/components/global/endings/EndingCountInStores";

    export default {
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appItemInGoodPage: ItemInGoodPage,
            appSliderWithGoods: SliderWithGoods,
            appGoodItemGridSmall: GoodItemGridSmall,
            appSliderViewStory: SliderViewStory,
            appEndingCountInStock: EndingCountInStock,
            appEndingCountInStores: EndingCountInStores,
            Multiselect
        },
        validate({params}) {
            return /^\d+$/.test(params.id)
        },
        async asyncData({params, error, store}) {
            try {
                const product = await store.dispatch('products/fetchProductById', params.id)
                return {product}
            } catch (e) {
                error(e)
            }
        },
        data(){
            return {
                toCartButtons: true,
                num: null,
                goodsNumber: null,
                compatibleBrand: null,
                countItems: 0,
                src: ""
            }
        },
        methods: {
            addGoods() {
                this.num += 1;
                this.goodsNumber = `${this.num}`
                this.$store.commit('cart/addToCart', this.product);
            },
            changeButton() {
                this.toCartButtons = !this.toCartButtons
                this.num += 1;
                this.goodsNumber = `${this.num}`
                this.$store.commit('cart/addToCart', this.product);
            },
            showSmallImageInBig(img) {
                this.src = img.target.src;
                let getDoc = document.getElementById('bigImage')
                getDoc.src = this.src
            }

        },
        computed: {
            countItemsInAllStores(){
                this.countItems = 0
                for (let item in this.getstoresOfProduct) {
                    if (this.getstoresOfProduct[item].pivot) {
                        this.countItems += this.getstoresOfProduct[item].pivot.quantity
                    }
                }
                return this.countItems

            },
            stores() {
                try {
                    return this.$store.getters['storeList/storeList']
                } catch (e) {
                    console.log(error(e))
                }
            },
            availableStoreList() {
                try{
                    return this.$store.getters['storeList/availableStoreList']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getMyStores() {
                try {
                    return this.$store.getters['storeList/getMyStores']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getstoresOfProduct() {
                try {

                    return this.$store.getters['storeList/getstoresOfProduct']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getWhatProduct() {
                try {
                    return this.$store.getters['storeList/getWhatProduct']
                } catch (e) {
                    console.log(error(e))
                }
            },

            carSelect() {
                try {
                    return this.$store.getters['carSelect/CarBrand']
                } catch(e) {
                    console.log('error')
                    error(e)
                }
            },
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']
                } catch(e) {
                    console.log('error')
                    error(e)
                }
            },
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
        },
        created() {
            this.$store.commit('storeList/setAvailableStores', this.product.availableStoresId);
            this.$store.commit('storeList/setwhatProduct', this.product);
            this.$axios.$get(`https://lapi.planetavto.ru/api/v1/products/${this.product.id}/stores`)
                .then((res) => this.$store.commit('storeList/setProd', res))
        }
    }
</script>

<style scoped>
    .default-slider-container {
        background-color: var(--snow);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0.6;
    }
    .no-goods {
        border-radius: 6px;
        background-color: var(--snow);
        padding: 8px 21px 10px 21px;
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

    .read-full-feedback {
        flex: 1;
        text-align: right;
        background-color: transparent;
    }

    .show-more-btn {
        background-color: var(--just_white);
        padding-top: 12px;
        padding-bottom: 14px;
        text-align: center;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        border-style: solid;
        border-width: 0.5px;
        -webkit-background-origin: border-box;
        background-origin: border-box;
        background-clip: border-box;
        text-align: center;
        color: var(--blueberry);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: var(--animation);
        padding-left: 16px;
        padding-right: 16px;
        cursor: pointer;
    }

    .show-more-btn:hover {
        background-color: var(--blueberry_lite);
        color: var(--just_white);
    }

    .show-more-btn:active {
        background-color: var(--blueberry_deep);
        color: var(--just_white);
        box-shadow: none;
    }

    .show-more-btn_blue-btn {
        background-color: var(--blueberry);
        color: var(--just_white);
        transition: all var(--animation);

    }

    .show-more-btn_blue-btn:hover {
        background-color: var(--just_white);
        color: var(--blueberry);
    }


    .show-all-link {
        text-decoration: none;
    }
    .go-to-cart-link {
        max-width: 302px;
        display: block;
        text-decoration: none;
        background-color: var(--blueberry);
        text-align: center;
        -webkit-border-radius: 6px;
        border-radius: 6px;
    }
    .go-to-cart-link__hint {
        margin: 0;
        text-align: center;
    }

    .go-to-cart-link:hover {
        background-color: var(--blueberry_lite);
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .go-to-cart-link:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }

    .big-paddings {
        padding-top: 9px;
        padding-bottom: 15px;
    }

    .header__action-button {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        cursor: pointer;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        background-color: var(--just_white);
        border: none;
        padding-top: 1px;
        padding-bottom: 1px;
        padding-left: 5px;
        padding-right: 5px;
    }
    .header-action-button__icon {
        width: 24px;
        height: 24px;
        margin-right: 4px;
    }
    .good-item-list-small__description-actions {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .reviews {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .count-reviews {
        margin-left: 4px;
    }

    .action-btns {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-left: 35px;
    }

    .header__action-button:not(:first-child) {
        margin-left: 10px;
    }
    .discount-tag {
        padding-left: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
        padding-right: 10px;
        text-align: center;
        color: var(--just_white);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        float: left;
        position: relative;
        z-index: 10;
        display: flex;
        align-items: center;
        height: 100%;
    }
    .discount-tag_azalea {
        background-color: var(--azalea);
    }

    .discount-tag_glory {
        background-color: var(--glory);
    }

    .discount-tag_violet {
        background-color: var(--violet);
    }

    .discount-tag_lemon {
        background-color: var(--lemon);
        color: #512794;
    }

    .discount-tag_text-color-blue {
        color: #512794;
    }

    .big-price-btn {
        cursor: pointer;
        height: 70px;
        padding-left: 26px;
        padding-right: 26px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: none;
        width: 100%;
    }

    .big-price-btn:hover {
        box-shadow: 0 1px 5px 0 var(--blueberry-20), 0 3px 1px -2px var(--blueberry-12), 0 2px 2px 0 var(--blueberry-14);
    }



    .big-price-btn_blueberry {
        color: var(--just_white);
        background-color: var(--blueberry);
    }


    .left-column {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .item-in-good-page {
        max-width: 1110px;
        padding-bottom: 65px;
    }
    .item-in-good-page__title {
        display: block;
    }

    .item-in-good-page__properties {
        margin-top: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .discount-tag {
        margin-left: 2px;
        margin-right: 2px;
    }

    .vendor-code {
        margin-right: 20px;
    }

    .good-item-list-small__description-actions {
        margin-left: 20px;
    }

    .item-in-good-page__image-slider {
        padding-left: 15px;
        padding-right: 15px;
        width: 430px;
        height: 430px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .big-image {
        display: block;
        width: 445px;
        height: 445px;
    }

    .item-in-good-page__content {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 14px;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .item-in-good-page__order-conditions {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding-top: 30px;
        padding-left: 15px;
        padding-right: 28px;
        padding-bottom: 28px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        margin-right: 11px;
    }

    .content-overlay {
        max-width: 635px;
    }

    .added-bonus {
        margin-top: 4px;
        color: #918dae;
        text-align: center;
    }

    .right-column {
        margin-left: 30px;
    }

    .order-condition-icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .item-in-good-page__order-conditions-description {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 4px;
    }

    .conditions-description__date {
        margin-left: 28px;
        color: var(--asphalt);
    }

    .consumer-properties {
        margin-top: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .consumer-properties__about, .consumer-properties__compatibility {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .consumer-properties__table  tr {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .consumer-properties__table {
        width: 100%;
    }

    .consumer-properties__about {
        padding-right: 15px;
    }

    .consumer-properties__compatibility {
        padding-left: 15px;
    }


    .compatibility-list > li:last-child {
        color: var(--blueberry);
        cursor: pointer;
    }

    .consumer-properties__show-more-link {
        margin-top: 16px;
        display: block;
        text-decoration: none;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        color: var(--blueberry);
    }

    .consumer-properties__show-more-link:hover {
        text-decoration: none;
    }

    .add-to-cart-buttons {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .go-to-cart-link {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        width: 280px;
    }
    .add-more {
        cursor: pointer;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        padding: 6px;
        background-color: #fff;
        transition: all var(--animation);
    }

    .add-more:hover {
        box-shadow: 0 1px 5px 0 var(--blueberry-20), 0 3px 1px -2px var(--blueberry-12), 0 2px 2px 0 var(--blueberry-14);
    }

    .add-more > img {
        width: 36px;
        height: 36px;
    }

    .small-image {
        cursor: pointer;
        width: 65px;
        height: 65px;
    }
</style>
