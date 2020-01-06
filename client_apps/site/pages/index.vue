<template>
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <img src="/icons/logo_colored.svg" alt="логотип Планета авто" class="col-1">
               <a :href="manageUrl" class="Body-18 col-2">Панель администратора</a>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        layout: 'simple',

        head() {
            return {title: 'Главная'}
        },

        computed: {
            manageUrl: function () {
                return process.env.manageUrl;
            }
        },

        data: () => ({
            title: process.env.manageUrl
        }),
        components: {},
    }
</script>

<style scoped>
    .header {
        width: 100%;
        border-bottom: 0.5px solid #e4e4e4;
        box-shadow: 0 1px 18px 0 var(--blueberry-12), 0 6px 10px 0 var(--blueberry-14), 0 3px 5px -1px var(--blueberry-20);
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .row {
        justify-content: space-between;
        align-items: center;
    }

    .Body-18 {
        text-transform: uppercase;
        text-decoration: none;
        text-align: right;
    }

    .Body-18:hover {
        text-decoration: none;
    }

</style>
