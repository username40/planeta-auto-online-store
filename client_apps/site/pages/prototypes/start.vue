<template>
    <div id="app">

        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h1 class="h1-43px">Здравствуйте!</h1>
                    <p class="Body-18 mt30px">Это демо прототип новой версии сайта.</p>
                    <p class="Body-18">Вы можете посмотреть, как он устроен, и попробовать некоторые из основных функций: найти тестовый товар в каталоге, добавить его в корзину, оформить покупку.</p>
                    <br>
                    <p class="Body-18"> Обратите внимание: в демоверсии многие функции недоступны — например, нельзя воспользоваться поиском, фильтрами каталога и перейти в личный кабинет ползователя. Эти функции можно будет попробовать в бета версии сайта, позднее.</p>
                    <nuxt-link to="/prototypes/" class="H3-White demo-start-link mt30px col-8 grey-border">Открыть демоверсию</nuxt-link>
                </div>
                <div class="prototype-img col-6 align-items-end">
                <img src="/demo-images/demo-site-img.png" alt="" class="" style="height: 318px">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "start"
    }
</script>

<style scoped>
    #app {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .prototype-img {
        display: flex;
    }
.demo-start-link {
    background-color: var(--blueberry_deep);
    padding-top: 12px;
    padding-bottom: 12px;
    border-radius: 6px;
    text-decoration: none;
    transition: all var(--animation);
    display: block;
    text-align: center;
}
.demo-start-link:hover {
    background-color: var(--just_white);
    color: var(--blueberry_deep);
}
</style>