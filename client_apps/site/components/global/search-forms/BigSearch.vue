<template>
    <div class="container">
        <form action="" class="search-form search-form_prime search-form-overlay">
            <h2 class="search-form__title h1">Поиск</h2>
                <div class="search-field mt70px">
                    <multiselect
                            v-model="search"
                            :options="searchQuery"
                            track-by="id"
                            label="name"
                            :custom-label="nameWithLang"
                            :show-labels="false"
                            open-direction="bottom"
                            @search-change="find"
                            placeholder="Поиск запчастей, шин, дисков и аксессуаров"
                            :options-limit="6">
                    </multiselect>
                </div>
            <div class="mt10px d-flex justify-content-between">
                <p class="prev-search Body-16-Prime">
                    <span class="Body-16">Ранее:</span>
                    Масло для двигателя · 5W40
                </p>
                <button class="Body-16-Prime search-by-car" @click.prevent="searchByCar = !searchByCar">
                    <img src="/images/icons/big-search/car-icon_blue.svg" alt="иконка поиск по автомобилю">
                    Поиск по автомобилю
                </button>
            </div>

          <select-car-modification
            v-if="searchByCar"
            type="horizontal"
            @selected="searchProducts"
          ></select-car-modification>

            <div class="search-form__find-button-container">
                <button class="H3-White find-btn find-btn_prime" type="submit">
                    <img src="/icons/find-icon.svg" alt="иконка найти" class="find-btn__icon">
                    Найти
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    import SelectCarModification from "../selectForms/SelectCarModification";

    export default {
        components: {
            SelectCarModification,
            Multiselect,
        },
        data() {
            return {
                search: null,
                searchQuery: [],
                searchResult: [],
                showResults: false,
                showSmall: false,
                searchTitle: 'Поиск',
                searchByCar: false,
                // сюда приходят списки сначала выбора марки модели а затем модели и года выпуска
                options: [
                    {id: 1, name: 'Skoda Rapid'},
                    {id: 2, name: 'Skoda Fabia'},
                    {id: 3, name: 'Audi Q7'},
                    {id: 4, name: 'Audi TT'},
                    {id: 5, name: 'Chevrolet Camaro'},
                    {id: 6, name: 'Ford Focus'},
                    {id: 7, name: 'Volkswagen Jetta'},
                    {id: 8, name: 'Volkswagen Touareg'},
                    ],
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
                carYear: null,

            }
        },
        methods: {
            searchProducts() {
              console.log('searching by products...');
            },
            nameWithLang ({ name, code }) {
                // let a = `${code} — ${name}`;
                // let b = a.split("");
                // let c = "—";
                // let d = b.indexOf(c)
                // let e = b.splice(d + 2)
                // let f = e.join('')
                // console.log(f)
                // let a = document.createElement("span")
                // a.innerHTML = code
                // console.log(a)
                return `${code} — ${name}`;
            },
            find(query) {
                try {
                    if(query.length > 1) {
                        let url =`https://lapi.planetavto.ru/api/v1/search?q=${query}`;
                        this.$axios.get(url)
                            .then(response => {
                                this.searchQuery = (typeof response.data == 'object') && Array.from(response.data)
                                    || response.data;
                            })
                    }
                } catch (e) {
                    console.log(e)
                }


            },
            selected() {
                let doc = document.querySelector('.big-to-small')
                doc.style.width = "295px"
                this.showSmall = true

            },
            showPlaceholder() {
                let placeHolder = document.getElementById('hiddenPlaceholder')
                placeHolder.style.opacity = 1
            }
        },
        computed: {
            data() {
                return this.$store.getters['searchQuery/data']
            },
        }
    }
</script>

<style scoped>
    .search-field .multiselect__select::before {
        display: none!important;
    }


    .big-to-small {
        width: 100%;
    }
    .search_small {
        width: 215px
    }

    .search-by-car-container {
        justify-content: space-between;
    }




    /* search form overlay class inside basic css file */
    .search-form_prime {
        padding-top: 20px;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 94px;
        -webkit-border-radius: 20px;
        border-radius: 20px;

    }

    .search-form__title {
        float: left;
        margin-right: 24px;
    }

    .search-form__input {
        margin-top: 35px;
        width: 100%;
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 16px;
        padding-bottom: 18px;
        box-sizing: border-box;
    }

    .search-form__find-button-container {
        position: absolute;
        z-index: 5;
        bottom: -25px;
        left: 50%;
        margin-left: -171px;

    }

    .search-form__input {
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        color: var(--just_black);
    }

    .search-form__input::-webkit-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input:-ms-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input::-ms-input-placeholder {
        color: var(--asphalt);
    }

    .search-form__input::placeholder {
        color: var(--asphalt);
    }

    .find-btn {
        background-color: var(--terracota);
        border: none;
        -webkit-border-radius: 25px;
        border-radius: 25px;
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        padding-top: 12px;
        padding-bottom: 14px;
        padding-left: 70px;
        padding-right: 70px;
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color var(--animation);
        display: flex;
        align-items: center;
    }

    .find-btn__icon {
        vertical-align: bottom;
    }

    .find-btn:hover {
        background-color: var(--blueberry_lite);
    }

    .find-btn:active {
        background-color: var(--gerbera);
        box-shadow: none;
    }

    .find-btn_prime {
        padding-left: 130px;
        padding-right: 130px;
    }

    .prev-search > span {
        color: var(--asphalt)
    }

    .search-by-car {
        display: flex;
        font-size: 17px;
        line-height: 1.41;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    .search-by-car > img {
        margin-right: 6px;
    }



    #hiddenPlaceholder {
        opacity: 0;
    }
</style>


