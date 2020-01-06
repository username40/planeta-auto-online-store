<template>
    <div style="position: relative; overflow-x: hidden">
            <app-available-stores-aside/>

    <nuxt/>

        <app-contact-lists></app-contact-lists>
        <app-footer></app-footer>
    </div>
</template>

<script>
    import Footer from '~/components/global/Footer'
    import AvailableStoresAside from '~/components/global/store-items/AvailableStoresAside'
    import ContactLists from '~/components/global/ContactLists'
    export default {
        components: {
            appFooter: Footer,
            appContactLists: ContactLists,
            appAvailableStoresAside: AvailableStoresAside
        },
        data() {
            return {
            }
        },
        methods: {
        }
    }
</script>

<style lang="scss">
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
    }
</style>
