export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "BooksWagon",
    htmlAttrs: {
      lang: "en",
    },
    meta: [
      { charset: "utf-8" },
      { name: "viewport", content: "width=device-width, initial-scale=1" },
      { hid: "description", name: "description", content: "" },
      { name: "format-detection", content: "telephone=no" },
    ],
    link: [{ rel: "icon", type: "image/x-icon", href: "/favicon.ico" }],
  },

  // Global CSS: https://go.nuxtjs.dev/config-css
  css: ["~/assets/css/main.css", "~/assets/scss", "~layouts/global.css"],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    {
      src: "@/plugins/plugin",
      mode: "client",
    },
    "~/plugins/api",
    "~/plugins/mixins",
  ],

  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,
  loading: "~/components/LoadingBar.vue",

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [],

  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    "@nuxtjs/axios",
    "@nuxtjs/auth",
    "@nuxtjs/toast",
    "bootstrap-vue/nuxt",
    "vue-sweetalert2/nuxt",
    "@nuxtjs/dotenv",
    "@nuxtjs/moment",
  ],
  auth: {
    strategies: {
      local: {
        endpoints: {
          login: {
            url: '/login',
            method: 'post',
            propertyName: 'authorisation.token' // property of token in JSON data of API login
          },
          tokenRequired: false,
          logout: {
            url: '/logout',
            method: 'post',
          },
          user: {
            url: '/user',
            method: 'get',
            propertyName: 'data'
          },
        }
      },
      watchLoggedIn: true,
      redirect: {
        login: '/login',
        logout: '/',
        callback: '/login',
        home: '/'
      },
      token: {
        prefix: '_token.',
        global: true,
      }
    }
  },

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {
    baseURL: process.env.AXIOS_BASE_URL,
    proxyHeaders: false,
    credentials: false,
  },
  bootstrapVue: {
    icons: true,
  },
  toast: {
    position: "bottom-center",
    duration: 2000,
  },

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {},
};
