<template>
  <div class="check">
    <input
      :name="name"
      :checked="internalValue"
      :id="id || name"
      type="checkbox"
      class="checkbox-custom"
      >
    <label :for="id || name" class="checkbox-custom-label" @click.stop="handleClick">
    </label>
    <label :for="id || name" class="Body-18 checkbox-text"><slot/></label>
  </div>
</template>

<script>
export default {
  name: 'Checkbox',

  props: {
    id: { type: String, default: null },
    name: { type: String, default: 'checkbox' },
    value: { type: Boolean, default: false },
    checked: { type: Boolean, default: false }
  },

  data: () => ({
    internalValue: false
  }),

  watch: {
    value (val) {
      this.internalValue = val
    },

    checked (val) {
      this.internalValue = val
    },

    internalValue (val, oldVal) {
      if (val !== oldVal) {
        this.$emit('input', val)
      }
    }
  },

  created () {
    this.internalValue = this.value

    if ('checked' in this.$options.propsData) {
      this.internalValue = this.checked
    }
  },

  methods: {
    handleClick (e) {
      this.$emit('click', e)

      if (!e.isPropagationStopped) {
        this.internalValue = e.target.checked
      }
    }
  }
}
</script>


<style scoped>
  .check {
    display: flex;
    align-items: center;
  }
  /* write a text style for nearest checkbox text*/
  .checkbox-custom {
    display: none;
  }
  .checkbox-custom-label {
    cursor: pointer;
    display: inline-block;
    position: relative;
    vertical-align: middle;
    margin: 5px;
    margin-left: 0;
    cursor: pointer;
  }
  .checkbox-custom + .checkbox-custom-label:before {
    content: '';
    background: #fff;
    -webkit-border-radius: 4.5px;
    border-radius: 4.5px;
    border: solid 1px #918dae;
    display: inline-block;
    vertical-align: middle;
    width: 24px;
    height: 24px;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 2px; margin-right: 10px;
  }

  .checkbox-custom:checked + .checkbox-custom-label:before {
    border: solid 1px var(--blueberry);
  }
  /*.checkbox-custom:checked + .checkbox-custom-label:after {
    content: "";
    text-align: center;
    padding: 2px;
    position: absolute;
    width: 2px;
    height: 6px;
    border: solid var(--blueberry);
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    top: 3px; left: 8px;
  }*/
  .checkbox-custom:checked + .checkbox-custom-label:after {
    content: "";
    background-image: url("/icons/check-mark.svg");
    background-size: cover;
    background-repeat: no-repeat;
    width: 16px;
    height: 12px;
    position: absolute;
    top: 6px; left: 4px;

  }
  .big-text {
    font-size: 180%;
  }

  .checkbox-custom:disabled + .checkbox-custom-label:before{
    -webkit-border-radius: 4.5px;
    border-radius: 4.5px;

    border: solid 1px var(--asphalt_light);
    background-color: var(--milk);
  }

  .checkbox-custom:disabled + .checkbox-custom-label:after {
    border-color: #8d9aae;
  }

  .checkbox-custom-label:before + .err {
    border-color: red;
  }

  .checkbox-text {
    margin-left: -10px;
    cursor: pointer;
  }
</style>
