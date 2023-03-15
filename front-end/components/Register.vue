<template>
  <div class="box-login-wrapper">
    <div class="box-login-outer">
      <div class="box-login">
        <h4 class="text-center font-italic">Sign Up</h4>
        <b-form @submit.prevent="register">
          <b-form-group label="Name">
            <b-form-input
              v-model.trim="user.name"
              type="text"
              placeholder="Name"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Email">
            <b-form-input
              v-model.trim="user.email"
              type="email"
              placeholder="Email"
              required
            ></b-form-input>
          </b-form-group>

          <b-form-group label="Password">
            <b-form-input
              v-model.trim="user.password"
              type="password"
              placeholder="Password"
              required
            ></b-form-input>
          </b-form-group>
          <b-form-group label="Confirm Password" class="none-margin-bottom">
            <b-form-input
              v-model.trim="user.confirm_password"
              type="password"
              placeholder="Password"
              required
            ></b-form-input>
          </b-form-group>
          <div class="d-flex justify-content-center mb-3">
            <b-form-checkbox
              id="checkbox-1"
              v-model="status"
              name="checkbox-1"
              value="accepted"
              unchecked-value="not_accepted"
            >
              Subscribe to Bookswagon Newsletter
            </b-form-checkbox>
          </div>
          <b-button type="submit" block variant="outline-danger" class=""
            >Continue</b-button
          >
          <b-button type="submit" block variant="danger" class="mb-5"
            >Existing User? Log in</b-button
          >
        </b-form>
        <div>
          <span class="text-center"
            >By continuing, I agree to the
            <span class="text-danger font-weight-bold"> Terms of Use </span> &
            <span class="text-danger font-weight-bold"
              >Privacy Policy</span
            ></span
          >
        </div>
      </div>
    </div>
  </div>
</template>
<style>
.box-login-wrapper {
  background: url(https://www.bookswagon.com/images/css/login_bg.jpg);
  height: 800px;
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
.none-margin-bottom {
  margin-bottom: 0px !important;
}
</style>
<script>
export default {
  head: {
    meta: [{ charset: "utf-8" }, { name: "robots", content: "noindex" }],
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
        confirm_password: "",
        name: ""
      },
      status: "accepted",
    };
  },
  methods: {
    async register() {
      const response = await this.$axios.post(`/register`, this.user)
      if (response.status === 200 && response.data) {
        this.$toast.success("Register successfully!")
        await this.$auth.setToken('local', "Bearer " + response.data.authorisation.token)
        await this.$auth.setUserToken(response.data.authorisation.token)
        await this.$auth.setUser(response.data.user)
      }
    },
  },
};
</script>
