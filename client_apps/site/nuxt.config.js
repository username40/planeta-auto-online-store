require('dotenv').config();

module.exports = {
    // mode: 'spa',
    srcDir: __dirname,
    buildDir: '.nuxt/site',

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

    loading: {color: '#007bff'},

    css: [
        {src: '~assets/sass/app.scss', lang: 'scss'},
        {src: '~assets/css/bootstrap-grid.css', lang: 'css'},
        {src: '~assets/css/vueperslides.css', lang: 'css'},
        {src: '~assets/css/VueAgile.css', lang: 'css'},
        {src: '~assets/css/swiper.css', lang: 'css'},
        {src: '~assets/css/vue-multiselect.min.css', lang: 'css'},
        {src: '~assets/css/myCss.css', lang: 'css'}
    ],

    plugins: [
        '~components/global',
        '~plugins/vform',
        '~plugins/eventbus',
        { src: '~/plugins/nuxt-swiper-plugin.js', ssr: false },
        { src: '~/plugins/localStorage.js', ssr: false }
    ],

    modules: [
        ['@nuxtjs/dotenv', { path: '../../.env' }],
        '@nuxtjs/axios',
        [
            '@nuxtjs/yandex-metrika',
            {
                id: '53925679',
                webvisor: true,
                 clickmap:true,
                // useCDN:false,
                 trackLinks:true,
                 accurateTrackBounce:true,
            }
        ]
        // '@nuxtjs/vuetify',// todo: убрать когда будет готовый шаблон для сайта
        // '@nuxtjs/auth',
    ],

    axios: {
        baseURL: process.env.APP_URL,
        // proxyHeaders: false,
        // credentials: false
    },

    build: {
    },

};
