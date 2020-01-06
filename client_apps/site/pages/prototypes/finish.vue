<template>
    <div class="finish" v-show="showModal" @click.self="ShowModalWindow">
        <div class="container">
            <div class="row">
                <div class="offset-1 finish__modal">
                    <div class="offset-1">
                        <div class="finish__title">
                        <h2 class="h1-43px mt70px">Супер</h2>
                            <img src="/demo-images/like-hand.png" alt="">
                        </div>
                        <p class="mt30px Body-18">Вы формили заказ на бочку масла :-)</p>
                        <p class="Body-18">Расскажите, что думаете о новом сайте магазина?</p>
                        <a
                                href="https://docs.google.com/forms/d/e/1FAIpQLSeaMthUUCulpddHJfoxhUZImPd3kbT3h96RYIzqwb6904cKCQ/viewform"
                                target="_blank"
                                class="mt30px finish__feedback-link H3-White grey-border">Оценить сайт</a>
                        <nuxt-link to="/prototypes/start" class="grey-border Body-16-Prime mt30px finish__to-start-page-link">Вернуться в начало</nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "finish",
        data() {
            return {
                showModal: true
            }
        },
        methods: {
            ShowModalWindow() {
                return this.showModal = !this.showModal
            }
        }
    }
</script>

<style scoped>
    .finish {
        position: fixed;
        z-index: 20;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(50, 55, 125, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .finish__modal {
        position: relative;
        opacity: 1;
        background: url("/demo-images/finish.png"), var(--blueberry);
        background-repeat: no-repeat;
        background-size: cover;
        width: 920px;
        height: 760px;
    }

    .finish__title {
        display: flex;
        align-items: flex-end;
    }

    .finish__title > h2 {
        width: auto;
    }

    .finish__title > img {
        height: 43px;
        margin-left: 20px;
    }
    .finish__feedback-link {
        display: block;
        background-color: var(--blueberry_deep);
        color: var(--just_white);
        width: 445px;
        text-decoration: none;
        padding-top: 12px;
        padding-bottom: 12px;
        border-radius: 6px;
        text-align: center;
        box-shadow: var(--shadow0);
    }

    .finish__feedback-link:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .finish__to-start-page-link {
        display: block;
        width: 445px;
        text-decoration: none;
        padding-top: 4px;
        padding-bottom: 2px;
        text-align: center;
        border-radius: 6px;
        box-shadow: var(--shadow0);
    }

    .finish__to-start-page-link:hover {
        box-shadow: var(--shadow-6-prime);
    }
</style>