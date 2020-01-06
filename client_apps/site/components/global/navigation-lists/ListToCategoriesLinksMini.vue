<template>
    <div class="fix">
        <div class="container list-to-categories-links__container">
            <div v-swiper:mySwiper="swiperOption" class="slider-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide" v-for="product in products" :key="product.id">
                        <nuxt-link :to="product.url" class="list-to-categories-links_link Body-18-Prime grey-border">
                            <img :src="product.iconSrc" alt="" class="list-to-categories-links_icon">
                            {{ product.title }}
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                swiperOption: {
                    loop: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    spaceBetween: 10,
                    on: {
                        sliderMove() {
                            let sliderContainerBorder = document.querySelector('.slider-container')
                            sliderContainerBorder.style.borderLeftColor = '#918dae'
                        }
                    }
                }
            }
        },
        computed: {
            products() {
                return this.$store.getters['lists/LinksToCategoryPage']
            }
        }
    }
</script>

<style scoped>
    .fix {
        width: 100%;
        z-index: 10;
        background-color: var(--just_white);
    }
    .list-to-categories-links__container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-right: 0px;
        padding-left: 0px;
    }



    .list-to-categories-links_link {
        display: flex;
        align-items: center;
        text-decoration: none;
        border-radius: 20px;
        padding: 8px 10px 11px;

    }

    .list-to-categories-links_icon {
        margin-right: 4px;
    }

    .slider-container {
        max-width: 931px;
    }

    .swiper-slide {
        text-align: center;
        width: auto !important;
    }
</style>