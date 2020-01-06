<template>
    <div class="banner mt10px" :style="'background-image: url(' + image + ')'">
        <h2 class="H2-White"><slot name="banner__h2"/></h2>
        <p class="Body-18-White mt10px"><slot name="banner__content"/></p>
        <button class="d-flex mt30px align-items-center grey-border"><img src="/images/icons/banners/like-banner-blue.svg" alt="лайк баннера"><span class="Body-16-Prime">Спасибо, буду ждать</span></button>
    </div>
</template>

<script>
export default {
    props: ['image'],
    data() {
        return {
        }
    }
}
</script>

<style scoped>
    .banner {
        padding: 20px;
        border-radius: 6px;
    }

    button {
        background-color: var(--just_white);
        border-radius: 6px;
        padding: 2px auto 4px auto;
    }

    button:hover {
        cursor: pointer;
    }
</style>