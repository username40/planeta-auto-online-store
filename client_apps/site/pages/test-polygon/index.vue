<template>
    <section>
        <h1>{{ pageTitle }}</h1>

        <ul>
            <li v-for="product of products" :key="product.id">
                <a href="#" @click.prevent="goTo(product)">{{ product.name }} </a>
            </li>
        </ul>
<!--            <div class="good-item__container" v-for="product of products" :key="product.id">-->
<!--        <nuxt-link-->
<!--                :to="'/test-polygon/'+product.id"-->
<!--                class="good-item">-->
<!--            <div class="good-item__slider-container">-->
<!--                <img :src="item.src" alt="" v-for="item in product.img" :key="product.img.src" class="good-item__slide">-->
<!--            </div>-->
<!--            <div v-if="product.oldPrice" class="good-item__discount-container">-->
<!--                <app-old-price>{{ product.oldPriceValue }}</app-old-price>-->
<!--            </div>-->
<!--            <h2 class="Price">{{ product.price }} &#8381;</h2>-->
<!--            <button class="Body-16 good-item__add-to-cart-button grey-border" @click.prevent="addToCart()">В корзину</button>-->
<!--            <h3 class="Body-18 good-item__name">{{ product.name }}</h3>-->
<!--            <p class="Tag-14-60">{{ product.category }}</p>-->
<!--        </nuxt-link>-->


<!--    </div>-->
        <app-good-item-grid-small :product="product" v-for="product in products" :key="product.id"></app-good-item-grid-small>
        <br>
        <br>
        <hr>
        <div class="cart">
            <p>cart</p>
            <ul>
                <li v-for="cartItem in cartItems" :key="cartItem.id">
                    <p>Наименование: {{ cartItem.name }}</p>
                    <p>Количество: {{ cartItem.quantity }}</p>
                </li>
            </ul>
        </div>

    </section>
</template>

<script>
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import OldPrice from '~/components/global/typography/OldPrice'
    export default {
        components: {
            appGoodItemGridSmall: GoodItemGridSmall,
            appOldPrice: OldPrice
        },
        data() {
            return {
                pageTitle: 'Products page',
            }
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
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
            }
        },
        methods: {
            goTo(user) {
                this.$router.push('/test-polygon/' + user.id)

            }
        }
    }
</script>

<style scoped>
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
        padding: 15px;
        display: block;
        text-decoration: none;
    }

    .good-item__slide {
        width: 160px;
        height: 160px;
    }

    .good-item__discount-container {
        margin-top: 6px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .good-item__add-to-cart-button {
        padding-top: 2px;
        padding-bottom: 4px;
        cursor: pointer;
        background-color: var(--snow);
        color: var(--just_black);
        text-align: center;
        border: none;
        border-radius: 6px;
        display: block;
        width: 100%;
        box-shadow: var(--shadow-0);
    }

    .good-item__add-to-cart-button:hover {
        background-color: var(--blueberry_lite);
        box-shadow: var(--shadow-6-prime);
        color: var(--just_white);
    }

    .good-item__name {
        margin-top: 2px;
    }
</style>