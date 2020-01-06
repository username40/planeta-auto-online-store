<template>
    <nuxt-link :to="'/mvp/product-page/'+product.id" class="good-item-list-in-cart row align-items-center">
        <img v-for="item in product.images.slice(0,1)" :key="item.id" :src="'https://lapi.planetavto.ru' + item.url" alt="картинка"
             class="col-1 good-item-list-in-cart__image">
        <h2 class="Body-18 col-6">{{ product.name }}</h2>
        <div class="col-3"><p class="Body-18-Prime quantity-button-group__value ">{{ product.quantity }}</p> </div>
        <div class="col-2">
            <p class="h2">{{ product.price }} &#x20bd;</p>
        </div>
    </nuxt-link>
</template>

<script>
    import OldPrice from '../typography/OldPrice'
    export default {
        name: "GoodItemListInConfirmPage",
        components: {
            appOldPrice: OldPrice
        },
        props: {
            product: {}
        },
        data() {
            return {}
        },
        methods: {
            minusProduct() {
                if(this.product.quantity === 1) {
                    console.log('отлично, работаем дальше')
                } else {
                    this.$store.commit('cart/minusProduct', this.product)
                }

            },
            plusProduct() {
                this.$store.commit('cart/addToCart', this.product);
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