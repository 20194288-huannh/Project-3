export default function ({ $axios, app, redirect, store}, inject) {
  const api = $axios.create({
    headers: {
      common: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    }
  })
  $axios.onRequest(request => {
    store.commit('SET_LOADING', true)
    // const token = app.$auth.$storage.getState('_token.' + app.$auth.$state.strategy)
    // if (token) {
    //   request.headers.Authorization = token
    // }

    return request
  })

  $axios.onResponse(response => {
    store.commit('SET_LOADING', false)
    // console.log('[ RESPONSE ]' + response.request.responseURL, response,)
    // TODO: If token expires, perform a silent refresh
    return response
  })

  $axios.onError(error => {
    store.commit('SET_LOADING', false)
    // console.error('[ ERROR ]', error, error.response && error.response.status)
    // const code = parseInt(error.response && error.response.status)
    // if (!navigator.onLine || !error) {
    //   app.$toast.error('NO INTERNET')
    // } else if (code === 400) {
    //   // app.$toast.error(error.message)
    // } else if (code === 401) {
    //   app.$auth.logout();
    //   return redirect('/')
    // } else if (code === 403) {
    //   app.$toast.error(error.message)
    // } else if (code === 500) {
    //   app.$toast.error('Internal Server Error')
    // }

    return error
  })
  inject('api', api)
}
// axios.interceptors.request.use(function (config) {
//     store.commit('setLoading', true)
//     return config
//   }, function (error) {
//     store.commit('setLoading', false)
//     return Promise.reject(error)
//   })
  
//   axios.interceptors.response.use(function (response) {
//     store.commit('setLoading', false)
//     return response
//   }, function (error) {
//     store.commit('setLoading', false)
//     return Promise.reject(error)
//   })