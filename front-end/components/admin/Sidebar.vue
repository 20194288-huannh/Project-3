<template>
  <div
    class="sidebar"
    id="sidebar-wrapper"
    :style="{ backgroundImage: 'url(' + require('@/assets/images/sidebar-5.jpg') + ')' }"
  >
    <div
      class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"
    >
      <i class="fas fa-user-secret me-2"></i>Codersbite
    </div>
    <div class="list-group list-group-flush my-3">
      <nuxt-link
        class="list-group-item list-group-item-action bg-transparent second-text active color-white"
        to="dashboard"
      >
        <b-icon scale="1.5" icon="bar-chart-fill" variant="light" class="mr-4"></b-icon
        >DASHBOARD
      </nuxt-link>
      <nuxt-link
        to="users"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold color-white "
      >
        <b-icon scale="1.5" icon="person-fill" variant="light" class="mr-4"></b-icon>USERS
      </nuxt-link>
      <nuxt-link
        to="books"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold color-white "
      >
        <b-icon scale="1.5" icon="book-fill" variant="light" class="mr-4"></b-icon>BOOKS
      </nuxt-link>
      <nuxt-link
        to="categories"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold color-white "
      >
        <b-icon scale="1.5" icon="list" variant="light" class="mr-4"></b-icon>CATEGORY
      </nuxt-link>
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold color-white "
      >
        <b-icon scale="1.5" icon="stickies-fill" variant="light" class="mr-4"></b-icon
        >VOUCHER
      </nuxt-link>
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold color-white "
      >
        <b-icon scale="1.5" icon="cart-fill" variant="light" class="mr-4"></b-icon>ORDERS
      </nuxt-link>
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
      >
        <b-icon icon="box-arrow-right" variant="light" class="mr-2"></b-icon
        >Logout
      </nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    title: {
      type: String,
      default: "Vue LBD",
    },
    backgroundColor: {
      type: String,
      default: "black",
      validator: (value) => {
        let acceptedValues = [
          "",
          "blue",
          "azure",
          "green",
          "orange",
          "red",
          "purple",
          "black",
        ];
        return acceptedValues.indexOf(value) !== -1;
      },
    },
    activeColor: {
      type: String,
      default: "light",
      validator: (value) => {
        let acceptedValues = [
          "primary",
          "info",
          "light",
          "warning",
          "danger",
        ];
        return acceptedValues.indexOf(value) !== -1;
      },
    },
    sidebarLinks: {
      type: Array,
      default: () => [],
    },
    autoClose: {
      type: Boolean,
      default: true,
    },
  },
  computed: {
    sidebarStyle() {
      return {
        backgroundImage: `url(${this.backgroundImage})`,
      };
    },
  },
};
</script>

<style lang="scss" scoped>
.sidebar {
  background-size: cover;
  background-position: center;
  height: 100vh;
}
#sidebar-wrapper {
  min-height: 100vh;
  margin-left: -15rem;
  -webkit-transition: margin 0.25s ease-out;
  -moz-transition: margin 0.25s ease-out;
  -o-transition: margin 0.25s ease-out;
  transition: margin 0.25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
  padding: 0.875rem 1.25rem !important;
  font-size: 1.2rem !important;
}

#sidebar-wrapper .list-group {
  width: 15rem;
}

#page-content-wrapper {
  min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
  margin-left: 0;
}

#menu-toggle {
  cursor: pointer;
}

.list-group-item {
  border: none;
  padding: 20px 30px;
}

.list-group-item.active {
  background-color: transparent;
  font-weight: bold;
  border: none;
}
.color-white{
  color: #fff;
}

@media (min-width: 768px) {
  #sidebar-wrapper {
    margin-left: 0;
  }

  #page-content-wrapper {
    min-width: 0;
    width: 100%;
  }

  #wrapper.toggled #sidebar-wrapper {
    margin-left: -15rem;
  }
}

</style>
