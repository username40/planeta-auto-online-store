<template>
    <div class="change-view-container">
        <input type="radio" name="change-view" v-model="showMethod" value="grid" id="change-view_grid" class="change-view-radio" checked="checked">
<label for="change-view_grid" class="change-view_left grey-border"><span class="change-view__icon change-view__icon_grid"></span></label>
<input type="radio" name="change-view" v-model="showMethod" value="list" id="change-view_list" class="change-view-radio">
<label for="change-view_list" class="change-view_right grey-border"><span class="change-view__icon change-view__icon_list"></span></label>
    </div>
</template>

<script>
export default {
  data() {
      return {
          showMethod: 'grid'
      }
  }
}
</script>

<style scoped>
    .change-view-container {
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
    }
    .change-view-radio {
        position: absolute;
        z-index: -1;
        opacity: 0;
        margin: 10px 0 0 7px;
    }

    label {
        width: 32px;
        height: 28px;
        background-color: #ffffff;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    label:hover {
        -webkit-box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
        box-shadow: 0 1px 18px 0 rgba(50, 55, 125, 0.12), 0 6px 10px 0 rgba(50, 55, 125, 0.14), 0 3px 5px -1px rgba(50, 55, 125, 0.2);
    }

    .change-view-radio + label {
        position: relative;
        cursor: pointer;
    }

    .change-view-radio:checked + label {
        background-color: #2c3170;
        -webkit-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
        border: 0.5px solid #e4e4e4!important;
    }

    .sq {
        width: 10px;
        height: 10px;
        background-color: red;
    }

    .change-view-radio:checked + label > .change-view__icon_grid {
        background-image: url('/icons/change-view__grid_white.svg');
    }

    .change-view-radio:checked + label > .change-view__icon_list{
        background-image: url('/icons/change-view__list_white.svg');
    }

    .change-view_left {
        -webkit-border-top-left-radius: 6px;
        border-top-left-radius: 6px;
        -webkit-border-bottom-left-radius: 6px;
        border-bottom-left-radius: 6px;
    }

    .change-view_right {
        -webkit-border-top-right-radius: 6px;
        border-top-right-radius: 6px;
        -webkit-border-bottom-right-radius: 6px;
        border-bottom-right-radius: 6px;
    }

    .change-view__icon {
        width: 24px;
        height: 24px;
        display: block;
    }

    .change-view__icon_grid {
        background-image: url('/icons/change-view__grid_blue.svg');
    }

    .change-view__icon_list {
        background-image: url('/icons/change-view__list_blue.svg');
    }
</style>

