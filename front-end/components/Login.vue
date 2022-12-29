<template>
  <div class="box-login-wrapper">
    <div class="box-login-outer">
      <div class="box-login">
        <h4 class="text-center font-italic">Log in</h4>
        <b-form @submit.prevent="login">
          <b-form-group label="Email">
            <b-form-input
              v-model.trim="form.email"
              type="email"
              placeholder="Email"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group label="Password" class="none-margin-bottom">
            <b-form-input
              v-model.trim="form.password"
              type="password"
              placeholder="Password"
              required
            ></b-form-input>
          </b-form-group>
          <div class="d-flex justify-content-end mb-3">
            <span class="text-danger font-weight-bold">Forgot your Password?</span>
          </div>
          <b-button type="submit" block variant="danger" class="mb-5">Login</b-button>
        </b-form>
        <div class="d-flex flex-column">
          <span class="text-danger text-center mb-3">New to Bookswagon? Sign up</span>
          <span class="text-center">By continuing, I agree to the <span class="text-danger font-weight-bold"> Terms of Use </span> &  <span class="text-danger font-weight-bold">Privacy Policy</span></span>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.box-login-wrapper {
  background: url(https://www.bookswagon.com/images/css/login_bg.jpg);
  height: 600px;
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
  width: 100%;
}

.box-login .logo {
  display: block;
  margin: 25px auto;
  text-align: center;
}
.none-margin-bottom{
  margin-bottom: 0px !important;
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
