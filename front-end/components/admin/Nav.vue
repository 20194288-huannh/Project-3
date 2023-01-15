<template>
  <nav
    class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4 d-flex justify-content-between"
  >
    <div class="d-flex align-items-center">
      <h2 class="m-0">Dashboard</h2>
    </div>
    <b-dropdown
      block
      variant="none"
      text="Admin"
      class="m-2"
    >
      <b-dropdown-item href="#">Profile</b-dropdown-item>
    </b-dropdown>
  </nav>
</template>

<script>
export default {};
</script>

<style lang="css" scoped>
nav {
  font-size: 16px !important;
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
</style>
