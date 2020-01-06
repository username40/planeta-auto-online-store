<template>
    <div id="app">
        <app-hint>
            <template v-slot:hintText>Перейдите в каталог моторных масел.</template>
        </app-hint>
        <app-header-no-search class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
        </app-header-no-search>
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
    <main class="content">
        <app-prime-search>
            <app-radio-search-select
                    name="selectParts"
                    :className="'radio-search-select__label Body-18 radio-search-select__label_first grey-border radio-search-select_first'"
                    :identifier="'var1'">Запчасти и аксессуары</app-radio-search-select>
            <app-radio-search-select
                    name="selectParts"
                    :className="'radio-search-select__label Body-18 grey-border'"
                    :identifier="'var2'">Шины</app-radio-search-select>
            <app-radio-search-select
                    name="selectParts"
                    :className="'radio-search-select__label Body-18 radio-search-select__label_last grey-border radio-search-select_last'"
                    :identifier="'var3'">Диски</app-radio-search-select>
        </app-prime-search>
        <div class="special-offers container">
            <div v-for="specialOffer in specialOffers" :key="specialOffer.id">
                <app-special-offer-item :special="specialOffer"></app-special-offer-item>
            </div>
        </div>
        <article class="parts-for-maintenance container">
            <header class="parts-for-maintenance__header">
                <h2 class="h1">Запчасти для ТО</h2>
                <app-radio-search-select
                        class="first-car-btn"
                        name="selectCar"
                        :className="'radio-search-select__label Body-18 radio-search-select__label_first grey-border radio-search-select_first car-icon_black'"
                        :identifier="'car1'">
                    <span class="car-icon"></span>
                    <p>LADA (ВАЗ) Vesta, 2016</p>
                </app-radio-search-select>
                <app-radio-search-select
                        name="selectCar"
                        :className="'radio-search-select__label Body-18 grey-border car-icon_black'"
                        :identifier="'car2'">
                    <span class="car-icon"></span>
                    <p>УАЗ Patriot, 2018</p>
                </app-radio-search-select>

                <app-radio-search-select-dropdown
                        name="selectCar"
                        :className="'grey-border radio-search-select__label radio-search-select_last car-icon_dotted radio-search-select__label_last radio-search-select__label_last-dotted'"
                        :identifier="'car3'"
                >
                    <span class="car-icon_dropdown"></span>
                </app-radio-search-select-dropdown>
<!--                <app-radio-search-select-->
<!--                        name="selectCar"-->
<!--                        :className="'radio-search-select__label Body-18 radio-search-select__label_last grey-border radio-search-select_last car-icon_dotted radio-search-select__label_last-dotted'"-->
<!--                        :identifier="'car4'">-->
<!--                    <span class="car-icon_dropdown"></span>-->
<!--                </app-radio-search-select>-->
                <app-add-car-button class="choose-other-car-btn">Выбрать другой</app-add-car-button>
            </header>
            <div class="row">
                <nav class="col-4">

                    <ul class="parts-for-maintenance__list">
                        <li class="parts-for-maintenance__list-item Body-18" v-for="part in partsForMaintenance" :key="partsForMaintenance.id">
                            <nuxt-link to="/prototypes/catalog" class="list-item-link">
                                <img :src="part.image" :alt="part.title">
                                <span class="list-item-name">{{ part.title }}</span>
                            </nuxt-link>
                        </li>
                    </ul>
                </nav>
                <div class="col-4 parts-link-container">
                    <nuxt-link to="/prototypes/catalog" class="parts-link-item parts-link-item_small h2">
                        <h2 class="parts-link-item__title">Масла и жидкости</h2>
                        <img src="/demo-images/canister-oil.png" alt="" class="parts-link-item__image_absolute">
                    </nuxt-link>
                    <nuxt-link to="/prototypes/catalog" class="parts-link-item parts-link-item_small h2">
                        <h2 class="parts-link-item__title">Колодки и диски</h2>
                        <img src="/demo-images/breaks.png" alt="" class="parts-link-item__image_absolute">
                    </nuxt-link>
                </div>
                <div class="col-4">
                    <nuxt-link to="/prototypes/catalog" class="parts-link-item parts-link-item_big h2">
                        <h2 class="parts-link-item__title">Фильтры маслянные, воздушные, для салона</h2>
                        <img src="/demo-images/air-filter.png" alt="" class="parts-link-item__image_absolute">
                    </nuxt-link>
                </div>
            </div>

        </article>
        <article class="parts-for-maintenance discount container">
            <header class="discount__header"><h2 class="h1">Акции и распродажа сезонных товаров</h2></header>
            <div class="row">

                <nav class="col-3">
                    <ul class="discount__list">
                        <li class="discount__list-item Body-18" v-for="discount in discounts" :key="discounts.id">
                            <nuxt-link to="/prototypes/catalog" class="list-item-link">
                                <img :src="discount.image" :alt="discount.title">
                                <span class="list-item-name">{{ discount.title }}</span>
                            </nuxt-link>
                        </li>
                    </ul>
                </nav>
                <div class="col-3">
                <nuxt-link to="/prototypes/catalog-upper-lvl" class="discount__item">
                    <h2 class="h2">Комплектом дешевле</h2>
                    <img src="/demo-images/complect-cheaper.png" alt=""  class="parts-link-item__image_absolute">
                </nuxt-link>
                </div>
                <div class="col-3">
                <nuxt-link to="/prototypes/catalog-upper-lvl" class="discount__item">
                    <img src="/demo-images/car-body-parts.png" alt=""  class="parts-link-item__image_absolute">
                </nuxt-link>
                </div>
                <div class="col-3 small-links-container">
                    <nuxt-link to="/prototypes/catalog-upper-lvl" class="parts-link-item_small">
                        <img src="/demo-images/rescue-tools.png" alt="">
                    </nuxt-link>
                    <nuxt-link to="/prototypes/catalog-upper-lvl" class="parts-link-item_small">
                        <img src="/demo-images/sound-dymanic.png" alt="">
                    </nuxt-link>
                </div>
            </div>
        </article>
        <article class="service-record container">
            <header class="service-record__header">
                <h2 class="h1 ">Запись на сервис</h2>
            </header>
            <div class="row">
                <div class="col-4">
                    <app-select>
                        <option v-for="service in popularServices" :key="popularServices.id">{{ service.title }}</option>
                    </app-select>
                    <button class="choose-service col-9 grey-border H3-White">Подобрать мастерскую</button>
                    <h3 class="h2 mt40px">Популярные услуги</h3>
                    <ul class="parts-for-maintenance__list">
                        <li class="parts-for-maintenance__list-item Body-18" v-for="service in popularServices" :key="popularServices.id">
                            <a href="/prototypes/catalog-upper-lvl" class="list-item-link">
                                <img :src="service.image" :alt="service.title">
                                <span class="list-item-name">{{ service.title }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="map col-8"></div>
            </div>
        </article>
    </main>
    </div>
</template>

<script>
    import HeaderNoSearch from '~/components/global/HeaderNoSearch'
    import MainMenuButton from '~/components/global/MainMenuButton'
    import PrimeSearch from '~/components/global/PrimeSearch'
    import SpecialOfferItem from '~/components/global/SpecialOfferItem'
    import RadioSearchSelect from '~/components/global/RadioSearchSelect'
    import AddCarButton from '~/components/global/AddCarButton'
    import Select from '~/components/global/Select'
    import DropDownMenu from '~/components/global/DropDownMenu'
    import RadioSearchSelectDropdown from '~/components/global/RadioSearchSelectDropdown'
    import Footer from '~/components/global/Footer'
    import ContactLists from '~/components/global/ContactLists'
    import Hint from '~/components/global/Hint'


    export default {
        name: "index.vue",
        data() {
            return {
                filePath: "/prototypes/catalog-upper-lvl",
                specialOffers: [
                    {
                        id: 1,
                        image: "/demo-images/special-offer-1.jpg",
                        preTitle: "Уникальное предложение",
                        title: "Переобуйся вместе с авто",
                        afterTitle: "Ограниченная серия",
                    },
                    {
                        id: 2,
                        image: "/demo-images/special-offer-2.jpg",
                        preTitle: "Сервис и ремонт",
                        title: "Бесплатная диагностика",
                        afterTitle: "При записи через сайт"
                    },
                    {
                        id: 3,
                        image: "/demo-images/special-offer-3.jpg",
                        preTitle: "Специальное предложение",
                        title: "Балансировка в подарок",
                        afterTitle: "Записаться сейчас"
                    }

                ],
                partsForMaintenance: [
                    {id: 1, image: "/icons/engine-oil.svg", title: "Масло для двигателя"},
                    {id: 2, image: "/icons/oil-filter.svg", title: "Маслянный фильтр"},
                    {id: 3, image: "/icons/air-filter.svg", title: "Воздушный фильтр"},
                    {id: 4, image: "/icons/cabin-filter.svg", title: "Салонный фильтр"},
                    {id: 5, image: "/icons/break-pads.svg", title: "Тормозные колодки"},
                    {id: 6, image: "/icons/break-discs.svg", title: "Тормозные диски"},
                    {id: 7, image: "/icons/grm-belt.svg", title: "Ремень, цепь ГРМ"},
                    {id: 8, image: "/icons/start-candle.svg", title: "Свечи зажигания"},
                    {id: 9, image: "/icons/transmission-oil.svg", title: "Масло для трансмиссии"}
                ],
                discounts: [
                    {id: 2, image: "/icons/oil-filter.svg", title: "Маслянный фильтр"},
                    {id: 3, image: "/icons/air-filter.svg", title: "Воздушный фильтр"},
                    {id: 4, image: "/icons/cabin-filter.svg", title: "Салонный фильтр"},
                    {id: 5, image: "/icons/break-pads.svg", title: "Тормозные колодки"},
                    {id: 6, image: "/icons/break-discs.svg", title: "Тормозные диски"},
                    {id: 7, image: "/icons/grm-belt.svg", title: "Ремень, цепь ГРМ"},
                    {id: 8, image: "/icons/start-candle.svg", title: "Свечи зажигания"},
                    {id: 9, image: "/icons/transmission-oil.svg", title: "Масло для трансмиссии"}
                ],
                popularServices: [
                    {id: 1, image: "/icons/tech-exam.svg", title: "То и плановое обслуживание"},
                    {id: 2, image: "/icons/check-car.svg", title: "Диагностика и мелкий ремонт"},
                    {id: 3, image: "/icons/tyre-install.svg", title: "Шиномонтаж"},
                    {id: 4, image: "/icons/suspence-repair.svg", title: "Ремонт ходовой и тормозной системы"},
                    {id: 5, image: "/icons/cooler.svg", title: "Обслуживание и ремонт кондиционера"},
                    {id: 6, image: "/icons/wash.svg", title: "Мойка и уход"},
                    {id: 7, image: "/icons/fix-car-body.svg", title: "Ремонт кузова"},
                ]
            }
        },
        components: {
            appHeaderNoSearch: HeaderNoSearch,
            appMainMenuButton: MainMenuButton,
            appPrimeSearch: PrimeSearch,
            appSpecialOfferItem: SpecialOfferItem,
            appRadioSearchSelect: RadioSearchSelect,
            appAddCarButton: AddCarButton,
            appSelect: Select,
            appDropDownMenu: DropDownMenu,
            appRadioSearchSelectDropdown: RadioSearchSelectDropdown,
            appFooter: Footer,
            appContactLists: ContactLists,
            appHint: Hint
        }
    }
</script>

<style scoped>
    .navigation {
        margin-top: 16px;
    }

    .navigation__main-menu-list {
        display: flex;
        justify-content: space-between;
    }

    .search-form_prime {
        margin-top: 80px;
    }

    .special-offers {
        margin-top: 124px;
        display: flex;
        justify-content: space-between;
    }

    .parts-for-maintenance {
        margin-top: 132px;
    }

    .parts-for-maintenance__list-item {
        margin-top: 20px;
    }
    .parts-for-maintenance__list-item a{
        text-decoration: none;
        color: var(--just_black);
        display: flex;
        align-items: center;
    }

    .parts-for-maintenance__list-item a:hover {
        text-decoration: none;
    }

    .list-item-name {
        margin-left: 8px;
    }

    .parts-for-maintenance__header {
        display: flex;

    }

    .first-car-btn {
        margin-left: 26px;
    }

    .choose-other-car-btn {
        margin-left: auto;
        border: none!important;
    }
    .choose-other-car-btn > .header-action-button__icon {
        margin-right: 6px;
    }

    .parts-link-item {
        margin-top: 20px;
        padding: 20px;
        border-radius: 8px;
        background-color: rgba(216, 216, 216, 0.2);
        margin-bottom: 20px;
        text-decoration: none;
        position: relative;
        display: block;
        overflow: hidden;
        box-shadow: var(--shadow-1-prime);
    }
    .parts-link-item:hover {
        text-decoration: none;
    }

    .parts-link-item_small {
        height: 170px;
        box-shadow: var(--shadow-1-prime);
        border-radius: 8px;
    }

    .parts-link-item_big {
        height: 100%;
        max-height: 360px;
    }


    .parts-for-maintenance__content {
        margin-top: 20px;
    }

    .parts-link-item__image_absolute {
        position: absolute;
        top: 0px;
        left: 0px;
    }

    .parts-link-item__image_absolute-oil {
        position: absolute;
    }

    .parts-link-item__title {
        position: relative;
        z-index: 5;
    }

    .discount {
        margin-top: 100px;
        display: block;
    }

    .discount__list-item {
        margin-top: 20px;
    }
    .discount__list-item a{
        text-decoration: none;
        color: var(--just_black);
        display: flex;
        align-items: center;
    }

    .discount__list-item a:hover {
        text-decoration: none;
    }

    .list-item-name {
        margin-left: 8px;
    }

    .discount__item {
        position: relative;
        padding: 20px;
        text-decoration: none;
        box-shadow: var(--shadow-1-prime);
        border-radius: 6px;
        display: block;
        width: 100%;
        height: 100%;
        max-height: 350px;
    }

    .discount__item:hover {
        text-decoration: none;
    }

    .discount__item > img {
        width: 100%;
        height: 100%;
    }

    .small-links-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;

    }

    .service-record {
        margin-top: 100px;
    }

    .discount .col-3 {
        margin-top: 20px;
    }

    .service-record .col-3 {
        margin-top: 20px;
    }

    .service-record .col-8 {
        margin-top: 20px;
    }

    .choose-service {
        background-color: var(--blueberry);
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 15px;
        padding-bottom: 15px;
        border: none;
        border-radius: 6px;
        margin-left: auto;
        display: block;
        margin-top: 12px;
    }

    .map {
        border-radius: 8px;
        box-shadow: var(--shadow-1-prime);
        background: url("/demo-images/map.png");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .footer {
        display: flex;
        justify-content: space-between;
        padding-top: 10px;
        padding-bottom: 10px;
    }
</style>