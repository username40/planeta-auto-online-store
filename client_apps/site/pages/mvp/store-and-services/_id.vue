<template>
    <div>
        <app-header/>
        <div class="container mt60px">
            <app-mini-search/>
        </div>
        <div class="container bread-crumbs mt10px">
            <p class="Tag-12">
                <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/store-and-services/" class="Tag-12">Магазины и сервисные центры </nuxt-link>

                </span>
                <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Планета Авто на {{storeList.address}}
                </span>
            </p>
        </div>
        <h1 class="h1 container mt20px">Планета Авто на {{storeList.address}}</h1>
        <main class="content container mt20px">
            <div class="row">
                <div class="col-7">
                    <div class="d-flex justify-content-between">
                        <p class="Body-16">{{ storeList.title }}</p>
                        <div class="d-flex align-items-center">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
                            <img src="/icons/star_empty.svg" alt="отметка звезда">
                            <img src="/icons/star_empty.svg" alt="отметка звезда">
                            <p class="Body-16-Prime ml5px"> {{ storeList.feedbackCount }} отзывов</p>
                        </div>
                    </div>
                    <div class="mt10px">
                        <img v-for="item in storeList.images.slice(0,1)" :key="item.id" :src="item.path" alt=""
                             class="big-image" id="bigImage">
                        <img
                                @click="showSmallImageInBig"

                                v-for="item in storeList.images"
                                :key="item.id"
                                :src="item.path"
                                alt="изображение товара маленькое" class="small-image">
                    </div>
                </div>
                <div class="col-5">
                    <div class="d-flex justify-content-between">
                        <nuxt-link to="/mvp/store-and-services/"
                                   class="d-flex align-items-center Body-16-Prime more-stores"><img
                                src="/images/icons/store/geo.svg" alt="" class="semi-transparent"><span
                                class="ml5px">Еще 7 филиалов</span></nuxt-link>
                        <nuxt-link to="/mvp/store-and-services/"
                                   class="d-flex align-items-center Body-16-Prime more-stores"><img
                                src="/images/icons/store/share.svg" alt="" class="semi-transparent"><span
                                class="ml5px">Поделиться</span></nuxt-link>

                    </div>
                    <iframe class="map mt10px"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2181.418664179403!2d60.65234331613011!3d56.855914913840635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c16dcb67652767%3A0x104da8797d74dca7!2z0J_Qu9Cw0L3QtdGC0LAg0JDQstGC0L4!5e0!3m2!1sru!2sru!4v1566464810277!5m2!1sru!2sru"
                            width="445" height="223" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <div class="grey-border info">
                        <h3 class="h3">Обслуживаем</h3>
                        <ul class="d-flex info__service-list flex-wrap">
                            <li class="service-list__item Body-14" v-for="item in storeList.carsWhatWeServe" :key="item.id">{{ item.name }}</li>
                        </ul>
                        <div>
                            <p class="mt5px Body-14 d-flex align-items-center store__opening-hours info-item">
                                <img src="/images/icons/store/opening-hours.svg" alt="" class="store__icon">
                                <span class="Body-14_lime">Открыто</span>
                                <span>&nbsp;·&nbsp;</span>
                                <span>Сегодня до <span v-for="(item, index) in storeList.schedule" :key="index">
                                <span v-if="index == new Date().getDay() - 1">{{ item.end }}</span>
                            </span>:00</span>
                            </p>
                            <p v-if="storeList.phone" class="mt5px Body-14 d-flex align-items-center info-item">
                                <img src="/images/icons/store/call-us.svg" alt="" class="store__icon">
                                <span>Телефон:</span>
                                <a @click.stop  :href="'tel:'+storeList.phone" class="ml10px store__link">{{ storeList.phone }}
                                    <button
                                            @click.prevent.stop.once="showProneNumber = !showProneNumber"
                                            v-if="showProneNumber"
                                            class="no-border transparent show-phone-button">
                                        <img src="/images/icons/store/show-phone.svg" class="semi-transparent"/>
                                    </button>
                                </a>

                            </p>

                            <p class="mt5px Body-14 d-flex align-items-center info-item">
                                <img src="/images/icons/store/email.svg" alt="" class="store__icon">
                                <span>Эл. почта:</span>
                                <span @click.stop class="ml10px Body-14">{{ storeList.email }}</span>
                            </p>
                            <p class="mt5px Body-14 d-flex align-items-center info-item">
                                <img src="/images/icons/store/write-manager.svg" alt="" class="store__icon">
                                <span @click.stop class="ml10px Body-14">Составить обращение директору</span>
                            </p>
                            <p class="mt5px Body-14 d-flex align-items-center store__link info-item">
                                <img src="/images/icons/store/vk.svg" alt="" class="store__icon">
                                <a @click.stop href="https://vk.com/" class="store__link" target="_blank">Вконтакте</a>
                            </p>
                        </div>
                        <h3 class="h3 mt20px">У нас есть</h3>
                        <ul class="d-flex info__service-list flex-wrap also-we-have">
                            <li class="service-list__item Body-14 also-we-have__item" v-for="item in storeList.alsoWeHave" :key="item.id">{{ item.text }}</li>
                        </ul>
                        <button @click.prevent class="d-block grey-border transparent Body-16-Prime mt20px add-to-favorite-btn">Добавить магазин в список основных</button>
                    </div>
                </div>
            </div>
        </main>
        <main class="container currentSales">
            <h1 class="h1 mt60px">Действующие акции</h1>
            <div class="sales-list mt30px">
                <div class="row">
                    <app-sales-banner v-for="promobanner in storeList.actions" :key="promobanner.id" :promobanner="promobanner"/>
                </div>
            </div>
        </main>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import SalesBanner from '~/components/global/banners/SalesBanner'

    export default {
        validate({params}) {
            return /^\d+$/.test(params.id)
        },
        async asyncData({params, error, store}) {
            try {
                const storeList = await store.dispatch('storeList/fetchStoreListById', params.id)
                return {storeList}
            } catch (e) {
                error(e)
            }
        },
        components: {
            appHeader: Header,
            appMiniSearch: MiniSearch,
            appSalesBanner: SalesBanner
        },
        data() {
            return {
                src: "",
                showProneNumber: true,
                value: null,
            }
        },
        methods: {
            showSmallImageInBig(img) {
                this.src = img.target.src;
                let getDoc = document.getElementById('bigImage')
                getDoc.src = this.src
            }
        },
        computed: {
            banners() {
                try {
                    return this.$store.getters['promobanner/banners']
                } catch (e) {
                    console.log(error(e))
                }
            }
        }
    }
</script>

<style scoped>
    .big-image {
        display: block;
        width: 635px;
        height: 635px;
    }

    .small-image {
        cursor: pointer;
        margin-top: 3px;
        margin-right: 2px;
        width: 73px;
        height: 65px;
    }

    .map, .info {
        border-radius: 8px;
    }

    .more-stores {
        text-decoration: none;
    }

    .more-stores:hover {
        text-decoration: underline;
    }

    .more-stores:hover > img {
        opacity: 1;
    }

    .info {
        padding: 18px 20px 70px 20px;
    }

    .service-list__item::after {
        content: '·';
        padding-left: 3px;
        padding-right: 3px;
    }

    .service-list__item:last-child::after{
        content: ''
    }

    .service-list__item:not(:first-child) {
    }

    .store__icon {
        width: 15px;
        height: 15px;
        margin-right: 3px;
    }

    .store__opening-hours span {
        padding-top: 2px;
    }

    .info-item:hover img {
        opacity: 1;
    }

    .store__link {
        position: relative;
        text-decoration: none;
        color: var(--just_black);
    }

    .show-phone-button {
        position: absolute;
        background-image: linear-gradient(to right, rgba(255, 255, 255, 0.6), var(--just_white));
        right: 0;
        top: -1px;
        width: 25px;
    }

    .show-phone-button > img {
        width: 20px;
        height: 20px;
    }

    .add-to-favorite-btn {
        cursor: pointer;
        padding-top: 2px;
        padding-bottom: 2px;
        border-radius: 6px;
        width: 100%;
    }

    .add-to-favorite-btn:hover {
        box-shadow: var(--shadow-2);
    }

    .radio-select {
        cursor: pointer;
    }
    .radio-select__label {
        display: block;
        height: 100%;
        padding: 11px 20px 8px 20px;
    }

    .radio-select__label:hover {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__label.active {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__input:checked + .radio-select__label {
        background-color: var(--blueberry);
        color: var(--just_white);
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

    .select-goods-container {
        display: flex;
    }
</style>