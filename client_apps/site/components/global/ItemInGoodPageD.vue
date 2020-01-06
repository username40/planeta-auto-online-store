<template>
    <div class="item-in-good-page">
        <h2 class="h1 item-in-good-page__title">VAG 030 115 561 AN· Фильтр масляный для двигателя</h2>
        <div class="item-in-good-page__properties">
            <p class="Body-16 vendor-code">Артикул: А01-06352</p>
            <app-discount-tag :class="'discount-tag_glory'">Экстра Бонус</app-discount-tag>
            <app-discount-tag :class="'discount-tag_lemon discount-tag_text-color-blue'">Сезонный товар</app-discount-tag>
            <app-feedback-and-actions></app-feedback-and-actions>
        </div>
        <div class="item-in-good-page__content">
            <div class="item-in-good-page__image-slider">
                <img src="/demo-images/oil-filter.jpg" alt="изображение товара большое" class="big-image">
                <img src="/demo-images/slider-mini-img-1.jpg" alt="изображение товара маленькое" class="small-image">
                <img src="/demo-images/slider-mini-img-2.jpg" alt="изображение товара маленькое" class="small-image">
                <img src="/demo-images/slider-mini-img-3.jpg" alt="изображение товара маленькое" class="small-image">
                <img src="/demo-images/slider-mini-img-4.png" alt="изображение товара маленькое" class="small-image">
            </div>
            <div class="content-overlay">
                <div class="item-in-good-page__order-conditions grey-border">
                        <div class="item-in-good-page__order-conditions-row">
                            <p class="Body-14 item-in-good-page__order-conditions-description">
                                <img src="/icons/available.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                Наличие — 12 шт
                            </p>
                        </div>
                        <div class="item-in-good-page__order-conditions-row">
                            <p class="Body-14 item-in-good-page__order-conditions-description">
                                <img src="/icons/pickup.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                Самовывоз — Бесплатно
                            </p>
                            <p class="Body-14 conditions-description__date">с 12 по 17 мая</p>
                        </div>
                        <div class="item-in-good-page__order-conditions-row">
                            <p class="Body-14 item-in-good-page__order-conditions-description">
                                <img src="/icons/delivery.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                Доставка — от 300 ₽
                            </p>
                            <p class="Body-14 conditions-description__date">с 11 мая, или в другой день</p>
                        </div>
                        <div class="item-in-good-page__order-conditions-row">
                        <p class="Body-14 item-in-good-page__order-conditions-description">
                            <img src="/icons/payback.svg" alt="условие приобритения иконка" class="order-condition-icon">
                            30 дней — гарантия возврата
                        </p>
                    </div>
                    <h3 class="content__title h3">Модификация</h3>
                    <app-select>
                        <option value="Бензин">Бензин</option>
                        <option value="Керосин">Керосин</option>
                        <option value="Авиационное топливо">Авиационное топливо</option>
                        <option value="Ракетное топливо">Ракетное топливо</option>
                    </app-select>
                    <div class="left-column">
                        <div class="add-to-cart-buttons">
                            <app-big-price-button :class="'big-price-btn_blueberry grey-border'">102 790</app-big-price-button>

                        </div>
                        <p class="Body-16 added-bonus">+<span>2000</span> Бонусов будет зачислено</p>
                    </div>

                </div>
                <div class="consumer-properties">
                    <div class="consumer-properties__about">
                        <h3 class="h3 consumer-properties__title">О товаре</h3>
                        <table class="consumer-properties__table">
                            <tbody>
                            <tr>
                                <td class="Body-14">Тип авто</td>
                                <td class="Body-14">Внедорожник</td>
                            </tr>
                            <tr>
                                <td class="Body-14">Монтаж</td>
                                <td class="Body-14">Безкамерный</td>
                            </tr>
                            <tr>
                                <td class="Body-14">Индекс нагрузки</td>
                                <td class="Body-14">775 кг</td>
                            </tr>
                            <tr>
                                <td class="Body-14">Индекс скрости</td>
                                <td class="Body-14">до 190 км\ч</td>
                            </tr>
                            <tr>
                                <td class="Body-14">Название</td>
                                <td class="Body-14">Hakkapeliitta 7 SUV</td>
                            </tr>
                            <tr>
                                <td class="Body-14">Страна производства</td>
                                <td class="Body-14">Корея</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="Body-14-Prime more-compatibility-list">Ещё 16 моделей</td>
                            </tr>
                            </tbody>
                        </table>
                        <a href="#" class="Body-14-Prime consumer-properties__show-more-link">Показать все характеристики и описание</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import FeedbackAndActions from '~/components/global/FeedbackAndActions'
    import DiscountTag from '~/components/global/DiscountTag'
    import Select from '~/components/global/Select'
    import BigPriceButton from '~/components/global/BigPriceButton'

    export default {
        name: "ItemInGoodPageA",
        components: {
            appFeedbackAndActions: FeedbackAndActions,
            appDiscountTag: DiscountTag,
            appSelect: Select,
            appBigPriceButton: BigPriceButton
        }

    }
</script>

<style scoped>
    .select-container {
        max-width: 100%;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }
    .big-price-btn {
        margin-top: 20px;
        width: 100%;
    }
    .left-column {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .item-in-good-page {
        max-width: 1110px;
        padding-bottom: 65px;
    }
    .item-in-good-page__title {
        display: block;
    }

    .item-in-good-page__properties {
        margin-top: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .discount-tag {
        margin-left: 2px;
        margin-right: 2px;
    }

    .vendor-code {
        margin-right: 26px;
    }


    .item-in-good-page__image-slider {
        padding-left: 15px;
        padding-right: 15px;
        width: 635px;
        max-height: 635px;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    .big-image {
        display: block;
        width: 100%;
        height: 100%;
    }

    .item-in-good-page__content {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 14px;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .item-in-good-page__order-conditions {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        padding-top: 18px;
        padding-left: 20px;
        padding-right: 20px;
        padding-bottom: 20px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        margin-right: 11px;
    }

    .content-overlay {
        max-width: 445px;
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .added-bonus {
        margin-top: 4px;
        font-size: 16px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.38;
        letter-spacing: normal;
        text-align: center;
        color: #918dae;
        text-align: center;
    }

    .order-condition-icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .item-in-good-page__order-conditions-description {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 4px;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        color: var(--just_black);
    }

    .conditions-description__date {
        margin-left: 24px;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        color: var(--asphalt);
    }

    .consumer-properties {
        margin-top: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .consumer-properties__title {
        font-size: 18px;
        font-weight: bold;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        color: var(--just_black);
    }

    .consumer-properties__about {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .consumer-properties__table tr {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .consumer-properties__table td {
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        color: var(--just_black);
    }

    .consumer-properties__table {
        width: 100%;
    }

    .consumer-properties__about {
        padding-right: 15px;
    }

    .consumer-properties__compatibility {
        padding-left: 15px;
    }
    .compatibility-list > li {
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.43;
        letter-spacing: normal;
        color: var(--just_black);
    }

    .compatibility-list > li:last-child {
        color: var(--blueberry);
        cursor: pointer;
    }

    .consumer-properties__show-more-link {
        text-align: right;
        margin-top: 16px;
        display: block;
        text-decoration: none;
    }

    .consumer-properties__show-more-link:hover {
        text-decoration: none;
    }

    .add-to-cart-buttons {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .go-to-cart-link {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        width: 280px;
    }
    .add-more {
        -webkit-border-radius: 6px;
        border-radius: 6px;
        padding: 6px;
        font-size: 28px;
        font-weight: 700;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.33;
        letter-spacing: normal;
        text-align: center;
        color: var(--blueberry);
    }

    .content__title {
        margin-top: 30px;
    }

    .more-compatibility-list {
        color: var(--blueberry)!important;
        cursor: pointer;
    }
</style>