<template>
    <div style="position: relative; overflow-x: hidden">
        <app-available-stores-aside/>

        <nuxt/>

        <app-contact-lists></app-contact-lists>
        <app-footer></app-footer>

        <div class="start-checkout bottom-fixed-overlay mt20px">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <button class="start-checkout__button grey-border"><nuxt-link style="text-decoration: none" class="H2-White" to="/mvp">Начать оформление</nuxt-link></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Footer from '~/components/global/Footer'
    import ContactLists from '~/components/global/ContactLists'
    import AvailableStoresAside from '~/components/global/store-items/AvailableStoresAside'

    export default {
        name: "cart",
        components: {
            appFooter: Footer,
            appContactLists: ContactLists,
            appAvailableStoresAside: AvailableStoresAside,
        }
    }
</script>

<style lang="scss">
    .overlay {
        position: relative;
    }

    .footer-overlay {
        position: absolute;
        z-index: 10;
        bottom: 250px;
    }

    .simple-layout {
        color: #636b6f;
        height: 100vh;
        font-weight: 100;
        position: relative;

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .start-checkout {
            padding-top: 4px;
            padding-bottom: 4px;
            background-color: var(--just_white);
        }

        .start-checkout__button {
            background-color: var(--blueberry);
            border-radius: 6px;
            cursor: pointer;
            padding: 10px 25px 10px 25px;
        }

        .bottom-fixed-overlay {
            position: fixed;
            z-index: 10;
            bottom: 0;
            width: 100%;
            background-color: #fff;
        }
    }
</style>
