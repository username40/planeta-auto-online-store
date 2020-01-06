<template>
    <button class="price-button-grey-small Body-16 grey-border" @click.prevent="">
        <span class="cart-icon"></span><slot/>
    </button>
</template>

<script>
    export default {
        name: "PriceButtonGreySmall"
    }
</script>

<style scoped>
    .price-button-grey-small {
        background-color: var(--snow);
        border-radius: 6px;
        padding-left: 28px;
        padding-right: 28px;
        padding-top: 2px;
        padding-bottom: 4px;
        transition: all .2s linear;
        cursor: pointer;
        display: flex;
        width: 100%;
        justify-content: center;
    }

    .price-button-grey-small:hover {
        background-color: var(--blueberry);
        color: var(--just_white);

    }

    .cart-icon {
        background-image: url("/icons/cart-icon_black.svg");
        width: 20px;
        height: 20px;
        margin-right: 4px;
    }

    .price-button-grey-small:hover > .cart-icon {
        background-image: url("/icons/cart-icon_white.svg");
    }
</style>