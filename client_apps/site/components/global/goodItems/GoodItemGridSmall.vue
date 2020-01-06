<template>
    <div class="good-item__container" @click.prevent.once="addToViewStory()">
    <nuxt-link
            :to="'/mvp/product-page/'+product.id"
            class="good-item">
        <div class="good-item__slider-container" v-if="product.images">
            <img v-for="item in product.images.slice(0,1)" :key="item.id" :src="'https://lapi.planetavto.ru' + item.url" alt="картинка"
                 class="good-item__slide">
            <img v-if="product.images.length == 0" src="/images/goods/default.svg" alt="картинка"
                 class="good-item__slide default-slide">
        </div>
        <div class="discount-overlay">
        <div v-if="product.oldPrice" class="good-item__discount-container">
            <app-old-price>{{ product.oldPriceValue }}</app-old-price>
            <app-discount-tag :class="'discount-tag_azalea'">−{{ product.discountPercent }}%</app-discount-tag>
        </div>
        </div>
        <h2 class="Price">{{ product.price }} &#8381;</h2>
        <button v-if="product.availableStoresId.length > 0" class="Body-16 good-item__add-to-cart-button grey-border" @click.prevent="addToCart()">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                <defs>
                    <path id="addToCartGrid" d="M5.999 19a2 2 0 1 0 4 0 2 2 0 0 0-4 0zM16 19a2 2 0 1 0 3.999.001 2 2 0 0 0-3.999 0zm-6.453-4.728l11.068-3.162A.563.563 0 0 0 21 10.6V5.1H6.9V3.4a.4.4 0 0 0-.4-.4H3.4a.4.4 0 0 0-.4.4V5h1.943l1.968 9.056L7.1 15v1.5c0 .22.18.4.4.4h13.1a.4.4 0 0 0 .4-.4V15H9.752c-1.15 0-1.174-.45-.205-.728z"/>
                </defs>
                <g fill="none" fill-rule="evenodd">
                    <path d="M0 0h24v24H0z"/>
                    <mask id="addToCartGridMask" fill="#fff">
                        <use xlink:href="#addToCartGrid"/>
                    </mask>
                    <g class="change-fill" fill="#32377D" mask="url(#addToCartGridMask)">
                        <path d="M0 0h24v24H0z"/>
                    </g>
                </g>
            </svg>
            В корзину</button>
        <p class="good-item__add-to-cart-button disabled-add-to-cart grey-border Body-16" v-else>Нет в наличии</p>
        <h3 class="Body-18 good-item__name">{{ cutProductName }}</h3>
        <p
                class="Tag-14-60 good-item__name small-text"
                @click.prevent.stop="showAvailableShops"
                v-if="product.availableStoresId.length">В наличии в {{ product.availableStoresId.length }} магазин<app-ending-count-in-stores :nums="product.availableStoresId.length"/></p>
        <p class="Tag-14-60 good-item__name small-text" v-else>Под заказ</p>
    </nuxt-link>
    </div>
</template>

<script>
    import OldPrice from '../typography/OldPrice'
    import {eventBus} from '~/plugins/eventbus'
    import DiscountTag from '../discount-tags/DiscountTag'
    import DiscountTagDropDown from '../discount-tags/DiscountTagDropDown'
    import EndingCountInStores from '../endings/EndingCountInStores'

    export default {
        name: "GoodItemGridSmall",
        props: {
            product: {}
        },
        data() {
            return {
                addToCartButtonText: 'В корзину',
                showMapWithStores: false,
                showDropDown: false,
            }
        },
        components: {
            appOldPrice: OldPrice,
            appDiscountTag: DiscountTag,
            appDiscountTagDropDown: DiscountTagDropDown,
            appEndingCountInStores: EndingCountInStores
        },
        methods: {
            addToCart() {
                this.$axios.$get(`https://lapi.planetavto.ru/api/v1/products/${this.product.id}/stores`)
                    .then((res) => this.$store.commit('storeList/setProd', res));
                this.$store.commit('cart/addToCart', this.product);
            },

            addToViewStory() {
                this.$store.commit('cart/addToViewStory', this.product);
            },
            showAvailableShops() {
                this.$store.commit('storeList/setAvailableStores', this.product.availableStoresId);
                this.$store.commit('storeList/setwhatProduct', this.product);
                this.$axios.$get(`https://lapi.planetavto.ru/api/v1/products/${this.product.id}/stores`)
                    .then((res) => this.$store.commit('storeList/setProd', res))
                this.showMapWithStores = true
                eventBus.$emit('show', this.showMapWithStores)
            }
        },
        computed: {
            cutProductName() {
                let nameToArray = this.product.name.split('',45)
                let NameArrayToString = nameToArray.join('') + '...'
                if (NameArrayToString.length > 45) {
                    return NameArrayToString
                } else {
                    return this.product.name
                }

            }
        }

    }
</script>

<style scoped>
    .change-fill {
        fill: #000000
    }
    .default-slide {
        opacity: 0.7;
        width: 100%;
        height: 100%;
        background-color: var(--snow);
    }
    .small-text {
        font-size: 13px;
    }

    .small-text:hover {
        text-decoration: underline;
        text-decoration-style: dashed;
    }
    .discount-overlay {
        height: 24px;
        margin-top: 6px;
    }

    .good-item__container {
        width: 190px;
        border-radius: 6px;
        box-shadow: none;
        transition: box-shadow var(--animation);
    }

    .good-item__container:hover {
        box-shadow: var(--shadow-6-prime);
    }
    .good-item {
        padding: 10px;
        box-sizing: border-box;
        display: block;
        text-decoration: none;
    }

    .good-item__slide {
        width: 160px;
        height: 160px;
    }

    .good-item__discount-container {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }
    .good-item__add-to-cart-button {
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 2px;
        padding-bottom: 4px;
        cursor: pointer;
        background-color: var(--snow);
        color: var(--just_black);
        text-align: center;
        border: none;
        border-radius: 6px;
        width: 100%;
        box-shadow: var(--shadow-0);
    }

    .good-item__add-to-cart-button svg {
        margin-right: 5px;
    }

    .good-item__add-to-cart-button:hover {
        background-color: var(--blueberry_lite);
        color: var(--just_white);
    }

    .good-item__add-to-cart-button:hover .change-fill {
        fill: #FFFFFF;
    }

    .good-item__name {
        margin-top: 2px;
        text-align: left;
    }
    
    .disabled-add-to-cart:hover {
        background-color: var(--snow);
        color: var(--just_black);
        cursor: default;
    }
</style>