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
            </div>
            <div class="content-overlay">
                <h3 class="h3 content__title">Модификация</h3>
                <app-select>
                    <option>215/55 R18 99T</option>
                    <option>215/50 R18 99T</option>
                    <option>215/45 R18 99T</option>
                    <option>215/40 R18 99T</option>
                </app-select>
                <div class="item-in-good-page__order-conditions grey-border">
                    <div class="left-column">
                        <div class="add-to-cart-buttons">
                            <app-link-to-cart>2</app-link-to-cart>
                            <button class="add-more grey-border">
                                <img src="/icons/add-more-icon.svg" alt="добавить еще иконка">
                            </button>
                        </div>
                        <p class="Body-16 added-bonus">+<span>2000</span> Бонусов будет зачислено</p>
                    </div>
                    <div class="right-column">
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
                            <p class="Body-14 conditions-description__date">С <span>12</span> по <span>17</span> <span>мая</span></p>
                        </div>
                        <div class="item-in-good-page__order-conditions-row">
                            <p class="Body-14 item-in-good-page__order-conditions-description">
                                <img src="/icons/delivery.svg" alt="условие приобритения иконка" class="order-condition-icon">
                                Доставка — от 300 ₽
                            </p>
                            <p class="Body-14 conditions-description__date">С <span>11</span> <span>мая</span>, или в другой день</p>
                        </div>
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
                            </tbody>
                        </table>
                        <a href="#" class="consumer-properties__show-more-link">Все товары Bridgestone</a>
                    </div>
                    <div class="consumer-properties__compatibility">
                        <h3 class="h3 consumer-properties__title">Совместимость</h3>
                        <ul class="compatibility-list">
                            <li class="Body-14">Skoda Fabia</li>
                            <li class="Body-14">Skoda Fabia Combi</li>
                            <li class="Body-14">Skoda Rapid</li>
                            <li class="Body-14">Volkswagen Polo</li>
                            <li class="Body-14">Volkswagen Caddy</li>
                            <li class="more-compatibility-list">Ещё <span>16</span> моделей</li>
                        </ul>
                        <a href="#" class="Body-14 consumer-properties__show-more-link">Перейти к описанию характеристик</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import FeedbackAndActions from '~/components/global/FeedbackAndActions'
    import DiscountTag from '~/components/global/DiscountTag'
    import LinkToCart from '~/components/global/LinkToCart'
    import Select from '~/components/global/Select'

    export default {
        name: "ItemInGoodPageA",
        components: {
            appFeedbackAndActions: FeedbackAndActions,
            appDiscountTag: DiscountTag,
            appLinkToCart: LinkToCart,
            appSelect: Select
        }

    }
</script>

<style scoped>
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

    .good-item-list-small__description-actions {
        margin-left: 28px;
    }

    .item-in-good-page__image-slider {
        padding-left: 15px;
        padding-right: 15px;
        width: 430px;
        height: 430px;
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
        margin-top: 20px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding-top: 30px;
        padding-left: 15px;
        padding-bottom: 28px;
        padding-right: 28px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        margin-right: 11px;
    }

    .content-overlay {
        max-width: 635px;
    }

    .added-bonus {
        margin-top: 4px;
        color: #918dae;
        text-align: center;
    }

    .right-column {
        margin-left: 30px;
    }

    .order-condition-icon {
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .item-in-good-page__order-conditions-row {

    }

    .item-in-good-page__order-conditions-description {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 4px;
    }

    .conditions-description__date {
        margin-left: 28px;
        color: var(--asphalt);
    }

    .consumer-properties {
        margin-top: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .consumer-properties__about, .consumer-properties__compatibility {
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
    }

    .consumer-properties__table  tr {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
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
        margin-top: 16px;
        display: block;
        text-decoration: none;
        color: var(--blueberry);
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
    }

    .add-more > img {
        width: 32px;
        height: 32px;
    }
    .content__title {
        margin-top: 18px;
    }
</style>
