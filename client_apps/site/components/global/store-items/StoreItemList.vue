<template>
    <div class="container">
        <div class="store row" @click="goTo(storeItem)">
            <div class="default-store-img d-flex align-items-center justify-content-center" v-if="storeItem.images.length === 0">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="202" height="202" viewBox="0 0 202 202">
                    <defs>
                        <path id="defaultStoreIcon" d="M179.48 16.8a5.319 5.319 0 0 1 5.32 5.321v133.89c0 11.242-9.153 20.389-20.395 20.389H22.12a5.319 5.319 0 0 1-5.321-5.321V22.115a5.316 5.316 0 0 1 5.32-5.315zM74.925 122.788l-47.49 38.374v4.602h90.795l-43.305-42.976zm69.49-30.447l-41.966 42.782 30.877 30.641h31.081c5.377 0 9.757-4.373 9.757-9.75V122.79l-29.749-30.45zM27.436 27.43v120.046l44.509-35.953a5.324 5.324 0 0 1 7.094.36l15.86 15.745 45.736-46.611a5.313 5.313 0 0 1 3.794-1.596c1.436 0 2.806.582 3.807 1.608l25.929 26.546V27.436l-146.73-.006zm53.183 67.204v8.665H69.984v-8.665h10.635zM97 83.449l6.122 6.122-7.52 7.521-6.123-6.123 7.52-7.52zm-43.401 0l7.52 7.52-6.122 6.123-7.52-7.52 6.122-6.123zm21.707-34.972c11.455 0 20.773 9.325 20.773 20.787s-9.318 20.793-20.773 20.79c-11.468 0-20.796-9.325-20.796-20.79s9.328-20.787 20.796-20.787zm0 10.633c-5.61 0-10.16 4.557-10.16 10.154 0 5.596 4.55 10.157 10.16 10.154 5.59 0 10.14-4.558 10.14-10.154 0-5.597-4.55-10.154-10.14-10.154zm34.03 4.839v10.636h-8.665V63.949h8.665zm-59.409 0v10.636h-8.658V63.949h8.658zm5.07-22.497l6.12 6.116-7.517 7.525-6.121-6.116 7.517-7.525zm40.604-.006l7.52 7.521-6.122 6.123-7.52-7.52 6.122-6.124zm-14.98-6.211V43.9H69.983v-8.665h10.635z"/>
                    </defs>
                    <g fill="none" fill-rule="evenodd" opacity=".6">
                        <path d="M0 0h201.6v201.6H0z"/>
                        <mask id="defaultStoreIconMask" fill="#fff">
                            <use xlink:href="#defaultStoreIcon"/>
                        </mask>
                        <g fill="#32377D" mask="url(#defaultStoreIconMask)">
                            <path d="M0 0h202.158v202.158H0z"/>
                        </g>
                    </g>
                </svg>

            </div>
            <img v-for="item in storeItem.images.slice(0,1)" :key="item.id" :src="item.path" alt=""
                 class="store__image">
            <div class="store__info col-9 d-flex justify-content-between">
                <div class="left">
                    <h3 class="h3">{{ storeItem.address }}</h3>
                    <p class="mt5px Body-14 d-flex align-items-center store__opening-hours info-item">
                        <img src="/images/icons/store/opening-hours.svg" alt=""
                             class="semi-transparent store__icon">
                        <span class="Body-14_lime">Открыто</span>
                        <span>&nbsp;·&nbsp;</span>
                        <span>Сегодня до <span v-for="(item, index) in storeItem.schedule" :key="index">
                                <span v-if="index == new Date().getDay() - 1">{{ item.end }}</span>
                            </span>:00</span>
                    </p>
                    <p v-if="storeItem.phone" class="mt5px Body-14 d-flex align-items-center info-item">
                        <img src="/images/icons/store/call-us.svg" alt="" class="semi-transparent store__icon">
                        <span>Телефон:</span>
                        <a @click.stop :href="'tel:'+storeItem.phone" class="ml10px store__link">
                            <span v-if="showProneNumber">{{ shortPhone }}</span>
                            <span v-if="!showProneNumber">{{ storeItem.phone }}</span>
                            <button
                                    @click.prevent.stop.once="showProneNumber = !showProneNumber"
                                    v-if="showProneNumber"
                                    class="no-border transparent show-phone-button">
                                <img src="/images/icons/store/show-phone.svg" class="semi-transparent"/>
                            </button>
                        </a>
                    </p>
                    <a :href="'mailto:'+storeItem.email" v-if="storeItem.email" class="mt5px Body-14-Prime d-flex align-items-center info-item">
                        <img src="/images/icons/store/email.svg" alt="" class="semi-transparent store__icon">
                        <span>Написать обращение</span>
                        <span @click.stop class="ml10px Body-14">{{ storeItem.email }}</span>
                    </a>
                    <p v-if="storeItem.vk" class="mt5px Body-14-Prime d-flex align-items-center store__link info-item">
                        <img src="/images/icons/store/vk.svg" alt="" class="semi-transparent store__icon">
                        <a @click.stop href="https://vk.com/" class="store__link" target="_blank">Вконтакте</a>
                    </p>
                    <button class="Body-14-Prime transparent no-border add-to-favorite-store-btn d-flex align-items-center">
                        <img src="/images/icons/store/add-to-favorite-store.svg"
                             class="semi-transparent add-to-favorite-store-btn__icon" alt="">Добавить магазин в список
                        основных
                    </button>
                </div>
                <div class="right" style="max-width: 255px">
                    <nav class="also-we-have">
                        <p class="Body-14">Здесь есть:</p>
                        <ul class="" v-if="storeItem.also">
                            <li v-for="also in storeItem.also" :key="also.id" class="Body-14 also-we-have__item">{{
                                also.text }}
                            </li>
                        </ul>
                        <div v-else-if="!storeItem.also">
                        <p class="Body-14">Запчасти и аксессуары,</p>
                        <p class="Body-14">аккумуляторы, шины и диски</p>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "StoreItemList",
        props: {
            storeItem: {}
        },
        data() {
            return {
                showProneNumber: true
            }
        },
        methods: {
            goTo(storeItem) {
                this.$router.push(`/mvp/store-and-services/${storeItem.id}`)
            }
        },
        computed: {
            shortPhone() {
                return this.storeItem.phone.slice(0,14)
            }
        }
    }
</script>

<style scoped>
    .default-store-img {
        height: 160px;
        width: 160px;
        background-color: var(--snow);
        opacity: 0.6;
    }

    .default-store-img > svg {
        width: 150px;
        height: 150px;
    }
    .store {
        cursor: pointer;
        padding: 15px 0 15px 0;
        border-radius: 6px;
    }

    .store:hover {
        box-shadow: var(--shadow-6);
        margin-right: -30px;
        margin-left: -30px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .info-item:hover img {
        opacity: 1;
    }

    .store__image {
        border-radius: 3px;
        width: 160px;
        height: 160px;
    }

    .store__icon {
        width: 15px;
        height: 15px;
        margin-right: 3px;
    }

    .Body-14_lime {
        color: var(--lime)
    }

    .store__opening-hours span {
        padding-top: 2px;
    }

    .store__link {
        position: relative;
        text-decoration: none;
        color: var(--just_black);
    }

    .add-to-favorite-store-btn {
        margin-left: -6px;
        margin-top: 12px;
    }

    .add-to-favorite-store-btn:hover {
        text-decoration: underline;
    }

    .also-we-have__item::before {
        content: '• ';
    }

    .also-we-have {
        display: none;
    }

    .store:hover .also-we-have {
        display: block;
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

    .add-to-favorite-store-btn__icon {
        width: 18px;
        height: 18px;
    }

    .add-to-favorite-store-btn:hover > img {
        opacity: 1;
    }
</style>