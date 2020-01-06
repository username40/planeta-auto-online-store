<template>
    <nuxt-link to="/prototypes/product-page" class="good-item-list">
        <div class="good-item-list__slider-container">
            <slot name="image"></slot>
        </div>
        <div class="good-item-list__description">
            <p class="h3 good-item-list__name"><slot name="goodName"/></p>
            <div class="specs">
                <slot name="specLists"/>
            </div>

            <a href="#" class="Body-14-Prime good-item-list__more-info-link">Все характеристики</a>
            <div class="discounts">
                <p class="Old-price strike-text"><slot name="oldPrice"/></p>
                <slot name="price"/>
                <slot name="discountTags"/>
            </div>
            <div class="prices">
                <slot name="PriceButton"/>
            </div>
        </div>
    </nuxt-link>
</template>

<script>
    import DiscountTag from '~/components/global/DiscountTag'
    import PriceButton from '~/components/global/PriceButton'
    export default {
        name: "GoodItemList",
        components: {
            appDiscountTag: DiscountTag,
            appPriceButton: PriceButton
        }
    }
</script>

<style scoped>
    .good-item-list {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        max-width: 825px;
        padding: 15px;
        -webkit-transition: all var(--animation);
        -o-transition: all var(--animation);
        transition: all var(--animation);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        text-decoration: none;
    }

    .good-item-list:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .good-item-list:hover .price-button {
        background-color: var(--blueberry);
        color: var(--just_white);
    }
    .good-item-list__slider-container {
        width: 255px;
        height: 255px;
        background-color: var(--snow);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .good-item-list__description {
        margin-left: 30px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
    }
    .def-img {
        width: 255px;
        height: 255px;
    }
    .good-item-list__short-spec {
        padding-left: 0;
    }
    .good-item-list__short-spec > li {
        list-style-type: none;
    }

    .good-item-list__name {
        color: var(--just_black);
    }

    .good-item-list__more-info-link {
        text-decoration: none;
    }
    .discounts {
        margin-top: 5px;
        display: flex;
        align-items: center;
    }
    .discount-tag {
        margin-right: 2px;
    }

    .prices {
        margin-top: 3px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .Old-price {
        margin-right: 15px;
    }
    .specs {
        display: flex;
        justify-content: space-between;
    }
</style>