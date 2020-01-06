<template>
    <div class="banner d-flex" v-if="showHeaderBanner">
        <div class="container banner__container d-flex align-items-center">
            <img src="/images/icons/banners/notification-bell.svg" alt="иконка уведомления" class="banner__icon">
            <span class="Body-18 ml10px">Это наш новый сайт. Скоро можно будет покупать товары онлайн, получать бонусы и дополнительные скидки.</span>
            <div>
                <button @click="showHeaderBanner = !showHeaderBanner" class="banner__button"><img class="banner__img" src="/images/icons/banners/close-banner.svg" alt="Закрыть баннер"></button>
            </div>
        </div>
    </div>
</template>

<script>
    import {eventBus} from '~/plugins/eventbus'
export default {
    data() {
        return {
            showHeaderBanner: true
        }
    }
}
</script>

<style scoped>
    .banner {
        background-color: var(--lemon)
    }
    .banner__icon {
        margin-bottom: -6px;
        margin-left: 11px;
    }
    .banner__container {
        padding: 14px 0 12px 0;
    }
    .banner__button {
        background: none;
        border: none;
        cursor: pointer;
        margin-top: 10px;
        outline: none;
        padding: 0;
        margin: 5px 0 0 60px;
    }
    .banner__img {
        width: 20px;
        height: 20px;
    }
</style>