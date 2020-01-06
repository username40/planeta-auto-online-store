<template>
    <v-navigation-drawer
            :value="toggle"
            fixed
            app
    >

        <v-toolbar flat dark color="#1D2939" class="toolbar">
            <nuxt-link to="/">
                <img src="/manage/icons/sign-bw.svg" width="36px"></img>
            </nuxt-link>
            <nuxt-link to="/" class="text router-link-active">
                {{appName}}
            </nuxt-link>
        </v-toolbar>

        <v-list v-if="$auth.loggedIn">
            <v-list-group prepend-icon="account_circle">
                <v-list-tile slot="activator">
                    <v-list-tile-title class="item-title">Пользователи</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/users">
                    <v-list-tile-action>
                        <v-icon>people_outline</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Список пользователей</v-list-tile-title>
                </v-list-tile>

                <v-list-tile>
                    <v-list-tile-action>
                        <v-icon>settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Управление доступом</v-list-tile-title>
                </v-list-tile>
            </v-list-group>

            <v-list-group prepend-icon="description">
                <v-list-tile slot="activator">
                    <v-list-tile-title class="item-title">Справочники</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/cities">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Города</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/categories">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Категории</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/brands">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Бренды</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/products">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Товары</v-list-tile-title>
                </v-list-tile>
            </v-list-group>

            <v-list-group prepend-icon="description">
                <v-list-tile slot="activator">
                    <v-list-tile-title class="item-title">Отделения</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/departments/markets">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Маркеты</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/departments/services">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Сервисы</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/departments/specializations">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Специализации</v-list-tile-title>
                </v-list-tile>
            </v-list-group>

            <v-list-group prepend-icon="description">
                <v-list-tile slot="activator">
                    <v-list-tile-title class="item-title">Статика</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/actions">
                    <v-list-tile-action>
                        <v-icon>description</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Акции</v-list-tile-title>
                </v-list-tile>

                <v-list-tile to="/banners">
                    <v-list-tile-action>
                        <v-icon>collections</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="item-title">Баннеры</v-list-tile-title>
                </v-list-tile>
            </v-list-group>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    export default {
        props: {
            toggle: {
                type: Boolean,
                required: false,
                default: true
            }
        },
        data: () => ({
            selectedIndex: 1,
            items: [
                {text: 'Список пользователей', icon: 'people_outline', link: '/manage/users'},
                {text: 'Управление доступом', icon: 'settings', link: '/manage/users'},
            ],
            appName: process.env.appName
        }),
        methods: {
            clickToLogin() {
                this.$router.push('/manage/users');
            },
        },
    }
</script>

<style>
    .toolbar {
        font-weight: bold;
        font-size: 18px;
    }

    .toolbar .text {
        padding-left: 15px;
        color: white;
        text-decoration: none;
    }

    .item-title {
        font-size: 17px;
        font-weight: 500;
    }

    .item-sub-title {
        font-size: 15px;
        font-weight: 500;
    }

    .active {
        font-weight: bold;
    }
</style>
