<template>
  <div class="container">
    <div class="row mt30px">
      <div :class="bigToSmall">
        <h3 class="Body-16 select-placeholder">
          Марка авто, модель
        </h3>
        <multiselect
          v-model="short"
          :options="customOptions"
          track-by="full_name"
          label="full_name"
          :show-labels="false"
          open-direction="bottom"
          placeholder=""
          @select="bigToSmallSearchSelect"
          :internal-search="false"
          @search-change="customSearch"

        >
          <template slot="noResult">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
          <template slot="noOptions">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
          <template slot="afterList">
            <p class="Tag-12-60" style="padding-left: 12px;">Показано 6 из 32 найденых марок.
              Уточните запрос, чтобы увидеть все.</p></template>
        </multiselect>
      </div>
      <div v-if="showAfterResize" class="col-4">
        <h3 class="Body-16 select-placeholder">
          Год выпуска
        </h3>
        <multiselect
          v-model="carYear"
          :options="years"
          track-by="year"
          label="year"
          :show-labels="false"
          open-direction="bottom"
          placeholder=""
        >
          <template slot="noResult">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
          <template slot="noOptions">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
        </multiselect>
      </div>
      <div v-if="showAfterResize" class="col-4">
        <h3 class="Body-16 select-placeholder">
          Двигатель
        </h3>
        <multiselect
          v-model="modification"
          :options="modifications"
          track-by="description"
          label="description"
          :show-labels="false"
          open-direction="bottom"
          placeholder=""
          :options-limit="6"
        >
          <template slot="noResult">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
          <template slot="noOptions">
            <p class="Tag-12-60" style="padding-left: 12px;">
              Не найдено
            </p>
          </template>
        </multiselect>
      </div>
    </div>
  </div>
</template>

<script>
import Checkbox from '~/components/global/Checkbox'
import RadioSearchSelect from '~/components/global/RadioSearchSelect'
import Multiselect from 'vue-multiselect'
import aiswitcher from 'ai-switcher-translit';
export default {
  name: 'SelectCarModification',
  components: {
    appCheckbox: Checkbox,
    appRadioSearchSelect: RadioSearchSelect,
    Multiselect
  },
  props: ['type'],
  data () {
    return {
      showHideParams: false,
      bigToSmall: 'col-12',
      showAfterResize: false,
      carYear: null,
      value: null,
      short: null,
      customOptions: [],
      modification: null,
      typeParts: 'Tyres',
      picked: null,
      showList: false,
      'years': Array(2019 - 1980 + 1).fill().map((_, idx) => 1980 + idx).map(year => { return { year } }).reverse(),
      modifications: [
        { id: 1, engineType: '1.2 — 80 лс. (Бензин)' },
        { id: 2, engineType: '1.4 — 96 лс. (Бензин)' },
        { id: 3, engineType: '1.4 Turbo — 140 лс. (Бензин)' },
        { id: 4, engineType: '1.6 — 110 лс. (Дизель)' },
        { id: 5, engineType: '1.2 — 80 лс. (Бензин)' }
      ],
      'options': [],
      'carLogos': [],
      'carBrands': [],
      'wheelBrands': [],
      'tyreBrands': [],
    }
  },
  watch: {
    short (short) {
      this.updateModifications()
    },
    carYear (y) {
      console.log(y)
      this.updateModifications()
    },
      modification(e) {
          this.$emit('selected', e);
      }
  },
  created () {
      let url = 'https://lapi.planetavto.ru/api/v1/shorts';
    this.$axios.get(url).then(data => {
      this.options = data.data.map(el => {return {
          ...el,
          sw: aiswitcher.getSwitch(el.full_name) + el.full_name
      }})
    }).catch(e => console.log(e))
  },
  methods: {
    bigToSmallSearchSelect () {
      this.bigToSmall = 'col-4'
      this.showAfterResize = true
    },
    updateModifications () {
      let url = 'https://lapi.planetavto.ru/api/v1/automodifications?'
      if (this.short) {
        url = url + '&auto_model_short_id=' + this.short.id
      }
      if (this.carYear) {
        url = url + '&year=' + this.carYear.year
      }
      console.log(url)
      this.$axios.get(url).then(data => {
        console.log(data.data)
        this.modification = null
        this.modifications = data.data
      }).catch(e => console.log(e))
    },
    customSearch(el) {
        this.customOptions = this.options.filter(o => {
            return o.sw.toLowerCase().includes(el.toLowerCase());
        });
    }
  }
}
</script>

<style scoped>
    .submit-btn {
        background-color: var(--blueberry);
        cursor: pointer;
        color: var(--just_white);
        border: none;
        border-radius: 6px;
        padding: 12px 0 14px 0;
    }

    .submit-btn:hover {
        background-color: var(--blueberry_lite);
    }
    .radio-select:hover .change-fill {
        fill: #FFFFFF;
    }
    .radio-select__label {
        cursor: pointer;
        display: flex;
        align-items: center;
        height: 100%;
        padding: 8px 24px 8px 24px;
    }

    .radio-select__label > svg {
        margin-right: 5px;
    }

    .radio-select__label:hover {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__input:checked + .radio-select__label {
        background-color: var(--blueberry);
        color: var(--just_white);
    }

    .radio-select__input:checked + .radio-select__label .change-fill {
        fill: #FFFFFF;
    }

    .cross-between-selects {
        position: absolute;
        left: 49%;
        top: 53%;
    }

    .radio-select_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .radio-select_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .select-goods-container {
        margin-left: 20px;
        display: flex;
    }

    .sort-by-car__brands-list {
        /*border-left: 1px solid #ff6d3b;*/
    }
    .myCheckLabel {
        display: block;
    }

    .myCheck:checked + .myCheckLabel::before {
        content: '';
        width: 10px;
        height: 10px;
        display: block;
        background-color: var(--blueberry-20);
    }

    .myst:checked + .myCheckLabelC::before {
        content: '';
        width: 10px;
        height: 10px;
        display: block;
        background-color: var(--blueberry-20);
    }

    .car-brands-logo-container {
        height: 40px;
    }

    .check-car-by-logo {
        height: 100%;
        display: flex;
        padding: 0 15px;
        border-radius: 6px;
        cursor: pointer;
    }

    .check-car-by-logo__checkbox:checked + .check-car-by-logo {
        background-color: var(--blueberry-30);
    }

    .brands-list-item__container {

    }

    .check-car-by-brand-name {
        border-radius: 6px;
        cursor: pointer;
        display: block;
        height: 100%;
        padding-top: 8px;
        padding-bottom: 8px;
        padding-left: 12px;

    }

    .check-car-by-brand-name-input:checked + .check-car-by-brand-name {
        background-color: var(--blueberry-20);
    }

    .all-brands-link {
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    .all-brands-link:hover {
        text-decoration: underline;
    }

    .tyres-parametres-container {
        height: 50px;
    }

    .tyre-parameter {
        position: relative;
        width: 140px;
        height: 50px;
        border-radius: 6px;
        border: solid 1px #918dae;
        background-color: var(--just_white);
        cursor: pointer;
    }

    .tyre-parameter:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .tyre-parameter__list {
        position: absolute;
        top: 53px;
        z-index: 5;
        background-color: var(--just_white);
        border-radius: 6px;
        width: 100%;
        padding: 5px;
        max-height: 200px;
    }

    .two-parametres-in-one-layout {
        position: relative;
    }

    .two-parametres-in-one-layout > .parameter-select-layer {
        margin-right: 0px;
    }

    .wheels > .parameter-select-layer {
        width: 164px;
    }

    .gabarites__item {
        width: 96px;
    }

    .show-hide-params {
        background-color: transparent;
        display: flex;
        align-items: center;
    }
</style>
