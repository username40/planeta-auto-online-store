<template>
    <div>
        <div class="open-order" @click="openCloseItem">
            <div class="d-flex">
                <div>
                    <h3 class="h3">№ E53702</h3>
                    <p class="Body-14">7 ноя 2018</p>
                </div>
                <div class="ml15px">
                    <h3 class="h3">Собираем в отправку</h3>
                    <p class="Body-14">Самовывоз из магазина:</p>
                    <transition name="fade">
                    <button v-if="showItem" class="adress-button Body-16-Prime grey-border d-flex mt5px"><img style="width: 20px; height: 20px" src="/images/icons/lk/adress-icon.svg" alt="">Сибирский тракт, 2</button>
                    </transition>
                    <transition name="fade">
                        <div v-if="showItem" class="d-flex align-items-center">
                            <p class="Body-14">Выдача:</p>
                            <p class="Body-14 mt20px">с 12:00 (29 апреля)<br>до 19:30 (10 марта)</p>
                        </div>
                    </transition>
                    <transition name="fade">
                    <p v-if="showItem" class="Body-14 mt10px">1000 ß будет зачислено</p>
                    </transition>
                </div>
                <div class="ml20px" style="width: 500px">
                    <div class="d-flex">
                        <h3 class="h3">14 товаров</h3>
                        <span class="block-up" id="block"></span>
                        <h3 class="sum h3">903 790 ₽</h3>
                    </div>
                    <transition name="fade">
                        <div v-if="showItem">
                            <table class="mt5px">
                                <tr class="d-flex">
                                    <td><img class="product-image" src="/images/lk/lk-order-item-01.jpg" alt="товар картинка в личном кабинете"></td>
                                    <td class="name-product ml5px"><nuxt-link class="product-link" to="/about"><p class="Body-14-Prime">VAG 030 115 561 AN · Фильтр масляный для двигателя</p></nuxt-link></td>
                                    <td class="ml5px mt5px"><p class="Tag-60">×1</p></td>
                                    <td class="ml10px mt5px">800 510 ₽</td>
                                </tr>
                                <tr class="d-flex mt5px">
                                    <td><img class="product-image" src="/images/lk/lk-order-item-02.jpeg" alt="товар картинка в личном кабинете"></td>
                                    <td class="name-product ml5px"><nuxt-link class="product-link" to="/mvp"><p class="Body-14-Prime">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</p></nuxt-link></td>
                                    <td class="ml5px mt5px"><p class="Tag-60">×1</p></td>
                                    <td class="ml10px mt5px">15 790 ₽</td>
                                </tr>
                                <tr class="d-flex mt5px">
                                    <td><img class="product-image" src="/images/lk/lk-order-item-03.jpg" alt="товар картинка в личном кабинете"></td>
                                    <td class="name-product ml5px"><nuxt-link class="product-link" to="/mvp"><p class="Body-14-Prime">Аккумуляторная батарея (32-45798) 45 · Amh</p></nuxt-link></td>
                                    <td class="ml5px mt5px"><p class="Tag-60">×1</p></td>
                                    <td class="ml10px mt5px">200 790 ₽</td>
                                </tr>
                                <tr class="d-flex mt5px">
                                    <td><img class="product-image" src="/images/lk/lk-order-item-04.jpg" alt="товар картинка в личном кабинете"></td>
                                    <td class="name-product ml5px"><nuxt-link class="product-link" to="/mvp"><p class="Body-14-Prime">Шины Б-24 «Народное достояние» ЛИТОЛ-24 банка 1л (80-А) Автопроизводитель ВОСТОК</p></nuxt-link></td>
                                    <td class="ml5px mt5px"><p class="Tag-60">×1</p></td>
                                    <td class="ml10px mt5px">17 790 ₽</td>
                                </tr>
                                <tr class="d-flex mt5px">
                                    <td><img class="product-image" src="/images/lk/lk-order-item-01.jpg" alt="товар картинка в личном кабинете"></td>
                                    <td class="name-product ml5px"><nuxt-link class="product-link" to="/mvp"><p class="Body-14-Prime">Моторное масло MEGA-OIL Super 10W-40 4 л</p></nuxt-link></td>
                                    <td class="ml5px mt5px"><p class="Tag-60">×1</p></td>
                                    <td class="ml10px mt5px">190 790 ₽</td>
                                </tr>
                            </table>
                        </div>
                    </transition>
                </div>
            </div>
            <transition name="fade">
                <div v-if="showItem" class="container-fluid">
                    <div class="row">
                        <div class="col-6 mt10px">
                            <button class="download-button Body-16-Prime grey-border">Скачать квитанцию (PDF · 0,4 Мб)</button>
                        </div>
                    </div>
                </div>
            </transition>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
              showItem: false,
          }
        },
        methods: {
            openCloseItem() {
                this.showItem = !this.showItem;
                if (document.getElementById('block').getAttribute("class") === "block-up") {
                    return document.getElementById('block').setAttribute("class", "block-down");
                }
                return document.getElementById('block').setAttribute("class", "block-up");
            }
        },
        name: "OrderItemInPersonnelCabin"
    }
</script>

<style scoped>
    .open-order {
        padding: 15px;
        border-radius: 6px;
    }

    .open-order:hover {
        box-shadow: var(--shadow-6-prime);
        cursor: pointer;
    }

    .adress-button {
        background-color: var(--just_white);
        border-radius: 6px;
        padding: 2px 10px 4px 15px;
    }

    .adress-button:hover {
        cursor: pointer;
    }

    .download-button {
        border-radius: 6px;
        background-color: var(--just_white);
        padding: 2px 10px 4px 10px;
    }

    .download-button:hover {
        cursor: pointer;
    }

    .product-link {
        text-decoration: none;
    }

    .product-link:hover {
        text-decoration-line: underline;
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0 ;
    }

    .block-down {
        background: var(--just_black);
        border-radius: 5px;
        padding: 0px;
        position: relative;
        color: #fff;
    }
    .block-down:after {
        content: '';
        position: absolute;
        left: 5px; bottom: -18px;
        border: 5px solid transparent;
        border-top: 5px solid black;
        margin-bottom: 22px;
        margin-right: 20px;
    }

    .block-up {
        background: var(--just_black);
        border-radius: 5px;
        padding: 0px;
        position: relative;
        color: #fff;
    }
    .block-up:after {
        content: '';
        position: absolute;
        left: 5px; bottom: -13px;
        margin-bottom: 22px;
        margin-right: 20px;
        border: 5px solid transparent;
        border-bottom: 5px solid black;
    }



    .product-image {
        width: 30px;
        height: 30px;
    }

    .sum {
        margin-left: auto;
    }

    .name-product {
        width: 350px;
        margin-top: 5px;
    }
</style>