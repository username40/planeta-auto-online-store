<template>
    <div class="container">
        <div v-swiper:mySwiper="swiperOption" class="slider-container" :id="id">
            <div class="swiper-wrapper">
                <slot/>
            </div>
            <button
                    class="swiper-button-prev slider-button grey-border slider-button_left-border-radius"
                    @click="showSliderBorderAndPreviousButton">
                <img src="/images/icons/swiper-slider/slider-arrow.svg"
                                                                  alt=""></button>
            <button
                    class="swiper-button-next slider-button grey-border slider-button_right-border-radius"
                    @click="showSliderBorderAndPreviousButton">
                <img src="/images/icons/swiper-slider/slider-arrow.svg"
                                                                  alt=""></button>
        </div>
    </div>
</template>

<script>
    import GoodItemGridSmall from '../goodItems/GoodItemGridSmall'

    export default {
        props: ['id'],
        name: "SliderWithGoods",
        components: {
            appGoodItemGridSmall: GoodItemGridSmall
        },
        data() {
            return {
                ident: this.id,
                swiperOption: {
                    loop: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    on: {
                        sliderMove: () => {
                            let thisSlider = document.querySelector(`#${this.ident}`)
                            thisSlider.style.borderLeftColor = '#918dae'

                            let previousButton = document.querySelector(`#${this.ident} > .swiper-button-prev`)
                            previousButton.style.opacity = 1
                        }
                    }
                }
            }
        },
        methods: {
            showSliderBorderAndPreviousButton() {
                    let thisSlider = document.querySelector(`#${this.ident}`)
                    thisSlider.style.borderLeftColor = '#918dae'

                    let previousButton = document.querySelector(`#${this.ident} > .swiper-button-prev`)
                    previousButton.style.opacity = 1
            }
        },
        computed: {
            products() {
                return this.$store.getters['products/products']
            }
        }
    }
</script>

<style scoped>
    .container {
        position: relative;
    }

    .swiper-slide {
        text-align: center;
        width: auto !important;
    }

    .swiper-button-prev, .swiper-button-next {
        background-image: none;
        width: auto;
        height: auto;
        margin-top: -25px;
    }

    .swiper-button-prev {
        left: -36px;
        opacity: 0;
    }

    .swiper-button-prev > img {
        transform: rotate(180deg);
    }

    .swiper-button-next {
        right: -36px;
    }

    .swiper-container, .swiper-wrapper {
        position: initial;
    }

    .slider-button_left-border-radius {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
        -webkit-border-top-right-radius: 0px;
        border-top-right-radius: 0px;
        -webkit-border-bottom-right-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .slider-button_right-border-radius {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
        -webkit-border-top-left-radius: 0px;
        border-top-left-radius: 0px;
        -webkit-border-bottom-left-radius: 0px;
        border-bottom-left-radius: 0px;
    }
</style>