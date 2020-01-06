<template>
    <div>
        <header class="header">
            <div class="container header__container">
                <div class="header__left">
                    <nuxt-link to="/mvp/"><img src="/images/logo/logo_colored.svg" alt="лого" class="header__logo">
                    </nuxt-link>
                    <nav class="header__geolocation">
                        <ul class="header__geolocation-list navigation-list">
                            <li class="header__geolocation-item">
                                <button class="header__geolocation-item_cities-dropdown Body-16-Prime">
                                    <img src="/images/icons/header__geolocation/geolocation-icon_blue.svg"
                                         alt="иконка геолокации" class="header__geolocation-item_icon">
                                    Екатеринбург
                                </button>

                            </li>
                            <li class="header__geolocation-item" v-if="!searchMenu">
                                <nuxt-link to="/mvp/store-and-services"
                                           class="header__geolocation-item_link Body-16-Prime">Магазины
                                </nuxt-link>
                            </li>
                            <li class="header__geolocation-item" v-if="!searchMenu">
                                <nuxt-link to="/mvp/store-and-services"
                                           class="header__geolocation-item_link Body-16-Prime">Автосервисы
                                </nuxt-link>
                            </li>
                        </ul>
                    </nav>
                    <a href="#" class="header__call-us_link">
                        <img src="/images/icons/header__call-us_img/header__call-us_img.svg" alt="позвонить нам иконка"
                             class="header__call-us_img">
                    </a>
                    <form action="" class="header__search-form" v-if="searchMenu">
                        <!--                        <input type="text" class="search-form__input Body-16-Prime grey-border"-->
                        <!--                               placeholder="Поиск по VIN или названию">-->
                        <multiselect
                                v-model="search"
                                :options="searchQuery"
                                track-by="name"
                                label="name"
                                :show-labels="false"
                                open-direction="bottom"
                                @search-change="find"
                                placeholder="Поиск по VIN или названию"
                                :options-limit="6"/>
                        <button class="nano-find-button no-border" type="submit">
                            <img src="/images/icons/search-form/find-icon_blue.svg" alt="иконка поиска">
                        </button>
                    </form>
                </div>
                <div class="header__right">
                    <nav class="header__favorites">
                        <ul class="navigation-list header__my-favorites-list">
                            <li class="header__my-favorites-list-item">
                                <nuxt-link to="/mvp/"><img
                                        src="/images/icons/header__favorites/header__my-favorites-list-item_icon-compare.svg"
                                        alt="" class="header__my-favorites-list-item_icon"></nuxt-link>
                            </li>
                            <li class="header__my-favorites-list-item">
                                <nuxt-link to="/mvp/"><img
                                        src="/images/icons/header__favorites/header__my-favorites-list-item_icon-add-car.svg"
                                        alt="" class="header__my-favorites-list-item_icon"></nuxt-link>
                            </li>
                            <li class="header__my-favorites-list-item">
                                <nuxt-link to="/mvp/"><img
                                        src="/images/icons/header__favorites/header__my-favorites-list-item_icon-add-to-favorites.svg"
                                        alt="" class="header__my-favorites-list-item_icon"></nuxt-link>
                            </li>
                        </ul>
                    </nav>
                    <nuxt-link to="/mvp/" class="header__catalog-link Body-16-Prime" v-if="cartItems.length === 0">
                        <img src="/images/icons/header__catalog-link/add-to-cart_blue.svg" alt="перейтив каталог иконка"
                             class="header__catalog-link_add-to-cart-icon">
                        Пополнить корзину
                    </nuxt-link>
                    <nuxt-link v-else to="/mvp/cart" class="d-flex header__go-to-cart-link Body-16-White">
                        <img src="/images/icons/header__catalog-link/add-to-cart_white.svg"
                             alt="перейтив каталог иконка"
                             class="header__catalog-link_add-to-cart-icon">
                        В корзине {{ cartItems.length }} товар <app-ending-goods-in-cart :nums="cartItems.length"/>
                    </nuxt-link>
                    <button v-if="loginButton" @click="showAside = !showAside" class="header__login-form-button Body-16-Prime grey-border">
                        <img src="/images/icons/header__login-form/header__login-form_icon.svg"
                             class="header__login-form_icon" alt="иконка формы логина">
                        Войти
                    </button>
                    <button v-if="infoUser" class="header__login-form-button Body-16-Prime grey-border">
                        {{ inputContent }}
                    </button>
                </div>
            </div>
        </header>
        <div class="bottom"></div>
        <aside v-if="showAside" class="aside container registration-aside" style="width: 37vw; height: 100vh">
            <form class="container">
                <div class="row">
                    <button @click="hideAside" class="away-from-form Body-18-White hide">Скрыть<img src="/images/icons/registration-aside/hide-available-store-list.svg" alt=""></button>
                    <img src="/images/logo/logo_authorized.svg" alt="лого" class="authorize__logo">
                </div>
                <div class="row justify-content-center">
                    <p class="Tag-60-White text-center mt5px">Вход или регистрация</p>
                </div>
                <div class="row justify-content-center mt80px">
                    <input type="text"
                           :style="styleInput"
                           @keyup="editInputStyle"
                           required
                           id="phone"
                           placeholder="Телефон или эл. почта"
                           v-model="inputContent"
                           class="container authorize__input Body-18">
                    <button v-if="sendAgainButton" class="Body-16-Prime grey-border send-again" type="submit">Отправить ещё раз</button>
                </div>
                <div v-if="wrongMail" class="danger-container row mt10px">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                        <defs>
                            <path id="a" d="M21.907 19.921L12.63 3.37a.723.723 0 0 0-1.26 0L2.094 19.921A.725.725 0 0 0 2.723 21h18.556a.726.726 0 0 0 .624-.358.733.733 0 0 0 .004-.721zm-8.76-1.038h-2.293v-2.118h2.293v2.118zm0-3.707h-2.293V8.824h2.293v6.352z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0h24v24H0z"/>
                            <mask id="b" fill="#fff">
                                <use xlink:href="#a"/>
                            </mask>
                            <g fill="#ff4241" mask="url(#b)">
                                <path d="M0 0h24v24H0z"/>
                            </g>
                        </g>
                    </svg>
                    <p class="Body-14">Неизвестный адрес эл. почты</p>
                </div>
                <div class="row justify-content-center">
                    <p class="Tag-60-White text-center input-description mt5px">Данные будут сохранены и засекречены в вашем кабинете</p>
                </div>

                <transition name="fade">
                    <div class="phoneForm" v-if="showPhoneForm">
                        <div class="row justify-content-center">
                            <button @click.prevent="getSms" v-if="showSmsButton" class="container get-sms-button H2-White mt30px">Получить СМС с кодом</button>
                        </div>
                        <div v-if="showInputPass" class="row">
                            <input type="text"
                                   name="passPhone"
                                   placeholder="Код: __ __ __ __"
                                   v-model="passContent"
                                   :style="styleInputPass"
                                   id="passPhone"
                                   @keyup.delete="clearPassInput"
                                   @dblclick="clearPassInput"
                                   maxlength="4"
                                   class="container authorize__input Body-18 mt30px">
                            <!--                            <label class="label Body-18" for=”passPhone”>Код: __ __ __ __</label>-->
                        </div>
                        <transition name="fade">
                            <div v-if="checkStatus" class="row mt5px" style="position: absolute; margin-left: 23em">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                                    <defs>
                                        <path id="a" d="M11.866 2C17.39 1.928 21.926 6.346 22 11.867c.074 5.521-4.344 10.058-9.865 10.133-5.522.073-10.06-4.345-10.133-9.865-.074-5.522 4.344-10.06 9.865-10.133zm-1.399 16h.058a1.263 1.263 0 0 0 1.006-.562l6.279-9.611c.367-.56.186-1.297-.4-1.646-.589-.35-1.362-.177-1.728.382L10.367 14.7l-2.114-2.66a1.295 1.295 0 0 0-1.756-.231 1.158 1.158 0 0 0-.243 1.673l3.213 4.045c.238.3.609.474 1 .474z"/>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <path d="M0 0h24v24H0z"/>
                                        <mask id="b" fill="#fff">
                                            <use xlink:href="#a"/>
                                        </mask>
                                        <g fill="#e5682c" mask="url(#b)">
                                            <path d="M0 0h24v24H0z"/>
                                        </g>
                                    </g>
                                </svg>
                                <p class="Tag-60-White ml5px">Секундочку...</p>
                            </div>
                        </transition>
                        <div v-if="personPass" class="row">
                            <input type="password"
                                   @keyup="editPassInputStyle"
                                   v-model="personPassContent"
                                   :style="styleInputPass"
                                   id="person-pass"
                                   placeholder="Введите ваш пароль"
                                   class="container authorize__input Body-18 mt30px">
                            <button @click.prevent="comeBack" class="Body-16-Prime grey-border come-back-button" type="submit">Вернуться назад</button>
                        </div>
                        <div v-if="wrongPersonCode" class="row mt10px danger-container">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                                <defs>
                                    <path id="a" d="M21.907 19.921L12.63 3.37a.723.723 0 0 0-1.26 0L2.094 19.921A.725.725 0 0 0 2.723 21h18.556a.726.726 0 0 0 .624-.358.733.733 0 0 0 .004-.721zm-8.76-1.038h-2.293v-2.118h2.293v2.118zm0-3.707h-2.293V8.824h2.293v6.352z"/>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z"/>
                                    <mask id="b" fill="#fff">
                                        <use xlink:href="#a"/>
                                    </mask>
                                    <g fill="#ff4241" mask="url(#b)">
                                        <path d="M0 0h24v24H0z"/>
                                    </g>
                                </g>
                            </svg>
                            <p class="Body-14">Неверный телефон или пароль. Попробуйте ещё раз.</p>
                        </div>
                        <div class="row justify-content-end">
                            <button @click.prevent="loginPersonPass" v-if="loginPersonPassButton" class="get-sms-button H2-White mt30px" style="padding-right: 90px; padding-left: 90px">Войти</button>
                        </div>
                        <div v-if="wrongPhoneCode" class="row mt10px danger-container">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                                <defs>
                                    <path id="a" d="M21.907 19.921L12.63 3.37a.723.723 0 0 0-1.26 0L2.094 19.921A.725.725 0 0 0 2.723 21h18.556a.726.726 0 0 0 .624-.358.733.733 0 0 0 .004-.721zm-8.76-1.038h-2.293v-2.118h2.293v2.118zm0-3.707h-2.293V8.824h2.293v6.352z"/>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z"/>
                                    <mask id="b" fill="#fff">
                                        <use xlink:href="#a"/>
                                    </mask>
                                    <g fill="#ff4241" mask="url(#b)">
                                        <path d="M0 0h24v24H0z"/>
                                    </g>
                                </g>
                            </svg>
                            <p class="Body-14">Неверный код. Попробуйте ещё раз или отправьте новый.</p>
                        </div>
                        <div class="row justify-content-center" style="margin-top: 30%">
                            <button @click.prevent="enterPersonPass" class="enter-pass-button grey-border Body-16-Prime">Ввести свой пароль</button>
                        </div>
                        <div class="row justify-content-center mt30px">
                            <p class="Tag-60-White">или</p>
                        </div>
                        <div class="row justify-content-center">
                            <p @click="hideAside" style="cursor: pointer" class="Tag-60-White">Продолжить покупки без входа и регистрации</p>
                        </div>
                    </div>
                </transition>

                <transition name="fade">
                    <div class="emailForm" v-if="showMailForm">
                        <div class="row">
                            <input type="password"
                                   id="passEmail"
                                   @keyup="editPassInputStyle"
                                   :style="styleInputPass"
                                   v-model="passMailContent"
                                   placeholder="Введите ваш пароль"
                                   class="container authorize__input Body-18 mt30px">
                        </div>
                        <div v-if="notEnterPass" class="row mt10px danger-container">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                                <defs>
                                    <path id="a" d="M21.907 19.921L12.63 3.37a.723.723 0 0 0-1.26 0L2.094 19.921A.725.725 0 0 0 2.723 21h18.556a.726.726 0 0 0 .624-.358.733.733 0 0 0 .004-.721zm-8.76-1.038h-2.293v-2.118h2.293v2.118zm0-3.707h-2.293V8.824h2.293v6.352z"/>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z"/>
                                    <mask id="b" fill="#fff">
                                        <use xlink:href="#a"/>
                                    </mask>
                                    <g fill="#ff4241" mask="url(#b)">
                                        <path d="M0 0h24v24H0z"/>
                                    </g>
                                </g>
                            </svg>
                            <p class="Body-14">Введите пароль или войдите по номеру телефона</p>
                        </div>
                        <div v-if="wrongPassMail" class="row mt10px danger-container">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                                <defs>
                                    <path id="a" d="M21.907 19.921L12.63 3.37a.723.723 0 0 0-1.26 0L2.094 19.921A.725.725 0 0 0 2.723 21h18.556a.726.726 0 0 0 .624-.358.733.733 0 0 0 .004-.721zm-8.76-1.038h-2.293v-2.118h2.293v2.118zm0-3.707h-2.293V8.824h2.293v6.352z"/>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <path d="M0 0h24v24H0z"/>
                                    <mask id="b" fill="#fff">
                                        <use xlink:href="#a"/>
                                    </mask>
                                    <g fill="#ff4241" mask="url(#b)">
                                        <path d="M0 0h24v24H0z"/>
                                    </g>
                                </g>
                            </svg>
                            <p class="Body-14">Неверный пароль</p>
                        </div>
                        <div class="row justify-content-center mt5px">
                            <p class="Tag-60-White">Если вы забыли пароль, нажмите «Войти по номеру телефона»</p>
                        </div>
                        <div class="row justify-content-end">
                            <button @click.prevent="loginUsingMail" v-if="showSmsButton" class="get-sms-button H2-White mt30px" style="padding-right: 90px; padding-left: 90px">Войти</button>
                        </div>
                        <div @click.prevent="enterByPhoneNumber" class="row justify-content-center mt30px">
                            <button class="enter-pass-button grey-border Body-16-Prime">Войти по номеру телефона</button>
                        </div>
                        <div class="row justify-content-center mt30px">
                            <p class="Tag-60-White">или</p>
                        </div>
                        <div class="row justify-content-center">
                            <p @click="hideAside" style="cursor: pointer" class="Tag-60-White">Продолжить покупки без входа и регистрации</p>
                        </div>
                    </div>
                </transition>
                <div class="row">
                    <button @click="hideAside" class="text-center Tag-12 away-from-form">Продолжить покупки без входа и регистрации</button>
                </div>
            </form>
        </aside>
    </div>
</template>

<script>
    import HeaderBanner from '~/components/global/banners/HeaderBanner'
    import EndingGoodsInCart from "../endings/EndingGoodsInCart"
    import Multiselect from 'vue-multiselect'
    import { mask } from 'vue-the-mask'

    export default {
        directives: { mask },
        name: "Header",
        props: ['searchMenu'],
        components: {
            appHeaderBanner: HeaderBanner,
            appEndingGoodsInCart: EndingGoodsInCart,
            Multiselect,
        },
        data() {
            return {
                loginButton: true,
                notEnterPass: false,
                showMailForm: false,
                personPass: false,
                showPhoneForm: false,
                showSmsButton: true,
                showInputPass: false,
                showAside: false,
                infoUser: false,
                smsPasswordField: false,
                wrongMail: false,
                checkStatus: false,
                wrongPhoneCode: false,
                wrongPassMail: false,
                sendAgainButton: false,
                wrongPersonCode: false,
                loginPersonPassButton: false,
                search: null,
                searchQuery: [],
                inputContent: "",
                passContent: "",
                styleInput: "",
                styleInputPass: "",
                passMailContent: "",
                personPassContent: "",
                greenInputStyle: "border: solid 1px #afb500; background-color: #f3ffd9;",
                redInputStyle: "border: solid 1px var(--azalea); background-color: #ffd9d9; color: #e2201f;",
            }
        },
        methods: {
            find(query) {
                if(query.length > 3) {
                    this.$axios.get(`https://lapi.planetavto.ru/api/v1/search?q=${query}`)
                        .then(response => {
                            this.searchQuery = response.data
                        });
                    console.log(query)
                } else {
                    console.log('small')
                }
            },
            hideAside() {
                this.showAside = false;
            },
            editInputStyle() {
                this.styleInput = '';
                this.wrongMail = false;
            },
            editPassInputStyle () {
                this.styleInputPass = '';
                this.wrongPersonCode = false;
                this.wrongPassMail = false;
                this.notEnterPass = false;
            },
            enterByPhoneNumber() {
                this.styleInput = '';
                this.showPhoneForm = true;
                this.showMailForm = false;
                this.inputContent = '+7';
            },
            getSms() {
                const rePhone = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,15}(\s*)?$/;
                const validPhone = rePhone.test(this.inputContent);

                if (validPhone) {
                    this.showInputPass = !this.showInputPass;
                    this.showSmsButton = !this.showSmsButton;
                    this.sendAgainButton = true;
                    this.styleInput = '';
                    // this.passContent = 'Код: ';
                } else {
                    this.styleInput = this.redInputStyle
                }
            },
            enterPersonPass() {
                this.personPass = true;
                this.showInputPass = false;
                this.sendAgainButton = false;
                this.showSmsButton = false;
                this.wrongPhoneCode = false;
                this.styleInputPass = '';
                this.wrongPersonCode = false;
            },
            comeBack() {
                this.personPass = false;
                this.showSmsButton = true;
                this.wrongPersonCode = false;
                this.styleInput = '';
                this.styleInputPass = '';
                this.loginPersonPassButton = false;
            },
            clearPassInput() {
                this.styleInputPass = '';
                this.passContent = '';
                this.wrongPhoneCode = false;
            },
            loginPersonPass() {
                if (1 === 1) {
                    this.styleInput = this.redInputStyle;
                    this.styleInputPass = this.redInputStyle;
                    this.wrongPersonCode = true;
                } else {
                    this.styleInput = this.greenInputStyle;
                    this.styleInputPass = this.greenInputStyle;
                    this.wrongPersonCode = false;
                }
            },
            loginUsingMail() {
                const reMail = /@/;
                const validMail = reMail.test(this.inputContent);

                if (validMail) {
                    this.wrongMail = false;
                    this.styleInput = this.greenInputStyle;
                } else {
                    this.styleInput = this.redInputStyle;
                    this.wrongMail = true;
                }

                if (this.passMailContent.length < 1) {
                    this.notEnterPass = true;
                    this.styleInputPass = this.redInputStyle;
                } else {
                    this.notEnterPass = false;
                    if(1 === 1) {
                        this.wrongPassMail = true;
                        this.styleInputPass = this.redInputStyle;
                    } else {
                        this.wrongPassMail = false;
                        this.styleInputPass = this.greenInputStyle;
                    }
                }
            }
        },
        computed: {
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']

                } catch (e) {
                    console.log('error');
                    error(e)
                }
            }
        },
        watch: {
            inputContent: function () {
                if (this.inputContent[0] === '8' || this.inputContent[0] === '7' || this.inputContent[0] === '9' || this.inputContent[0] === '+') {
                    this.showPhoneForm = true;
                } else this.showMailForm = true;

                if (this.inputContent.length < 1) {
                    this.showMailForm = false;
                    this.showPhoneForm = false;
                }
            },
            passContent: function () {
                if (this.passContent.length === 4) {
                    this.checkStatus = true;
                    const returnAfterPause = () => {
                        this.checkStatus = false;
                        this.styleInputPass = this.redInputStyle;
                        this.wrongPhoneCode = true;
                    };
                    if (1 === 1) {
                        setTimeout(returnAfterPause, 2000);
                    } else {
                        const showCorrectStatus = () => {
                            this.checkStatus = false;
                            this.styleInputPass = this.greenInputStyle;
                            this.styleInput = this.greenInputStyle;
                        };
                        const showInfoUserInHader = () => {
                            this.showAside = false;
                            this.loginButton = false;
                            this.infoUser = true;
                        };
                        setTimeout(showCorrectStatus, 2000);
                        setTimeout(showInfoUserInHader, 3000);
                    }
                }
            },
            personPassContent: function () {
                if (this.personPassContent.length > 0) {
                    this.loginPersonPassButton = true;
                } else {
                    this.loginPersonPassButton = false;
                }
            }
        }
    }
</script>

<style scoped>
    .sendSmsAgain {
        position: absolute;
        border-radius: 6px;
        right: 147px;
        top: 10px;
        cursor: pointer;
    }
    .label-for-input {
        position: absolute;
        top: 15px;
        left: 55px;
    }

    .away-from-form {
        width: 100%;
        background-color: transparent;
        border: none;
        cursor: pointer;
        color: var(--just_white);
        opacity: 0.8;
        margin-top: 350px;
    }

    .authorize__input {
        position: relative;
        outline: none;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        padding: 12px 0 14px 16px;
        color: var(--asphalt);
    }

    .authorize__input:focus {
        color: var(--just_black);
        background-color: var(--just_white);
        border: 1px solid var(--terracota);
    }

    .authorize__input:checked {
        color: var(--just_black);
        background-color: var(--just_white);
    }

    /*.label {*/
    /*    position: absolute;*/
    /*    top: 32.6em;*/
    /*    left: 6em;*/
    /*    color: var(--asphalt);*/
    /*}*/

    .authorize__logo {
        width: 227px;
        height: 61px;
        display: block;
        margin: 283px auto 0;
    }

    .hide {
        display: flex;
        position: absolute;
        top: -170px;
        right: 20px;
        z-index: 2;
        width: auto;
    }

    .registration-aside {
        position: fixed;
        z-index: 15;
        top: 0;
        right: 0px;
        background-color: rgba(50, 55, 125, 0.98);
        padding: 29px 90px 10px 95px;
        animation: moveAside 0.2s linear
    }

    @keyframes moveAside {
        from {
            right: -900px;
        }
        to {
            right: -475px;
        }
    }

    .bottom {
        width: 100%;
        height: 64px;
    }

    .header {
        /*background-color: rgba(255,255,255, 0.98);*/
        width: 100%;
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        background-color: #fff;
    }

    .header__go-to-cart-link {
        background-color: var(--blueberry);
        border-radius: 6px;
        text-decoration: none;
        padding: 2px 20px 4px 20px;
        margin-left: 5px;
    }

    .search-form__input::-webkit-input-placeholder {
        color: var(--blueberry-60);
    }

    .search-form__input:-ms-input-placeholder {
        color: var(--blueberry-60);
    }

    .search-form__input::-ms-input-placeholder {
        color: var(--blueberry-60);
    }

    .search-form__input::placeholder {
        color: var(--blueberry-60);
    }

    .header__search-form {
        margin-left: 18px;
        position: relative;
    }

    .search-form__input {
        border-radius: 6px;
        padding: 3px 10px 3px 30px;
        width: 318px;
        box-sizing: border-box;
    }

    .nano-find-button {
        background-color: transparent;
        position: absolute;
        z-index: 1000;
        left: -2px;
        top: 1px;
    }

    .header__container {
        display: flex;
        justify-content: space-between;
        padding-top: 18px;
        padding-bottom: 18px;

    }

    .header__left {
        display: flex;
        align-items: center;
    }

    .header__logo {
        width: 106px;
        height: 28px;
    }

    .header__geolocation {
        margin-left: 14px;
    }

    .navigation-list {
        display: flex;
        padding-right: 7px;
        border-right: 1px solid var(--blueberry-grey);
    }

    .header__geolocation-item:not(:first-child)::before {
        content: '·';
        padding: 0 5px;
    }

    .header__geolocation-item_cities-dropdown {
        border: none;
        background-color: transparent;
        padding: 0;
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .header__geolocation-item_icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .header__geolocation-item_link {
        text-decoration: none;
    }

    .header__geolocation-item_link:hover {
        text-decoration: none;
    }

    .header__call-us_link {
        margin-left: 8px;
    }

    .header__call-us_img {
        width: 20px;
        height: 20px;
    }

    .header__my-favorites-list-item {
        margin-right: 14px;
    }

    .header__my-favorites-list-item:last-child {
        margin-right: 7px;
    }

    .header__my-favorites-list-item_icon {
        width: 20px;
        height: 20px;
    }

    .header__right {
        display: flex;
        align-items: center;
    }

    .header__catalog-link {
        text-decoration: none;
        margin-left: 14px;
        display: flex;
        align-items: center;
    }

    .header__catalog-link_add-to-cart-icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .header__login-form-button {
        display: flex;
        align-items: center;
        margin-left: 14px;
        cursor: pointer;
        padding: 2px 15px 4px;
        border: none;
        border-radius: 6px;
        background-color: transparent;
        outline: none;
    }

    .header__login-form_icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .get-sms-button {
        border: none;
        cursor: pointer;
        background-color: var(--terracota);
        padding: 12px 0 14px 0;
        border-radius: 6px;
        outline: none;
    }

    .enter-pass-button {
        padding: 2px 30px 4px 30px;
        border-radius: 6px;
        background-color: var(--just_white);
        cursor: pointer;
        outline: none;
    }

    .danger-container {
        border: solid 1px var(--azalea);
        background-color: #ffd9d9;
        border-radius: 3px
    }

    .send-again {
        padding: 2px 15px 4px 15px;
        position: absolute;
        margin-top: 11px;
        margin-left: 165px;
        border-radius: 6px;
        background-color: var(--just_white);
        cursor: pointer;
    }

    .come-back-button {
        padding: 2px 25px 4px 25px;
        position: absolute;
        margin-top: 40px;
        margin-left: 337px;
        border-radius: 6px;
        background-color: var(--just_white);
        cursor: pointer;
        outline: none;
    }

    /*Стили для transition*/

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to  {
        opacity: 0;
    }
</style>