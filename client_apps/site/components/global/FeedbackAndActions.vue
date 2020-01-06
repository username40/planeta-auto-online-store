<template>
    <div class="good-item-list-small__description-actions">
        <div class="reviews">
            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
            <img src="/icons/star_yellow.svg" alt="отметка выбор пользователей">
            <img src="/icons/star_empty.svg" alt="отметка звезда">
            <p class="Body-16-Prime count-reviews"><span>23</span> отзыва</p>
        </div>
        <div class="action-btns">
            <app-compare-button>Сравнить</app-compare-button>
            <app-add-to-favorite-button>В избранное</app-add-to-favorite-button>
            <app-share-button>Поделиться</app-share-button>
        </div>
    </div>
</template>

<script>
    import CompareButton from '~/components/global/CompareButton'
    import AddToFavoriteButton from '~/components/global/AddToFavoriteButton'
    import ShareButton from '~/components/global/ShareButton'
    export default {
        name: "FeedbackAndActions",
        components: {
            appCompareButton: CompareButton,
            appAddToFavoriteButton: AddToFavoriteButton,
            appShareButton: ShareButton
        }
    }
</script>

<style scoped>
    .good-item-list-small__description-actions {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }

    .reviews {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .count-reviews {
        margin-left: 4px;
    }

    .action-btns {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        margin-left: 35px;
    }

    .header__action-button:not(:first-child) {
        margin-left: 10px;
    }
</style>