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
                        Магазины и сервисные центры
                </span>
                </p>
            </div>
        </div>
        <h1 class="h1 container mt20px">Магазины и сервисные центры</h1>
        <div class="container d-flex mt20px">
            <div class="checkbox-overlay">
                <app-checkbox
                :name="'autoService'">Автосервис</app-checkbox>
            </div>
            <div class="checkbox-overlay">
                <app-checkbox
                :name="'carWash'">Мойка</app-checkbox>
            </div>
            <div class="checkbox-overlay">
                <app-checkbox
                :name="'tyresMontage'">Шиномонтаж</app-checkbox>
            </div>
        </div>
        <div class="container mt20px">
            <div class="row">
                <div class="col-9">
<!--                    <p v-for="item in stores" :key="item.id">{{ item.id }}</p>-->
                    <div v-for="storeItem in stores" :key="storeItem.id">
                        <app-store-item-list :storeItem="storeItem"/>
                    </div>
                </div>
                <div class="col-3 stores-map">
<!--                    <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d139671.540382223!2d60.596603441098!3d56.83940498218448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0L_Qu9Cw0L3QtdGC0LAg0LDQstGC0L4!5e0!3m2!1sru!2sru!4v1566367855650!5m2!1sru!2sru" width="255" height="731" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import MiniSearch from '~/components/global/search-forms/MiniSearch'
    import Checkbox from '~/components/global/radio-&-checkbox/Checkbox'
    import StoreItemList from '~/components/global/store-items/StoreItemList'

    export default {
        name: "index",
        components: {
            appHeader: Header,
            appMiniSearch: MiniSearch,
            appCheckbox: Checkbox,
            appStoreItemList: StoreItemList
        },
        data() {
            return {

            }
        },
        methods: {

        },
        computed: {
            stores() {
                try {
                    return this.$store.getters['storeList/storeList']
                } catch (e) {
                    console.log(error(e))
                }
            }
        }
    }
</script>

<style scoped>
    .checkbox-overlay:not(:first-child) {
        margin-left: 24px;
    }

    .stores-map iframe {
        border-radius: 6px;
    }

</style>
