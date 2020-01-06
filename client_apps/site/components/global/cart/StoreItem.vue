<template>
    <div class="store-item mt10px">
        <div>
            <div class="d-flex">
                <h3 class="h3"><slot name="addr"/></h3>
                <span class="ml10px H3-Placeholder"><slot name="city-id"/></span>
            </div>
            <div class="d-flex mt10px">
                <p class="Body-14">Доставим:</p>
                <p class="Body-14 ml15px"><slot name="deliveryTime"/></p>
            </div>
            <div class="d-flex">
                <p class="Body-14">Резерв:</p>
                <p class="Body-14 ml35px">3 дня</p>
            </div>
            <div class="d-flex justify-content-between mt5px">
                <p style="color: var(--radiance)">В наличии:	<slot name="quantity"/></p>
                <button @click="showSelectedAdress" class="take-button align-items-center d-flex ml35px grey-border Body-16-Prime" style="margin-top: -13px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M12 3c2.131 0 4 1.73 4 3.702 0 2.05-1.714 4.941-4 8.561-2.286-3.62-4-6.511-4-8.561 0-1.972 1.869-3.702 4-3.702zm0-2c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm8 6h-3.135c-.385.641-.798 1.309-1.232 2h3.131l.5 1h-4.264l-.344.544-.289.456h.558l.858 2h-7.488l.858-2h.479l-.289-.456-.343-.544h-2.042l-1.011-1h2.42c-.435-.691-.848-1.359-1.232-2h-3.135l-4 8h24l-4-8zm-12.794 6h-3.97l1.764-3.528 1.516 1.528h1.549l-.859 2zm8.808-2h3.75l1 2h-3.892l-.858-2z"/></svg>
                    <span class="ml5px">Заберу здесь</span>
                </button>
            </div>
            <div v-if="false" class="analog-container mt10px">
                <p style="color: var(--azalea); margin-left: 55px">Эти товары временно недоступны в данном магазине</p>
                <div class="container mt5px">
                    <div class="row">
                        <div class="col-1"><img src="/images/lk/lk-order-item-02.jpeg" alt="Товар"></div>
                        <div class="col-8">
                            <p style="font-size: 14px">Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шипованная по всей длин…</p>
                        </div>
                        <div class="col-3">
                            <p style="font-size: 14px">99 909 ₽</p>
                        </div>
                    </div>
                    <div class="row mt5px" style="margin-left: 42px">
                        <button @click="showAnalogs" class="analog-container__button Body-16-Prime grey-border">Показать аналоги от 101 799 Р</button>
                    </div>
                </div>
                <div class="container mt10px">
                    <div class="row">
                        <div class="col-1"><img src="/images/lk/lk-order-item-04.jpg" alt="Товар"></div>
                        <div class="col-8">
                            <p style="font-size: 14px">Диск Bridgestone Hakkapeliitta 7 SUV 215/55</p>
                        </div>
                        <div class="col-3">
                            <p style="font-size: 14px">7 690 ₽</p>
                        </div>
                    </div>
                    <div class="row mt5px" style="margin-left: 42px">
                        <button @click="showAnalogs" class="analog-container__button Body-16-Prime grey-border">Показать аналоги от 8 019 Р</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { eventBus } from '~/plugins/eventbus'

    export default {
        data() {
            return {
                analogsPage: false,
                selectedAdress: false,
            }
        },
        methods: {
            showAnalogs() {
                this.analogsPage = !this.analogsPage;
                eventBus.$emit('showAnalogPage', this.analogsPage);
            },
            showSelectedAdress() {
                  this.selectedAdress = !this.selectedAdress;
                  eventBus.$emit('showSelectedAdress', this.selectedAdress);
            },
        },
        computed: {
            stores() {
                try {
                    return this.$store.getters['storeList/storeList']
                } catch (e) {
                    console.log(error(e))
                }
            },

            availableStoreList() {
                try{
                    return this.$store.getters['storeList/availableStoreList']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getMyStores() {
                try {
                    return this.$store.getters['storeList/getMyStores']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getstoresOfProduct() {
                try {
                    return this.$store.getters['storeList/getstoresOfProduct']
                } catch (e) {
                    console.log(error(e))
                }
            },
            getWhatProduct() {
                try {
                    return this.$store.getters['storeList/getWhatProduct']
                } catch (e) {
                    console.log(error(e))
                }
            }
        },
    }
</script>

<style scoped>
    .take-button {
        background-color: var(--snow);
        padding: 4px 15px 4px 15px;
        border-radius: 6px;
        color: var(--blueberry);
        cursor: pointer;
    }

    .store-item {
        border-radius: 6px;
        box-shadow: none;
        background-color: var(--just_white);
        padding: 15px;
    }

    .store-item:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .store-item:hover .take-button {
         background-color: var(--blueberry);
         color: var(--just_white);
     }

    .store-item:hover path {
        fill: white;
    }

    path {
        fill: var(--blueberry);
    }

    .analog-container__button {
        cursor: pointer;
        background-color: var(--just_white);
        border-radius: 6px;
        padding: 2px 20px 4px 20px;
    }

</style>