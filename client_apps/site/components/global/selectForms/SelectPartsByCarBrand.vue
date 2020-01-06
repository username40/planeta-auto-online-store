<template>
  <form class="mt100px sort-by-car">
    <header class="d-flex container">
      <h2 class="h1">
        Подбор
      </h2>
      <div class="select-goods-container">
        <div class="radio-select grey-border radio-select_left-border-radius">
          <input
            id="tyres"
            v-model="typeParts"
            class="radio-select__input"
            type="radio"
            value="Tyres"
            hidden
          >
          <label for="tyres" class="radio-select__label Body-18-Prime radio-select_left-border-radius">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
              <defs>
                <path id="tyre" d="M11.745 2.003a10.193 10.193 0 0 1 .51 0l.128-1.039 1.985.244-.128 1.044c.166.038.33.08.494.126l.395-.978 1.854.75-.39.965c.152.078.3.16.448.246l.616-.848 1.618 1.176-.617.849c.127.113.25.23.372.349l.798-.67 1.286 1.532-.809.678c.095.141.186.285.274.43l.953-.444.845 1.813-.945.44c.056.161.109.323.157.487l1.025-.2.381 1.964-1.033.2c.014.17.025.339.031.51l1.055.073-.14 1.995-1.039-.072c-.027.168-.06.336-.095.501l.997.324-.618 1.902-.997-.323c-.068.156-.141.31-.217.462l.882.551-1.06 1.696-.896-.56c-.105.134-.213.265-.325.393l.719.77-1.463 1.364-.713-.765c-.135.104-.273.204-.413.3l.507.915-1.75.97-.509-.92c-.156.067-.314.13-.474.188l.255 1.023-1.94.484-.252-1.01c-.168.025-.337.046-.507.063V23h-2v-1.05c-.17-.016-.339-.037-.507-.063l-.252 1.011-1.94-.484.255-1.023a9.933 9.933 0 0 1-.474-.188l-.51.92-1.749-.97.507-.915c-.14-.096-.278-.196-.413-.3l-.713.765-1.463-1.364.718-.77a10.05 10.05 0 0 1-.325-.393l-.895.56-1.06-1.696.882-.551a9.951 9.951 0 0 1-.218-.462l-.996.323-.618-1.902.997-.324a9.955 9.955 0 0 1-.095-.501l-1.04.072L.953 11.7l1.055-.074c.006-.17.017-.34.031-.508l-1.033-.201.381-1.963 1.025.199c.049-.164.101-.326.158-.486l-.946-.441.845-1.813.954.445c.087-.146.178-.29.273-.43l-.809-.679 1.286-1.532.799.67c.12-.12.245-.236.372-.349l-.618-.85 1.618-1.175.617.848a9.98 9.98 0 0 1 .447-.246l-.39-.965 1.854-.75.395.978c.163-.046.328-.088.494-.126l-.128-1.044 1.985-.244.128 1.04zM12 17.483a5.482 5.482 0 0 0 5.482-5.482A5.484 5.484 0 1 0 12 17.484z" />
              </defs>
              <g fill="none" fill-rule="evenodd">
                <path d="M0 0h24v24H0z" />
                <mask id="tyreMask" fill="#fff">
                  <use xlink:href="#tyre" />
                </mask>
                <g class="change-fill" fill="#32377D" mask="url(#tyreMask)">
                  <path d="M0 0h24v24H0z" />
                </g>
              </g>
            </svg>

            Шины</label>
        </div>
        <div class="radio-select grey-border">
          <input
            id="wheels"
            v-model="typeParts"
            class="radio-select__input"
            type="radio"
            value="Wheels"
            hidden
          >
          <label for="wheels" class="radio-select__label Body-18-Prime">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
              <defs>
                <path id="wheel" d="M10.393 20.791a8.923 8.923 0 0 1-5.201-3.003.908.908 0 0 0 .39.073c.185-.006.348-.047.734-.27l2.354-1.359a2 2 0 1 0-2-3.464l-2.354 1.359c-.386.223-.503.344-.6.5a.908.908 0 0 0-.133.38 8.92 8.92 0 0 1-.518-3.005c0-1.055.183-2.068.518-3.007.015.133.06.26.133.377.097.157.214.278.6.501l2.354 1.36a2 2 0 1 0 2-3.465l-2.354-1.36c-.386-.222-.55-.263-.734-.269a.908.908 0 0 0-.39.073 8.922 8.922 0 0 1 5.201-3.003.908.908 0 0 0-.26.303c-.087.163-.133.324-.133.77V7a2 2 0 1 0 4 0V4.282c0-.446-.046-.607-.134-.77a.908.908 0 0 0-.258-.303 8.927 8.927 0 0 1 5.198 3.002.908.908 0 0 0-.388-.072c-.185.006-.348.047-.734.27L15.33 7.768a2 2 0 0 0 2 3.464l2.354-1.359c.386-.223.503-.344.6-.5a.908.908 0 0 0 .133-.378c.335.94.518 1.952.518 3.007a8.915 8.915 0 0 1-.518 3.004.908.908 0 0 0-.133-.378c-.097-.157-.214-.278-.6-.501l-2.354-1.36a2 2 0 0 0-2 3.465l2.354 1.36c.386.222.55.263.734.269a.908.908 0 0 0 .388-.072 8.928 8.928 0 0 1-5.198 3.002.908.908 0 0 0 .258-.303c.088-.163.134-.324.134-.77V17a2 2 0 1 0-4 0v2.718c0 .446.046.607.134.77a.908.908 0 0 0 .26.303zM12 12.935a.935.935 0 1 0 0-1.87.935.935 0 0 0 0 1.87zM12 1.5c5.8 0 10.501 4.701 10.5 10.5 0 5.799-4.701 10.5-10.5 10.5-5.8 0-10.5-4.7-10.5-10.5C1.5 6.202 6.201 1.5 12 1.5zm0 1A9.5 9.5 0 0 0 2.5 12a9.5 9.5 0 0 0 9.5 9.5 9.5 9.5 0 0 0 9.5-9.5A9.499 9.499 0 0 0 12 2.5z" />
              </defs>
              <g fill="none" fill-rule="evenodd">
                <path d="M0 0h24v24H0z" />
                <mask id="wheelMask" fill="#fff">
                  <use xlink:href="#wheel" />
                </mask>
                <g class="change-fill" fill="#32377D" mask="url(#wheelMask)">
                  <path d="M0 0h24v24H0z" />
                </g>
              </g>
            </svg>

            Диски</label>
        </div>
        <div class="radio-select grey-border radio-select_right-border-radius">
          <input
            id="accumulators"
            v-model="typeParts"
            class="radio-select__input"
            type="radio"
            value="Accumulators"
            hidden
          >
          <label for="accumulators" class="radio-select__label Body-18-Prime radio-select_right-border-radius">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24">
              <defs>
                <path id="accu" d="M8 6.592h9c2.736 0 3.32-1.548 3.32-2.276V3C21.378 3.669 22 4.22 22 6.658v10.007C22 19.754 19.477 22 17 22H8c-2.559 0-6-1.6-6-5.335V6.658C2 4.22 2.621 3.669 3.68 3v1.315c0 1 1.554 2.276 4.32 2.276zm5.794 2.72c-.266-.172-.55.175-.55.175s-2.652 2.732-3.25 3.579c-.596.848-.062 1.005.409 1.209.47.204 1.139.468 1.139.468l-1.336 2.956s-.236.512.016.674c.267.173.55-.172.55-.172s2.653-2.732 3.25-3.58c.596-.849.063-1.006-.408-1.21-.471-.204-1.14-.467-1.14-.467l1.336-2.957s.237-.511-.016-.675zM4.927 2.126c0-.56.754-1.126 1.98-1.126s1.98.567 1.98 1.126v1.748c0 .56-.754 1.106-1.98 1.106s-1.98-.546-1.98-1.106V2.126zm10 0c0-.56.754-1.126 1.98-1.126s1.98.567 1.98 1.126v1.748c0 .56-.754 1.106-1.98 1.106s-1.98-.546-1.98-1.106V2.126zM10 2h4v2h-4V2z" />
              </defs>
              <g fill="none" fill-rule="evenodd">
                <path d="M0 0h24v24H0z" />
                <mask id="accuMask" fill="#fff">
                  <use xlink:href="#accu" />
                </mask>
                <g class="change-fill" fill="#32377D" mask="url(#accuMask)">
                  <path d="M0 0h24v24H0z" />
                </g>
              </g>
            </svg>
            Аккумуляторы</label>
        </div>
      </div>
    </header>
    <p class="mt30px h3 container">
      Выберите марку или укажите параметры вручную
    </p>

    <select-car-modification
      type="horizontal"
      @selected="searchProducts"
    ></select-car-modification>

    <div v-if="typeParts === 'Tyres'" class="mt30px container">
      <div class="row align-items-end">
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Ширина, мм
          </h3>
          <div>
            <multiselect
              v-model="widthValue"
              :options="sizeWidth"
              track-by="width"
              label="width"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Высота, %
          </h3>
          <div>
            <multiselect
              v-model="heightValue"
              :options="sizeHeight"
              track-by="height"
              label="height"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="parameter-select-layer col-2">
          <h3 id="hiddenPlaceholder" class="Body-16 select-placeholder">
            Диаметр, "
          </h3>
          <div>
            <multiselect
              v-model="diameterValue"
              :options="sizeDiameter"
              track-by="diameter"
              label="diameter"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="d-flex col-6 tyres-parametres-container">
          <app-radio-search-select
            name="selectTyreTypes"
            :class-name="'radio-search-select__label Body-18 radio-search-select__label_first grey-border radio-search-select_first radio-search-select__label_100-percent'"
            :identifier="'any'"
          >
            Зимние
          </app-radio-search-select>
          <app-radio-search-select
            name="selectTyreTypes"
            :class-name="'radio-search-select__label Body-18 grey-border radio-search-select__label_100-percent'"
            :identifier="'summer'"
          >
            Летние
          </app-radio-search-select>
          <app-radio-search-select
            name="selectTyreTypes"
            :class-name="'radio-search-select__label Body-18 radio-search-select__label_last grey-border radio-search-select_last radio-search-select__label_100-percent'"
            :identifier="'allSeasons'"
          >
            Всесезонные
          </app-radio-search-select>
          <app-checkbox :name="'spikes'" style="margin-left: 20px">
            Шипы
          </app-checkbox>
        </div>
      </div>
      <div class="mt30px row">
        <app-checkbox v-for="wheelBrand in wheelBrands" :key="wheelBrand.id" :name="wheelBrand.brandName" class="col-2 Body-18">
          {{ wheelBrand.brandName }}
        </app-checkbox>
        <nuxt-link to="/mvp/" class="Body-18 col-2 all-brands-link">
          Все бренды
        </nuxt-link>
      </div>
    </div>
    <div v-else-if="typeParts === 'Wheels'" class="mt30px container">
      <div class="row wheels">
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Ширина, "
          </h3>
          <div>
            <multiselect
              v-model="widthWheelValue"
              :options="sizeWidthWheel"
              track-by="width"
              label="width"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Диаметр (Ｊ), "
          </h3>
          <div>
            <multiselect
              v-model="diameterWheelValue"
              :options="diameterWheel"
              track-by="diameter"
              label="diameter"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Вылет (ET), мм
          </h3>
          <div>
            <multiselect
              v-model="etWheelValue"
              :options="etWheel"
              track-by="et"
              label="et"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
        <div class="two-parametres-in-one-layout container col-4">
          <div class="row align-items-end">
            <div class="parameter-select-layer right-no-border-radius col-6">
              <h3 class="Body-16 select-placeholder ">
                Сверловка (PCD)
              </h3>
              <div>
                <multiselect
                  v-model="pcdQuantityWheelValue"
                  :options="pcdQuantityWheel"
                  track-by="quantity"
                  label="quantity"
                  :show-labels="false"
                  open-direction="bottom"
                  placeholder=""
                />
              </div>
            </div>
            <span class="cross-between-selects" style="">×</span>
            <div class="parameter-select-layer left-no-border-radius col-6">
              <div>
                <multiselect
                  v-model="pcdDistanceWheelValue"
                  :options="pcdDistanceWheel"
                  track-by="distance"
                  label="distance"
                  :show-labels="false"
                  open-direction="bottom"
                  placeholder=""
                />
              </div>
            </div>
          </div>
        </div>
        <div class="parameter-select-layer col-2">
          <h3 class="Body-16 select-placeholder">
            Ступица (DIA)
          </h3>
          <div>
            <multiselect
              v-model="diaWheelValue"
              :options="diaWheel"
              track-by="dia"
              label="dia"
              :show-labels="false"
              open-direction="bottom"
              placeholder=""
            />
          </div>
        </div>
      </div>
      <div class="mt30px row">
        <app-checkbox v-for="wheelBrand in wheelBrands" :key="wheelBrand.id" :name="wheelBrand.brandName" class="col-2 Body-18">
          {{ wheelBrand.brandName }}
        </app-checkbox>
        <nuxt-link to="/mvp/" class="Body-18 col-2 all-brands-link">
          Все бренды
        </nuxt-link>
      </div>
    </div>
    <div v-else-if="typeParts === 'Accumulators'" class="mt10px">
      <div class="container d-flex justify-content-end">
        <button class="show-hide-params no-border" @click.prevent="showHideParams = !showHideParams">
          <img src="/images/icons/parametres/parametres.svg" alt="">
          <span class="Body-17-Prime">Указать параметры вручную</span>
        </button>
      </div>
      <div v-if="showHideParams" class="mt30px">
        <div class="container">
          <div class="row">
            <div class="col-2">
              <h3 class="Body-16 select-placeholder">
                Емкость, Ач
              </h3>

              <multiselect
                v-model="volumeAccuValue"
                :options="volumeAccu"
                track-by="volume"
                label="volume"
                :show-labels="false"
                open-direction="bottom"
                placeholder=""
              />
            </div>
            <div class="col-2">
              <h3 class="Body-16 select-placeholder">
                Полярность
              </h3>

              <multiselect
                v-model="polarAccuValue"
                :options="polarAccu"
                track-by="polar"
                label="polar"
                :show-labels="false"
                open-direction="bottom"
                placeholder=""
              />
            </div>
            <div class="col-2">
              <h3 class="Body-16 select-placeholder">
                Пусковой ток, А
              </h3>

              <multiselect
                v-model="startPowerAccuValue"
                :options="startPowerAccu"
                track-by="startPower"
                label="startPower"
                :show-labels="false"
                open-direction="bottom"
                placeholder=""
              />
            </div>
            <div class="col-2">
              <h3 class="Body-16 select-placeholder">
                Напряжение, В
              </h3>

              <multiselect
                v-model="voltageAccuValue"
                :options="voltageAccu"
                track-by="voltage"
                label="voltage"
                :show-labels="false"
                open-direction="bottom"
                placeholder=""
              />
            </div>
            <div class="col-4">
              <h3 class="Body-16 select-placeholder">
                Габариты, Д×Ш×В
              </h3>
              <div class="d-flex justify-content-between gabarites__container align-items-center">
                <div class="right-no-border-radius gabarites__item">
                  <multiselect
                    v-model="gabaritesLenghtAccuValue"
                    :options="gabaritesLenghtAccu"
                    track-by="gabaritesLenght"
                    label="gabaritesLenght"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder=""
                  />
                </div>
                <span style="">×</span>
                <div class="left-no-border-radius right-no-border-radius gabarites__item">
                  <multiselect
                    v-model="gabaritesWidthAccuValue"
                    :options="gabaritesWidthAccu"
                    track-by="gabaritesWidth"
                    label="gabaritesWidth"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder=""
                  />
                </div>
                <span style="">×</span>
                <div class="left-no-border-radius gabarites__item">
                  <multiselect
                    v-model="gabaritesHeightAccuValue"
                    :options="gabaritesHeightAccu"
                    track-by="gabaritesHeight"
                    label="gabaritesHeight"
                    :show-labels="false"
                    open-direction="bottom"
                    placeholder=""
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt30px">
      <div class="row">
        <button class="offset-8 col-4 h3 submit-btn grey-border">
          Подобрать
          <span v-if="typeParts === 'Tyres'">шины</span>
          <span v-if="typeParts === 'Wheels'">диски</span>
          <span v-if="typeParts === 'Accumulators'">аккумуляторы</span>
        </button>
      </div>
    </div>
  </form>
</template>

<script>
import Checkbox from '~/components/global/Checkbox'
import RadioSearchSelect from '~/components/global/RadioSearchSelect'
import Multiselect from 'vue-multiselect'
import aiswitcher from 'ai-switcher-translit';
import SelectCarModification from "./SelectCarModification";
export default {
  name: 'SelectPartsByCarBrand',
  components: {
      SelectCarModification,
    appCheckbox: Checkbox,
    appRadioSearchSelect: RadioSearchSelect,
    Multiselect
  },
  data () {
    return {
      showHideParams: false,
      bigToSmall: 'col-12',
      showAfterResize: false,
      carYear: null,
      value: null,
      short: null,
      customOptions: [],
      carEngineType: null,
      typeParts: 'Tyres',
      picked: null,
      showList: false,
      'years': Array(2019 - 1980 + 1).fill().map((_, idx) => 1980 + idx).map(year => { return { year } }),
      carEngine: [
        { id: 1, engineType: '1.2 — 80 лс. (Бензин)' },
        { id: 2, engineType: '1.4 — 96 лс. (Бензин)' },
        { id: 3, engineType: '1.4 Turbo — 140 лс. (Бензин)' },
        { id: 4, engineType: '1.6 — 110 лс. (Дизель)' },
        { id: 5, engineType: '1.2 — 80 лс. (Бензин)' }
      ],
      'options': [
        { id: 1, full_description: 'Skoda Rapid' },
        { id: 2, full_description: 'Skoda Fabia' },
        { id: 3, full_description: 'Audi Q7' },
        { id: 4, full_description: 'Audi TT' },
        { id: 5, full_description: 'Chevrolet Camaro' },
        { id: 6, full_description: 'Ford Focus' },
        { id: 7, full_description: 'Volkswagen Jetta' },
        { id: 8, full_description: 'Volkswagen Touareg' }
      ],
      'carLogos': [
        {
          'id': 1,
          'brandName': 'vaz',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__vaz.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'LADA(ВАЗ)'
        },
        {
          'id': 2,
          'brandName': 'opel',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__opel.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Opel'
        },
        {
          'id': 3,
          'brandName': 'suzuki',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__suzuki.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Suzuki'
        },
        {
          'id': 4,
          'brandName': 'toyota',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__toyota.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Toyota'
        },
        {
          'id': 5,
          'brandName': 'uaz',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__uaz.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'УАЗ'
        },
        {
          'id': 6,
          'brandName': 'volkswagen',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__volkswagen.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'VolksWagen'
        },
        {
          'id': 7,
          'brandName': 'mazda',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__mazda.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Mazda'
        },
        {
          'id': 8,
          'brandName': 'maz',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__maz.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'МАЗ'
        },
        {
          'id': 9,
          'brandName': 'kia',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__kia.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Kia'
        },
        {
          'id': 10,
          'brandName': 'hyundai',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__hyundai.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Hyundai'
        },
        {
          'id': 11,
          'brandName': 'gaz',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__gaz.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'ГАЗ'
        },
        {
          'id': 12,
          'brandName': 'ford',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__ford.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Ford'
        },
        {
          'id': 13,
          'brandName': 'chevrolet',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__chevrolet.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Chevrolet'
        },
        {
          'id': 14,
          'brandName': 'citroen',
          'src': '/images/icons/select-goods-by-car/select-goods-by-car__citroen.svg',
          'alt': 'Ваз логотип',
          'brandTitle': 'Citroen'
        }
      ],
      'carBrands': [
        {
          'id': 1,
          'brandName': 'bentley',
          'brandTitle': 'Bentley'
        },
        {
          'id': 2,
          'brandName': 'rolls-royce',
          'brandTitle': 'Rolls Royce'
        },
        {
          'id': 3,
          'brandName': 'maybach',
          'brandTitle': 'Maybach'
        },
        {
          'id': 4,
          'brandName': 'land-rover',
          'brandTitle': 'Land Rover'
        },
        {
          'id': 5,
          'brandName': 'faw',
          'brandTitle': 'Faw'
        },
        {
          'id': 6,
          'brandName': 'honda',
          'brandTitle': 'Honda'
        },
        {
          'id': 7,
          'brandName': 'mercedes-benz',
          'brandTitle': 'Mercedes-Benz'
        },
        {
          'id': 8,
          'brandName': 'lexus',
          'brandTitle': 'Lexus'
        },
        {
          'id': 9,
          'brandName': 'bmw',
          'brandTitle': 'Bmw'
        },
        {
          'id': 10,
          'brandName': 'mini',
          'brandTitle': 'Mini'
        },
        {
          'id': 11,
          'brandName': 'cadillac',
          'brandTitle': 'Cadillac'
        },
        {
          'id': 12,
          'brandName': 'gmc',
          'brandTitle': 'GMC'
        },
        {
          'id': 13,
          'brandName': 'chrysler',
          'brandTitle': 'Chrysler'
        },
        {
          'id': 14,
          'brandName': 'fiat',
          'brandTitle': 'Fiat'
        },
        {
          'id': 15,
          'brandName': 'dodge',
          'brandTitle': 'Dodge'
        },
        {
          'id': 16,
          'brandName': 'jeep',
          'brandTitle': 'Jeep'
        },
        {
          'id': 17,
          'brandName': 'alfa-romeo',
          'brandTitle': 'Alfa-Romeo'
        },
        {
          'id': 18,
          'brandName': 'maserati',
          'brandTitle': 'Maserati'
        }
      ],
      'wheelBrands': [
        {
          'id': 1,
          'brandName': 'K&K'
        },
        {
          'id': 2,
          'brandName': 'REPLICA(REPLAY)'
        },
        {
          'id': 3,
          'brandName': 'LegeArtis'
        },
        {
          'id': 4,
          'brandName': 'Trebl'
        },
        {
          'id': 5,
          'brandName': 'Alcasta'
        },
        {
          'id': 6,
          'brandName': 'LSWheels'
        }, {
          'id': 7,
          'brandName': 'Vossen'
        }, {
          'id': 8,
          'brandName': 'BBS'
        },
        {
          'id': 9,
          'brandName': 'SKAD'
        },
        {
          'id': 10,
          'brandName': 'Enkei'
        },
        {
          'id': 11,
          'brandName': 'OZ Racing'
        }
      ],
      'tyreBrands': [
        {
          'id': 1,
          'brandName': 'KAMA'
        },
        {
          'id': 2,
          'brandName': 'Coridant'
        },
        {
          'id': 3,
          'brandName': 'Kumho'
        },
        {
          'id': 4,
          'brandName': 'Continental'
        },
        {
          'id': 5,
          'brandName': 'Nokian'
        },
        {
          'id': 6,
          'brandName': 'Michelin'
        }, {
          'id': 7,
          'brandName': 'GoodYear'
        }, {
          'id': 8,
          'brandName': 'Bridgestone'
        },
        {
          'id': 9,
          'brandName': 'Pirelli'
        },
        {
          'id': 10,
          'brandName': 'Viatti'
        },
        {
          'id': 11,
          'brandName': 'ОмскШина'
        }
      ],
      'sizeWidth': [
        {
          'id': 1,
          'width': 175
        },
        {
          'id': 2,
          'width': 185
        },
        {
          'id': 3,
          'width': 195
        },
        {
          'id': 4,
          'width': 205
        },
        {
          'id': 5,
          'width': 215
        }
      ],
      'sizeHeight': [
        {
          'id': 1,
          'height': 45
        },
        {
          'id': 2,
          'height': 50
        },
        {
          'id': 3,
          'height': 55
        },
        {
          'id': 4,
          'height': 60
        },
        {
          'id': 5,
          'height': 65
        }
      ],
      'sizeDiameter': [
        {
          'id': 1,
          'diameter': 14
        },
        {
          'id': 2,
          'diameter': 15
        },
        {
          'id': 3,
          'diameter': 16
        },
        {
          'id': 4,
          'diameter': 17
        },
        {
          'id': 5,
          'diameter': 18
        }
      ],
      widthValue: null,
      heightValue: null,
      diameterValue: null,
      sizeWidthWheel: [
        {
          'id': 1,
          'width': 4
        },
        {
          'id': 2,
          'width': 4.5
        },
        {
          'id': 3,
          'width': 5
        },
        {
          'id': 4,
          'width': 5.5
        },
        {
          'id': 5,
          'width': 6
        }
      ],
      diameterWheel: [
        {
          'id': 2,
          'diameter': 13
        },
        {
          'id': 2,
          'diameter': 14
        },
        {
          'id': 3,
          'diameter': 15
        },
        {
          'id': 4,
          'diameter': 16
        },
        {
          'id': 5,
          'diameter': 17
        },
        {
          'id': 6,
          'diameter': 18
        },
        {
          'id': 7,
          'diameter': 19
        },
        {
          'id': 8,
          'diameter': 20
        }
      ],
      etWheel: [
        {
          id: 1,
          et: 38
        },
        {
          id: 2,
          et: 39
        },
        {
          id: 3,
          et: 40
        },
        {
          id: 4,
          et: 41
        },
        {
          id: 5,
          et: 42
        },
        {
          id: 6,
          et: 43
        },
        {
          id: 7,
          et: 44
        },
        {
          id: 8,
          et: 45
        }
      ],
      pcdQuantityWheel: [
        {
          id: 1,
          quantity: 3
        },
        {
          id: 2,
          quantity: 4
        },
        {
          id: 3,
          quantity: 5
        },
        {
          id: 4,
          quantity: 6
        }
      ],
      pcdDistanceWheel: [
        {
          id: 1,
          distance: 98
        },
        {
          id: 2,
          distance: 100
        },
        {
          id: 3,
          distance: 108
        },
        {
          id: 4,
          distance: 112
        },
        {
          id: 5,
          distance: 114.3
        },
        {
          id: 6,
          distance: 115
        }
      ],
      diaWheel: [
        {
          id: 1,
          dia: 98
        },
        {
          id: 2,
          dia: 100
        },
        {
          id: 3,
          dia: 108
        }
      ],
      widthWheelValue: null,
      diameterWheelValue: null,
      etWheelValue: null,
      pcdQuantityWheelValue: null,
      pcdDistanceWheelValue: null,
      diaWheelValue: null,
      volumeAccu: [
        {
          id: 1,
          volume: 1.3
        },
        {
          id: 2,
          volume: 1.5
        },
        {
          id: 3,
          volume: 3
        },
        {
          id: 4,
          volume: 4
        },
        {
          id: 5,
          volume: 4.5
        }
      ],
      polarAccu: [
        {
          id: 1,
          polar: 'Боковые'
        },
        {
          id: 2,
          polar: 'Обратная'
        },
        {
          id: 3,
          polar: 'Прямая'
        },
        {
          id: 4,
          polar: 'Универсальная'
        }
      ],
      startPowerAccu: [
        {
          id: 1,
          startPower: 1
        },
        {
          id: 2,
          startPower: 2
        },
        {
          id: 3,
          startPower: 3
        },
        {
          id: 4,
          startPower: 5
        }
      ],
      voltageAccu: [
        {
          id: 1,
          voltage: 6
        },
        {
          id: 2,
          voltage: 12
        },
        {
          id: 3,
          voltage: 24
        },
        {
          id: 4,
          voltage: 37
        }
      ],
      gabaritesLenghtAccu: [
        {
          id: 1,
          gabaritesLenght: 50
        },
        {
          id: 2,
          gabaritesLenght: 60
        },
        {
          id: 3,
          gabaritesLenght: 70
        },
        {
          id: 4,
          gabaritesLenght: 80
        },
        {
          id: 5,
          gabaritesLenght: 90
        },
        {
          id: 6,
          gabaritesLenght: 100
        }
      ],
      gabaritesWidthAccu: [
        {
          id: 1,
          gabaritesWidth: 110
        },
        {
          id: 2,
          gabaritesWidth: 120
        },
        {
          id: 3,
          gabaritesWidth: 130
        },
        {
          id: 4,
          gabaritesWidth: 140
        },
        {
          id: 5,
          gabaritesWidth: 150
        },
        {
          id: 6,
          gabaritesWidth: 160
        }
      ],
      gabaritesHeightAccu: [
        {
          id: 1,
          gabaritesHeight: 170
        },
        {
          id: 2,
          gabaritesHeight: 180
        },
        {
          id: 3,
          gabaritesHeight: 190
        },
        {
          id: 4,
          gabaritesHeight: 200
        },
        {
          id: 5,
          gabaritesHeight: 210
        },
        {
          id: 6,
          gabaritesHeight: 220
        }
      ],
      volumeAccuValue: null,
      polarAccuValue: null,
      startPowerAccuValue: null,
      voltageAccuValue: null,
      gabaritesLenghtAccuValue: null,
      gabaritesWidthAccuValue: null,
      gabaritesHeightAccuValue: null
    }
  },
  watch: {
    short (short) {
      this.updateModifications()
    },
    carYear (y) {
      console.log(y)
      this.updateModifications()
    }
  },
  created () {
    //
  },
  methods: {
    searchProducts(something) {
      console.log(something);
    },
    bigToSmallSearchSelect () {
      this.bigToSmall = 'col-4'
      this.showAfterResize = true
    },
    updateModifications () {
      let url = '/api/v1/automodifications?'
      if (this.short) {
        url = url + '&auto_model_short_id=' + this.short.id
      }
      if (this.carYear) {
        url = url + '&year=' + this.carYear.year
      }
      console.log(url)
      this.$axios.get(url).then(data => {
        console.log(data.data)
        this.carEngineType = null
        this.carEngine = data.data
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
        box-shadow: var(--shadow-6-prime);
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
        background-color: var(--blueberry_lite);
        box-shadow: var(--shadow-6-prime);
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
