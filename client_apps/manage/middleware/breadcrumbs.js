export default ({ app, store, route }) => {
    const breadcrumbs = [];
    const metadata = route.meta[0];

    if (metadata !== undefined && metadata.breadcrumbs !== undefined) {
        metadata.breadcrumbs.forEach(function (el) {
            breadcrumbs.push({
                href: el.href ? el.href : route.path,
                text: el.text,
                disabled: el.href ? false : true
            });
        });
    }
    if(breadcrumbs.length > 0) {
        breadcrumbs.unshift({href: '/', text: 'Главная'});
    }
    store.commit('breadcrumbs/SET_BREADCRUMBS', breadcrumbs)
}
