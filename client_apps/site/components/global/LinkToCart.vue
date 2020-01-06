<template>
    <nuxt-link to="/prototypes/cart" class="go-to-cart-link H2-Bold-white grey-border" :class="className">
        В корзине <slot/>
        <p class="go-to-cart-link__hint Tag-60-White">Перейти</p>
    </nuxt-link>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .go-to-cart-link {
        max-width: 302px;
        display: block;
        text-decoration: none;
        background-color: var(--blueberry);
        text-align: center;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        -webkit-background-origin: border-box;
        background-origin: border-box;
        background-clip: border-box;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear
    }
    .go-to-cart-link__hint {
        margin: 0;
        text-align: center;
    }

    .go-to-cart-link:hover {
        background-color: var(--blueberry_lite);
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .go-to-cart-link:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }

    .big-paddings {
        padding-top: 9px;
        padding-bottom: 15px;
    }
</style>
