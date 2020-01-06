<template>
    <nuxt-link to="/prototypes/product-page" class="shopping-cart-item">
        <app-checkbox
        :name="'shopping-cart-item'"></app-checkbox>
        <div class="shopping-cart-item__slider">
            <img src="/demo-images/shopping-cart-item-slider-image.jpg" alt="картинка товара в корзине">
        </div>
        <div class="shopping-cart-item__description">
            <h3 class="h3 shopping-cart-item__title"><slot name="goodName"/></h3>
            <ul class="shopping-cart-item__property-list">
                <li class="Body-14">• полусинтетическое моторное масло</li>
                <li class="Body-14">• объем упаковки 4 л</li>
                <li class="Body-14">• класс вязкости 10W-40</li>
                <li class="Body-14">• класс API — SG</li>
            </ul>
        </div>
        <div class="quantity-button-group">
            <button class="quantity-button-group__button left-button grey-border" @click.prevent="minus">
                <img src="/icons/minus.svg" alt="меньше иконка">
            </button>
            <p class="Body-18-Prime quantity-button-group__value grey-border">{{ quantity }}</p>
            <button class="quantity-button-group__button right-button grey-border" @click.prevent="plus">
                <img src="/icons/plus.svg" alt="больше иконка">
            </button>
        </div>
        <div class="quantity-description">
            <p class="Body-18 many"><slot name="many"/></p>
            <p class="Body-18 few"><slot name="few"/></p>
            <p class="Tag-12-60 when">204 шт (23 фев)</p>
        </div>
        <div class="price-and-discount">
            <div class="discount-tag-layer">
            <app-discount-tag :class="'discount-tag_azalea'">&minus;10%</app-discount-tag>
            <app-discount-label-drop-down></app-discount-label-drop-down>
            </div>
            <p class="Old-price strike-text">102 790 ₽</p>
            <p class="Price">3790 ₽</p>
            <button class="Body-14-Prime price-and-discount__delete-good">
                <img src="/icons/delete-cross-button.svg" alt="удалить иконка">
                Убрать товар
            </button>
        </div>
    </nuxt-link>
</template>

<script>
    import DiscountLabelDropDown from '~/components/global/DiscountLabelDropDown'
    import DiscountTag from '~/components/global/DiscountTag'
    import Checkbox from '~/components/global/Checkbox'
    export default {
        name: "ShoppingCartItem",
        data() {
            return {
                quantity: 1
            }
        },
        methods: {
            plus() {
                this.quantity++;
            },
            minus() {
                if (this.quantity === 1) {
                    stop;
                } else {
                    this.quantity--;
                }
            }
        },
        components: {
            appDiscountLabelDropDown: DiscountLabelDropDown,
            appDiscountTag: DiscountTag,
            appCheckbox: Checkbox
        }
    }
</script>

<style scoped>
    .shopping-cart-item {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-transition: all var(--animation);
        -o-transition: all var(--animation);
        transition: all var(--animation);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        width: 100%;
        padding-top: 15px;
        padding-bottom: 15px;
        text-decoration: none;
    }

    .shopping-cart-item:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
        width: calc(100% + 30px);
        padding-left: 15px;
        padding-right: 15px;
        margin-left: -15px;
    }
    .shopping-cart-item:hover .price-and-discount__delete-good {
        opacity: 1;
    }
    .check {
        position: absolute;
        z-index: 5;
        top: 15px;

    }



    .shopping-cart-item__description {
        max-width: 445px;
    }

    .shopping-cart-item__property-list {
        margin-top: 6px;
    }
    .quantity-button-group {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .quantity-button-group__button {
        background-color: #fff;
        width: 40px;
        height: 40px;
    }

    .quantity-button-group__value {
        height: 40px;
        display: flex;
        align-items: center;
        padding-left: 26px;
        padding-right: 26px;
        border-left: none!important;
        border-right: none!important;
    }
    .left-button {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }
    .right-button {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }
    .price-and-discount__delete-good {
        position: absolute;
        bottom: 15px;
        right: 15px;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        opacity: 0;
        border: none;
        background-color: #fff;
    }

    .price-and-discount__delete-good > img {
        opacity: 0.6;
    }

    .many {
        color: var(--lime);
    }

    .few {
        color: var(--terracota);
    }

    .Old-price {
        margin-top: 4px;
        text-align: left;
    }

    .Price {
        margin-top: 7px;
    }

    .discount-tag-layer {
        max-height: 28px;
    }
</style>