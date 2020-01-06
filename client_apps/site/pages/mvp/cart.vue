<template>
    <div>
        <app-header searchMenu="true"/>
        <app-list-to-categories-links/>
        <div class="container">
            <div class="bread-crumbs mt130px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Корзина
                </span>
                </p>
            </div>
        </div>
        <h1 class="h1 container mt30px">Моя корзина — {{ cartItems.length }} товаров</h1>
        <div class="container mt20px">
            <div class="mt10px d-flex justify-content-between">
                <button class="d-flex align-items-center no-border transparent action-btn">
                    <img src="/images/icons/cart/add-to-favorite.svg" alt="добавить в избранное иконка">
                    <p class="Body-18-Prime">Добавить товары в избранное</p>
                </button>
                <button class="d-flex align-items-center no-border transparent">
                    <img src="/images/icons/cart/share.svg" alt="скопировать ссылку на корзину иконка">
                    <p class="Body-18-Prime">Скопировать ссылку на корзину</p>
                </button>
            </div>
            <div class="row mt20px">
                <h3 class="h3 col-6">Товар</h3>
                <h3 class="h3 col-2">Количество</h3>
                <h3 class="h3 col-2">В магазине</h3>
                <h3 class="h3 col-2">Цена</h3>
            </div>

        </div>
        <ul>
            <li v-for="product in cartItems" :key="product.id" class="container mt5px aaa">
                <app-good-item-list-in-cart editQuantity :showHowMany=true :product="product" showDeleteButton/>
            </li>
        </ul>
        <div class="companion-goods mt50px">
            <div class="container">
                <div class="row">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                        <defs>
                            <path id="a" d="M11.998 1c4.97 0 8.998 3.899 8.998 8.708 0 0 .044.62-.17 1.671-.012.061-.026.122-.04.183-.534 2.414-2.392 6.87-8.783 11.433l-.001.005h-.004l-.002-.005c-6.304-4.501-8.198-8.9-8.76-11.335a9.438 9.438 0 0 1-.183-1.027c-.003-.016-.006-.031-.007-.047a5.71 5.71 0 0 1-.044-.837L3 9.709C3 4.898 7.028 1 11.998 1zm.624 2.357a1.273 1.273 0 0 0-1.257 0L6.643 6.045A1.273 1.273 0 0 0 6 7.15v5.7c0 .457.246.88.643 1.106l4.722 2.686c.39.222.867.222 1.257 0l4.734-2.686c.398-.226.644-.649.644-1.107V7.151c0-.458-.246-.88-.644-1.107zM7.095 7.636l4.438 2.485v5.384L7.095 12.98V7.636zm9.809.091v5.253l-4.275 2.426v-5.285l4.275-2.394zm-2.426-2.085l1.964 1.116-4.36 2.442-1.72-.963 4.116-2.595zm-2.484-1.41l1.425.809-4.122 2.6-1.66-.93 4.357-2.478z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0h24v24H0z"/>
                            <mask id="b" fill="#fff">
                                <use xlink:href="#a"/>
                            </mask>
                            <g fill="#ffffff" mask="url(#b)">
                                <path id="sot" d="M0 0h24v24H0z"/>
                            </g>
                        </g>
                    </svg>

                    <h1 class="h1">Сопутствующие товары со скидкой</h1>
                </div>
            </div>
            <app-slider-with-goods :id="'megaHitGoods'">
                <div class="swiper-slide" v-for="product in products" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </div>

        <div v-if="cartItems.length > 0" class="slideUp start-checkout bottom-fixed-overlay">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-5" style="text-align: right">
                        <button @click="showCheckout" class="start-checkout__button grey-border H2-White">Начать оформление</button>
                    </div>
                </div>
            </div>
        </div>
            <div v-if="showCheckoutStatus">
                <app-checkout-aside/>
            </div>
        </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
    import GoodItemListInCart from '~/components/global/goodItems/GoodItemListInCart'
    import ContactLists from '~/components/global/footer/ContactLists'
    import Footer from '~/components/global/footer/Footer'
    import Radio from '~/components/global/radio-&-checkbox/Radio'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import CheckoutAside from '~/components/global/cart/CheckoutAside'
    import Multiselect from 'vue-multiselect'
    import { eventBus } from '~/plugins/eventbus'

    export default {
        layout: "cart",
        name: "cart",
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appGoodItemListInCart: GoodItemListInCart,
            appContactLists: ContactLists,
            appFooter: Footer,
            appRadio: Radio,
            appGoodItemGridSmall: GoodItemGridSmall,
            appSliderWithGoods: SliderWithGoods,
            appCheckoutAside: CheckoutAside,
            Multiselect
        },
        data() {
            return {
                showCheckoutStatus: false,
                showCreditInfo: false,
                showSelfPickUp: true,
                total: null,
                choosenPayMethod: '',
                choosenStore: null,
                payMethods: [
                    {
                        id: 1,
                        name: 'При получении, картой или наличными'
                    },
                    {
                        id: 2,
                        name: 'Онлайн оплата',
                        img: [
                            {
                                id: 1,
                                src: 'pay-mastercard.svg',
                                alt: 'способ оплаты иконка'
                            },
                            {
                                id: 2,
                                src: 'pay-mir.svg',
                                alt: 'способ оплаты иконка'
                            },
                            {
                                id: 3,
                                src: 'pay-visa.svg',
                                alt: 'способ оплаты иконка'
                            },
                        ]
                    },
                    {
                        id: 3,
                        name: 'Кредит онлайн',
                        description: "Самостоятельно заполнить анкету на сайте банка. В течение 3 минут банк сообщит решение по вашей заявке, или кредитный специалист позвонит вам по телефону."
                    },
                    {
                        id: 4,
                        name: 'Счет на оплату в любом банке',
                        description: "После оформления заказа будет сформирован счет на оплату через ваш банк."
                    }
                ],
                store: [
                    {
                        id: 1,
                        name: "Самовывоз из магазина (ул. Комсомольская, 5)"
                    },
                    {
                        id: 2,
                        name: "Самовывоз из магазина (ул. Походная, 84)"
                    },
                    {
                        id: 3,
                        name: "Самовывоз из магазина (ул. Березовский тракт, 2)"
                    },
                ]
            }
        },
        methods: {
            sendOrder() {
              // let order = this.order
                let result = this.cartItems.map(item => ({
                    "product_id": item.id,
                    "quantity": item.quantity,
                    "price": item.price,}));
                console.log(result);
                let url = '/api/v1/orders';
                let order = {
                    phone: '9123001023',
                    email: 'v.e.romantsov@mail.ru',
                    items: result
                };
                this.$axios.post(url, order)
                    .then(response => {
                        this.$store.commit('cart/orderNumber', response.data.order.id);
                        // this.$store.commit('cart/orderNumber', 42);
                        // console.log(response.data.order.id)
                    });
                this.$store.commit('cart/yourOrder', this.cartItems);
                this.$router.push('/mvp/confirm-order')
            },
            hideSelfPick() {
                if (this.showSelfPickUp === false) {
                    this.showSelfPickUp = !this.showSelfPickUp
                }
            },
            customLabel ({ name, description }) {
                return `${name} – ${description}`
            },
            showCheckout() {
                this.showCheckoutStatus = true;
                eventBus.$emit('showCheckout', this.showCheckoutStatus);
            }
        },
        mounted: function () {
            eventBus.$on('hideCheckout', (showCheckoutStatus) => {
                this.showCheckoutStatus = showCheckoutStatus;
            })
        },
        computed: {
            stores() {
                try {
                    return this.$store.getters['storeList/storeList']
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
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            },
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']
                } catch (e) {
                    console.log('error')
                    error(e)
                }
            }
        },
        watch: {
            choosenPayMethod: function () {
                if (this.choosenPayMethod.id === 3) {
                    this.showCreditInfo = true
                } else {
                    this.showCreditInfo = false
                }
            },
        }
    }
</script>

<style scoped>
    .view-more-info:hover {
        text-decoration: underline;
    }

    .view-more-info__icon {
        width: 16px;
        height: 16px;
    }

    .hgt210 {
        height: 210px;
    }

    .action-btn {
        cursor: pointer;
    }

    .multiselect-overlay {
        height: 40px;
    }

    .cart__actions {
        display: flex;
        justify-content: space-between;
    }

    .share-cart-btn {
        background-color: transparent;
        border: none;
        display: flex;
        align-items: center;
    }

    .share-cart-btn > img {
        opacity: 0.6;
    }

    .satellite-goods-in-cart {
        padding-top: 40px;
        padding-bottom: 20px;
        margin-bottom: 350px;
        background-image: linear-gradient(to top, var(--just_white), var(--snow));
    }

    .contact-form {
        position: relative;
        background-color: #fff;
        box-shadow: 0 1px 18px 0 var(--blueberry-12), 0 6px 10px 0 var(--blueberry-14), 0 3px 5px -1px var(--blueberry-20);
        background-color: var(--just_white);
        padding-top: 19px;
    }

    .contact-form__input-overlay {
        position: relative;
    }

    .contact-form__input {
        padding-top: 7px;
        padding-bottom: 9px;
        padding-left: 20px;
        padding-right: 226px;
        border-radius: 6px;
        border: 1px solid #918dae;
        width: 100%;
    }

    .contact-form__self-get-btn {
        border: none;
        background-color: transparent;
        border-bottom: 1px dashed var(--blueberry);
        position: absolute;
        right: 10px;
        top: 5px;
    }

    .contact-form__input-label {
        margin-top: 5px;
        margin-left: 20px;
        text-align: left;
    }

    .contact-form__input-label span {
        color: var(--blueberry_deep);
        opacity: 1 !important;
    }

    .contact-form-form {
        padding-bottom: 20px;
        border-bottom: 1px solid var(--asphalt_light);
    }

    .blue-border-bottom {
        padding-bottom: 10px;
        border-bottom: 1px solid var(--asphalt_light);
    }

    .discount-coupon {
        display: flex;
        align-items: center;
        border: none;
        background-color: transparent;
    }

    .discount-coupon > img {
        width: 20px;
    }

    .create-order {
        display: block;
        text-decoration: none;
        border-radius: 6px;
        border: none;
        width: 100%;
        background-color: var(--blueberry);
        padding-top: 13px;
        padding-bottom: 13px;
        cursor: pointer;
    }

    .contact-nav {
        margin-top: 20px;
    }

    .map-in-cart {
        display: block;
        width: 100%;
        border-radius: 6px;
    }

    .hide {
        display: flex;
        width: 100%;
        justify-content: flex-end;
        position: absolute;
    }

    .hide__btn {
        position: absolute;
        z-index: 5;
        border: none;
        background-color: transparent;
        display: flex;
        align-items: center;
        white-space: nowrap;
        top: -2px;
    }

    .store-select {
        margin-top: -3px;
    }

    .info {
        display: flex;
        align-items: center;
    }

    .info > img {
        margin-right: 5px;
        opacity: 0.6;
    }

    .bottom-fixed-overlay {
        position: fixed;
        z-index: 10;
        bottom: 0;
        width: 100%;
        background-color: #fff;
    }

    .companion-goods {
        background-image: linear-gradient(to top, var(--just_white), var(--snow));
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .start-checkout {
        padding-top: 4px;
        padding-bottom: 4px;
        background-color: var(--just_white);
    }

    .start-checkout__button {
        background-color: var(--blueberry);
        border-radius: 6px;
        cursor: pointer;
        padding: 10px 25px 10px 25px;
    }

    .slideUp{
        animation-name: slideUp;
        -webkit-animation-name: slideUp;

        animation-duration: 1s;
        -webkit-animation-duration: 1s;

        animation-timing-function: linear;
        -webkit-animation-timing-function: linear;

        visibility: visible !important;
    }

    @keyframes slideUp {
        0% {
            transform: translateY(100%);
        }
        100% {
            transform: translateY(0%);
        }
    }
</style>