<template>
    <div class="range-input-container d-flex align-items-center justify-content-around">

        <span class="Body-18">от {{doubleValue[0]}} &#x20bd;</span>
        <span class="splitter"></span>
        <span class="Body-18">до {{ doubleValue[1] }} &#x20bd;</span>
    <div class="range-overlay">
    <vue-slider v-model="doubleValue" :tooltip="'none'" :dotSize="23" :min="1" :max="15000"></vue-slider>
    </div>
    </div>
</template>

<script>
    import VueSlider from 'vue-slider-component/dist-css/vue-slider-component.umd.min.js'
    import 'vue-slider-component/dist-css/vue-slider-component.css'
    import 'vue-slider-component/theme/default.css'
    export default {
        name: 'DoubleRange',
        components: {
            VueSlider
        },
        data() {
            return {
                doubleValue: [1, 7000]
            }
        }
    }
</script>

<style scoped>
    .range-input-container {
        border-left: 1px solid #918dae;
        border-right: 1px solid #918dae;
        border-top: 1px solid #918dae;
        border-top-left-radius: 6px;
        border-top-right-radius: 6px;
        height: 50px;
        position: relative;
    }

    .range-overlay {
        position: absolute;
        width: 100%;
        top: 35px;
    }

    .splitter {
        border-left: 1px solid #918dae;
        height: 100%;
        position: absolute;
        left: 50%;
    }
</style>