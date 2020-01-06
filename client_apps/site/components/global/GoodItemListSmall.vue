<template>
    <a href="#" class="good-item-list-small container">

        <div class="good-item-list-small__info">
            <slot name="image"/>
            <div class="good-item-list-small__description">
                <h2 class="h3 good-item-list-small__description-name">
                    <slot name="goodName"/>
                </h2>
               <app-feedback-and-actions></app-feedback-and-actions>
            </div>
        </div>

        <app-price-button :class="'price-button_blueberry grey-border'">
            <slot name="price" />
        </app-price-button>
    </a>
</template>

<script>
    import PriceButton from '~/components/global/PriceButton'
    import FeedbackAndActions from '~/components/global/FeedbackAndActions'

    export default {
        name: "GoodItemListSmall",
        components: {
            appPriceButton: PriceButton,
            appFeedbackAndActions: FeedbackAndActions
        }
    }
</script>

<style scoped>
    .good-item-list-small {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        text-decoration: none;
        width: 100%;
        -webkit-box-pack: justify;
        -webkit-justify-content: space-between;
        -ms-flex-pack: justify;
        justify-content: space-between;

    }
    .good-item-list-small:hover {
        text-decoration: none;
    }
    .good-item-list-small__info {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .good-item-list-small__description {
        margin-left: 30px;
        height: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-pack: space-evenly;
        -webkit-justify-content: space-evenly;
        -ms-flex-pack: space-evenly;
        justify-content: space-evenly;
    }
    .price-button {
        -webkit-align-self: end;
        -ms-flex-item-align: end;
        -ms-grid-row-align: end;
        align-self: end;
    }
    .good-item-list-small__image {
        width: 65px;
        height: 65px;
    }
    .good-item-list-small__description-name {
        color: var(--just_black);
    }
    .price-button {
        padding-left: 30px;
        padding-right: 30px;
    }
    .header__action-button:not(:first-child) {
        margin-left: 30px;
    }
</style>