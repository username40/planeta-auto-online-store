<template>
    <div class="library">
        <details class="detail-info">
            <summary>Шрифты</summary>
            <div class="style-guide">
                <h2 class="center-title m50">Fonts</h2>
                <p class="description">Here is text style guides. Here you can see how views title and text</p>
                <p class="description">After className you can see text example.</p>
                <p class="description">Use classes that you see for text elements and will be a good boy )))</p>
                <h1 class="h1">h1</h1>
                <h1 class="h1">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву.</h1>
                <p class="Price">.Price</p>
                <p class="Price">12 700 ₽</p>
                <p class="Price-White overlay-for-white-text">.Price-White</p>
                <p class="Price-White overlay-for-white-text">12 700 ₽</p>
                <h2 class="H2-Bold">.H2-Bold</h2>
                <h2 class="H2-Bold">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h2>
                <h2 class="H2-Bold-white overlay-for-white-text">.H2-Bold-white</h2>
                <h2 class="H2-Bold-white overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h2>
                <h2 class="h2">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h2>
                <h2 class="H2-White overlay-for-white-text">.H2-White</h2>
                <h2 class="H2-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h2>
                <h3 class="h3">h3</h3>
                <h3 class="h3">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h3>
                <h3 class="H3-Placeholder">.H3-Placeholder</h3>
                <h3 class="H3-Placeholder">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h3>
                <h3 class="H3-White overlay-for-white-text">.H3-White</h3>
                <h3 class="H3-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</h3>
                <p class="Body-18">.Body-18</p>
                <p class="Body-18">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-18-Prime">.Body-18-Prime</p>
                <p class="Body-18-Prime">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-18-White overlay-for-white-text">.Body-18-White</p>
                <p class="Body-18-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Placeholder">.Placeholder</p>
                <p class="Placeholder">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-16">.Body-16</p>
                <p class="Body-16">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-16-Prime">.Body-16-Prime</p>
                <p class="Body-16-Prime">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-16-White overlay-for-white-text">.Body-16-White</p>
                <p class="Body-16-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Old-price strike-text">.Old-price .strike-text</p>
                <p class="Old-price strike-text">12 700 ₽</p>
                <p class="Old-price">12 700 ₽</p>
                <p class="Body-14">.Body-14</p>
                <p class="Body-14">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Body-14-Prime">.Body-14-Prime</p>
                <p class="Body-14-Prime">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Tag-14-60">.Tag-14-60</p>
                <p class="Tag-14-60">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Tag-Bold">.Tag-Bold</p>
                <p class="Tag-Bold">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Tag-Bold-White overlay-for-white-text">.Tag-Bold-White</p>
                <p class="Tag-Bold-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Tag-60">.Tag-60</p>
                <p class="Tag-60">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
                <p class="Tag-60-White overlay-for-white-text">.Tag-60-White</p>
                <p class="Tag-60-White overlay-for-white-text">Наступает тишина, и только слышно, как далеко в саду топором стучат по дереву</p>
            </div>
        </details>
        <details class="detail-info">
            <summary>Тег</summary>
            <div>
                <app-Tag></app-Tag>
            </div>
        </details>
        <details class="detail-info">
            <summary>Переключатель</summary>
            <div>
                <app-toggle></app-toggle>
            </div>
        </details>
        <details class="detail-info">
            <summary>Радио кнопка</summary>
            <div>
                <app-radio
                    :identifier="'radio-1'"
            ></app-radio>
                <app-radio
                        :identifier="'radio-2'"
                ></app-radio>
                <app-radio
                        :identifier="'radio-3'"
                        :disabled="'disabled'"
                ></app-radio>
            </div>
        </details>
        <details class="detail-info">
            <summary>Чек бокс</summary>
            <div>
                <app-checkbox
                        :name="'oil-select-1'">Лукойл</app-checkbox>
                <app-checkbox
                        :name="'oil-select-2'">Castrol</app-checkbox>
                <app-checkbox
                        :name="'oil-select-3'">Shell</app-checkbox>
            </div>
        </details>
        <details class="detail-info">
            <summary>Кнопка цены</summary>
            <div >
                <app-price-button
                        :class="'price-button_blueberry grey-border Price'"
                >102 790 &#8381;</app-price-button>
                <br>
                <app-price-button
                        :class="'price-button_just-white grey-border Price'"
                >102 790 &#8381;</app-price-button>
                <br>
                <app-big-price-button
                        :class="'big-price-btn_blueberry grey-border Price'">14 750</app-big-price-button>
            </div>
        </details>
        <details class="detail-info">
            <summary>ссылка в корзину</summary>
            <div>
                <app-link-to-cart>1</app-link-to-cart>
            </div>
        </details>
        <details class="detail-info">
            <summary>ссылка скачать</summary>
            <div>
                <app-link-to-download></app-link-to-download>
            </div>
        </details>
        <details class="detail-info">
            <summary>Навигационные ссылки</summary>
            <div>
                <app-link-to-navigate
                        :class="'navigate-link_left-side navigate-link_blueberry-color Body-18-White'"
                >Гайки</app-link-to-navigate>
                <app-link-to-navigate
                        :class="'navigate-link_just-white-color Body-18-Prime'"
                >...</app-link-to-navigate>
                <app-link-to-navigate
                        :class="'navigate-link_blueberry-color Body-18-White'"
                >...</app-link-to-navigate>
                <app-link-to-navigate
                        :class="'navigate-link_right-side navigate-link_just-white-color Body-18-White'"
                >Диски</app-link-to-navigate>
            </div>
        </details>
        <details class="detail-info">
            <summary>Показать еще кнопка</summary>
            <div>
                <app-show-more-button></app-show-more-button>
            </div>
        </details>
        <details class="detail-info">
            <summary>Кнопка найти</summary>
            <div>
                <app-find-button></app-find-button>
            </div>
        </details>
        <details class="detail-info">
            <summary>Слайдер кнопка</summary>
            <div>
                <app-slider-button-left
                        :class="'slider-button_left-border-radius'"></app-slider-button-left>
                <app-slider-button-right
                        :class="'slider-button_right-border-radius'"></app-slider-button-right>
                <app-slider-button-left></app-slider-button-left>
                <app-slider-button-right></app-slider-button-right>
            </div>
        </details>
        <details class="detail-info">
            <summary>Позвоните нам</summary>
            <div>
                <app-call-us-link></app-call-us-link>
            </div>
        </details>
        <details class="detail-info">
            <summary>Бирка автомобиля</summary>
            <div>
                <app-car-tag
                        :class="'car-tag_blue car-icon_white car-tag_left-border-radius'">УАЗ Patriot, 2018</app-car-tag>
                <app-car-tag
                        :class="'car-tag_blue car-icon_white'">УАЗ Patriot, 2018</app-car-tag>
                <app-car-tag
                        :class="'car-tag_blue car-icon_white car-tag_right-border-radius'">УАЗ Patriot, 2018</app-car-tag>
                <div style="margin-top: 50px"></div>
                <app-car-tag
                        :class="'car-tag_white car-icon_blue car-tag_left-border-radius'">УАЗ Patriot, 2018</app-car-tag>
                <app-car-tag
                        :class="'car-tag_white car-icon_blue'">УАЗ Patriot, 2018</app-car-tag>
                <app-car-tag
                        :class="'car-tag_white car-icon_blue car-tag_right-border-radius'">УАЗ Patriot, 2018</app-car-tag>
            </div>
        </details>
        <details class="detail-info">
            <summary>Кнопка добавить в корзину</summary>
            <div>
                <app-add-to-cart-button></app-add-to-cart-button>
            </div>
        </details>
        <details class="detail-info">
            <summary>виджет товаров в корзине</summary>
            <div>
                <app-widget-goods-in-cart>24</app-widget-goods-in-cart>
            </div>
        </details>
        <details class="detail-info">
            <summary>Дроп даун меню</summary>
            <div>
                <app-drop-down-menu></app-drop-down-menu>
            </div>
        </details>
        <details class="detail-info">
            <summary>Изменить способ отображения радио кнопка</summary>
            <div>
                <app-change-view-radio></app-change-view-radio>
            </div>
        </details>
        <details class="detail-info">
            <summary>Скидочные теги</summary>
            <div>
                <app-discount-tag
                        :class="'discount-tag_azalea Body-16-White'"
                >−10%</app-discount-tag>
                <app-discount-tag
                        :class="'discount-tag_glory Body-16-White'"
                >Распродажа</app-discount-tag>
                <app-discount-tag
                        :class="'discount-tag_violet Body-16-White'"
                >Экстра бонусы</app-discount-tag>
                <app-discount-tag
                        :class="'discount-tag_lemon discount-tag_text-color-blue Body-16'"
                >Сезонный товар</app-discount-tag>
                <div style="clear: both"></div>
            </div>
        </details>
        <details class="detail-info">
            <summary>Скидочный дег дроп даун</summary>
            <div>
                <app-discount-tag
                        :class="'discount-tag_azalea'"
                >-10%</app-discount-tag>
                <app-discount-label-drop-down></app-discount-label-drop-down>
            </div>
        </details>
        <details class="detail-info">
            <summary>Большая поисковая форма</summary>
            <div>
                <app-prime-search></app-prime-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>Стандартная поисковая форма</summary>
            <div>
                <app-standart-search></app-standart-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>компактная поисковая форма</summary>
            <div>
                <app-compact-search></app-compact-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>мини поисковая форма</summary>
            <div>
                <app-mini-search></app-mini-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>Нано поисковая форма</summary>
            <div>
                <app-nano-search></app-nano-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>Алерт</summary>
            <div>
                <app-alert
                        :class="'alerts-info__confirm'">
                    Подтверждение
                </app-alert>
                <app-alert
                        :class="'alerts-info__information'">
                    Информация
                </app-alert>
                <app-alert
                        :class="'alerts-info__warning'">
                    Предупреждение
                </app-alert>
                <app-alert
                        :class="'alerts-info__error'">
                    Ошибка
                </app-alert>
            </div>
        </details>
        <details class="detail-info">
            <summary>Хэдер</summary>
            <div>
                <app-header class="header_blue-background">
                    <template v-slot:GeolocationCityName>Екатеринбург</template>
                    <template v-slot:Entry>Войти</template>
                </app-header>
                <br>
                <app-header class="header_white-background">
                    <template v-slot:GeolocationCityName>Екатеринбург</template>
                    <template v-slot:Entry>Войти</template>
                </app-header>
                <app-header-no-search
                class="header_white-background">
                    <template v-slot:Entry>Войти</template>
                </app-header-no-search>
            </div>
        </details>
        <details class="detail-info">
            <summary>Кнопка главного меню</summary>
            <div style="display: flex;">
                <app-main-menu-button>
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-all-categories.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Все категории</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-parts.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Запчасти</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-tyres.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Шины</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-wheels.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Шины</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-liquid.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Масла и жидкости</template>
                </app-main-menu-button>
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-accu.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Аккумуляторы</template>
                </app-main-menu-button :class="'grey-border'">
                <app-main-menu-button :class="'grey-border'">
                    <template v-slot:image>
                        <img src="/icons/main-menu-btn-other.svg" alt="">
                    </template>
                    <template v-slot:buttonName>Прочее</template>
                </app-main-menu-button>
            </div>
        </details>
        <details class="detail-info">
            <summary>Карточка товара в сетке</summary>
            <div>
<!--                <app-good-item-grid>-->
<!--                    <template v-slot:image>-->
<!--                        <img src="/demo-images/video-registrator-small.jpg" alt="изображение товара">-->
<!--                    </template>-->
<!--                    <template v-slot:goodName>Моторное масло MEGA-OIL Super 10W-40 4 л</template>-->
<!--                    <template v-slot:goodsCategory>Масла</template>-->
<!--                </app-good-item-grid>-->
                <app-good-item-grid>
                    <template v-slot:image>
                        <img src="/demo-images/video-registrator.jpg" alt="изображение товара">
                    </template>
                    <template v-slot:goodName></template>
                    <template v-slot:goodsCategory>Масла</template>
                    <template v-slot:discountTag>
                        <div style="height: 20px!important">
                            <app-discount-tag
                                    :class="'discount-tag_azalea Body-16-White'">-10%</app-discount-tag>
                            <app-discount-label-drop-down style="height: 100%!important"></app-discount-label-drop-down>
                        </div>
                    </template>
                    <template v-slot:priceButton><app-price-button
                            :class="'price-button_just-white grey-border'">102 790 ₽</app-price-button></template>
                </app-good-item-grid>
            </div>
        </details>
        <details class="detail-info">
            <summary>Карточка товара в списке</summary>
            <div>
                <app-good-item-list>
                    <template v-slot:image>
                        <img src="/demo-images/video-registrator-middle.jpg" alt="изображение товара" class="def-img">
                    </template>
                    <template v-slot:goodName>Шины Б-24 «Народное достояние» ЛИТОЛ-24 банка 1л (80-А) Автопроизводитель ВОСТОК</template>
                    <template v-slot:discountTags>
                        <app-discount-tag :class="'discount-tag_violet'">+300 бонусов</app-discount-tag>
                        <app-discount-tag :class="'discount-tag_azalea'">-5%</app-discount-tag>
                    </template>
                    <template v-slot:oldPrice>102 790 ₽</template>
                </app-good-item-list>
            </div>
        </details>
        <details class="detail-info">
            <summary>Маленькая карточка товара прилипающая к хэдеру при скролле</summary>
            <div>
                <app-good-item-list-small>
                    <template v-slot:image>
                        <img src="/demo-images/tyre-small.jpg" alt="демо изображение" class="good-item-list-small__image">
                    </template>
                    <template v-slot:price>102 790 ₽</template>
                    <template v-slot:goodName>Шина Bridgestone Hakkapeliitta 7 SUV 215/55 R18 99T, зимняя, шип</template>
                </app-good-item-list-small>
            </div>
        </details>
        <details class="detail-info">
            <summary>Маленькая карточка товара зависающая справа</summary>
            <div>
                <app-good-item-list-nano>
                    <template v-slot:name>Шина Bridgestone Hakkapeliitta…</template>
                    <template v-slot:mainParameter>215/55 R18</template>
                    <template v-slot:price>102 790 ₽</template>
                    </app-good-item-list-nano>
            </div>
        </details>
        <details class="detail-info">
            <summary>Карточка товара на странице товара варианты А-D</summary>
            <div>
                <app-item-in-good-page-a></app-item-in-good-page-a>
                <hr>
                <app-item-in-good-page-b></app-item-in-good-page-b>
                <hr>
                <app-item-in-good-page-c></app-item-in-good-page-c>
                <hr>
                <app-item-in-good-page-d></app-item-in-good-page-d>
            </div>
        </details>
        <details class="detail-info">
            <summary>карточка товара для отображения в корзине</summary>
            <div>
                <app-shopping-cart-item></app-shopping-cart-item>
            </div>
        </details>
        <details class="detail-info">
            <summary>карточка покупок</summary>
            <div>
                <app-account-list></app-account-list>
            </div>
        </details>
        <details class="detail-info">
            <summary>Список машин</summary>
            <div>
                <app-garage-list-item></app-garage-list-item>
            </div>
        </details>
        <div>
            <app-select-input-nano></app-select-input-nano>
        </div>

        <div style="margin-top: 50px"></div>
    </div>
</template>

<script>
import Tag from '../components/global/Tag'
import Toggle from '../components/global/Toggle'
import Radio from '../components/global/Radio'
import Checkbox from '../components/global/Checkbox'
import PriceButton from '../components/global/PriceButton'
import LinkToCart from '../components/global/LinkToCart'
import LinkToDownload from '../components/global/LinkToDownload'
import LinkToNavigate from '../components/global/LinkToNavigate'
import ShowMoreButton from '../components/global/ShowMoreButton'
import FindButton from '../components/global/FindButton'
import SliderButtonLeft from '../components/global/SliderButtonLeft'
import SliderButtonRight from '../components/global/SliderButtonRight'
import CallUsLink from '../components/global/CallUsLink'
import CarTag from '../components/global/CarTag'
import AddToCartButton from '../components/global/AddToCartButton'
import WidgetGoodsInCart from '../components/global/WidgetGoodsInCart'
import DropDownMenu from '../components/global/DropDownMenu'
import ChangeViewRadio from '../components/global/ChangeViewRadio'
import BigPriceButton from '../components/global/BigPriceButton'
import DiscountTag from '../components/global/DiscountTag'
import DiscountLabelDropDown from '../components/global/DiscountLabelDropDown'
import PrimeSearch from '../components/global/PrimeSearch'
import StandartSearch from '../components/global/StandartSearch'
import CompactSearch from '../components/global/CompactSearch'
import MiniSearch from '../components/global/MiniSearch'
import NanoSearch from '../components/global/NanoSearch'
import Alert from '../components/global/Alert'
import Header from '../components/global/Header'
import SelectInput from '../components/global/SelectInput'
import SelectInputMiddle from '../components/global/SelectInputMiddle'
import SelectInputNano from '../components/global/SelectInputNano'
import MainMenuButton from '../components/global/MainMenuButton'
import GoodItemGrid from '../components/global/GoodItemGrid'
import GoodItemList from '../components/global/GoodItemList'
import GoodItemListSmall from '../components/global/GoodItemListSmall'
import GoodItemListNano from '../components/global/GoodItemListNano'
import ItemInGoodPageA from '../components/global/ItemInGoodPageA'
import ItemInGoodPageB from '../components/global/ItemInGoodPageB'
import ItemInGoodPageC from '../components/global/ItemInGoodPageC'
import ItemInGoodPageD from '../components/global/ItemInGoodPageD'
import ShoppingCartItem from '../components/global/ShoppingCartItem'
import AccountList from '../components/global/AccountList'
import GarageListItem from '../components/global/GarageListItem'
import OldPrice from '../components/global/OldPrice'
import HeaderNoSearch from '../components/global/HeaderNoSearch'



export default {
    layout: 'simple',
    data() {
        return {

        }

    },
    components: {
        appTag: Tag,
        appToggle: Toggle,
        appRadio: Radio,
        appCheckbox: Checkbox,
        appPriceButton: PriceButton,
        appLinkToCart: LinkToCart,
        appLinkToDownload: LinkToDownload,
        appLinkToNavigate: LinkToNavigate,
        appShowMoreButton: ShowMoreButton,
        appFindButton: FindButton,
        appSliderButtonLeft: SliderButtonLeft,
        appSliderButtonRight: SliderButtonRight,
        appCallUsLink: CallUsLink,
        appCarTag: CarTag,
        appAddToCartButton: AddToCartButton,
        appWidgetGoodsInCart: WidgetGoodsInCart,
        appDropDownMenu: DropDownMenu,
        appChangeViewRadio: ChangeViewRadio,
        appBigPriceButton: BigPriceButton,
        appDiscountTag: DiscountTag,
        appDiscountLabelDropDown: DiscountLabelDropDown,
        appPrimeSearch: PrimeSearch,
        appStandartSearch: StandartSearch,
        appCompactSearch: CompactSearch,
        appMiniSearch: MiniSearch,
        appNanoSearch: NanoSearch,
        appAlert: Alert,
        appHeader: Header,
        appSelectInput: SelectInput,
        appSelectInputMiddle: SelectInputMiddle,
        appSelectInputNano: SelectInputNano,
        appMainMenuButton: MainMenuButton,
        appGoodItemGrid: GoodItemGrid,
        appGoodItemList: GoodItemList,
        appGoodItemListSmall: GoodItemListSmall,
        appGoodItemListNano: GoodItemListNano,
        appItemInGoodPageA: ItemInGoodPageA,
        appItemInGoodPageB: ItemInGoodPageB,
        appItemInGoodPageC: ItemInGoodPageC,
        appItemInGoodPageD: ItemInGoodPageD,
        appShoppingCartItem: ShoppingCartItem,
        appAccountList: AccountList,
        appGarageListItem: GarageListItem,
        appOldPrice: OldPrice,
        appHeaderNoSearch: HeaderNoSearch,
    }
}
</script>

<style scoped>
    .detail-info {
        margin-top: 30px;
        cursor: pointer;
    }
    .detail-info > summary {
        font-size: 25px;
        margin-bottom: 15px;
    }
    br {
        line-height: 2;
    }
.library {
    padding-left: 30px;
    padding-right: 30px;
}
.component-title {
    margin-top: 30px;
    margin-bottom: 1rem;
}
    .detail-info[open] {
        cursor: auto;
    }
</style>
