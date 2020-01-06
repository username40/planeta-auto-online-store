<template>
    <button class="price-button Price grey-border" @click.prevent="">
        <slot/>
    </button>
</template>

<script>
export default {
    props: ['className'],
    methods: {

    }
}
</script>

<style scoped>
    .price-button {
        width: 100%;
        padding-left: 9px;
        padding-right: 9px;
        height: 50px;
        cursor: pointer;
        border: none;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        outline: none;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }

    .price-button_just-white {
        background-color: var(--just_white);
        color: var(--just_black);
    }

    .price-button_just-white:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .price-button_just-white:active {
        background-color: var(--asphalt_light);
        box-shadow: none;
    }

    .price-button_blueberry {
        background-color: var(--blueberry);
        color: var(--just_white);
        -webkit-box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        box-shadow: 0 0.5px 0.5px 0 rgba(0, 0, 0, 0.15);
        background-clip: border-box;
    }

    .price-button_blueberry:hover {
        background-color: var(--blueberry_lite);
    }

    .price-button_blueberry:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }
</style>

