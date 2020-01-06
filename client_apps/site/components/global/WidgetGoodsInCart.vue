<template>
    <button class="Body-16 widget-goods-in-cart grey-border">
        <span class="widget-goods-in-cart__icon"></span> 
        <slot/> Товара
        </button>
</template>

<script>
export default {
    
}
</script>

<style scoped>
    .widget-goods-in-cart {
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
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 4px;
        padding-bottom: 4px;
        background-color: var(--just_white);
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        color: var(--blueberry);
        border: none;
        -webkit-border-radius: 6px;
        border-radius: 6px;
    }

    .widget-goods-in-cart:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .widget-goods-in-cart:active {
        background-color: var(--blueberry_deep);
        color: var(--just_white);
        outline: none;
        box-shadow: none;
    }

    .widget-goods-in-cart:focus {
        outline: none;
    }

    .widget-goods-in-cart__icon {
        background-repeat: no-repeat;
        background-position: center center;
        width: 24px;
        height: 24px;
        margin-right: 4px;
        background-image: url('/icons/cart-icon_blue.svg');
    }

    .widget-goods-in-cart:active .widget-goods-in-cart__icon {
        background-image: url('/icons/cart-icon_white.svg');
    }
</style>