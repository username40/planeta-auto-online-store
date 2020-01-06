import Qs from 'qs';
export default function ({ $axios, redirect }) {
    $axios.interceptors.request.use(config => {
        config.paramsSerializer = params => {
            return Qs.stringify(params, {
                arrayFormat: "brackets",
                encode: false
            });
        };

        return config;
    });
}
