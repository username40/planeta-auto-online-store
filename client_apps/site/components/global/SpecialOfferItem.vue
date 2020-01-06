<template>
    <nuxt-link to="/prototypes/catalog-upper-lvl">
    <figure class="special-offer-item">
        <img :src="special.image" alt="">
        <figcaption class="white-text special-offer-item__figcation">
            <p class="Tag-Bold-White">{{ special.preTitle }}</p>
            <h2 class="H2-White">{{ special.title }}</h2>
            <p class="Tag-12-60 white-text">{{ special.afterTitle }}</p>
        </figcaption>
    </figure>
    </nuxt-link>
</template>

<script>
    export default {
        props: ['special'],
        name: "SpecialOfferItem"
    }
</script>

<style scoped>
    .special-offer-item {
        position: relative;
    }

    .special-offer-item__figcation {
        position: absolute;
        z-index: 2;
        max-width: 176px;
        top: 41px;
        left: 16px;
    }
    .black-text {
        color: var(--just_black)!important;
    }

    .white-text {
        color: var(--just_white)!important;
    }
</style>