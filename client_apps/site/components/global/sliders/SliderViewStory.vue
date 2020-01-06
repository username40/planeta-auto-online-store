<template>
    <article class="discounts-and-supersales" v-if="viewStory.length > 0">
        <h2 class="container h1">История просмотра</h2>
        <div v-if="viewStory.length <= 5" style="display: flex; justify-content: flex-start" class="container">
            <div v-for="product in viewStory" :key="product.id">
                <app-good-item-grid-small :product="product"/>
            </div>
        </div>
        <div v-else-if="viewStory.length > 5" >
            <app-slider-with-goods :id="'viewStoryGoods'">
                <div class="swiper-slide" v-for="product in viewStory" :key="product.id">
                    <app-good-item-grid-small :product="product"/>
                </div>
            </app-slider-with-goods>
        </div>

    </article>
</template>

<script>
    import GoodItemGridSmall from '~/components/global/goodItems/GoodItemGridSmall'
    import SliderWithGoods from '~/components/global/sliders/SliderWithGoods'
    export default {
        name: "SliderViewStory",
        components: {
          appGoodItemGridSmall: GoodItemGridSmall,
          appSliderWithGoods: SliderWithGoods
        },
        computed: {
            viewStory() {
                try {
                    return this.$store.getters['cart/viewStory']
                    console.log(this.$store.state['cart/viewStory'].length)
                } catch (e) {
                    console.log(error(e))
                }
            }
        }
    }
</script>

<style scoped>

</style>