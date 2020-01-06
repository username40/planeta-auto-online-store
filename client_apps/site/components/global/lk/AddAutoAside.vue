<template>
    <div>
        <form v-if="showAddAutoAside" class="container add-auto-aside-container" style="height: 100vh; width: 37vw; overflow: auto;">
            <div class="container">
                <div class="row">
                    <h1 class="h1">Добавление автомобиля</h1>
                    <button @click="showAddAutoAside = false" class="hide-button d-flex">
                        <span class="Body-18-Prime">Отменить</span>
                        <img src="/images/icons/cart/hide-icon.svg" alt="Скрыть">
                    </button>
                </div>
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
                            v-model="selectedBrand"
                            :options="specification.brand"
                            :show-labels="false"
                            open-direction="bottom"
                            placeholder="Марка автомобиля"
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Модель</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="selectedModel"
                            :options="specification.model"
                            :show-labels="false"
                            open-direction="bottom"
                            placeholder="Модель"
                            noOptions="Не найдено"
                    ></multiselect>
                </div>
                <div class="row mt10px">
                    <p class="asphalt">Год выпуска</p>
                </div>
                <div class="row mt5px">
                    <multiselect
                            v-model="short"
                            :options="specification.year"
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
                            :options="specification.engine"
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
                            :options="specification.typeBody"
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
                            :options="specification.codeModel"
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
                    <button @click.prevent="addCarToGarage" class="container mt5px Price-White save-button">Сохранить</button>
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
                selectedBrand: "",
                selectedModel: "",
                showAddAutoAside: false,
                short: null,
                specification: {
                    brand: ['shkoda', 'audi', 'bmw'],
                    model: ['rapid', 'a5', 'x1'],
                    year: ['2012', '2013', '2014'],
                    engine: ['4jg2'],
                    typeBody: ['sedan', 'nesedan,', 'crossover'],
                    codeModel: ['123', '534534', '321321'],
                },
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
                this.bigToSmall = 'col-4';
                this.showAfterResize = true
            },
            addCarToGarage() {
                const carItem = {
                    name: this.selectedBrand,
                    model: this.selectedModel
                };

                this.$store.commit('garage/addCarToGarage', carItem);
            },
        },
        watch: {
            short(short) {
                this.updateModifications();
            },
        },
        mounted: function () {
            eventBus.$on('showFormAddCar', (formStatusShow) => {
                this.showAddAutoAside = formStatusShow;
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
        background-color: var(--blueberry);
        cursor: pointer;
        border: none;
        padding: 7px 0 9px 0;
    }
</style>