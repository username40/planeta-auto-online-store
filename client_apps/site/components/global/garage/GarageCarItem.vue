<template>
    <div class="carItem__container">
        <div class="carItem">
            <div class="container">
                <div class="row">
                    <div class="mt20px col-3">
                        <app-checkbox class="checkbox" style="position: absolute"></app-checkbox>
                        <img src="/images/lk/shkoda.jpg" alt="car" style="width: 160px; height: 165px; padding: 0">
                    </div>
                    <div class="mt20px col-9">
                        <div class="container">
                            <div class="row">
                                <div class="col-7">
                                    <div class="specific Body-14">
                                        <h3 class="h3">Название машины</h3>
                                        <ul>
                                            <li class="mt10px">VIN: JM035NK940ZJ004469</li>
                                            <li>Год выпуска: 2012</li>
                                            <li>Двигатель: дизель</li>
                                            <li>Код модели: 5J2, 542</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="links col-5">
                                    <div class="d-flex">
                                        <img src="/images/icons/lk/oil-icon.svg" alt="Масла">
                                        <h3 class="h3 ml10px">Масла и жидкости</h3>
                                    </div>
                                    <div class="d-flex mt5px">
                                        <img src="/images/icons/lk/parts-icon.svg" alt="Запчасти">
                                        <h3 class="h3 ml10px">Запчасти</h3>
                                    </div>
                                    <div class="d-flex mt5px">
                                        <img src="/images/icons/lk/battery-icon.svg" alt="Комплекты для ТО">
                                        <h3 class="h3 ml10px">Комплекты для ТО</h3>
                                    </div>
                                    <div class="d-flex mt5px">
                                        <img src="/images/icons/lk/wheel-icon.svg" alt="Шины и диски">
                                        <h3 class="h3 ml10px">Шины и диски</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt10px ml15px">
                            <nuxt-link class="car-item-link Body-14-Prime mt10px" to="/mvp">Все характеристики</nuxt-link>
                            <div class="container">
                                <div class="row">
                                    <nuxt-link class="car-item-link Body-14-Prime" to="/mvp">Открыть каталог товаров</nuxt-link>
                                    <div @click="showCarInfoAside" class="d-flex" style="margin-left: auto">
                                        <img class="ml5px" src="/images/icons/lk/pencil-icon.svg" alt="Изменить">
                                        <p class="Body-14-Prime" style="margin-top: 3px">Изменить</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Checkbox from '~/components/global/radio-&-checkbox/Checkbox'
    import { eventBus } from '~/plugins/eventbus'

    export default {
        data() {
            return {
                checkbox: false,
                links: false,
                carInfoAside: false,
            }
        },
        name: "GarageCarItem",
        components: {
            appCheckbox: Checkbox,
        },
        methods: {
            showCarInfoAside() {
              this.carInfoAside = true;
              eventBus.$emit('showCarInfoAside', this.carInfoAside);
            },
        }
    }
</script>

<style scoped>
    .carItem__container {
        cursor: pointer;
    }

    .carItem {
        border-radius: 6px;
        box-shadow: none;
        transition: box-shadow var(--animation);
        background-color: var(--just_white);
        padding-bottom: 15px;
    }

    .carItem:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .car-item-link {
        text-decoration: none;
    }

    .car-item-link:hover {
        text-decoration-line: underline;
    }

    .links {
        visibility: hidden;
    }

    .checkbox {
        visibility: hidden;
    }

    .carItem__container:hover .links {
        visibility: visible;
    }

    .carItem__container:hover .checkbox {
        visibility: visible;
    }


</style>