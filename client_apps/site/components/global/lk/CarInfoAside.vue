<template>
    <div>
        <form v-if="carInfoAside" class="container add-auto-aside-container" style="height: 100vh; width: 37vw; overflow: auto;">
            <div class="container">
                <div class="row">
                    <h1 class="h1">Mitsubishi Pajero Sport</h1>
                    <button @click="carInfoAside = false" class="hide-button d-flex">
                        <span class="Body-18-Prime">Отменить</span>
                        <img src="/images/icons/cart/hide-icon.svg" alt="Скрыть">
                    </button>
                </div>
                <div class="row"><h3 class="h3">Pajero Sport 2.5 TD</h3></div>
                <div class="row mt40px">
                    <h3 class="h3">VIN</h3>
                </div>
                <div class="row">
                    <input class="container grey-border Placeholder input" type="text" placeholder="Идентификационный номер">
                </div>
                <div class="row">
                    <img src="" alt="">
                    <p class="Tag-60 ml10px">Нажмите здесь, чтобы посмотреть где найти ваш номер</p>
                </div>
                <div class="row">
                    <h3 class="h3 mt20px">Характеристики</h3>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Марка</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Модель</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Год выпуска</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Двигатель</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Тип кузова</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Код модели</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="options"
                            track-by="full_name"
                            label="full_name"
                            :show-labels="false"
                            open-direction="bottom"
                            @select="bigToSmallSearchSelect"
                            placeholder=""
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row">
                    <p class="Tag-60">Это уникальный код комплектации вашего автомобиля
                        Нужен для подбора оригинальных товаров, например, магнитолы</p>
                </div>
                <div class="row justify-content-center mt40px">
                    <button class="mt5px Body-16-Prime grey-border save-button d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                            <defs>
                                <path id="a" d="M18.73 5.27c-1.48-1.48-2.59-1.258-2.59-1.258l-5.182 5.18-5.922 5.923L4 20l4.884-1.036 5.922-5.922 5.182-5.18c0-.002.222-1.112-1.258-2.593zM8.594 18.375l-1.665.36a3.813 3.813 0 0 0-.708-.957 3.862 3.862 0 0 0-.955-.71l.358-1.663.482-.482s.906.019 1.929 1.041c1.022 1.023 1.04 1.93 1.04 1.93l-.48.48z"/>
                            </defs>
                            <g fill="none" fill-rule="evenodd">
                                <path d="M0 0h24v24H0z"/>
                                <mask id="b" fill="#fff">
                                    <use xlink:href="#a"/>
                                </mask>
                                <g fill="#32377D" mask="url(#b)">
                                    <path d="M0 0h24v24H0z"/>
                                </g>
                            </g>
                        </svg>
                        Изменить характеристики</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import { eventBus } from '~/plugins/eventbus'

    export default {
        components: {
            Multiselect
        },
        data() {
            return {
                carInfoAside: false,
                showAddAutoAside: false,
                short: null,
                "options": [
                    {id: 1, full_description: 'Skoda Rapid'},
                    {id: 2, full_description: 'Skoda Fabia'},
                    {id: 3, full_description: 'Audi Q7'},
                    {id: 4, full_description: 'Audi TT'},
                    {id: 5, full_description: 'Chevrolet Camaro'},
                    {id: 6, full_description: 'Ford Focus'},
                    {id: 7, full_description: 'Volkswagen Jetta'},
                    {id: 8, full_description: 'Volkswagen Touareg'},
                ],
                bigToSmall: 'col-12',
                showAfterResize: false,
            }
        },
        methods: {
            updateModifications() {
                let url = '/api/v1/automodifications?';
                if(this.short){
                    url = url + '&auto_model_short_id=' + this.short.id;
                }
                if(this.carYear){
                    url = url + '&year=' + this.carYear.year;
                }
                console.log(url);
                this.$axios.get(url).then(data => {
                    console.log(data.data);
                    this.carEngineType = null;
                    this.carEngine = data.data;
                }).catch(e => console.log(e));
            },
            bigToSmallSearchSelect() {
                this.bigToSmall = 'col-4'
                this.showAfterResize = true
            },
        },
        watch: {
            short(short) {
                this.updateModifications();
            },
        },
        mounted: function () {
            eventBus.$on('showCarInfoAside', (formStatusShow) => {
                this.carInfoAside = formStatusShow;
            })
        },
    }
</script>

<style scoped>
    .add-auto-aside-container {
        position: fixed;
        z-index: 200;
        top: 0;
        right: 0px;
        background-color: var(--just_white);
        padding: 29px 90px 10px 95px;
        animation: moveAside 0.2s linear
    }

    @keyframes moveAside {
        from {
            right: -900px;
        }
        to {
            right: -50px;
        }
    }

    .hide-button {
        position: absolute;
        left: 550px;
        top: 40px;
        border: none;
        background-color: var(--just_white);
        cursor: pointer;
    }

    .input {
        border-radius: 6px;
        background-color: var(--just_white);
        padding: 7px 0 9px 10px;
        border: solid 1px #918dae;
    }

    .asphalt {
        font-family: "noto_sansregular";
        font-size: 16px;
        color: var(--asphalt);
    }

    .save-button {
        border-radius: 6px;
        background-color: var(--just_white);
        cursor: pointer;
        padding: 2px 0 4px 0;
    }
</style>