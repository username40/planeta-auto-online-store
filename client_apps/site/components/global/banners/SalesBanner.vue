<template>
        <nuxt-link  style="text-decoration: none" class="col-4" :to="'/mvp/sales/' + promobanner.id">
            <img style="height: 348px;" :src="'https://lapi.planetavto.ru/' + promobanner.preview_img_url" alt="распродажа">
            <p class="Placeholder mt5px">Акция действует до {{ expireDate }}</p>
        </nuxt-link>
</template>

<script>
export default {
    props: {
            promobanner: {},
        },
    data() {
        return {
        }
    },
    computed: {
        expireDate() {
            const months = ["Января", "Февраля", "Марта", "Апреля", "Мая", "Июня",
                "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"];
            const date = new Date(this.promobanner.expiration_at);
            const day = date.getDate();
            const currentMonth = date.getMonth();
            const year = date.getFullYear();
            return `${ day } ${months[currentMonth]} ${ year }`;
        }
    }
}
</script>

<style scoped>
    
</style>