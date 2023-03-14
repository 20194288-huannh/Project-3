<template>
  <div class="bg-white" id="sidebar-wrapper">
    <div
      class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"
    >
      <i class="fas fa-user-secret me-2"></i>Codersbite
    </div>
    <div class="list-group list-group-flush my-3">
      <nuxt-link
        class="list-group-item list-group-item-action bg-transparent second-text active"
        to="dashboard"
        ><b-icon icon="bar-chart-fill" variant="success" class="mr-2"></b-icon
        >Dashboard</nuxt-link
      >
      <nuxt-link
        to="users"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        ><b-icon icon="person-fill" variant="success" class="mr-2"></b-icon
        >Users</nuxt-link
      >
      <nuxt-link
        to="books"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        ><b-icon icon="book-fill" variant="success" class="mr-2"></b-icon
        >Books</nuxt-link
      >
      <nuxt-link
        to="categories"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        ><b-icon icon="list" variant="success" class="mr-2"></b-icon
        >Category</nuxt-link
      >
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        ><b-icon icon="stickies-fill" variant="success" class="mr-2"></b-icon
        >Voucher</nuxt-link
      >
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
        ><b-icon icon="cart-fill" variant="success" class="mr-2"></b-icon
        >Orders</nuxt-link
      >
      <nuxt-link
        to="#"
        class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
        ><b-icon icon="box-arrow-right" variant="success" class="mr-2"></b-icon
        >Logout</nuxt-link
      >
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
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
  color: var(--main-text-color);
  font-weight: bold;
  border: none;
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
