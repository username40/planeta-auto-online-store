<template>
    <a href="#" class="good-item-grid">
        <div class="good-item-grid__slider-container">
            <slot name="image"/>
        </div>
        <div class="good-item-grid__discount-offer">
            <app-old-price></app-old-price>
            <slot name="discountTag"></slot>
        </div>
        <slot name="priceTitle"></slot>
        <slot name="priceButton">
            <app-price-button
                    :class="'price-button_just-white grey-border'">102 790 ₽</app-price-button>
        </slot>

        <p class="good-item-grid__name h3">{{ shortName }}</p>
        <p class="Tag-14-60 good-item-grid__goods-category"><slot name="goodsCategory"/></p>
    </a>
</template>

<script>
    import DiscountTag from '~/components/global/DiscountTag'
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import PriceButton from '~/components/global/PriceButton'
    import OldPrice from '~/components/global/OldPrice'
    export default {
        name: "GoodItemGridNew",
        data() {
            return {
                itemName: 'Моторное масло MEGA-OIL Super 10W-40 4 л канистра пластик'
            }
        },
        components: {
            appDiscountTag: DiscountTag,
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appPriceButton: PriceButton,
            appOldPrice: OldPrice
        },
        methods: {

        },
        computed: {
            shortName() {
                console.log(this.itemName.length)
                if (this.itemName.length > 50) {
                    return this.itemName.split('').slice(0,49).join('') + '...'
                } else {
                    return this.itemName;
                }

            }
        }
    }
</script>

<style scoped>
    .good-item-grid {
        max-width: 165px;
        display: table;
        padding: 15px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-transition: all var(--animation);
        -o-transition: all var(--animation);
        transition: all var(--animation);
        text-decoration: none;
    }

    .good-item-grid:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .good-item-grid:hover .price-button {
        background-color: var(--blueberry);
        color: var(--just_white);
    }


    .good-item-grid:hover {
        text-decoration: none;
    }
    .Old-price {
        text-align: left;
        margin-top: 6px;
    }
    .good-item-grid__discount-offer {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-top: 10px;
        margin-bottom: 3px;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .good-item-grid__name {
        margin-top: 6px;

    }

    .good-item-grid__goods-category {
        opacity: 0.6;
        color: var(--blueberry);
    }
    .discount-tag {
        padding-left: 9px;
        padding-right: 9px;
        padding-top: 0;
        padding-bottom: 0;
    }

    .price-button {
        width: 100%;
        box-sizing: border-box;
    }
</style>