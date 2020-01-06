<template>
  <v-toolbar
    app
    dark
    :color="'#1D2939'">
    <v-toolbar-title>
      <v-toolbar-side-icon @click="toggleNavigationBar"></v-toolbar-side-icon>
    </v-toolbar-title>

    <v-spacer></v-spacer>

    <v-menu offset-y origin="center center" :nudge-bottom="10" transition="scale-transition">
      <v-btn icon large flat slot="activator" :ripple="false">
        <v-avatar size="42px">
          <img :src="$auth.user.photo_url"/>
        </v-avatar>
      </v-btn>
      <v-list>
        <v-list-tile
          v-for="(item,index) in items"
          :key="index"
          :to="item.href ? item.href : null"
          ripple="ripple"
          @click="item.click">
          <v-list-tile-action v-if="item.icon">
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>{{ item.title }}</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-menu>
  </v-toolbar>
</template>
<script>

export default {
  data() {
    return {
      result: '',
      items: [
        {
          icon: 'account_circle',
          href: '/personal/profile',
          title: 'Профиль',
          click: () => {
          }
        },
        {
          icon: 'settings',
          href: '/personal/password',
          title: 'Пароль',
          click: () => {
          }
        },
        {
          icon: 'exit_to_app',
          href: '',
          title: 'Выход',
          click: () => {
            this.logout();
          }
        }
      ],
    }
  },

  methods: {
    toggleNavigationBar() {
        this.$emit('toggleNavigationBar');
    },
    async logout () {
      await this.$auth.logout();
      window.location = process.env.siteUrl
    }
  },
};
</script>
