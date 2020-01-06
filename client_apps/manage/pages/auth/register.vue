<template id="register">
      <v-card :title="'Регистрация'" class="elevation-1 pa-3">
        <div class="layout column align-center">
          <h1 class="flex my-4 primary--text">Регистрация</h1>
        </div>
        <v-form @submit.prevent="register" @keydown="form.onKeydown($event)">
          <v-card-text>
            <v-text-field
                    name="name"
                    type="text"
                    label="Имя"
                    v-model="form.name"
                    :error="form.errors.has('name')"
                    :rules="form.errors.only('name')"/>

            <v-text-field
                    name="email"
                    type="text"
                    label="E-Mail"
                    v-model="form.email"
                    :error="form.errors.has('email')"
                    :rules="form.errors.only('email')"/>

            <v-text-field
                    name="password"
                    :type="hidePassword ? 'password' : 'text'"
                    label="Пароль"
                    v-model="form.password"
                    :error="form.errors.has('password')"
                    :rules="form.errors.only('password')"/>

            <v-text-field
                    name="password"
                    :type="hidePassword ? 'password' : 'text'"
                    label="Подтвердите пароль"
                    v-model="form.password_confirmation"
                    :error="form.errors.has('password_confirmation')"
                    :rules="form.errors.only('password_confirmation')"/>

          </v-card-text>

          <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn type="submit" block color="primary" :loading="form.busy">Регистрация</v-btn>
          </v-card-actions>
        </v-form>
      </v-card>
</template>

<script>
import Form from 'vform'

export default {
  layout: 'auth',
  head () {
    return { title: 'Регистрация' }
  },

  data: () => ({
    hidePassword: true,
    form: new Form({
      name: '',
      email: '',
      password: '',
      password_confirmation: ''
    })
  }),

  methods: {
    async register () {
        try {
            await this.form.post('/auth/register');
            // await this.form.post('/auth/login');
            await this.$auth.loginWith('local', {
              data: {
                "email": this.form.email,
                "password": this.form.password
              }
            });
            this.$router.push({ name: 'manage' })
        } catch (e) {

        }
    },
  }
}
</script>


<style scoped lang="css">
  #register {
    height: 50%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    z-index: 0;
  }
</style>
