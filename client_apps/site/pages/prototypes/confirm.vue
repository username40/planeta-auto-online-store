<template>
    <div id="app" @click.once="ShowModalWindow">
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
        <app-hint className="hint__link_blueberry-deep">
            <template v-slot:hintText>Бесплатный демозаказ оформлен. Можно вернуться в начало или оценить сайт →</template>
        </app-hint>
        <app-header class="header_white-background">
            <template v-slot:GeolocationCityName>Екатеринбург</template>
            <template v-slot:Entry>Войти</template>
        </app-header>
        <nav class="navigation">
            <ul class="container navigation__main-menu-list">
                <li>
                    <app-main-menu-button class="no-border no-shadow" pathForPage="/prototypes/catalog-upper-lvl">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-all-categories.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Все категории</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-parts.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Запчасти</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-tyres.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Шины</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-wheels.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Диски</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-liquid.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Масла и жидкости</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-accu.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Аккумуляторы</template>
                    </app-main-menu-button>
                </li>
                <li>
                    <app-main-menu-button :class="'grey-border'" pathForPage="/prototypes/catalog">
                        <template v-slot:image>
                            <img src="/icons/main-menu-btn-other.svg" alt="">
                        </template>
                        <template v-slot:buttonName>Прочее</template>
                    </app-main-menu-button></li>

            </ul>
        </nav>
        <div class="container">
            <div class="bread-crumbs mt30px">
                <p class="Tag-12">
                    <nuxt-link to="/prototypes/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/prototypes/confirm" class="Tag-12">Личный кабинет</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Заказ Е543301-0005
                </span>
                </p>
            </div>
        </div>
        <main class="content">
            <article class="order-data">
                <header class="order-data__header mt20px">
                    <div class="container d-flex">
                        <h2 class="h1">Заказ оформлен. 28 мая (№ Е543301-0005)</h2>
                        <app-discount-tag :class="'discount-tag_lemon'" class="confirm-tag ">Выполняется</app-discount-tag>
                    </div>
                </header>
                <div class="container mt30px order-data__container">
                    <div class="row">
                        <div class="col-2">
                            <p class="h3">Получатель</p>
                            <p class="Body-14 order-data__description">Филиппов Александр</p>
                        </div>
                        <div class="col-4">
                            <p class="h3">Доставка в магазин</p>
                            <p class="Body-14 order-data__description">Екатеринбург, Сибирский тракт, 21</p>
                            <a href="#" class="Body-16-Prime grey-border view-on-map order-data__description">
                                <img src="/icons/view-on-map.svg" alt="иконка посмотреть на карте">
                                Посмотреть на карте</a>
                            <div class="work-hours">
                                <p class="Body-14">Выдача:</p>
                                <div class="work-hours__date-time">
                                    <p class="Body-14">с 12:00 (29 апреля)</p>
                                    <p class="Body-14">до 19:30 (10 марта)</p>
                                </div>
                            </div>
                            <p class="Body-14 order-data__description">1000 ß будет зачислено</p>
                        </div>
                        <div class="col-4">
                            <p class="h3">Оплата</p>
                            <p class="Body-14 order-data__description">При получении</p>
                            <p class="Body-14">Наличными или картой</p>
                        </div>
                        <div class="col-2 d-flex flex-column justify-content-between">
                            <div>
                            <p class="h3">Сумма заказа</p>
                            <p class="Body-18 order-data__description">903 790 ₽</p>
                            </div>
                            <a href="#" class="Body-14-Prime edit-order"><img src="/icons/edit-order.svg" alt="">Изменить заказ</a>
                        </div>
                    </div>
                </div>
            </article>
            <article class="confirm-page-goods mt20px">
                <header class="confirm-page-goods__header container">
                    <div class="row">
                        <h2 class="h3 col-7">Список товаров</h2>
                        <h2 class="h3 col-3">Количество</h2>
                        <h2 class="h3 col-2">Цена</h2>
                    </div>
                </header>
                <div class="container confirm-page-goods__list mt20px">
                    <nuxt-link to="/prototypes/product-page" class="row confirm-page-goods__list-item">
                        <img src="/demo-images/engine-oil.png" alt="" class="col-1">
                        <p class="Body-18 col-6">Масло моторное 5w40 1л A3/B4 (синт.)</p>
                        <p class="Body-18 col-2">1 шт</p>
                        <p class="Body-18 col-2 offset-md-1">3790 ₽</p>
                    </nuxt-link>
                </div>
            </article>
        </main>
    </div>
</template>

<script>
    import Header from '~/components/global/Header'
    import MainMenuButton from '~/components/global/MainMenuButton'
    import ContactLists from '~/components/global/ContactLists'
    import Footer from '~/components/global/Footer'
    import DiscountTag from '~/components/global/DiscountTag'
    import Hint from '~/components/global/Hint'
    export default {
        name: "confirm",
        data() {
            return {
                showModal: false
            }

        },
        methods: {
            ShowModalWindow() {
                return this.showModal = !this.showModal
            }
        },
        components: {
            appHeader: Header,
            appMainMenuButton: MainMenuButton,
            appContactLists: ContactLists,
            appFooter: Footer,
            appDiscountTag: DiscountTag,
            appHint: Hint
        }
    }
</script>

<style scoped>
.confirm-tag {
    margin-left: 10px;
    margin-top: 16px;
}

.order-data__container {
    border-bottom: 1px solid var(--asphalt_light);
    padding-bottom: 20px;
}

.order-data__description {
    margin-top: 6px;
}

    .view-on-map {
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 2px;
        padding-bottom: 4px;
        text-decoration: none;
        border-radius: 6px;
        display: flex;
        align-items: center;
        box-sizing: content-box;
        max-width: 190px;
    }

    .view-on-map:hover {
        text-decoration: none;
    }

    .work-hours {
        margin-top: 16px;
        display: flex;
    }
    .work-hours__date-time {
        margin-left: 23px;
    }

    .edit-order {
        text-decoration: none;
        display: flex;
        align-items: center;
        margin-left: auto;
    }

    .confirm-page-goods__list-item {
        padding-top: 15px;
        padding-bottom: 15px;
        transition: all var(--animation);
        text-decoration: none;
    }

    .confirm-page-goods__list-item:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
        width: calc(100% + 30px);
        border-radius: 6px;
    }

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