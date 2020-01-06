<template>
    <div>
        <app-header/>
        <div class="container mt60px">
            <app-mini-search/>
        </div>
        <div class="container">
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Личный кабинет
                </span>
                </p>
            </div>
        </div>
        <h1 class="h1 container mt30px">Личный кабинет</h1>
        <div class="container d-flex mt20px ">
            <div class="radio-select grey-border radio-select_left-border-radius">
                <input
                        class="radio-select__input"
                        type="radio"
                        id="orders"
                        value="Orders"
                        v-model="personnelDataTabs"
                        hidden>
                <label
                        for="orders"
                        class="radio-select__label Body-18-Prime radio-select_left-border-radius">Заказы</label>
            </div>
            <div class="radio-select grey-border radio-select_right-border-radius">
                <input
                        class="radio-select__input"
                        type="radio"
                        id="garage"
                        value="Garage"
                        v-model="personnelDataTabs"
                        hidden>
                <label for="garage"
                       class="radio-select__label Body-18-Prime radio-select_right-border-radius">Гараж</label>
            </div>
            <div class="d-flex tabs-container">
                <div class="ml5px radio-select grey-border radio-select_left-border-radius">
                    <input
                            class="radio-select__input"
                            type="radio"
                            id="favorites"
                            value="Favorites"
                            v-model="personnelDataTabs"
                            hidden disabled>
                    <label
                            for="favorites"
                            class="radio-select__label Body-18-Prime radio-select_left-border-radius semi-transparent">Избранное</label>
                </div>
                <div class="radio-select grey-border radio-select_right-border-radius">
                    <input
                            class="radio-select__input"
                            type="radio"
                            id="services"
                            value="Services"
                            v-model="personnelDataTabs"
                            hidden disabled>
                    <label for="services"
                           class="radio-select__label Body-18-Prime radio-select_right-border-radius semi-transparent">Услуги сервиса и покупки офлайн</label>
                </div>
                <span class="Body-16-Prime soon">Скоро</span>
            </div>

        </div>
        <div class="container mt10px">
            <div class="row">
                <div class="col-9" v-if="personnelDataTabs === 'Orders'">
                    <app-order-item-in-personnel-cabin/>
                    <button class="container button-show-old-orders grey-border mt30px">
                        <div class="row justify-content-center">
                            <nuxt-link style="text-decoration: none" class="H3-White" to="/mvp">
                                Показать заказы за 2017 год
                            </nuxt-link>
                        </div>
                    </button>
                    <h1 class="h1 mt70px">Персональная скидка на товары</h1>
                    <app-slider-with-goods :id="'slid'">
                        <div class="swiper-slide" v-for="product in products" :key="product.id">
                            <app-good-item-grid-small :product="product"/>
                        </div>
                    </app-slider-with-goods>
                </div>
                <div class="col-9" v-if="personnelDataTabs === 'Garage'">
                    <app-garage-car-item/>
                    <button class="container button-show-old-orders grey-border mt30px">
                        <div @click="showFormAddCar" class="row justify-content-center">
                            <img src="/images/icons/lk/add-car-icon.svg" alt="Добавить автомобиль">
                            <p style="text-decoration: none" class="H3-White ml5px">
                                Добавить автомобиль
                            </p>
                        </div>
                    </button>
                    <div class="mt70px">
                        <app-list-to-categories-links-mini/>
                    </div>
                    <div class="goods-for-car mt30px">
                        <h1 class="h1">Товары для вашего автомобиля</h1>
                        <div class="d-flex justify-content-between mt20px" style="border-radius: 6px">
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Шины</h2><img src="/images/lk/lk-order-image-01.jpg" alt=""></nuxt-link>
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Масла и жидкости</h2><img src="/images/lk/lk-order-image-02.jpg" alt=""></nuxt-link>
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Аккумуляторы</h2><img src="/images/lk/lk-order-image-03.jpg" alt=""></nuxt-link>
                        </div>
                        <div class="d-flex justify-content-between mt10px" style="border-radius: 6px">
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Радардетекторы</h2><img src="/images/lk/lk-order-image-04.jpg" alt=""></nuxt-link>
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Диски</h2><img src="/images/lk/lk-order-image-05.jpg" alt=""></nuxt-link>
                            <nuxt-link to="/mvp"><h2 class="H2-White goods-for-car__h2">Электрика</h2><img src="/images/lk/lk-order-image-06.jpg" alt=""></nuxt-link>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="grey-border profile-settings">
                    <h3 class="h3 text-center">Мой профиль</h3>
                    <h3 class="h3 mt30px">Бонусов накоплено</h3>
                    <p class="Body-18-Prime mt10px d-block profile-settings__accumulated-bonuses">12 600 ß</p>
                    <p class="Tag-12-60">1 бонус = 1 &#8381; скидки</p>
                    <div class="profile-settings__item-container">
                        <h3 class="h3 mt60px">Имя · Фамилия</h3>
                        <input
                                type="text"
                                placeholder="Ваше имя"
                                class="mt10px profile-settings__input Body-18"
                                :value="userName">
                        <img src="/images/icons/lk/edit.svg" alt="" class="profile-settings__edit-icon">
                    </div>
                    <div class="profile-settings__item-container">
                    <h3 class="h3 mt20px">Телефон</h3>
                    <input type="text" placeholder="Телефон" class="mt10px profile-settings__input Body-18"
                           :value="userPhone">
                        <img src="/images/icons/lk/edit.svg" alt="" class="profile-settings__edit-icon">
                    </div>
                    <div class="profile-settings__item-container">
                    <h3 class="h3 mt20px">Телефон</h3>
                    <input type="text" placeholder="Электронная почта" class="mt10px profile-settings__input Body-18"
                           :value="userEmail">
                    <img src="/images/icons/lk/edit.svg" alt="" class="profile-settings__edit-icon">
                    </div>
                    <button class="mt20px Body-16-Prime grey-border transparent change-password-btn" @click="showChangePasswordFields = !showChangePasswordFields">Изменить пароль</button>
                    <div class="mt10px" v-if="showChangePasswordFields">
                        <p class="Body-16 mt10px">Старый пароль</p>
                        <input v-model="userOldPassword" type="password" placeholder="Старый пароль" class=" profile-settings__input Body-18">
                        <p class="Body-16 mt10px">Новый пароль</p>
                        <input v-model="userNewPassword" type="password" placeholder="Новый пароль" class=" profile-settings__input Body-18">
                        <p class="Body-16 mt10px">Подтвердите пароль</p>
                        <input v-model="userConfirmNewPassword" type="password" placeholder="Подтвердите пароль" class="profile-settings__input Body-18">
                        <button
                                class="mt10px Body-16-Prime grey-border transparent change-password-btn"
                                @click="changePassword">
                            Сохранить новый пароль
                        </button>
                    </div>
                    <h3 class="h3 mt60px">Любимый магазин</h3>
                    <multiselect
                            v-model="choosenStore"
                            :options="store"
                            track-by="name"
                            label="name"
                            :show-labels="false"
                            open-direction="bottom"
                            placeholder="Выберите магазин"
                            :internal-search="false"
                            :options-limit="4">
                        <template
                                slot="option"
                                slot-scope="props">
                            <p class="word-wrap-in-multiselect">
                                {{ props.option.name }}
                            </p>
                        </template>
                    </multiselect>
                    <h3 class="h3 mt20px">Адрес доставки</h3>
                    <input type="text" placeholder="Адрес доставки" class="mt10px profile-settings__input Body-18"
                           :value="userAddress">
                    <h3 class="h3 mt60px">Рассылка</h3>
                    <multiselect
                            v-model="choosenPromo"
                            :options="promo"
                            track-by="name"
                            label="name"
                            :show-labels="false"
                            open-direction="bottom"
                            placeholder="Выберите магазин"
                            :internal-search="false"
                            :options-limit="4"/>
                    <ul class="mt20px promo-switchers-list">
                        <li class="mt10px promo-switchers-list__item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="h3">Промо-сообщения</h3>
                                <app-toggle/>
                            </div>
                            <p class="Body-16">Скидки и акции</p>
                        </li>
                        <li class="mt10px promo-switchers-list__item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="h3">Уведомления</h3>
                                <app-toggle/>
                            </div>
                            <p class="Body-16">Изменения статуса заказов</p>
                        </li>
                        <li class="mt10px promo-switchers-list__item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="h3">Оповещения</h3>
                                <app-toggle/>
                            </div>
                            <p class="Body-16">Изменения цен на товары
                                в списке избранного</p>
                        </li>
                        <li class="mt10px promo-switchers-list__item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="h3">Напоминания</h3>
                                <app-toggle/>
                            </div>
                            <p class="Body-16">Замене масла и ТО
                                Визит в сервисный центр</p>
                        </li>
                    </ul>
                </div>
                </div>
                <app-add-auto-aside/>
                <app-car-info-aside/>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import Toggle from '~/components/global/radio-&-checkbox/Toggle'
    import OrderItemInPersonnelCabin from '~/components/global/goodItems/OrderItemInPersonnelCabin'
    import GarageCarItem from '~/components/global/garage/GarageCarItem'
    import Multiselect from 'vue-multiselect'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import ListToCategoriesLinksMini from '~/components/global/navigation-lists/ListToCategoriesLinksMini'
    import AddAutoAside from '~/components/global/lk/AddAutoAside'
    import CarInfoAside from '~/components/global/lk/CarInfoAside'
    import { eventBus } from '~/plugins/eventbus'

    export default {
        name: "lk",
        components: {
            appHeader: Header,
            appMiniSearch: MiniSearch,
            appToggle: Toggle,
            appOrderItemInPersonnelCabin: OrderItemInPersonnelCabin,
            appGarageCarItem: GarageCarItem,
            appSliderWithGoods: SliderWithGoods,
            appGoodItemGridSmall: GoodItemGridSmall,
            appListToCategoriesLinksMini: ListToCategoriesLinksMini,
            appAddAutoAside: AddAutoAside,
            appCarInfoAside: CarInfoAside,
            Multiselect,
        },
        data() {
            return {
                personnelDataTabs: 'Orders',
                showChangePasswordFields: false,
                formAddCar: false,
                carInfoAside: false,
                userName: 'Вячеслав Романцов',
                userPhone: '+7(902)4494579',
                userEmail: 'romancovve@a-trast.ru',
                userAddress: 'Красивых молдавских партизан д.6 кв.69',
                userPassword: 'abcd',
                userOldPassword: null,
                userNewPassword: null,
                userConfirmNewPassword: null,
                choosenStore: null,
                choosenPromo: null,
                store: [
                    {
                        id: 1,
                        name: "ул. Комсомольская, 5"
                    },
                    {
                        id: 2,
                        name: "ул. Походная, 84"
                    },
                    {
                        id: 3,
                        name: "ул. Березовский тракт, 2"
                    },
                ],
                promo: [
                    {
                        id: 1,
                        name: 'Эл. почта + смс'
                    },
                    {
                        id: 2,
                        name: 'Эл. почта'
                    },
                    {
                        id: 3,
                        name: 'смс'
                    }
                ]
            }
        },
        methods: {
            changePassword() {
                console.log(`old password is - ${this.userOldPassword}`)
                console.log(`new password is - ${this.userNewPassword}`)
                console.log(`new confirm password is - ${this.userConfirmNewPassword}`)
                if (this.userPassword === this.userOldPassword) {
                    if (this.userNewPassword === this.userConfirmNewPassword) {
                        console.log('ok')
                    } else {
                        console.log('проверь правильность ввода пароля')
                    }
                        } else {
                    console.log('проверь правильность ввода пароля')
                }

            },
            showFormAddCar() {
               this.formAddCar = true;
                eventBus.$emit('showFormAddCar', this.formAddCar);
            },
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            },
        }
    }
</script>

<style scoped>
    .soon {
        background-color: var(--lemon);
        position: absolute;
        right: -17px;
        top: -15px;
        padding: 1px 10px 3px 10px;
        border-radius: 13px;

    }
    .tabs-container {
        position: relative;
    }

    .order-number {
        width: 95px;
    }
    .order-status {
        width: 265px;
        margin-left: 10px;
    }
    .order-goods {

    }
    .promo-switchers-list__item {
        padding-bottom: 10px;
    }
    .promo-switchers-list__item:not(:last-child) {
        border-bottom: 1px solid var(--asphalt_light);
    }

    .change-password-btn {
        width: 100%;
        text-align: center;
        border-radius: 6px;
        box-shadow: var(--shadow-0);
    }
    .profile-settings__item-container {
        position: relative;
    }

    .profile-settings__input {
        height: 50px;
        box-sizing: border-box;
        padding: 12px 30px 14px 16px;
        box-sizing: border-box;
        width: 100%;
        border-radius: 6px;
        border: 1px solid #918dae;
        cursor: pointer;
    }

    .profile-settings__input:hover + .profile-settings__edit-icon {
        display: none;
    }

    .profile-settings__edit-icon {
        position: absolute;
        right: 5px;
        top: calc(50% + 5px);
    }

    .profile-settings__input:focus {
        border: solid 2px var(--blueberry_lite);
        padding: 11px 29px 13px 15px;
        outline: none;
    }

    .profile-settings__accumulated-bonuses {
        background-color: var(--asphalt_light);
        border-radius: 6px;
        padding: 7px 12px 9px 12px;
    }

    .profile-settings {
        padding: 10px 10px 24px 10px;
        border-radius: 10px;
        box-shadow: var(--shadow-0);
    }

    .radio-select {
        cursor: pointer;
    }

    .radio-select__label {
        display: block;
        height: 100%;
        padding: 8px 24px 8px 24px;
        cursor: pointer;
    }

    .radio-select__label:hover {
        background-color: var(--blueberry_lite);
        color: var(--just_white);
    }

    .radio-select__input:checked + .radio-select__label {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__input:disabled + .radio-select__label {
        color: var(--asphalt_dark);
        background-color: var(--asphalt_light);
        cursor: default;
    }

    .radio-select__input:disabled + .radio-select__label:hover {
        background-color: var(--asphalt_light);
        color: var(--asphalt_dark);
    }

    .radio-select_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .radio-select_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .button-show-old-orders {
        background-color: var(--blueberry);
        border-radius: 6px;
        padding-top: 12px;
        padding-bottom: 14px;
        cursor: pointer;
    }

    .goods-for-car__h2 {
        position: absolute;
        margin-top: 100px;
        margin-left: 15px;
    }

    .goods-for-car img {
        border-radius: 6px;
    }
    </style>      