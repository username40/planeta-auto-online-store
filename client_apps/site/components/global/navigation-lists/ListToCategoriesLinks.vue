<template>
    <div class="fix">
    <div class="container list-to-categories-links__container">
        <nuxt-link to="/mvp/catalog-upper-lvl" class="list-to-categories-links_link Body-18-Prime all-cats">
            <img src="/images/icons/list-to-categories-links/list-to-categories-links_all-categories.svg" alt="Все категории Иконка"
                 class="list-to-categories-links_icon">
            Все категории
        </nuxt-link>
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
    import {eventBus} from "~/plugins/eventbus";
    export default {
        data() {
            return {
                swiperOption: {
                    loop: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    on: {
                        sliderMove() {
                            let sliderContainerBorder = document.querySelector('.slider-container')
                            sliderContainerBorder.style.borderLeftColor = '#918dae'
                        }
                    }
                }
            }
        },
        methods: {
        },
        computed: {
            products() {
                return this.$store.getters['lists/LinksToCategoryPage']
            }
        }
    }
</script>


<style scoped>
    .swiper-slide:hover .list-to-categories-links_link {
        box-shadow: 0 1px 5px 0 var(--blueberry-20), 0 3px 1px -2px var(--blueberry-12), 0 2px 2px 0 var(--blueberry-14);
    }
    .fix {
        position: fixed;
        padding-bottom: 10px;
        width: 100%;
        z-index: 30;
        background-color: var(--just_white);
    }
    .list-to-categories-links__container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-right: 0px;
    }



    .list-to-categories-links_link {
        display: flex;
        align-items: center;
        text-decoration: none;
        border-radius: 20px;
        padding: 8px 10px 11px;

    }

    .all-cats {
        padding-left: 0;
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