<template>
  <div class="row">
    <div class="col-lg-8 m-auto">
      <card :title="'Сброс пароля'">
        <form @submit.prevent="send" @keydown="form.onKeydown($event)">
          <alert-success :form="form" :message="status"/>

          <!-- Email -->
          <div class="form-group row">
            <label class="col-md-3 col-form-label text-md-right">E-Mail</label>
            <div class="col-md-7">
              <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email"
                     class="form-control">
              <has-error :form="form" field="email"/>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="form-group row">
            <div class="col-md-9 ml-md-auto">
              <v-button :loading="form.busy">Сброс пароля</v-button>
            </div>
          </div>
        </form>
      </card>
    </div>
  </div>
</template>

<script>
import Form from 'vform'

export default {
  head () {
    return { title: 'Сброс пароля' }
  },

  data: () => ({
    status: '',
    form: new Form({
      email: ''
    })
  }),

  methods: {
    async send () {
      try {
        const { data } = await this.form.post('auth/forgot-password');
        this.status = data.status;
        this.form.reset();
      } catch (e) {

      }

    }
  }
}
</script>
