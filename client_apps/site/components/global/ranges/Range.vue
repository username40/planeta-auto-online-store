<template>
    <div class="d-flex range-input-container">
        <p class="h3">Цена</p>

    <form onsubmit="return false" oninput="level.value = flevel.valueAsNumber" style="position: relative;">
        <div style="width: 193px;">
            <p style="text-align: right" class="Body-18">до <output for="flying" name="level">100</output> ₽</p>
            <input
                    @input="ranger"
                    name="flevel"
                    id="flying"
                    type="range"
                    min="1"
                    max="30000"
                    value="500"
                    step="1"
                    class="input-range--custom"
                    style="background: #d3dce6"

            >
        </div>
    </form>
    </div>
</template>

<script>
    export default {
        name: "Range",
        data() {
            return {
                bbbb: ''
            }
        },
        methods: {
            ranger() {
                let emptyColor = "#d3dce6";

                document.querySelector('input[type=range]').addEventListener('input', function() {
                    var percent = 100*(this.value-this.min)/(this.max-this.min)+'%';
                    this.style.backgroundImage = `linear-gradient( to right, #96c32d , #f1cf1f ,#ff4241, ${percent}, ${emptyColor} ${percent})`;
                });
            }

        }
    }
</script>

<style scoped>
    /*input range*/
    input[type=range].input-range--custom {
        -webkit-appearance: none;
        width: 100%;
        margin: 7.3px 0;
        z-index: 10;
    }

    input[type=range].input-range--custom:focus {
        outline: none;
        z-index: 10;
    }

    .bgc {
        background-image: linear-gradient(to left, #ff4241, #f1cf1f 50%, #96c32d);
        width: 100%;
        height: 5px;
        display: block;
        position: absolute;
        top: 15px
    }

    input[type=range].input-range--custom::-webkit-slider-runnable-track {
        width: 100%;
        height: 4px;
        border-radius: 1000px;
        cursor: pointer;
        z-index: 10000;
    }

    input[type=range].input-range--custom:after {
        width: 20%;
        height: 11.4px;
        background-color: green;
        z-index: 10;
    }

    input[type=range].input-range--custom::-webkit-slider-thumb {
        box-shadow: 0.9px 0.9px 1px #000031, 0px 0px 0.9px #00004b;
        border: 1.8px solid #00001e;
        height: 24px;
        width: 24px;
        border-radius: 50%;
        border: 0.5px solid #e4e4e4;
        background: #ffffff;
        cursor: pointer;
        -webkit-appearance: none;
        margin-top: -9.5px;
        z-index: 10;
    }

    .range-input-container {
        align-items: flex-end;
        justify-content: space-between;
    }
</style>