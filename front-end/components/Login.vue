<template>
  <div class="box-login-wrapper">
    <div class="box-login-outer">
      <div class="box-login">
        <a href="javascript;" class="logo">
          <img src="/logo.svg" alt="logo" height="45" />
        </a>
        <b-form @submit.prevent="login">
          <b-form-group label="Email">
            <b-form-input
              v-model.trim="form.email"
              type="email"
              placeholder="Email"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group label="Password">
            <b-form-input
              v-model.trim="form.password"
              type="password"
              placeholder="Password"
              required
            ></b-form-input>
          </b-form-group>
          <b-button type="submit" block variant="primary">Login</b-button>
        </b-form>
      </div>
    </div>
  </div>
</template>
<style>
.box-login-wrapper {
  background-color: rgba(243, 244, 246, 1);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}

.box-login-outer {
  max-width: 56rem;
}

.box-login {
  padding: 1.5rem;
  border-bottom: 0.5rem;
  box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;
  background: white;
  overflow: hidden !important;
  --tw-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%) !important;
  margin-top: 2rem;
}

.box-login form {
  width: 300px;
}

.box-login .logo {
  display: block;
  margin: 25px auto;
  text-align: center;
}
</style>
<script>
export default {
  head: {
    meta: [
      {charset: 'utf-8'},
      {name: 'robots', content: 'noindex'},
    ],
  },
  data() {
    return {
      form: {
        email: '',
        password: '',
      },
    }
  },
  methods: {
    async login() {
      try {
        this.$nextTick(() => {
          this.$nuxt.$loading.start()
        })
        const response = await this.POST('/login', this.form);
        console.log('response: ', response)
      } catch (e) {
        console.log(e);
      } finally {
        this.$nextTick(() => {
          this.$nuxt.$loading.finish()
        })
      }
    },
  }
}
</script>
