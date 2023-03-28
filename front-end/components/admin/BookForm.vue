<template>
  <div>
    <div>
      <b-form @submit.prevent="onSubmit">
        <div class="card-body">
          <b-row>
            <b-col cols="6">
              <b-row>
                <b-col>
                  <b-form-group>
                    <label
                      ><span>Name</span
                      ><span class="text-danger"> *</span></label
                    >
                    <b-form-input
                      v-model="book.name"
                      class="mb-2"
                      maxlength="255"
                    />
                  </b-form-group>
                </b-col>
              </b-row>
              <b-form-group>
                <label
                  ><span>Description</span
                  ><span class="text-danger"> *</span></label
                >
                <b-form-textarea
                  v-model="book.description"
                  placeholder="Content..."
                  rows="3"
                  max-rows="6"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group>
                <label
                  ><span>ISBN-10</span
                  ><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.isbn_10"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group>
                <label
                  ><span>No Of Page</span
                  ><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.no_of_pages"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group>
                <label
                  ><span>Returnable</span
                  ><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.returnable"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group>
                <label
                  ><span>Spine Width</span
                  ><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.spine_width"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group label="Binding" v-slot="{ ariaDescribedby }">
                <b-form-radio-group
                  v-model="book.product_detail.binding"
                  :options="options"
                  :aria-describedby="ariaDescribedby"
                  plain
                ></b-form-radio-group>
              </b-form-group>
            </b-col>
            <b-col cols="6">
              <b-row>
                <b-col>
                  <b-form-group>
                    <label class="typo__label">Category</label>
                    <multiselect
                      v-model="selected_category"
                      :options="categories"
                      :multiple="true"
                      :close-on-select="false"
                      :clear-on-select="false"
                      :preserve-search="true"
                      placeholder="Pick some"
                      label="name"
                      track-by="name"
                      :preselect-first="true"
                    >
                    </multiselect>
                    <pre class="language-json"><code>{{ value  }}</code></pre>
                  </b-form-group>
                  <b-form-group>
                    <label
                      ><span>Price</span
                      ><span class="text-danger"> *</span></label
                    >
                    <b-form-input
                      v-model="book.price"
                      class="mb-2"
                      maxlength="255"
                    />
                  </b-form-group>
                  <b-form-group>
                    <label
                      ><span>Sale</span
                      ><span class="text-danger"> *</span></label
                    >
                    <b-form-input
                      v-model="book.sale"
                      class="mb-2"
                      maxlength="255"
                    />
                  </b-form-group>
                  <b-form-group>
                    <label
                      ><span>Author</span
                      ><span class="text-danger"> *</span></label
                    >
                    <b-form-input
                      v-model="book.author"
                      class="mb-2"
                      maxlength="255"
                    />
                  </b-form-group>
                  <b-form-group>
                    <label
                      ><span>ISBN-13</span
                      ><span class="text-danger"> *</span></label
                    >
                    <b-form-input
                      v-model="book.product_detail.isbn_13"
                      class="mb-2"
                      maxlength="255"
                    />
                  </b-form-group>
                  <b-form-group>
                    <label>Publisher Date</label>
                    <b-form-datepicker
                      v-model="book.product_detail.publisher_date"
                      class="mb-2"
                    />
                  </b-form-group>
                </b-col>
              </b-row>
              <b-form-group>
                <label
                  ><span>Weight</span><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.weight"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
              <b-form-group>
                <label
                  ><span>Width</span><span class="text-danger"> *</span></label
                >
                <b-form-input
                  v-model="book.product_detail.width"
                  class="mb-2"
                  maxlength="255"
                />
              </b-form-group>
            </b-col>
          </b-row>
          <div class="d-flex justify-content-center mt-3">
            <b-button class="mr-2" variant="secondary" @click="back()">
              Back
            </b-button>
            <b-btn type="submit" variant="primary"> Save </b-btn>
          </div>
        </div>
      </b-form>
    </div>
  </div>
</template>

<script>
import Multiselect from "vue-multiselect";
export default {
  components: {
    Multiselect,
  },
  data() {
    return {
      book: {
        product_detail: {},
      },
      selected_category: [],
      categories: [],
      options: [
        {
          text: "PaperBack",
          value: "PaperBack",
        },
        {
          text: "HardBack",
          value: "HardBack",
        },
      ],
    };
  },
  async mounted() {
    await this.fetchBook();
    await this.fetchCategory();
  },
  methods: {
    async onSubmit() {
      const url =
        this.$route.params.id > 0
          ? `/products/${this.$route.params.id}`
          : "/products";
      console.log(this.selected_category);
      this.book.category = this.selected_category.map(function (item) {
        return item.id;
      });
      const response = await this.POST(url, this.book);
      if (response && response.success) {
        this.$toast.success(
          `${
            this.$route.params.id > 0
              ? "Update successfully"
              : "Create successfully"
          }`
        );
        this.$router.go(-1);
      }
    },
    async fetchBook() {
      if (this.$route.params.id > 0) {
        const response = await this.GET(`/products/${this.$route.params.id}`);
        this.book = response.data;
        this.selected_category = this.book.category;
      }
    },
    async fetchCategory() {
      const response = await this.$axios.get(`/categories/leaf`);
      this.categories = response.data.data;
    },
    uploadFile (e) {
    },
    changeFile () {
      document.getElementById('file-certificate').click()
    }
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
