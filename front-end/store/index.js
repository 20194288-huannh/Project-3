export const getters = {
  isAuthenticated(state) {
    return state.auth.loggedIn;
  },

  loggedInUser(state) {
    return state.auth.user;
  },
};
export const state = () => ({
  isLoading: false
})

export const mutations = {
  SET_LOADING(state, value) {
    console.log(value)
    state.isLoading = value
  }
}