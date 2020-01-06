require('dotenv').config();


module.exports = {
    mode: 'spa',
    srcDir: __dirname,
    buildDir: '.nuxt/manage',

    env: {
        apiUrl: process.env.APP_URL,
        siteUrl: process.env.CLIENT_URL,
        manageUrl: process.env.CLIENT_MANAGE_URL,
        appName: process.env.APP_NAME,
        appLocale: process.env.APP_LOCALE || 'en'
    },

    head: {
        title: process.env.APP_NAME,
        titleTemplate: '%s - ' + process.env.APP_NAME,
        meta: [
            {charset: 'utf-8'},
            {name: 'viewport', content: 'width=device-width, initial-scale=1'},
            {hid: 'description', name: 'description', content: 'Nuxt.js project'}
        ],
        link: [
            {rel: 'icon', type: 'image/x-icon', href: '/favicon.ico'}
        ]
    },

    css: [
        {src: '~assets/sass/app.scss', lang: 'scss'},
        // '~cropperjs/dist/cropper.css'
        // { src: '~cropperjs/dist/cropper.css', lang: 'css' },

    ],

    loading: {color: '#007bff'},

    router: {
        base: '/manage/'
    },

    plugins: [
        '~plugins/helpers',
        '~plugins/vform',
        '~plugins/axios',
        '~plugins/ckeditor',
        '~components/global',
    ],

    modules: [
        ['@nuxtjs/dotenv', {path: '/../../'}],
        '@nuxtjs/axios',
        '@nuxtjs/auth',
        '@nuxtjs/vuetify',
    ],


    auth: {
        strategies: {
            local: {
                endpoints: {
                    login: {url: '/auth/login', method: 'post', propertyName: 'token'},
                    logout: {url: '/auth/logout', method: 'post'},
                    user: {url: '/user', method: 'get', propertyName: 'item'},
                },
            },
        },
        redirect: {
            login: '/auth/login',
            logout: '/',
            user: '/',
            callback: process.env.CLIENT_URL
        },
    },

    axios: {
        baseURL: process.env.APP_URL,
    },

    build: {
        publicPath: '/manage/',
    },
};
