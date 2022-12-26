<template>
    <div v-if="loading" class="loading-page">
      <div class="loading"></div>
    </div>
  </template>
  <script>
    export default {
      data: () => ({
        loading: false,
      }),
      methods: {
        start() {
          this.loading = true
        },
        finish() {
          this.loading = false
        },
      },
    }
  </script>
  <style scoped>
    .loading-page {
      position: fixed;
      top: 0;
      left: 0;
      z-index: 22222;
      padding: 1rem;
      text-align: center;
      font-size: 3rem;
      font-family: sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      background: #adb5bd;
      width: 100%;
      height: 100vh;
      opacity: 0.5;
    }
    .loading {
      display: inline-block;
      width: 3rem;
      height: 3rem;
      border: 7px solid #f36e20ad;
      border-radius: 50%;
      border-top-color: #f36e20;
      animation: spin 1s ease-in-out infinite;
    }
    @keyframes spin {
      to {
        -webkit-transform: rotate(360deg);
      }
    }
  </style>
  