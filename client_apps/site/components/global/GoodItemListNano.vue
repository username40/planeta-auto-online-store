<template>
    <div class="good-item-list-nano grey-border">
        <h3 class="h3 good-item-list-nano__title"><slot name="name"/></h3>
        <p class="Tag-14-60 good-item-list-nano__main-parameter"><slot name="mainParameter"/></p>
        <app-price-button :class="'price-button_blueberry'">
            <slot name="price" />
        </app-price-button>
        <app-add-to-favorite-button :class="'grey-border'">В избранное</app-add-to-favorite-button>
        <app-page-up-button></app-page-up-button>
    </div>
</template>

<script>
    import PriceButton from '~/components/global/PriceButton'
    import AddToFavoriteButton from '~/components/global/AddToFavoriteButton'
    import PageUpButton from '~/components/global/PageUpButton'
    export default {
        name: "GoodItemListNano",
        components: {
            appPriceButton: PriceButton,
            appAddToFavoriteButton: AddToFavoriteButton,
            appPageUpButton: PageUpButton
        }
    }
</script>

<style scoped>
    .good-item-list-nano {
        max-width: 165px;
        padding-top: 10px;
        padding-bottom: 8px;
        padding-left: 6px;
        padding-right: 6px;
        -webkit-transition: all var(--animation);
        -o-transition: all var(--animation);
        transition: all var(--animation);
        -webkit-border-radius: 6px;
        border-radius: 6px;
        position: relative;
        z-index: 2;
    }
    .good-item-list-nano:hover {
        -webkit-box-shadow: var(--shadow-6-prime);
        box-shadow: var(--shadow-6-prime);
    }

    .good-item-list-nano__title {
        display: table-caption;
    }

    .good-item-list-nano__main-parameter {
        margin-top: 6px;
        color: var(--blueberry);
    }

    .header__action-button {
        margin-top: 6px;
        width: 100%;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .price-button {
        margin-top: 6px;
    }
</style>