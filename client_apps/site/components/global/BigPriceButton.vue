<template>
    <button class="Price-White big-price-btn grey-border">
        <slot/> &#8381;
    </button>
</template>

<script>
export default {
    props: ['className']
}
</script>

<style scoped>
    .big-price-btn {
        height: 70px;
        padding-left: 26px;
        padding-right: 26px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        border: none;
        -webkit-transition: background-color .2s linear;
        -o-transition: background-color .2s linear;
        transition: background-color .2s linear;
    }

    .big-price-btn_blueberry {
        color: var(--just_white);
        background-color: var(--blueberry);
    }

    .big-price-btn_blueberry:hover {
        background-color: var(--blueberry_lite);
    }

    .big-price-btn_blueberry:active {
        background-color: var(--blueberry_deep);
        box-shadow: none;
    }
</style>