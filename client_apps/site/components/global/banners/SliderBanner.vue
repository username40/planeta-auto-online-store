<template>
    <div class="banner">
        <form action="" class="banner__container">
            <div class="banner__content banner_lemon">
                <div class="d-flex align-items-center">
                    <div class="banner__logo-container d-flex justify-content-center align-items-center">
                        <img src="/images/icons/banners/logo-company.svg" alt="логотип иконка">
                    </div>
                    <p class="Body-14 ml10px">Скоро в магазине</p>
                </div>
                <h2 class="mt10px h2">Ещё больше товаров, удобных функций и возможностей!</h2>
                <p class="Body-18 mt10px">Мы улучшаем магазин и скоро добавим больше товаров фильтров для удобного поиска товаров каталога.</p>
            </div>
            <div class="like-banner mt10px mr15px d-flex justify-content-center  align-items-center">
                <img src="/images/icons/banners/like-banner.svg" alt="лайк баннера">
            </div>
            <div class="banner__content banner_blueberry">
                <input type="text" class="Body-18 grey-border banner__input" placeholder="Телефон или эл. почта" @input="changeColor" :style="color">
                <button @click.prevent="" class="mt10px Body-16-Prime grey-border banner__submit-btn">
                    Хочу узнать об обновлениях</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "SliderBanner",
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
    .like-banner {
        position: absolute;
        padding: 0;
        right: 10px;
        top: 195px;
        margin-left: auto;
        background-color: var(--azalea);
        width: 54px;
        height: 54px;
        border-radius: 50%;
        z-index: 20;
    }

    .like-banner:hover {
        cursor: pointer;
    }
    .banner {
        position: relative;
        padding: 0 15px 0 0;
    }

    .banner__content {
        padding: 16px 10px 0 10px;
    }

    .banner__container {
        width: 410px;
        box-sizing: border-box;
    }

    .banner_lemon {
        background-color: var(--lemon);
        padding-bottom: 40px;
        border-top-right-radius: 6px;
        border-top-left-radius: 6px;
    }

    .banner_blueberry {
        background-color: var(--blueberry);
        padding: 43px 10px 20px 10px;
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .banner__logo-container {
        width: 28px;
        height: 28px;
        background-color: var(--just_black);
        border-radius: 50%;
    }

    .banner__input {
        width: 100%;
        padding: 12px 16px 14px 12px;
        background-color: var(--just_white);
        border-radius: 6px;
    }
    .banner__input::placeholder {
        font-size: 18px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--asphalt);
    }

    banner__input:focus {
        color: var(--just_black)!important;
    }

    .banner__submit-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 2px 0 4px 0;
        background-color: var(--just_white);
        border-radius: 6px;
        width: 100%;
        cursor: pointer;
    }

    .banner__submit-btn:hover .change-fill {
        fill: var(--just_white);
    }

    .banner__submit-btn:hover {
        background-color: var(--blueberry);
        color: var(--just_white)
    }
</style>