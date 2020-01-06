<template>
    <nuxt-link :to="'/mvp/product-page/'+product.id" class="good-item-list-in-cart row align-items-center">
        <button class="delete-button no-border" @click.prevent="removeFromCart()">
            <img src="/images/icons/cart/delete-item.svg" alt="удалить товар иконка" v-if="showDeleteButton">
        </button>
        <img v-for="item in product.images.slice(0,1)" :key="item.id" :src="'https://lapi.planetavto.ru' + item.url" alt="картинка"
             class="col-1 good-item-list-in-cart__image">
        <img v-if="product.images.length === 0" src="/images/goods/default.svg" alt="картинка"
             class="col-1 good-item-list-in-cart__image">
            <h2 class="Body-18 col-5">{{ product.name }}</h2>
        <div class="col-2" v-if="!editQuantity"> <p class="Body-18-Prime quantity-button-group__value ">{{ productQuantity }}</p> </div>
            <div class="col-2 d-flex" v-if="editQuantity">
                    <button class="quantity-button-group__button left-button grey-border" v-if="product.quantity > 1" @click.prevent="minusProduct()" >
                        <img src="/icons/minus.svg" alt="меньше иконка">
                    </button>
                <button class="quantity-button-group__button left-button grey-border" v-if="product.quantity < 2" @click.prevent="minusProduct()" >
                    <img src="/icons/minus.svg" alt="меньше иконка">
                </button>
                    <p class="Body-18-Prime quantity-button-group__value grey-border">{{ product.quantity }}</p>
                    <button class="quantity-button-group__button right-button grey-border" @click.prevent="plusProduct()">
                        <img src="/icons/plus.svg" alt="больше иконка">
                    </button>
            </div>
            <div class="col-2">
                <p class="Body-18 Body-18_lime" v-if="product.inStock > 30">Много</p>
                <p class="Body-18 Body-18_terracota" v-else>Мало</p>
                <p class="Tag-12-60">{{ product.inStock }} шт (23 фев)</p>
            </div>
            <div class="col-2">
                <div class="old-price-overlay" v-if="product.oldPrice">
                <app-old-price>{{ product.oldPriceValue }}</app-old-price>
                </div>
                <p class="h2">{{ product.price * productQuantity }} &#x20bd;</p>
            </div>
    </nuxt-link>
</template>

<script>
    import OldPrice from '../typography/OldPrice'
    import { eventBus } from "~/plugins/eventbus";

    export default {
        name: "GoodItemListInCart",
        components: {
            appOldPrice: OldPrice
        },
        props: {
            product: {},
            showDeleteButton: {
                type: Boolean,
                default: true
            },
            editQuantity: {
                type: Boolean,
                default: true
            }
        },
        data() {
            return {
                productQuantity: this.product.quantity,
            }
        },
        methods: {
            minusProduct() {
                if(this.product.quantity === 1) {
                    console.log('отлично, работаем дальше')
                } else {
                    this.$store.commit('cart/minusProduct', this.product);
                    this.productQuantity--;
                }
            },
            plusProduct() {
                this.$store.commit('cart/addToCart', this.product);
                this.productQuantity++;
            },
            removeFromCart() {
                this.$store.commit('cart/removeFromCart', this.product);
            }
        },
        computed: {
        }

    }
</script>

<style scoped>
    .disable-button {
        background-color: #cccccc!important;
    }
    .delete-button {
        background-color: transparent;
        position: absolute;
        right: 0;
        top: 5px;
        opacity: 0;
        cursor: pointer;
        z-index: 10;
    }

    .good-item-list-in-cart:hover .delete-button {
        opacity: 0.6;
    }
    .quantity-button-group__button {
        background-color: #fff;
        width: 40px;
        height: 40px;
    }

    .quantity-button-group__value {
        height: 40px;
        display: flex;
        align-items: center;
        padding-left: 26px;
        padding-right: 26px;
        border-left: none!important;
        border-right: none!important;
    }
    .left-button {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }
    .right-button {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .old-price-overlay {
        display: table;
    }
    .Body-18_lime {
        color: var(--lime)
    }
    .Body-18_terracota {
        color: var(--terracota);
    }
    .good-item-list-in-cart {
        position: relative;
        padding: 15px 0 32px 0;
        border-radius: 6px;
        box-sizing: border-box;
        height: 95px;
        text-decoration: none;
        position: relative;
    }

    .good-item-list-in-cart:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
        width: calc(100% + 30px);
    }
    .good-item-list-in-cart__image {
        height: 70px;
    }

</style>