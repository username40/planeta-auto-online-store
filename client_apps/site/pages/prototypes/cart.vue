<template>
    <div id="app">
        <app-hint>
            <template v-slot:hintText>Оформите покупку.</template>
        </app-hint>
        <app-header class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
        </app-header>
        <nav class="navigation">
            <ul class="container navigation__main-menu-list">
                <li>
                    <app-main-menu-button class="no-border no-shadow" pathForPage="/prototypes/catalog-upper-lvl">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-all-categories.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Все категории</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-parts.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Запчасти</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-tyres.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Шины</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-wheels.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Диски</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-liquid.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Масла и жидкости</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-accu.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Аккумуляторы</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-other.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Прочее</template>
                    </app-main-menu-button></li>

            </ul>
        </nav>
        <div class="container">
        <div class="bread-crumbs mt30px">
                <p class="Tag-12">
                    <nuxt-link to="/prototypes/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Корзина
                </span>
                </p>
        </div>
        </div>
        <main class="content mt20px">
            <div class="cart-content container">
                <h2 class="h1">Моя корзина — 1 товар</h2>
                <div class="cart__actions mt10px">
                    <app-checkbox
                    id="allGoods"
                    name="allGoods">Выделить все</app-checkbox>
                    <button class="share-cart-btn Body-16-Prime"><img src="/icons/share.svg" alt="">Скопировать ссылку на корзину</button>
                </div>
                <div class="mt30px">
                    <div class="cart-content__title"></div>
                    <div class="cart-content__items-container mt20px">
                        <app-shopping-cart-item>
                            <template v-slot:goodName>Масло моторное 5w40 1л A3/B4 (синт.)</template>
                            <template v-slot:many>Много</template>
                        </app-shopping-cart-item>
                    </div>
                </div>
            </div>
            <article class="satellite-goods-in-cart mt100px" @click="hideSelfPick">
                <div class="container">
                    <h2 class="h1">Сопутствующие товары и скидки</h2>
                </div>
                <div class="container">
                    <div class="slider-container">
                        <app-good-item-grid :class="'mw190px'" v-for="goodItem in otherGoods" :key="goodItem.id">
                            <template v-slot:image>
                                <img :src="goodItem.src" alt="изображение товара" style="width: 160px; height: 160px">
                            </template>
                            <template v-slot:goodName>{{ goodItem.name }}</template>
                            <template v-slot:goodsCategory>Масла</template>
                            <template v-slot:discountTag>
                                <div style="height: 28px!important">
                                    <app-discount-tag
                                            :class="'discount-tag_azalea Body-16-White'" style="display: flex; padding: 3px 13px">
                                        <img src="/icons/percent.svg" alt="">
                                    </app-discount-tag>
                                </div>
                            </template>
                            <template v-slot:price>
                                <p class="h1" style="text-align: center">102 360 ₽</p>
                            </template>
                            <template v-slot:priceButton>
                                <app-price-button-grey-small>В корзину</app-price-button-grey-small>
                            </template>
                        </app-good-item-grid>
                    </div>
                </div>
            </article>
        </main>
        <div class="bottom-fixed-overlay">
        <article class="contact-form">
            <div class="hide" v-if="!showSelfPickUp">
                <button class="hide__btn Body-18" @click.prevent="showSelfPickUp = !showSelfPickUp">Свернуть
                    <img src="/icons/hide__btn-icon.svg" alt="иконка свернуть">
                </button>
            </div>
            <div class="container">
                <form class="row contact-form-form">
                    <div class="col-6">
                        <div class="contact-form__input-overlay" v-if="!showSelfPickUp">
                            <app-select class="store-select" id="select-store">
                                <option value="Комсомольская 5">Самовывоз из магазина (ул. Комсомольская, 5)</option>
                                <option value="Походная 84">Самовывоз из магазина (ул. Походная, 84)</option>
                                <option value="Березовский тракт, 2">Самовывоз из магазина (ул. Березовский тракт, 2)</option>
                            </app-select>

                            <img src="/demo-images/map-in-cart.png" alt="" class="mt20px map-in-cart">
                            <input type="text" class="mt20px contact-form__input Body-18-Prime" id="phone" placeholder="Телефон">
                            <label for="phone" class="Tag-12-60 contact-form__input-label">Нужен для подтверждения заказа оператором магазина</label>
                        </div>
                        <div class="contact-form__input-overlay" v-if="showSelfPickUp">
                            <input type="text" class="contact-form__input Body-18-Prime" id="address" placeholder="Адрес доставки">
                            <button class="contact-form__self-get-btn Body-18-Prime" @click.prevent="showSelfPickUp = !showSelfPickUp">Забрать из магазина</button>
                            <p class="Tag-12-60 contact-form__input-label">Выбрать удобное время и узнать стоимость доставки можно, указав адрес</p>
                        </div>

                        <div class="contact-form__select-overlay">
                            <app-select class="mt20px payment-select" id="payment-method-select">
                                <option value="Оплата онлайн">Банковской картой онлайн</option>
                                <option value="Банковской картой при получении">Банковской картой при получении</option>
                                <option value="Наличными при получении">Наличными при получении</option>
                            </app-select>
                            <div style="margin-left: 20px">
                            <span for="payment-method-select" class="Tag-12-60 contact-form__input-label" style="margin-left: 0">Совершая заказ, вы соглашаетесь с
                            </span><a href="#" class="Tag-12">правилами</a><span class="Tag-12-60"> онлайн продажи
                                и политикой обработки персональных данных</span>
                            </div>
                        </div>
                    </div>
                    <div class="offset-1 col-5 d-flex flex-column justify-content-between">
                        <div style="margin-bottom: 20px">
                            <div class="d-flex justify-content-between">
                                <p class="h3">Стоимость товаров:</p>
                                <p class="h3">15 350 ₽</p>
                            </div>
                            <div class="d-flex justify-content-between blue-border-bottom">
                                <p class="h3">Стоимость доставки:</p>
                                <p class="h3">0 ₽</p>
                            </div>
                            <div class="d-flex justify-content-between mt5px">
                                <button class="discount-coupon Body-16-Prime"><img src="/icons/discount-coupon.svg" alt=""> Добавить купон на скидку</button>
                                <p class="h3">Итого: 15 350 ₽</p>
                            </div>
                        </div>
                        <div>
                            <p class="Body-16 info" v-if="!showSelfPickUp">
                                <img src="/icons/information.svg" alt="">
                                Товары будут в магазине с 4 апреля
                            </p>
                            <nuxt-link to="/prototypes/confirm" class="create-order mt10px Price-White grey-border">Заказать</nuxt-link>
                        </div>
                    </div>
                </form>
            </div>
        </article>

        </div>
    </div>
</template>

<script>
    import Header from '~/components/global/Header'
    import MainMenuButton from '~/components/global/MainMenuButton'
    import Checkbox from '~/components/global/Checkbox'
    import ShoppingCartItem from '~/components/global/ShoppingCartItem'
    import GoodItemGrid from '~/components/global/GoodItemGrid'
    import DiscountTag from '~/components/global/DiscountTag'
    import PriceButton from '~/components/global/PriceButton'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import PriceButtonGreySmall from '~/components/global/PriceButtonGreySmall'
    import ContactLists from '~/components/global/ContactLists'
    import Footer from '~/components/global/Footer'
    import Select from '~/components/global/Select'
    import Hint from '~/components/global/Hint'

    export default {
        name: "cart.vue",
        components: {
            appHeader: Header,
            appMainMenuButton: MainMenuButton,
            appCheckbox: Checkbox,
            appShoppingCartItem: ShoppingCartItem,
            appGoodItemGrid: GoodItemGrid,
            appDiscountTag: DiscountTag,
            appPriceButton: PriceButton,
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appPriceButtonGreySmall: PriceButtonGreySmall,
            appContactLists: ContactLists,
            appFooter: Footer,
            appSelect: Select,
            appHint: Hint

        },
        data() {
            return {

                showSelfPickUp: true,
                otherGoods: [
                    {
                        id: 1,
                        src: '/demo-images/oils/01.jpg',
                        name:'Масло моторное 5w40 1л A3/B4 (синт.)'
                    },
                    {
                        id: 2,
                        src: '/demo-images/oils/02.png',
                        name: 'Масло моторное 5w40 4л A3/B4(синт.).'
                    },
                    {
                        id: 3,
                        src: '/demo-images/oils/03.jpg',
                        name: 'Масло моторное 0w30 A3/B4 1л (синт)'
                    },
                    {
                        id: 4,
                        src: '/demo-images/oils/04.png',
                        name: 'Масло моторное 5w40 синт. 1л'
                    },
                    {
                        id: 5,
                        src: '/demo-images/oils/05.jpg',
                        name: 'Масло моторное 5w40 синт. 4л'
                    },
                    {
                        id: 6,
                        src: '/demo-images/oils/06.png',
                        name: 'Масло моторное 5w30 синт. 5л'
                    },
                    {
                        id: 7,
                        src: '/demo-images/oils/07.jpg',
                        name: 'Масло моторное 0w-20 (1л)'
                    },
                    {
                        id: 8,
                        src: '/demo-images/oils/08.png',
                        name:'Масло моторное 5w40 1л A3/B4 (синт.)'
                    }
                ]
            }
        },
        methods: {
            hideSelfPick() {
                if(this.showSelfPickUp === false) {
                    this.showSelfPickUp = !this.showSelfPickUp
                }
            }
        }
    }
</script>

<style scoped>
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
        box-shadow: 0 -5px 5px -1px var(--blueberry-20), 0 -10px 10px 0 var(--blueberry-14), 0 -18px 18px 0 var(--blueberry-12);
        background-color: var(--just_white);
        padding-top: 30px;
    }

    .contact-form__input-overlay {
        position: relative;
    }

    .contact-form__input {
        padding-top: 15px;
        padding-bottom: 15px;
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
        top: 15px;
    }

    .contact-form__input-label {
        margin-top: 5px;
        margin-left: 20px;
        text-align: left;
    }

    .contact-form__input-label span {
        color: var(--blueberry_deep);
        opacity: 1!important;
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
        padding-top: 10px;
        padding-bottom: 10px;
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
</style>