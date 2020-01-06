<template>
    <div class="tag__container">
    <span class="tag Body-18-Prime"><slot/><img src="../../static/icons/close-cross.svg" alt="иконка закрыть" class="tag-close-icon"/></span>
    </div>
</template>

<script>
// write code about how create tag with delete posibilities
export default {

}
</script>

<style scoped>
    .tag__container {
        display: inline-block;
    }
    .tag {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        max-height: 40px;
        padding: 9px 12px 7px;
        -webkit-border-radius: 6px;
        border-radius: 6px;
        background-color: rgba(211, 220, 230, 0.3);
        -webkit-transition: background-color linear 0.2s;
        -o-transition: background-color linear 0.2s;
        transition: background-color var(--animation);
    }

    .tag:hover {
        background-color: rgba(141, 154, 174, 0.3);
        cursor: pointer;
    }


    .deleteTag:hover {
        background-color: rgba(211, 220, 230, 0.3);
    }

    .deleteTag img {
        display: block;
    }

    .deleteTag:hover img {
        background-color: #d3dce6;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        -webkit-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
        transition: all 0.2s var(--animation);
    }

    .terracotaTag {
        background-color: #ff946f;
    }

    .blueTag {
        background-color: #0078e8;
    }
</style>


