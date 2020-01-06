<template>
    <div>
        <div v-if="showCheckout" class="container checkout-aside-container" style="height: 100vh; width: 37vw; overflow: auto;">
            <div v-if="checkoutHome">
                <button @click="hideHomePageAsideCart" class="hide-button d-flex">
                    <span class="Body-18-Prime">Скрыть</span>
                    <img src="/images/icons/cart/hide-icon.svg" alt="Скрыть">
                </button>
                <h1 class="h1">Оформление заказа</h1>
                <h3 class="h3 mt10px">Способ получения</h3>
                <div>
                    <multiselect :options="deliveryType"
                                 placeholder="Выбрать доставку или самовывоз"
                                 class="mt5px"
                                 :searchable="false"
                                 :allow-empty="false"
                                 v-model="deliveryTypeValue"
                                 :show-labels="false"
                    ></multiselect>
                </div>
                <div v-if="selectedAdress" class="selected-adress d-flex container grey-border mt10px">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                        <defs>
                            <path id="a" d="M11.998 1c4.97 0 8.998 3.899 8.998 8.708 0 0 .044.62-.17 1.671-.012.061-.026.122-.04.183-.534 2.414-2.392 6.87-8.783 11.433l-.001.005h-.004l-.002-.005c-6.304-4.501-8.198-8.9-8.76-11.335a9.438 9.438 0 0 1-.183-1.027c-.003-.016-.006-.031-.007-.047a5.71 5.71 0 0 1-.044-.837L3 9.709C3 4.898 7.028 1 11.998 1zm.624 2.357a1.273 1.273 0 0 0-1.257 0L6.643 6.045A1.273 1.273 0 0 0 6 7.15v5.7c0 .457.246.88.643 1.106l4.722 2.686c.39.222.867.222 1.257 0l4.734-2.686c.398-.226.644-.649.644-1.107V7.151c0-.458-.246-.88-.644-1.107zM7.095 7.636l4.438 2.485v5.384L7.095 12.98V7.636zm9.809.091v5.253l-4.275 2.426v-5.285l4.275-2.394zm-2.426-2.085l1.964 1.116-4.36 2.442-1.72-.963 4.116-2.595zm-2.484-1.41l1.425.809-4.122 2.6-1.66-.93 4.357-2.478z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0h24v24H0z"/>
                            <mask id="b" fill="#fff">
                                <use xlink:href="#a"/>
                            </mask>
                            <g fill="#32377D" mask="url(#b)">
                                <path d="M0 0h24v24H0z"/>
                            </g>
                        </g>
                    </svg>
                    <p class="Body-16-Prime">Адрес: г. Екатерибург, пр-кт Ленина, 21</p>
                </div>

                <div v-if="selectedAdressButton">
                    <div v-if="deliveryTypeValue === 'Самовывоз из магазина'">
                        <button @click="changeCheckoutPage" class="container mt30px select-shipping-address__button Body-16-Prime d-flex grey-border"><img src="/images/icons/cart/plus-icon.svg" alt="Выбрать адрес доставки">Выбрать магазин</button>
                        <div @click="changeCheckoutPage" class="select-shipping-address grey-border mt5px">
                            <img src="/images/icons/lk/adress-icon.svg" alt="Выбрать магазин" style="padding-top: 48px; padding-bottom: 54px;">
                        </div>
                    </div>

                    <div v-else>
                        <button @click="selectPointOfDelivery" class="container mt30px select-shipping-address__button Body-16-Prime d-flex grey-border"><img src="/images/icons/cart/plus-icon.svg" alt="Выбрать адрес доставки">Выбрать адрес доставки</button>
                        <div @click="selectPointOfDelivery" class="select-shipping-address grey-border mt5px">
                            <img src="/images/icons/lk/adress-icon.svg" alt="Выбрать адрес доставки" style="padding-top: 48px; padding-bottom: 54px">
                        </div>
                    </div>
                </div>

                <h3 class="h3 mt40px">Ваши данные</h3>
                <input placeholder="Телефон" type="text" class="container phone-input Placeholder mt5px">
                <p class="Tag-60 mt5px" style="margin-left: 17px">Пришлем СМС с подверждением заказа и уведомим о получении</p>
                <h3 class="h3 mt20px">Оплата</h3>
                <multiselect
                        placeholder="Метод Оплаты"
                        label="name"
                        track-by="id"
                        v-model="paymentMethod"
                        :allow-empty="false"
                        :searchable="false"
                        :options="payMethods"
                        :show-labels="false">
                    <template
                            slot="option"
                            slot-scope="props">
                        <div class="d-flex align-items-center">
                            <div>
                                <p>
                                    {{ props.option.name }}
                                </p>
                                <p class="mt5px Tag-12-60 word-wrap-in-multiselect">
                                    {{ props.option.description }}
                                </p>
                            </div>
                            <div class="d-flex ml10px">
                            <img
                                    :src="'/images/icons/cart/' + item.src"
                                    :alt="item.alt"
                                    v-if="props.option.img"
                                    v-for="item in props.option.img"
                                    :key="item.id">
                            </div>
                        </div>
                    </template>
                </multiselect>

                <input v-if="showInputInn" class="container phone-input Placeholder mt10px" type="text" placeholder="ИНН или ОГРН вашей организации">
                <div class="d-flex justify-content-between mt130px">
                    <h3 class="h3">Товары:</h3>
                    <h3 class="h3">{{ getSumOrder }} ₽</h3>
                </div>
                <div class="d-flex justify-content-between">
                    <h3>Доставка</h3>
                    <h3>0 ₽</h3>
                </div>
                <hr>
                <div class="d-flex justify-content-end">
                    <h3 class="h3">Итого: {{ getSumOrder }} ₽</h3>
                </div>
                <button class="container to-order-button Price-White grey-border mt10px">Заказать</button>
                <p class="Tag-60 mt10px">Я соглашаюсь с <nuxt-link to="/mvp">правилами онлайн продажи и политикой о персональных данных</nuxt-link></p>
            </div>

            <div v-if="pageSelectStores">
                <div class="container">
                    <div class="row">
                        <div class="d-flex">
                            <h1 class="h1">Выбор магазина</h1>
                            <button @click="changeCheckoutPage" class="hide-button d-flex">
                                <span class="Body-18-Prime">Назад</span>
                                <img src="/images/icons/cart/hide-icon.svg" alt="Назад">
                            </button>
                        </div>
                        <div class="container">
                            <div class="row">
                                <multiselect
                                        :options="cities"
                                        label="name"
                                        track-by="id"
                                        v-model="selectCities"
                                        placeholder="Выбрать город"
                                        :searchable="false"
                                        :allow-empty="false"
                                        :show-labels="false"
                                ></multiselect>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 230px" class="mt10px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d34908.889259171454!2d60.60081626375432!3d56.849278694015474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0L_Qu9Cw0L3QtdGC0LAg0LDQstGC0L4!5e0!3m2!1sru!2sru!4v1566543004259!5m2!1sru!2sru"
                            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div>
                    <app-store-item v-for="item in getstoresOfProduct">
                        <template v-slot:addr>{{ item.name }}</template>
                        <template v-slot:city-id>{{ item.name }}</template>
                        <template v-slot:deliveryTime>{{ item.delivery_time }}</template>
                        <template v-if="item.pivot" v-slot:quantity>{{ item.pivot.quantity }}</template>
                    </app-store-item>
                </div>
            </div>

            <div v-if="PointOfDelivery">
                <div class="container">
                    <div class="row">
                        <div class="d-flex">
                            <h1 class="h1">Выбор пункта выдачи</h1>
                            <button @click="selectPointOfDelivery" class="hide-button d-flex">
                                <span class="Body-18-Prime">Назад</span>
                                <img src="/images/icons/cart/hide-icon.svg" alt="Назад">
                            </button>
                        </div>
                        <div class="container mt20px">
                            <div class="row">
                                <multiselect :options="cities"
                                             label="name"
                                             track-by="id"
                                             v-model="selectCities"
                                             placeholder="Выбрать город"
                                             :searchable="false"
                                             :allow-empty="false"
                                             :show-labels="false"
                                ></multiselect>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="height: 230px" class="mt10px">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d34908.889259171454!2d60.60081626375432!3d56.849278694015474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0L_Qu9Cw0L3QtdGC0LAg0LDQstGC0L4!5e0!3m2!1sru!2sru!4v1566543004259!5m2!1sru!2sru"
                            width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div>
                    <app-store-item v-for="item in getstoresOfProduct">
                        <template v-slot:addr>{{ item.name }}</template>
                        <template v-slot:city-id>{{ item.name }}</template>
                        <template v-slot:deliveryTime>{{ item.delivery_time }}</template>
                        <template v-if="item.pivot" v-slot:quantity>{{ item.pivot.quantity }}</template>
                    </app-store-item>
                </div>
            </div>

            <div class="express-delivery-page" v-if="expressDeliveryPage">
                <div class="container">
                    <div class="row">
                        <div class="d-flex">
                            <h1 class="h1">Выбор адреса доставки</h1>
                            <button @click="exitExpressDeliveryPage" class="hide-button d-flex mt20px">
                                <span class="Body-18-Prime">Назад</span>
                                <img src="/images/icons/cart/hide-icon.svg" alt="Назад">
                            </button>
                        </div>
                    </div>
                    <div class="row mt20px">
                        <multiselect :options="cities"
                                     label="name"
                                     track-by="id"
                                     v-model="selectCities"
                                     placeholder="Выбрать город"
                                     :searchable="false"
                                     :allow-empty="false"
                                     :show-labels="false"
                        ></multiselect>
                    </div>
                    <div style="height: 230px" class="row mt10px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d34908.889259171454!2d60.60081626375432!3d56.849278694015474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0L_Qu9Cw0L3QtdGC0LAg0LDQstGC0L4!5e0!3m2!1sru!2sru!4v1566543004259!5m2!1sru!2sru"
                                width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="row">
                        <h3 class="h3 mt20px">Адрес доставки</h3>
                    </div>
                    <div class="row">
                        <input style="font-size: 18px" class="adress-search-input multiselect mt10px" type="text" placeholder="Введите адрес доставки">
                    </div>
                    <div class="row">
                        <p style="padding-left: 15px; padding-right: 15px" class="Tag-14-60">Полный адрес: пр-кт. Ленина, д. 26, г. Екатеринбург, п. Центральный, обл. Свердловская, Россия, 620000</p>
                    </div>
                    <div class="row">
                        <button @click="selectAdressButton" class="container express-delivery-page-button Price-White grey-border mt40px">Привезти на этот адрес</button>
                    </div>
                </div>
            </div>

            <div v-if="showAnalogPage">
                <div class="container">
                    <div class="row">
                        <h1 class="h1">Замена на аналог товара</h1>
                        <button @click="exitAnalogPage" class="hide-button d-flex mt20px">
                            <span class="Body-18-Prime">Назад</span>
                            <img src="/images/icons/cart/hide-icon.svg" alt="Назад">
                        </button>
                    </div>
                    <div class="row mt20px">
                        <div class="col-1"><img src="/images/lk/lk-order-item-02.jpeg" alt=""></div>
                        <div class="col-8"><p class="Body-14">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</p></div>
                        <div class="col-3"><p class="Body-14">99 909 ₽</p></div>
                    </div>

                    <div class="row">
                        <div class="col-2"><img src="" alt=""></div>
                        <div class="col-8"><p class="Body-14">Замените этот товар на любой аналог из списка ниже</p></div>
                    </div>

                    <h3 class="h3 mt20px">Список аналогичных товаров в наличии</h3>
                    <div class="container mt20px">
                        <div class="row">
                            <app-analog-item/>
                            <div class="ml10px">
                                <app-analog-item/>
                            </div>
                        </div>
                    </div>
                    <div class="container mt20px">
                        <div class="row">
                            <app-analog-item/>
                            <div class="ml10px">
                                <app-analog-item/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div v-if="showReplaceAnalogPage" class="container">
                <div class="row justify-content-center">
                    <h1 class="h1">Замена на аналог товара</h1>
                </div>
                <div class="row justify-content-center mt20px">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="64" viewBox="0 0 24 24">
                        <defs>
                            <path id="confirm-icon" d="M11.866 2C17.39 1.928 21.926 6.346 22 11.867c.074 5.521-4.344 10.058-9.865 10.133-5.522.073-10.06-4.345-10.133-9.865-.074-5.522 4.344-10.06 9.865-10.133zm5.543 4.18c-.588-.348-1.36-.176-1.727.383L10.367 14.7l-2.114-2.66a1.295 1.295 0 0 0-1.756-.231 1.158 1.158 0 0 0-.243 1.673l3.213 4.045c.238.3.609.474 1 .474h.058a1.263 1.263 0 0 0 1.006-.562l6.279-9.611c.367-.56.186-1.297-.4-1.646z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0h24v24H0z"/>
                            <mask id="confirm-icon-0" fill="#fff">
                                <use xlink:href="#confirm-icon"/>
                            </mask>
                            <g fill="#32377D" mask="url(#confirm-icon-0)">
                                <path d="M0 0h24v24H0z"/>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="row mt20px">
                    <h3 class="h3">Товар изменен</h3>
                </div>
                <div class="row">
                    <h3 class="h3">Сумма заказа изменилась: 8960 → 12 320 ₽</h3>
                </div>
                <div class="row mt50px">
                    <div class="col-1"><img src="/images/lk/lk-order-item-02.jpeg" alt=""></div>
                    <div class="col-8">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</div>
                    <div class="col-3">99 909 ₽</div>
                </div>

                <div class="row justify-content-center mt20px">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="65" height="65" viewBox="0 0 24 24">
                            <defs>
                                <path id="replace-icon-2" d="M5.993 11.299l-2.847 2.857a.526.526 0 0 0 0 .727l2.847 2.858c.318.328.871.092.871-.358v-1.844h6.156c.563 0 1.024-.461 1.024-1.024 0-.564-.46-1.025-1.024-1.025H6.864v-1.833a.507.507 0 0 0-.87-.358zM20.855 8.01l-2.847-2.858c-.318-.328-.87-.092-.87.359v1.833H10.97c-.563 0-1.024.46-1.024 1.024 0 .564.46 1.024 1.024 1.024h6.156v1.834c0 .46.553.686.87.358l2.848-2.857a.504.504 0 0 0 .01-.717z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z"/>
                                <mask id="replace-icon-2-b" fill="#fff">
                                    <use xlink:href="#replace-icon-2"/>
                                </mask>
                                <g fill="#32377D" mask="url(#replace-icon-2-b)">
                                    <path d="M0 0h24v24H0z"/>
                                </g>
                            </g>
                        </svg>
                </div>

                <div class="row mt30px">
                    <div class="col-1"><img src="/images/lk/lk-order-item-02.jpeg" alt=""></div>
                    <div class="col-8">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</div>
                    <div class="col-3">199 909 ₽</div>
                </div>

                <div class="row">
                    <button class="container replaceAnalogPage__button Price-White grey-border" style="margin-top: 60%;">Хорошо, продолжить</button>
                </div>
                <div class="row justify-content-center mt10px">
                    <p class="Tag-60">или</p>
                </div>
                <div class="row justify-content-center">
                    <p @click="exitReplaceAnalogPage" class="Tag-60" style="color: var(--blueberry); cursor: pointer">Отменить замену товара и вернуться к списку магазинов</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import { eventBus } from '~/plugins/eventbus'
    import StoreItem from '~/components/global/cart/StoreItem'
    import AnalogItem from '~/components/global/cart/AnalogItem'

    export default {
        props: {
            product: {}
        },
        data() {
            return {
                showReplaceAnalogPage: false,
                selectedAdressButton: true,
                showAnalogPage: false,
                showInputInn: false,
                expressDeliveryPage: false,
                PointOfDelivery: false,
                pageSelectStores: false,
                checkoutHome: true,
                deliveryTypeValue: "",
                paymentMethod: "",
                selectCities: "",
                showCheckout: true,
                selectedAdress: false,
                value: null,
                deliveryType: [
                    'Самовывоз из магазина',
                    'Доставка до пункта выдачи',
                    'Экспресс доставка по Екатеринбургу и Березовскому',
                    'Доставка курьером по России'],
                cities: [
                    {
                        id: 1,
                        name: 'Екатеринбург'
                    },
                    {
                        id: 2,
                        name: 'Березовский'
                    },
                    {
                        id: 3,
                        name: 'Богданович'
                    },
                    {
                        id: 4,
                        name: 'Артемовский'
                    },
                    {
                        id: 5,
                        name: 'Верхотурье'
                    },
                ],
                payMethods:  [
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
                        name: 'Сформировать счет для предпринимателей',
                        description: "После оформления заказа будет сформирован счет на оплату через ваш банк."
                    }
                ],
            }
        },
        components: {
            Multiselect,
            appStoreItem: StoreItem,
            appAnalogItem: AnalogItem,
        },
        methods: {
            selectAdressButton() {
                this.expressDeliveryPage = !this.expressDeliveryPage;
                this.selectedAdressButton = false;
                this.selectedAdress = !this.selectedAdress;
                this.checkoutHome = !this.checkoutHome;
            },
            hideHomePageAsideCart() {
                this.showCheckout = !this.showCheckout;
                eventBus.$emit('hideCheckout', this.showCheckout);
            },
            changeCheckoutPage() {
                this.checkoutHome = !this.checkoutHome;
                this.pageSelectStores = !this.pageSelectStores;
            },
            selectPointOfDelivery() {
                this.checkoutHome = !this.checkoutHome;
                this.PointOfDelivery = !this.PointOfDelivery;
            },
            exitExpressDeliveryPage() {
                this.checkoutHome = !this.checkoutHome;
                this.expressDeliveryPage = !this.expressDeliveryPage;
            },
            exitAnalogPage() {
                this.showAnalogPage = !this.showAnalogPage;
                this.PointOfDelivery = !this.PointOfDelivery;
            },
            exitReplaceAnalogPage() {
                this.showReplaceAnalogPage = !this.showReplaceAnalogPage;
                this.pageSelectStores = !this.pageSelectStores;
            }
        },
        created: function () {
            eventBus.$on('showCheckout', (showCheckoutStatus) => {
                this.showCheckout = showCheckoutStatus;
            })
        },
        mounted: function () {
            eventBus.$on('showReplacePage', (replacePageStatus) => {
                this.showAnalogPage = !this.showAnalogPage;
                this.showReplaceAnalogPage = replacePageStatus;
            })
        },
        created: function () {
            eventBus.$on('showAnalogPage', (showAnalogPage) => {
                this.showAnalogPage = showAnalogPage;

                if (this.pageSelectStores === true) {
                    this.PointOfDelivery = false;
                    this.pageSelectStores = !this.pageSelectStores;
                }

                if (this.PointOfDelivery === true) {
                    this.pageSelectStores = false;
                    this.PointOfDelivery = !this.PointOfDelivery;
                }
            });
        },
        mounted: function () {
            eventBus.$on('showSelectedAdress', (showSelectedAdressStatus) => {
                this.selectedAdress = showSelectedAdressStatus;
                this.PointOfDelivery = !this.PointOfDelivery;
                this.checkoutHome = !this.checkoutHome;
                this.selectedAdressButton = !this.selectedAdressButton;
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
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']
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
            products() {
                try {
                    return this.$store.getters['products/products']
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
            getSumOrder() {
                return this.cartItems.reduce((acc, item) => acc + item.price * item.quantity, 0)
            }
        },
        watch: {
            deliveryTypeValue: function () {
                if (this.deliveryTypeValue === 'Экспресс доставка по Екатеринбургу и Березовскому' || this.deliveryTypeValue === 'Доставка курьером по России') {
                    this.checkoutHome = !this.checkoutHome;
                    this.expressDeliveryPage = !this.expressDeliveryPage;
                }
            },
            paymentMethod: function () {
                if (this.paymentMethod.name === 'Сформировать счет для предпринимателей') {
                    this.showInputInn = true;
                } else this.showInputInn = false;
            },
        },
    }
</script>

<style scoped>
    .checkout-aside-container {
        position: fixed;
        z-index: 200;
        top: 0;
        right: 0px;
        background-color: var(--just_white);
        padding: 29px 90px 10px 95px;
        animation: moveAside 0.2s linear
    }

    @keyframes moveAside {
        from {
            right: -900px;
        }
        to {
            right: -50px;
        }
    }

    .select-shipping-address {
        cursor: pointer;
    }

    .select-shipping-address__button {
        cursor: pointer;
        border-radius: 6px;
        background-color: var(--just_white);
        padding: 8px 129px 10px 15px;
    }

    .phone-input {
        display: block;
        outline: none;
        box-sizing: border-box;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white)!important;
        padding: 12px 0 14px 16px;
        color: var(--asphalt);
    }

    .to-order-button {
        background-color: var(--blueberry);
        border-radius: 6px;
        padding-top: 11px;
        padding-bottom: 16px;
        cursor: pointer;
    }

    .hide-button {
        position: absolute;
        left: 550px;
        top: 15px;
        border: none;
        background-color: var(--just_white);
        cursor: pointer;
    }

    .select-shipping-address {
        text-align: center;
        border-radius: 6px;
    }

    .adress-search-input {
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        color: var(--just_black);
        padding: 7px 0 9px 16px;
    }

    .express-delivery-page-button {
        background-color: var(--blueberry);
        border-radius: 6px;
        padding-top: 11px;
        padding-bottom: 16px;
        cursor: pointer;
    }

    .replaceAnalogPage__button {
        cursor: pointer;
        padding: 11px 0 16px 0;
        border-radius: 6px;
        background-color: var(--blueberry);
    }

    .selected-adress {
        padding: 8px 0 10px 16px;
        border-radius: 6px;
    }

    .selected-adress:hover {
        cursor: pointer;
    }
</style>