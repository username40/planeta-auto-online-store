<template>
    <div class="hint">
        <div class="container">
            <div class="row">
                <div class="col-9 hint__content">
                    <img src="/icons/information_azalea.svg" alt="">
                    <span class="hint__text Body-16"><slot name="hintText"/></span>
                </div>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeaMthUUCulpddHJfoxhUZImPd3kbT3h96RYIzqwb6904cKCQ/viewform" target="_blank" class="col-3 hint__link Body-16-Prime grey-border" :class="className">Оценить сайт</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "hint",
        props: ['className']
    }
</script>

<style scoped>
    .hint {
        padding-top: 18px;
        padding-bottom: 18px;
        /*background-image: linear-gradient(to top, var(--just_white), rgba(255, 255, 255, 0));*/
        background: linear-gradient(to top, var(--just_white), rgba(255, 255, 255, 0) 10px), url("/demo-images/hint-pattern.jpg");

    }

    .hint__content {
        display: flex;
        align-items: center;
    }

    .hint__link {
        background-color: var(--just_white);
        text-align: center;
        text-decoration: none;
        border-radius: 6px;
        transition: all var(--animation);
        box-shadow: var(--shadow0);
    }

    .hint__link_blueberry-deep {
        background-color: var(--blueberry_deep);
        color: var(--just_white);
    }

    .hint__link:hover {
        box-shadow: var(--shadow-6-prime);
    }

    .hint__text {
        margin-left: 4px;
    }
</style>