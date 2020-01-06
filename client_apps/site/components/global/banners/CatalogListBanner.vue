<template>
    <form class="banner">
        <div class="banner__content banner_lemon">
            <div class="d-flex align-items-center">
                <div class="banner__logo-container d-flex justify-content-center align-items-center">
                    <img src="/images/icons/banners/logo-company.svg" alt="логотип иконка">
                </div>
                <p class="Body-14 ml10px">Скоро в магазине</p>
            </div>
            <h2 class="mt10px h2">Ещё больше товаров, удобных функций и возможностей!</h2>
            <p class="mt10px Body-18">Мы улучшаем наш магазин и скоро добавим много полезных функций и расширим ассортимент товаров. Понимаем, сайт пока не совсем удобен, но это временно :-)</p>
        </div>
        <div class="banner__content banner_blueberry d-flex align-items-end justify-content-end">
            <label for="mailOrPhone">
                <p class="ml15px Tag-60-White">Оставьте контакты и сообщим вам о скидках и обновлениях</p>
                <input type="text" id="mailOrPhone" class="H3-Placeholder grey-border banner__input mt5px" placeholder="Телефон или эл. почта" @input="changeColor" :style="color">
            </label>
            <button class="grey-border H2-Bold-white banner__submit-button no-border ml10px">Давно пора</button>

        </div>
    </form>
</template>

<script>
    export default {
        name: "CatalogListBanner",
        data() {
            return {
                color: ''
            }
        },
        methods: {
            changeColor() {
                this.color = 'color: black!important'
            }
        }
    }
</script>

<style scoped>
    .banner {

    }

    .banner__logo-container {
        width: 28px;
        height: 28px;
        background-color: var(--just_black);
        border-radius: 50%;
    }

    .banner__content {

    }

    .banner_lemon {
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
        background-color: var(--lemon);
        padding: 10px 30px 20px 30px;
    }

    .banner_blueberry {
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
        background-color: var(--blueberry);
        padding: 12px 30px 20px;
    }
    .banner__input {
        width: 445px;
        padding: 12px 16px 14px 12px;
        background-color: var(--just_white);
        border-radius: 6px;
    }

    .banner__submit-button {
        padding: 8px 38px 10px 38px;
        background-color: var(--azalea);
        border-radius: 6px;
    }
</style>