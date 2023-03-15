// import { mapGetters } from 'vuex'
import moment from "moment"
import { roleId, nameMenu } from '~/commons/constants'

export default {
  data() {
    return {
      localeMain: 'en-US',
    }
  },
  computed: {
  },
  filters: {
  },
  methods: {
    async http(method, apiPath, data, config = {}, loading = true) {
      config = Object.assign(config, {
        url: apiPath,
        method,
      })

      if (method === 'GET') {
        config.params = data
      } else {
        config.data = data
      }

      try {
        const response = await this.$axios(config)
        if (response.data.success) {
          return response.data
        } else {
          this.$toast.error(response.message || 'Failed')
        }
      } catch (error) {
        if (error.response) {
          if (error.response.status === 401) {
            {
              await this.$auth.logout()
              return this.$router.push('/login')
            }
          }
          if (error.response.data && !error.response.data.success) {
            this.$toast.error(error.response.data.message || 'Failed')
            return
          }
        } else if (error.request) {
          console.log('error request: ', error.request)
          return
        } else {
          console.log(error.code, error)
          return
        }
      } finally {
      }
    },
    async GET(apiPath, params, config = {}, loading = true) {
      return this.http('GET', apiPath, params, config, loading)
    },
    async POST(apiPath, data, config = {}, loading = true) {
      return this.http('POST', apiPath, data, config, loading)
    },
    async PUT(apiPath, data, config = {}, loading = true) {
      return this.http('PUT', apiPath, data, config, loading)
    },
    /**
     * Open confirm dialog upon single deletion (or other)
     * @param {string} titleTxt title
     * @param {string} contentTxt text
     * @param {string} iconTxt icon
     * @param {bool} showCancelButton showCancelButton
     * @param {bool} dangerMode dangerMode
     * @returns Object
     */
    async confirm(
      titleTxt = 'Are you sure?',
      contentTxt = 'Once deleted, there is no going back',
      iconTxt = 'warning',
      showCancelButton = true,
      dangerMode = true
    ) {
      return await this.$swal({
        title: titleTxt,
        text: contentTxt,
        icon: iconTxt,
        showCancelButton,
        dangerMode,
      })
    },
  },
}
