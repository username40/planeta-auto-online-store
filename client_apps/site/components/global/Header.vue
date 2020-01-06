<template>
    <header class="header" :class="className">
        <div class="container">
            <nuxt-link to="/prototypes" class="header__logo-link"></nuxt-link>
            <a href="#" class="header__geolocation">
                <!--Дизайнер пока думает над тем что должно происходить по нажатии-->
                <span class="header__geolocation-icon"></span>
                <span class="Body-16 header__geolocation-cityname">
                <slot name="GeolocationCityName"/>
                </span>
            </a>
            <a href="#" class="header__call-us"></a>
            <app-nano-search></app-nano-search>
            <div class="header__buttons-group">
                <app-header-action-button></app-header-action-button>
                <app-like-button></app-like-button>
                <app-add-car-button></app-add-car-button>
                <app-add-to-cart-button><slot name="testslot"/></app-add-to-cart-button>
            </div>
            <a href="#" class="Body-16 header__entrance-link"><slot name="Entry"/></a>
        </div>
    </header>
</template>

<script>
    import NanoSearch from '~/components/global/NanoSearch'
    import HeaderActionButton from '~/components/global/HeaderActionButton'
    import LikeButton from '~/components/global/LikeButton'
    import AddCarButton from '~/components/global/AddCarButton'
    import AddToCartButton from '~/components/global/AddToCartButton'

    export default {
        props: ['className'],
        name: "Header",
        components: {
            appNanoSearch: NanoSearch,
            appHeaderActionButton: HeaderActionButton,
            appLikeButton: LikeButton,
            appAddCarButton: AddCarButton,
            appAddToCartButton: AddToCartButton
        }
    }
</script>

<style scoped>
    .header {
        width: 100%;
    }
    .header__logo-link {
        background-image: url("/icons/logo-wh.svg");
        width: 106px;
        height: 28px;
        -webkit-background-size: cover;
        background-size: cover;
    }
    .header > .container {
        max-height: 64px;
        padding-top: 18px;
        padding-bottom: 18px;
    }
    .header_blue-background {
        background-color: var(--blueberry);
    }

    .header_white-background {
        background-color: var(--just_white);
    }

    .header_white-background > .container > .header__logo-link {
        background-image: url("/icons/logo_colored.svg");
    }

    .header_white-background .header__geolocation-cityname {
        color: var(--blueberry);
    }

    .header_white-background .header__entrance-link {
        color: var(--blueberry);
    }

    .header_white-background .header__geolocation-icon {
        background-image: url("/icons/geolocation-icon-blue.svg");
    }
    .container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;
    }

    .header__geolocation {
        margin-left: 14px;
        padding-right: 8px;
        text-decoration: none;
        border-right: 1px solid #8487b1;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .header__geolocation-icon {
        background-image: url("/icons/geolocation-icon-wh.svg");
        width: 24px;
        height: 24px;
    }
    .header__geolocation-cityname {
        color: var(--just_white);

    }

    .header__call-us {
        margin-left: 6px;
        background-image: url("/icons/call-us-btn-wh.svg");
        width: 24px;
        height: 24px;
    }

    .search-form {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .header__buttons-group {
        display: flex;
        max-height: 29px;
        margin-left: 40px;
    }

    .header__buttons-group > .header__action-button {
        margin-right: 14px;
        display: flex;
        align-items: center;
    }
    /*nano search form styles*/
    .search-form {
        margin-left: 14px;
    }

    .header__entrance-link {
        margin-left: 14px;
        text-decoration: none;
        ont-size: 16px;
        font-weight: normal;
        font-style: normal;
        font-stretch: normal;
        line-height: 1.38;
        letter-spacing: normal;
        text-align: right;
        color: var(--just_white);
    }
</style>