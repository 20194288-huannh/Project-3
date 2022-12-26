// export default function ({ $axios, app, redirect, store}, inject) {
//   const api = $axios.create({
//     headers: {
//       common: {
//         'Accept': 'application/json',
//         'Content-Type': 'application/json'
//       }
//     }
//   })
//   api.onRequest(request => {
//     const token = app.$auth.$storage.getState('_token.' + app.$auth.$state.strategy)
//     if (token) {
//       request.headers.Authorization = token
//     }

//     return request
//   })

//   api.onResponse(response => {

//     // console.log('[ RESPONSE ]' + response.request.responseURL, response,)
//     // TODO: If token expires, perform a silent refresh
//     return response
//   })

//   api.onError(error => {
//     console.error('[ ERROR ]', error, error.response && error.response.status)
//     const code = parseInt(error.response && error.response.status)
//     if (!navigator.onLine || !error) {
//       app.$toast.error('NO INTERNET')
//     } else if (code === 400) {
//       // app.$toast.error(error.message)
//     } else if (code === 401) {
//       app.$auth.logout();
//       return redirect('/')
//     } else if (code === 403) {
//       app.$toast.error(error.message)
//     } else if (code === 500) {
//       app.$toast.error('Internal Server Error')
//     }

//     return error
//   })
//   inject('api', api)
// }
