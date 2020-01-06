<template>
    <article class="parts-for-maintenance mt100px discount container">
        <header class="discount__header"><h2 class="h1">Товары для вашего автомобиля</h2></header>
        <div class="row">

            <nav class="col-3">
                <ul class="discount__list">
                    <li class="discount__list-item Body-18" v-for="goodForYourCar in GoodsForYourCar" :key="goodForYourCar.id">
                        <nuxt-link :to="goodForYourCar.url" class="list-item-link">
                            <img :src="goodForYourCar.image" :alt="goodForYourCar.title">
                            <span class="list-item-name">{{ goodForYourCar.title }}</span>
                        </nuxt-link>
                    </li>
                </ul>
            </nav>
            <div class="col-3">
                <nuxt-link to="/mvp/" class="discount__item grey-border">
                    <h2 class="h2">Комплектом дешевле</h2>
                    <img src="/images/goods-for-your-car/goods-for-your-car__complect.png" alt=""  class="parts-link-item__image_absolute">
                </nuxt-link>
            </div>
            <div class="col-3">
                <nuxt-link to="/mvp/" class="discount__item grey-border">
                    <img src="/images/goods-for-your-car/goods-for-your-car__parts.png" alt=""  class="parts-link-item__image_absolute">
                </nuxt-link>
            </div>
            <div class="col-3 small-links-container">
                <nuxt-link to="/mvp/" class="parts-link-item_small grey-border">
                    <h2 class="h2">Акции и распродажа</h2>
                    <img src="/images/goods-for-your-car/goods-for-your-car__rescue.png" alt="">
                </nuxt-link>
                <nuxt-link to="/mvp/" class="parts-link-item_small mt10px grey-border">
                    <img src="/images/goods-for-your-car/goods-for-your-car__sound.png" alt="">
                </nuxt-link>
            </div>
        </div>
    </article>
</template>

<script>
    export default {
        name: "ListGoodsForYourCar",
        data() {
            return {
                discounts: [
                    {id: 2, image: "/images/icons/goods-for-your-car/goods-for-your-car__wheels.svg", title: "Диски"},
                    {id: 3, image: "/images/icons/goods-for-your-car/goods-for-your-car__tyres.svg", title: "Шины"},
                    {id: 4, image: "/images/icons/goods-for-your-car/goods-for-your-car__glass-cleaner.svg", title: "Очиститель стекол"},
                    {id: 5, image: "/images/icons/goods-for-your-car/goods-for-your-car__motor-oil.svg", title: "Масло Моторное"},
                    {id: 6, image: "/images/icons/goods-for-your-car/goods-for-your-car__accu.svg", title: "Аккумуляторы"},
                    {id: 7, image: "/images/icons/goods-for-your-car/goods-for-your-car__tech-liquids.svg", title: "Технические жидкости"},
                    {id: 8, image: "/images/icons/goods-for-your-car/goods-for-your-car__special-oils.svg", title: "Специальные масла"},
                    {id: 9, image: "/images/icons/goods-for-your-car/goods-for-your-car__all-for-tyres-and-wheels.svg", title: "Все для шин и дисков"}
                ]
            }
        },
        computed: {
            GoodsForYourCar() {
                return this.$store.getters['lists/GoodsForYourCar']
            }
        }
    }
</script>

<style scoped>
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

    .parts-link-item__image_absolute {
        position: absolute;
        top: 0px;
        left: 0px;
    }


    .discount__item {
        position: relative;
        padding: 20px;
        text-decoration: none;
        border-radius: 6px;
        display: block;
        width: 100%;
        height: 100%;
        max-height: 350px;
    }

    .discount__item:hover {
        text-decoration: none;
        box-shadow: var(--shadow-1-prime);
    }

    .discount__item > img {
        width: 100%;
        height: 100%;
    }

    .parts-link-item_small {
        height: 170px;
        border-radius: 8px;
        position: relative;
        padding: 20px;
        text-decoration: none;
    }

    .parts-link-item_small:hover {
        box-shadow: var(--shadow-1-prime);
    }

    .parts-link-item_small > img {
        position: absolute;
        top: 0;
        left: 0;
    }

    .parts-link-item_small > .h2 {
        position: relative;
        z-index: 10;
    }

    .small-links-container {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
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
</style>