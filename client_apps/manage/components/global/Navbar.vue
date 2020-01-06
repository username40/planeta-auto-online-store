<template>
  <b-navbar fixed toggleable="lg" type="dark" variant="dark">
      <b-navbar-brand href="/manage">
        {{appName}}
      </b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
          <b-nav-item-dropdown v-if="user" text="Пользователи">
            <b-dropdown-item href="/manage/users">Список пользователей</b-dropdown-item>
            <b-dropdown-item href="#">Управление доступом</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>

        <b-navbar-nav v-if="user" class="ml-auto" >
          <b-nav-item-dropdown right>
            <template slot="button-content"><em>{{ user.name }}</em></template>
            <b-dropdown-item href="/manage/personal/profile">Профиль</b-dropdown-item>
            <b-dropdown-item href="/manage/personal/password">Пароль</b-dropdown-item>
            <b-dropdown-item @click.prevent="logout">Выйти</b-dropdown-item>
          </b-nav-item-dropdown>
        </b-navbar-nav>

        <b-navbar-nav v-else class="ml-auto" >
          <b-nav-item href="/auth/login">Авторизация</b-nav-item>
          <b-nav-item href="/auth/register">Регистрация</b-nav-item>
        </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

<script>
// import { mapGetters } from 'vuex'

export default {
  components: {

  },

  data: () => ({
    appName: process.env.appName
  }),

  // computed: mapGetters({
  //   user: 'auth/user'
  // }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout');

      // Redirect to login.
      this.$router.push({ path: '/auth/login' });

    }
  }
}
</script>

<style scoped>
.profile-photo {
  width: 2rem;
  height: 2rem;
  margin: -.375rem 0;
}
</style>
