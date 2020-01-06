<template>
    <div class="container">
        <div v-swiper:mySwiper="swiperOption" class="slider-container" id="search-result-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide" v-for="item in SearchResult" :key="item.id">
                    <nuxt-link to="/" class="list-to-categories-links_link Body-18-Prime grey-border">
                        <img :src="'/images/icons/search-results-category-list-links/' + item.imgSrc + '.svg'" :alt="item.name + ' иконка'" class="list-to-categories-links_icon">
                        {{ item.name }} ({{ item.howMany }})
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: 'ListToSearchResultCategories',
        data() {
            return {
                swiperOption: {
                    loop: true,
                    slidesPerView: 'auto',
                    centeredSlides: false,
                    on: {
                        sliderMove() {
                            let sliderContainerBorder = document.getElementById('search-result-slider')
                            sliderContainerBorder.style.borderLeftColor = '#918dae'
                        }
                    }
                }
            }
        },
        computed: {
            SearchResult() {
                // console.log(this.$store.getters['lists/SearchResLinksSlider'])
                return this.$store.getters['lists/SearchResLinksSlider']
            }
        }
    }
</script>


<style scoped>
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

    .swiper-slide {
        text-align: center;
        width: auto !important;
    }
</style>