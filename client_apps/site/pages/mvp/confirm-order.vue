<template>
    <div>
        <app-header/>
        <app-list-to-categories-links/>
        <div class="container">
            <div class="bread-crumbs mt30px">
                <p class="Tag-12">
                    <nuxt-link to="/mvp/" class="Tag-12">Главная</nuxt-link>
                    <span class="Tag-12">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        <nuxt-link to="/mvp/confirm" class="Tag-12">Личный кабинет</nuxt-link>

                </span>
                    <span class="Tag-12-60">
                        <img src="/icons/breadcrumbs-arrow-right.svg" alt="" class="breadcrumbs-arrow">
                        Заказ {{ orderNumber }}
                </span>
                </p>
            </div>
        </div>
        <main class="content">
            <article class="order-data">
                <header class="order-data__header mt20px">
                    <div class="container d-flex align-items-end">
                        <h2 class="h1 no-line-height">Заказ оформлен. 28 мая (№ {{ orderNumber }})</h2>
                        <p class="order-status-label Body-16">Сформирован</p>
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
                                <p class="Body-18 order-data__description">{{ order.reduce((a, b) => a + b.price, 0) }} &#8381;</p>
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
                    <ul class="confirm-page-goods__list mt20px">
                        <li v-for="product in order" :key="product.id" class="container mt5px" >
                            <app-good-item-list-in-confirm-page :editQuantity="false" :showHowMany="false" :product="product"/>
                        </li>
                    </ul>
            </article>
        </main>
    </div>
</template>

<script>
    import Header from '~/components/global/headers/Header'
    import ListToCategoriesLinks from '~/components/global/navigation-lists/ListToCategoriesLinks'
    import GoodItemListInConfirmPage from '~/components/global/goodItems/GoodItemListInConfirmPage'

    import MainMenuButton from '~/components/global/MainMenuButton'
    export default {
        name: "confirm-order",
        data() {
            return {
                // orderNumber: response.data.order.id
            }
        },
        methods: {
        },
        components: {
            appHeader: Header,
            appListToCategoriesLinks: ListToCategoriesLinks,
            appMainMenuButton: MainMenuButton,
            appGoodItemListInConfirmPage: GoodItemListInConfirmPage
        },
        computed: {
            products() {
                try {
                    return this.$store.getters['products/products']
                } catch (e) {
                    console.log(error(e))
                }
            },
            orderNumber() {
                try {
                    return this.$store.getters['cart/orderNumber']
                } catch (e) {
                    console.log(error(e))
                }
            },
            cartItems() {
                try {
                    return this.$store.getters['cart/cart']
                } catch (e) {
                    console.log('error')
                    error(e)
                }
            },
            order() {
                try {
                    return this.$store.getters['cart/yourOrder']
                } catch (e) {
                    console.log('error')
                    error(e)
                }
            }
        }
    }
</script>

<style scoped>
    .order-status-label {
        background-color: var(--lemon);
        border-radius: 6px;
        padding: 2px 10px 4px 10px;
        max-height: 28px;
        color: #512794;
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