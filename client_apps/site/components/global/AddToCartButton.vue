<template>
    <nuxt-link to="/prototypes/cart" class="add-to-cart grey-border Body-14"><span class="add-to-cart__icon"></span><slot/></nuxt-link>

</template>

<script>
export default {
    
}
</script>
<style scoped>
    .add-to-cart {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 4px;
        padding-bottom: 4px;
        background-color: var(--just_white);
        color: var(--blueberry);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: none;
        -webkit-transition: all 0s linear;
        -o-transition: all 0s linear;
        transition: all .var(--animation);
        text-decoration: none;
    }

    .add-to-cart__icon {
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url('/icons/add-to-cart_blue.svg');
        width: 24px;
        height: 24px;
        margin-right: 2px;
    }

    .add-to-cart:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .add-to-cart:active {
        background-color: var(--blueberry_deep);
        outline: none;
        box-shadow: none;
    }

    .add-to-cart:active .add-to-cart__icon {
        background-image: url('/icons/add-to-cart_white.svg');
    }

    .add-to-cart:focus {
        outline: none;
    }
</style>

