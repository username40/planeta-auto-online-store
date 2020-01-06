<template>
    <div class="mt30px container">
        <div v-if="specialOffers.length > 3" v-swiper:mySwiper="swiperOption" class="slider-container" id="special-offer-slider-container">
            <div class="swiper-wrapper flex-row-reverse">
                <nuxt-link class="swiper-slide special-offer-link" v-for="offer in specialOffers" :key="offer.id" :to="'/mvp/sales/' + offer.id">
                    <img :src="offer.imgSrc" :alt="offer.altText" class="grey-border special-offer-image">
                </nuxt-link>
            </div>
        </div>
        <div v-if="specialOffers.length <=3" class="container special-offer-container">
            <div class="row flex-row-reverse">
                <nuxt-link class="col-4  special-offer-link" v-for="offer in specialOffers" :key="offer.id" :to="'/mvp/sales/' + offer.id">
                    <img :src="offer.imgSrc" :alt="offer.altText" class="grey-border special-offer-image">
                </nuxt-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ListToSpecialOffersLinks",
        data() {
            return {
                swiperOption: {
                    loop: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    spaceBetween: 10,
                    on: {
                        sliderMove() {
                            let sliderContainerBorder = document.querySelector('#special-offer-slider-container')
                            sliderContainerBorder.style.borderLeftColor = '#918dae'
                        }
                    }
                }
            }
        },
        computed: {
            specialOffers() {
                return this.$store.getters['lists/SpecialOffers']
            }
        }
    }
</script>

<style scoped>
    .special-offer-container {
        padding: 10px 0 10px 0;
    }
    .special-offer-image {
        width: 100%;
        border-radius: 8px;
    }

    .special-offer-link {
        display: flex;
    }

    .special-offer-link:hover .special-offer-image {
        box-shadow: 0 1px 5px 0 var(--blueberry-20), 0 3px 1px -2px var(--blueberry-12), 0 2px 2px 0 var(--blueberry-14);
    }


    .special-offer-item {
        position: relative;
        border-radius: 8px;
    }

    .special-offer-item__figcation {
        position: absolute;
        z-index: 2;
        max-width: 176px;
        top: 41px;
        left: 16px;
        text-align: left;
    }

    .black-text {
        color: var(--just_black)!important;
    }

    .white-text {
        color: var(--just_white)!important;
    }

    .blueberry-text {
        color: var(--blueberry)!important;
    }



    .swiper-slide {
        text-align: center;
        width: auto !important;
    }
</style>