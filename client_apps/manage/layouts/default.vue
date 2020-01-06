<template>
    <v-app>
        <toolbar v-if="$auth.loggedIn" @toggleNavigationBar="drawer = !drawer"/>
        <navigation-drawer v-if="$auth.loggedIn" :toggle="drawer"></navigation-drawer>
        <v-content>
            <v-container>
                <breadcrumbs/>
                <nuxt />
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
    import Breadcrumbs from '~/components/global/Breadcrumbs'
    import Toolbar from "../components/global/Toolbar";
    import NavigationDrawer from "../components/global/NavigationDrawer";

    export default {
        middleware: ['auth', 'breadcrumbs'],
        data: () => ({
            drawer: true,
        }),

        components: {
            NavigationDrawer,
            Toolbar,
            Breadcrumbs
        }
    }
</script>
