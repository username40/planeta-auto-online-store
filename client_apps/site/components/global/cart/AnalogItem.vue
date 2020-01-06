<template>
    <div class="analog-item-container" style="width: 200px">
        <img src="/images/cart/analog-item-01.jpg" alt="" style="width: 160px">
<!--        <div class="d-flex">-->
<!--            <p>102 790 ₽</p>-->
<!--            <button></button>-->
<!--        </div>-->
        <p class="Price">102 760 ₽</p>
            <button @click="showReplace" class="container analog-item-container__button Body-16 grey-border">
                <div class="row justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 24 24">
                        <defs>
                            <path id="a" d="M15.014 1.609l7.008 4.168A2 2 0 0 1 23 7.497v9.007a2 2 0 0 1-.978 1.719l-7.008 4.168a2 2 0 0 1-2.047 0l-6.991-4.168a2 2 0 0 1-.945-1.366 7.569 7.569 0 0 0 2.099.117l6.17 3.676v-7.98c.297-.639.508-1.326.617-2.048l.205.12 6.541-3.837-2.947-1.753-3.922 2.593a7.447 7.447 0 0 0-.588-1.607l2.922-1.93-2.137-1.27-2.16 1.287a7.533 7.533 0 0 0-1.392-1.109l2.528-1.506a2 2 0 0 1 2.047-.001zm6.342 6.819l-6.413 3.762v8.306l6.414-3.814-.001-8.254zM10.759 6.924L13 9.665l-1.503.006c-.076 2.974-2.295 5.371-5.014 5.382-1.162.005-2.229-.427-3.075-1.154l.863-1.013c.62.5 1.386.795 2.217.792 2.028-.008 3.686-1.788 3.76-4.002l-1.992.008 2.503-2.76zM6.518 4.053c1.161-.004 2.229.427 3.075 1.154L8.73 6.22a3.49 3.49 0 0 0-2.216-.792c-2.03.008-3.687 1.787-3.76 4.002l1.99-.007-2.503 2.76L0 9.44l1.503-.006C1.58 6.461 3.8 4.064 6.518 4.053z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd">
                            <path d="M0 0h24v24H0z"/>
                            <mask id="b" fill="#fff">
                                <use xlink:href="#a"/>
                            </mask>
                            <g class="fill-icon" fill="var(--blueberry)" mask="url(#b)">
                                <path d="M0 0h24v24H0z"/>
                            </g>
                        </g>
                    </svg>
                    <p>Заменить</p>
                </div>
            </button>
        <p class="Body-18">Масло моторное MEGA-OIL Super, 10W-40 4 л</p>
        <p class="Tag-14-60">В наличии 7 шт.</p>
    </div>
</template>

<script>
    import { eventBus } from '~/plugins/eventbus'

    export default {
        data() {
            return {
                replacePage: false,
            }
        },
        methods: {
            showReplace() {
                this.replacePage = !this.replacePage;
                eventBus.$emit('showReplacePage', this.replacePage);
            }
        }
    }
</script>

<style scoped>
    .analog-item-container {
        padding: 15px;
        border-radius: 6px;
        box-shadow: none;
        background-color: var(--just_white);
    }

    .analog-item-container:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .analog-item-container__button {
        border-radius: 6px;
        background-color: var(--snow);
        cursor: pointer;
        padding: 2px 0 4px 0;
        outline: none;
    }

    .analog-item-container__button:hover {
        background-color: var(--blueberry);
    }

    .analog-item-container__button:hover p {
        color: var(--just_white);
    }

    .analog-item-container__button:hover .fill-icon {
        fill: #ffffff;
    }
</style>