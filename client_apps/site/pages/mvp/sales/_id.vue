<template>
    <div>
        <app-header/>
        <app-list-to-categories-links/>
        <div class="container mt60px">
            <app-mini-search/>
            <div class="bread-crumbs mt10px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/sales" class="Tag-12">Акции</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        {{ banner.title }}
                </span>
                </p>
            </div>
        </div>
        <h1 class="mt30px container h1">{{ banner.title }}</h1>
        <div class="container mt20px">
            <div class="row">
                <div class="col-9">
                    <img :src="'https://lapi.planetavto.ru/' + banner.preview_img_url" alt="акции" class="banner__image">
                    <div class="mt20px" v-html="banner.content"></div>
                </div>
                <div class="col-3">
                    <div class="d-flex">
                        <img src="/images/icons/sales/time-icon.svg" alt="акция закончится">
                        <p class="Body-14 ml5px">До {{ expireDate }}</p>
                    </div>
                    <div class="d-flex align-items-end mt10px">
                        <img class="location-icon" src="/images/icons/sales/location-icon.svg" alt="адреса">
                        <span class="h3 ml5px" v-if="">Во всех магазинах</span>
                    </div>
                    <ul class="ml35px mt10px">
                        <li v-for="department in banner.departments" :key="department.id" :promobanner="department"><nuxt-link class="adress-list Body-18" :to="'/mvp/store-and-services/'+department.id">{{ department.address }}</nuxt-link></li>
                    </ul>
                    <button class="button__show-map Body-16-Prime d-flex align-items-center mt30px grey-border"><img src="/images/icons/sales/show-map-icon.svg" alt="">Показать на карте</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '~/components/global/headers/Header'
import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
import MiniSearch from '~/components/global/search-forms/MiniSearch'

export default {
    components: {
        appHeader: Header,
        appListToCategoriesLinks: ListToCategoriesLinks,
        appMiniSearch: MiniSearch,
    },
    computed: {
        expireDate() {
            const months = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня",
                "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
            const date = new Date(this.banner.expiration_at);
            const day = date.getDate();
            const currentMonth = date.getMonth();
            const year = date.getFullYear();
            return `${ day } ${months[currentMonth]} ${ year }`;
        }
    },
    validate({params}) {
            return /^\d+$/.test(params.id)
        },
        async asyncData({params, error, store}) {
            try {
                console.log(params.id)
                const banner = await store.dispatch('promobanner/fetchpromoBannersById', params.id)
                return {banner}
            } catch (e) {
                error(e)
            }
        },
        async products() {
                try {
                    return this.$store.getters['promobanner/banners']
                } catch (e) {
                    console.log(error(e))
                }

    }
}
</script>

<style scoped>
    .banner__image {
        width: 100%
    }

    .location-icon {
        margin-top: -18px;
    }
    .button__show-map {
        border-radius: 6px;
        background-color: var(--just_white);
        padding: 2px 42px 4px 41px;
        outline: none;
        cursor: pointer;
    }

    .adress-list {
        text-decoration: none;
    }

    .adress-list:hover {
        text-decoration-line: underline;
    }
</style>