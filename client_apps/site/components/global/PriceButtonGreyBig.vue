<template>
    <button class="price-button-grey-big h2 grey-border">
        <span class="cart-icon"></span><slot/>
    </button>
</template>

<script>
    export default {
        name: "PriceButtonGreyBig"
    }
</script>

<style scoped>
    .price-button-grey-big {
        background-color: var(--snow);
        border-radius: 6px;
        padding-left: 21px;
        padding-right: 21px;
        padding-top: 8px;
        padding-bottom: 10px;
        transition: all .2s linear;
        cursor: pointer;
        display: flex;
    }

    .price-button-grey-big:hover {
        background-color: var(--blueberry);
        color: var(--just_white);

    }

    .cart-icon {
        background-image: url("/icons/cart-icon_black.svg");
        width: 24px;
        height: 24px;
        margin-top: 4px;
        margin-right: 4px;
    }

    .price-button-grey-big:hover > .cart-icon {
        background-image: url("/icons/cart-icon_white.svg");
    }
</style>