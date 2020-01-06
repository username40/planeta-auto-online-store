export const state = () => ({
    breadcrumbs: []
});

// getters
export const getters = {
    breadcrumbs: state => state.breadcrumbs,
};

export const mutations = {
    SET_BREADCRUMBS (state, breadcrumbs) {
        state.breadcrumbs = breadcrumbs
    },
};
