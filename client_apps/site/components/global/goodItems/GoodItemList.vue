<template>
    <div @click.prevent.once="addToViewStory()">
        <nuxt-link :to="'/mvp/product-page/'+product.id" class="good-item-list">
            <div class="good-item-list__slider-container">
                <img v-for="item in product.images.slice(0,1)" :key="item.id"
                     :src="'https://lapi.planetavto.ru' + item.url" alt="картинка"
                     class="good-item-list__slider-image">
                <img v-if="product.images.length == 0" src="/images/goods/default.svg" alt="картинка"
                     class="good-item-list__slider-image default-slide">
            </div>
            <div class="good-item-list__description">
                <p class="h3 good-item-list__name">
                    {{ product.name }}
                </p>
                <div class="d-flex justify-content-between mt10px">
                    <ul class="specs" v-if="product.shortListProperties">
                        <li class="specs__item Body-14" v-for="property in product.shortListProperties"
                            :key="property.id">{{ property.property }}
                        </li>
                    </ul>
                    <p v-if="!product.shortListProperties" class="specs__item-default-excuse Body-14">Характеристики ещё не заполнены.
                        Каждый день мы добавляем новые данные и описание товаров в наш каталог.</p>
                    <ul v-if="product.availableStoresId.length" class="specs">
                        <li class="d-flex align-items-center">
                            <img src="/images/icons/good-item-list/self-get.svg" alt="самовывоз иконка">
                            <span class="Body-14">Самовывоз — Бесплатно</span>
                        </li>
                        <li>
                            <div class="d-flex align-items-center">
                                <img src="/images/icons/good-item-list/delivery.svg" alt="доставка иконка">
                                <span class="Body-14">Доставка — от 300 ₽</span>
                            </div>
                            <p class="Body-14" style="color: var(--asphalt); margin-left: 23px">11 мая или позднее</p>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="/images/icons/good-item-list/available.svg" alt="где в наличии иконка">
                            <span v-if="product.availableStoresId.length" @click.prevent.stop="showAvailableShops"
                                  class="Body-14">В наличии в {{ product.availableStoresId.length }} магазин<app-ending-count-in-stores
                                    :nums="product.availableStoresId.length"/></span>
                        </li>
                    </ul>
                </div>
                <p v-if="product.shortListProperties" class="no-border Body-14-Prime good-item-list__more-info-link">Все характеристики</p>
                <div class="discounts">
                    <span class="Old-price strike-text"
                          v-if="product.oldPrice">{{ product.oldPriceValue }} &#x20bd;</span>
                    <span class="Price mr15px">{{ product.price }} &#x20bd;</span>
                    <span v-if="product.discount" class="discount__banner discount__banner_red Body-16-White">−{{product.discountPercent}}%</span>
                    <span v-if="product.gift"
                          class="discount__banner discount__banner_blue Body-16-White">+Подарок</span>
                </div>
                <div class="mt10px" v-if="product.availableStoresId.length">
                    <button v-if="!showGoToCartLink" @click.prevent="addToCart" class="add-to-cart-button grey-border">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                            <defs>
                                <path id="addToCart" d="M5.999 19a2 2 0 1 0 4 0 2 2 0 0 0-4 0zM16 19a2 2 0 1 0 3.999.001 2 2 0 0 0-3.999 0zm-6.453-4.728l11.068-3.162A.563.563 0 0 0 21 10.6V5.1H6.9V3.4a.4.4 0 0 0-.4-.4H3.4a.4.4 0 0 0-.4.4V5h1.943l1.968 9.056L7.1 15v1.5c0 .22.18.4.4.4h13.1a.4.4 0 0 0 .4-.4V15H9.752c-1.15 0-1.174-.45-.205-.728z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z"/>
                                <mask id="addToCartMask" fill="#fff">
                                    <use xlink:href="#addToCart"/>
                                </mask>
                                <g class="change-fill" fill="#000000" mask="url(#addToCartMask)">
                                    <path d="M0 0h24v24H0z"/>
                                </g>
                            </g>
                        </svg>

                        <span class="H2-Bold">
                            Добавить в корзину</span>
                    </button>
                    <nuxt-link v-if="showGoToCartLink" to="/mvp/cart" class="go-to-cart-link H2-Bold-white grey-border">
                        В корзине
                        <slot/>
                        <p class="go-to-cart-link__hint Tag-60-White">Перейти</p>
                    </nuxt-link>
                </div>
                <span class="mt10px H2-Bold add-to-cart-button disable-add-to-cart grey-border" v-else>Нет в наличии</span>

            </div>
        </nuxt-link>
    </div>
</template>

<script>
    import DiscountTag from '~/components/global/DiscountTag'
    import PriceButton from '~/components/global/PriceButton'
    import EndingCountInStores from '../endings/EndingCountInStores'
    import {eventBus} from '~/plugins/eventbus'

    export default {
        name: "GoodItemList",
        props: {
            product: {}
        },
        data() {
            return {
                showGoToCartLink: false
            }
        },
        components: {
            appDiscountTag: DiscountTag,
            appPriceButton: PriceButton,
            appEndingCountInStores: EndingCountInStores
        },
        methods: {
            addToViewStory() {
                this.$store.commit('cart/addToViewStory', this.product);
                console.log('added to viewStory', this.product)
            },
            addToCart() {
                this.$store.commit('cart/addToCart', this.product);
                this.showGoToCartLink = true
            },
            showAvailableShops() {
                this.$store.commit('storeList/setAvailableStores', this.product.availableStoresId);
                this.$store.commit('storeList/setwhatProduct', this.product);
                this.$axios.$get(`https://lapi.planetavto.ru/api/v1/products/${this.product.id}/stores`)
                    .then((res) => this.$store.commit('storeList/setProd', res))
                this.showMapWithStores = true
                eventBus.$emit('show', this.showMapWithStores)
            }
        }
    }
</script>

<style scoped>
    .specs__item-default-excuse {
        max-width: 265px;
    }
    .default-slide {
        opacity: 0.7;
        width: 100%;
        height: 100%;
        background-color: var(--snow);
    }

    .good-item-list {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        max-width: 825px;
        padding: 15px;
        -webkit-transition: all var(--animation);
        -o-transition: all var(--animation);
        transition: all var(--animation);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        text-decoration: none;
    }

    .good-item-list:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .good-item-list:hover .price-button {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .good-item-list__slider-container {
        width: 255px;
        height: 255px;
        background-color: var(--snow);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .good-item-list__description {
        margin-left: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .def-img {
        width: 255px;
        height: 255px;
    }

    .good-item-list__short-spec {
        padding-left: 0;
    }

    .good-item-list__short-spec > li {
        list-style-type: none;
    }

    .good-item-list__name {
        color: var(--just_black);
    }

    .good-item-list__more-info-link {
        text-decoration: none;
        background-color: transparent;
        max-width: 160px;
        -ms-text-align-last: left;
        text-align-last: left;
        padding-left: 0;
    }

    .discounts {
        margin-top: 5px;
        display: flex;
        align-items: center;
    }

    .prices {
        margin-top: 3px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .Old-price {
        margin-right: 15px;
    }

    .specs {
        text-decoration: none;
    }

    .specs__item {
        position: relative;
        padding-left: 7px;
    }

    .specs__item::before {
        position: absolute;
        left: 0;
        top: 2px;
        content: '•';
    }

    .good-item-list__slider-image {
        width: 255px;
        height: 255px;
    }

    .specs:last-child {
        margin-left: 10px;
    }

    .discount__banner {
        border-radius: 6px;
        padding: 2px 15px 4px 15px;
        margin-right: 2px;
    }


    .discount__banner_red {
        background-color: var(--azalea);
    }

    .discount__banner_blue {
        background-color: var(--glory);
    }

    .add-to-cart-button {
        display: flex;
        align-items: center;
        border: none;
        padding: 8px 21px 10px 21px;
        background-color: var(--snow);
        border-radius: 6px;
        box-shadow: var(--shadow0);
        cursor: pointer;
    }

    .add-to-cart-button svg {
        /*margin-top: 5px;*/
        margin-right: 5px;
    }

    .add-to-cart-button:hover {
        box-shadow: var(--shadow-6-prime);
        background-color: var(--blueberry);
    }

    .add-to-cart-button:hover .change-fill {
        fill: #FFFFFF;
    }

    .add-to-cart-button:hover > .H2-Bold {
        color: var(--just_white)
    }

    .go-to-cart-link {
        max-width: 302px;
        display: block;
        text-decoration: none;
        background-color: var(--blueberry);
        text-align: center;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        -webkit-background-origin: border-box;
        background-origin: border-box;
        background-clip: border-box;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear
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

    .disable-add-to-cart {
        max-width: 230px;
    }
    .disable-add-to-cart:hover {
        cursor: default;
        background-color: var(--snow);
        color: var(--just_black);
        box-shadow: none;
    }
</style>