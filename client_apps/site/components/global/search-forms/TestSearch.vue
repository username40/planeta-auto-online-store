<template>
    <div>
    <div class="d-flex justify-content-between">
        <div class="big-to-small">
        <multiselect
                v-model="value"
                :options="options"
                track-by="name"
                label="name"
                @select="sel"
                :show-labels="false"
                open-direction="bottom"
                placeholder="Марка, Модель авто"
                :options-limit="3">
            <template slot="afterList">
                <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
                    Уточните запрос, чтобы увидеть все.</p></template>
        </multiselect>
        </div>
        <div v-if="showSmall" class="search_small">
            <multiselect
                    v-model="value"
                    :options="options"
                    track-by="name"
                    label="name"
                    @select="sel"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder="Марка, Модель авто"
                    :options-limit="3">
                <template slot="afterList">
                    <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
                        Уточните запрос, чтобы увидеть все.</p></template>
            </multiselect>
        </div>
        <div v-if="showSmall" class="search_small">
            <multiselect
                    v-model="value"
                    :options="options"
                    track-by="name"
                    label="name"
                    @select="sel"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder="Марка, Модель авто"
                    :options-limit="3">
                <template slot="afterList">
                    <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
                        Уточните запрос, чтобы увидеть все.</p></template>
            </multiselect>
        </div>
        <div v-if="showSmall" class="search_small">
            <multiselect
                    v-model="value"
                    :options="options"
                    track-by="name"
                    label="name"
                    @select="sel"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder="Марка, Модель авто"
                    :options-limit="3">
                <template slot="afterList">
                    <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
                        Уточните запрос, чтобы увидеть все.</p></template>
            </multiselect>
        </div>
    </div>
    <div class="search search_big-field" id="search_big-field" @click="get_marka_model()">
        <input
                type="text"
                v-model="name"
                v-show="showInput"
                class="search__input Body-18"
                :placeholder="inputPlaceholder">
        <div v-show="showDiv">
            <ul class="search-form-overlay search__list" v-if="options.length > 0">
                <li
                        v-if="chooseCarByModel"
                        v-for="option in filteredList"
                        :key="option.id"
                        class="search__list-item Body-18"
                        @click="get_model_year()">{{ option.name }}
                </li>
            </ul>
            <ul class="search-form-overlay search__list" v-if="chooseCarByYear">
                <li

                        v-for="year in years"
                        :key="year.id"
                        class="search__list-item Body-18"
                        @click="value = year">{{ year.name }}, <span class="h3">{{ year.year }}</span></li>
            </ul>
        </div>
        <p
                v-if="showValue"
                class="Body-18 search__car-model-result"
                @click="get_marka_model()">{{ value.name }}, {{ value.year }}</p>
    </div>
    <div class="search search_small-field" v-if="showOthers">
        <ul class="search-form-overlay search__list">
            <li class="search__list-item Body-18" v-for="engine in carEngine" :key="engine.id"
                @click="carEngineType = engine">{{ engine.engineType }}
            </li>
        </ul>
        <p v-if="carEngineType" class="Body-18 search__car-model-result">{{ carEngineType.engineType }}</p>
    </div>
    <div class="search search_small-field" v-if="showOthers">
        <ul class="search-form-overlay search__list">
            <li class="search__list-item Body-18" v-for="transmission in carTransmission"
                :key="transmission.id"
                @click="carTransmissionType = transmission">{{ transmission.transmissionType }}
            </li>
        </ul>
        <p v-if="carTransmissionType" class="Body-18 search__car-model-result">{{
            carTransmissionType.transmissionType }}</p>
    </div>
    <div class="search search_small-field" v-if="showOthers">
        <ul class="search-form-overlay search__list">
            <li class="search__list-item Body-18" v-for="body in carBody" :key="body.id"
                @click="carBodyType = body">{{ body.bodyType }}
            </li>
        </ul>
        <p v-if="carBodyType" class="Body-18 search__car-model-result">{{ carBodyType.bodyType }}</p>
    </div>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        name: "TestSearch",
        components: {
            Multiselect
        },
        data () {
            return {
                value: null,
                options: [
                    {id: 1, name: 'Skoda Rapid'},
                    {id: 2, name: 'Skoda Fabia'},
                    {id: 3, name: 'Audi Q7'},
                    {id: 4, name: 'Audi TT'},
                    {id: 5, name: 'Range Rover Sport'}
                    ],
                // список марка модель автомобиля
                defaultOptions: [
                    {id: 1, name: 'Skoda Rapid'},
                    {id: 2, name: 'Skoda Fabia'},
                    {id: 3, name: 'Audi Q7'},
                    {id: 4, name: 'Audi TT'},
                    {id: 5, name: 'Range Rover Sport'}
                ],
                showSmall: false,
                // для v-model поиска по авто
                name: '',
                showValue: false,
                showInput: true,
                searchTitle: 'Поиск',
                // открыть панель выбора по машине
                searchByCar: true,
                // отобразить список для выбора по марке-модели авто
                chooseCarByModel: false,
                // отобразить список для выбора по марке-модели и году выпуска авто
                chooseCarByYear: false,
                // показать остальные поля ввода
                showOthers: false,
                // список марка модель и год выпуска
                years: [
                    {id: 1, name: "Skoda Fabia", year: "2015"},
                    {id: 2, name: "Skoda Fabia", year: "2016"},
                    {id: 3, name: "Skoda Fabia", year: "2017"},
                    {id: 4, name: "Skoda Fabia", year: "2018"},
                    {id: 5, name: "Skoda Fabia", year: "2019"}
                ],
                // список выбора конфигурации двигателя машины
                carEngine: [
                    {id: 1, engineType: "1.2 — 80 лс. (Бензин)"},
                    {id: 2, engineType: "1.4 — 96 лс. (Бензин)"},
                    {id: 3, engineType: "1.4 Turbo — 140 лс. (Бензин)"},
                    {id: 4, engineType: "1.6 — 110 лс. (Дизель)"},
                    {id: 5, engineType: "1.2 — 80 лс. (Бензин)"}
                ],
                // список выбора коробки передач автомобиля
                carTransmission: [
                    {id: 1, transmissionType: "Механическая КПП (МКПП)"},
                    {id: 2, transmissionType: "Автоматическая КПП (АКПП)"},
                    {id: 3, transmissionType: "Роботизированная КПП (РКПП)"},
                    {id: 4, transmissionType: "Вариативная КПП (Вариатор)"},
                ],
                // список выбора кузова
                carBody: [
                    {id: 1, bodyType: "Хэтчбек"},
                    {id: 2, bodyType: "Универсал"},
                ],
                // здесь будет хранится марка модель год машины
                value: null,
                // здесь будет хранится конфигурация двигателя
                carEngineType: null,
                // здесь будет хранится тип КПП
                carTransmissionType: null,
                // здесь будет хранится тип кузова
                carBodyType: null,
                inputPlaceholder: 'Укажите вашу машину',
                showDiv: false
            }
        },
        methods: {
            sel() {
               let doc = document.querySelector('.big-to-small')
                doc.style.width = "295px"
                this.showSmall = true
            },
            // закидывает из списка машину в список для выбора марки модели
            get_marka_model() {
                this.options = this.defaultOptions
                if (this.name.length == 0 && this.chooseCarByModel === true) {
                    this.chooseCarByModel = this.showDiv = false

                } else {
                    this.chooseCarByModel = this.showDiv = true
                }


                let searchBigField = document.querySelector('.search_big-field')
                // searchBigField.style.width = '100%'
            },
            // закидывает список с маркой моделью и годом в список где до этого были только марка модель
            get_model_year() {
                this.chooseCarByYear = !this.chooseCarByYear
                this.chooseCarByModel = !this.chooseCarByModel

            }
        },
        computed: {
            filteredList: function () {
                var comp = this.name;
                return this.options.filter(function (elem) {
                    if (comp === '') {
                        return true;
                    } else {
                        return elem.name.indexOf(comp) > -1;
                    }
                })
            }
        },
        watch: {
            value: function() {
                if (this.value !== null) {
                    this.chooseCarByYear = !this.chooseCarByYear
                    let searchByCarContainer = document.querySelector('.search-by-car-container')
                    searchByCarContainer.style.display = "flex"
                    let searchBigField = document.getElementById('search_big-field')
                    searchBigField.style.width = '295px'
                    this.showOthers = !this.showOthers
                    this.options = []
                    this.showInput = false
                    this.showValue = !this.showValue

                }


            }
        }
    }
</script>

<style scoped>
    .big-to-small {
        width: 100%;
    }
    .search_small {
        width: 215px
    }

    .search__input {
        border: none;
        width: 100%;
        height: 100%;
    }

    .search {
        width: 100%;
        height: 50px;
        background-color: var(--just_white);
        border: solid 1px #918dae;
        border-radius: 6px;
        position: relative;
    }

    .search_big-field {
        padding: 5px;
        width: 100%
    }

    .search_small-field {
        width: 215px;
    }

    .search__list {
        width: 260px;
        padding: 5px 0;
        border-radius: 6px;
        position: absolute;
        top: 52px;
    }

    .search__car-model-result {
        position: absolute;
        left: 5px;
        top: 11px
    }

    .search__list-item {
        cursor: pointer;
        padding: 7px 5px;
    }

    .search__list-item:hover {
        background-color: var(--snow);
        color: var(--blueberry)
    }
</style>