<template>
    <form class="banner mt20px">
        <div class="banner__container">
            <div class="d-flex">
                <div class="banner__logo d-flex justify-content-center  align-items-center">
                    <img src="/images/icons/banners/logo-company.svg" alt="логотип компании">
                </div>
                <span class="Body-14 ml10px mt5px">Скоро в магазине</span>
            </div>
            <h2 class="h2 mt10px">Больше удобных фильтров в каталоге</h2>
            <p class="Body-18 mt10px">Мы улучшаем магазин и скоро добавим больше фильтров для удобного поиска товаров каталога.</p>
        </div>
        <div class="like-banner mt10px mr15px d-flex justify-content-center  align-items-center">
                <img src="/images/icons/banners/like-banner.svg" alt="лайк баннера">
            </div>
        <div class="banner__footer">
            <input type="text" placeholder="Телефон или эл. почта">
            <button class="Body-16 mt10px">Хочу узнать о запуске</button>
        </div>
    </form>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .banner__container {
        padding: 16px 10px 0 10px;
    }

    .banner {
        display: block;
        background-color: var(--lemon);
        border-radius: 6px;
    }

    .banner__logo {
        width: 28px;
        height: 28px;
        background-color: var(--just_black);
        border-radius: 50%;
    }

    .like-banner {
        margin-left: auto;
        background-color: var(--azalea);
        width: 54px;
        height: 54px;
        border-radius: 50%;
        position: relative;
        z-index: 20;
    }

    .like-banner:hover {
        cursor: pointer;
    }

    .like-banner img {
        width: 24px;
        height: 24px;
    }

    .banner__footer {
        padding: 43px 10px 20px 10px;
        text-align: center;
        background-color: var(--blueberry);
        border-bottom-right-radius: 6px;
        border-bottom-left-radius: 6px;
        margin-top: -25px;
        width: 255px;
    }

    .banner__footer input {
        padding: 12px 16px 14px 16px;
        width: 100%;
        border-radius: 6px;
        border: solid 1px #918dae;
        font-size: 18px;
        padding: 12px 16px 14px 16px;
        outline: none;
    }

    .banner__footer button {
        text-align: center;
        height: 28px;
        width: 235px;
        color: var(--blueberry);
        background-color: var(--just_white);
        border-radius: 6px;
        border: solid 1px #918dae;
        text-align: center;
        /* margin: 5px 0 24px 0; */
    }

    .banner__footer button:hover {
        cursor: pointer;
    }

</style>