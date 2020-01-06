<template>
    <div class="container aside-available-stores" :class="exitClass" v-if="showAvailableAside" style="height: 100vh; overflow: auto">
        <div class="row" style="height: 100%">
            <div class="map col-3" style="background-color: #fff; padding-left: 0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d34908.889259171454!2d60.60081626375432!3d56.849278694015474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0L_Qu9Cw0L3QtdGC0LAg0LDQstGC0L4!5e0!3m2!1sru!2sru!4v1566543004259!5m2!1sru!2sru"
                        width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="stores-list" style="background-color: #ffffff; position: relative; overflow-y: scroll; height: 100vh; z-index: 100">
                <div class="row aside-available-stores__header" style="position: fixed; background-color: var(--just_white); z-index: 4">
                    <div class="col grow d-flex align-items-center">Магазин</div>
                    <div class="col grow d-flex justify-content-between align-items-center right-column">Наличие
                        <span class="d-flex align-items-center hide" @click="showAvailableAside = !showAvailableAside">Скрыть
                            <img src="/images/icons/available-store/hide-available-store-list.svg" alt="">
                        </span>
                    </div>
                </div>
                <div class="mt80px" @click="showAvailableAside = !showAvailableAside">
                <div
                        class="aside-available-stores__item"
                        v-for="storeItem in getstoresOfProduct"
                        >
                    <div>
                        <h3 class="h3">{{ storeItem.name }}</h3>
                        <p class="mt5px Body-14 d-flex align-items-center store__opening-hours info-item">
                            <img src="/images/icons/store/opening-hours.svg" alt=""
                                 class="store__icon">
                            <span>Сегодня до <span v-for="(item, index) in storeItem.schedule" :key="index">
                                <span v-if="index == new Date().getDay() - 1">{{ item.end }}</span>
                            </span>:00</span>
                        </p>
                        <p class="Body-14 d-flex align-items-center info-item mt5px" v-if="storeItem.phone">
                            <img src="/images/icons/store/call-us.svg" alt="" class="store__icon">
                            <span>Телефон:</span>
                            <a @click.stop :href="'tel:' + storeItem.phone" class="ml10px store__link Body-14">{{ storeItem.phone }}
                                <button
                                        @click.prevent.stop.once="showProneNumber = !showProneNumber"
                                        v-if="showProneNumber"
                                        class="no-border transparent show-phone-button">
                                    <img src="/images/icons/store/show-phone.svg" class="store__icon"/>
                                </button>
                            </a>

                        </p>
                    </div>
                    <div>
                        <h3 class="h3 d-flex align-items-center" v-if="storeItem.pivot"> {{ storeItem.pivot.quantity }} штук<app-ending-count-in-stock :nums="storeItem.pivot.quantity"/>
                        </h3>
                        <p class="Body-14 d-flex align-items-center">
                            <img src="/images/icons/store/when-you-can-get.svg" alt="" class="mr5px store__icon">
                            Можно
                            забрать {{ storeItem.delivery_time }}</p>
                        <button class="grey-border Body-16 order-in-this-shop" @click="addToCart">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
                                <defs>
                                    <path id="addToCartInAside" d="M5.999 19a2 2 0 1 0 4 0 2 2 0 0 0-4 0zM16 19a2 2 0 1 0 3.999.001 2 2 0 0 0-3.999 0zm-6.453-4.728l11.068-3.162A.563.563 0 0 0 21 10.6V5.1H6.9V3.4a.4.4 0 0 0-.4-.4H3.4a.4.4 0 0 0-.4.4V5h1.943l1.968 9.056L7.1 15v1.5c0 .22.18.4.4.4h13.1a.4.4 0 0 0 .4-.4V15H9.752c-1.15 0-1.174-.45-.205-.728z"/>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z"/>
                                    <mask id="addToCartInAsideMask" fill="#fff">
                                        <use xlink:href="#addToCartInAside"/>
                                    </mask>
                                    <g class="change-fill" fill="#32377D" mask="url(#addToCartInAsideMask)">
                                        <path d="M0 0h24v24H0z"/>
                                    </g>
                                </g>
                            </svg>

                            Заказать в этом магазине</button>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {eventBus} from "~/plugins/eventbus";
    import EndingCountInStock from "../endings/EndingCountInStock";
    export default {
        name: "AvailableStoresAside",
        components: {appEndingCountInStock: EndingCountInStock},
        data() {
            return {
                showProneNumber: true,
                showAvailableAside: false,
                exitClass: ''

            }
        },
        methods: {
            addToCart() {
                    this.$store.commit('cart/addToCart', this.getWhatProduct);
                }
        },
        computed: {
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
            }
        },
        mounted: function () {
           eventBus.$on('show', (showMapWithStores) => {
               this.showAvailableAside = showMapWithStores
           })
        }
    }
</script>

<style scoped>
    .stores-list {
        width: 600px;
    }
    .col-6 {
        overflow: auto;
    }
    .hide {
        cursor: pointer;
        margin-left: 100px;
    }
    .aside-available-stores {
        position: fixed;
        z-index: 200;
        top: 0;
        right: -270px;
        box-shadow: var(--shadow-6-prime);
        animation: moveAside 0.2s linear
    }

    @keyframes moveAside {
        from {
            right: -900px;
        }
        to {
            right: -270px;
        }
    }

    .aside-available-stores__header {
        padding: 20px 0;
        width: 583px;
        right: 17px;
        box-shadow: 0 1px 18px 0 var(--blueberry-12), 0 6px 10px 0 var(--blueberry-14), 0 3px 5px -1px var(--blueberry-20);
    }

    .right-column {
        padding-right: 0;
        margin-left: 175px;
    }

    .aside-available-stores__item {
        margin: 0 auto;
        width: 570px;
        display: flex;
        justify-content: space-between;
        text-decoration: none;
        padding: 15px;
        cursor: pointer;
        border-radius: 6px;
    }

    .aside-available-stores__item:not(:first-child) {
        margin-top: 20px;
    }

    .aside-available-stores__item:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .order-in-this-shop {
        display: flex;
        align-items: center;
        background-color: var(--snow);
        margin-top: 2px;
        border-radius: 6px;
        padding: 2px 8px 2px 8px;
        cursor: pointer;
    }

    .order-in-this-shop > svg {
        margin-right: 3px;
    }

    .order-in-this-shop:hover {
        background-color: var(--blueberry);
        color: var(--just_white)
    }

    .order-in-this-shop:hover .change-fill {
        fill: #FFFFFF;
    }

    .info-item {
        position: relative;
    }

    .store__link {
        text-decoration: none;
    }

    .show-phone-button {
        position: absolute;
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0.6), var(--just_white));
        right: 0;
        top: -1px;
        width: 25px;
        right: 45px;
    }

    .store__icon {
        width: 20px;
    }

    .map {
        padding-left: 0!important;
        padding-right: 0!important;
    }
</style>