<template>
  <b-container>
    <b-breadcrumb :items="breadcrumbs"></b-breadcrumb>
    <b-row>
      <b-col cols="3">
        <div class="book-img">
          <img
            src="https://d2g9wbak88g7ch.cloudfront.net/productimages/images200/137/9781974725137.jpg"
            alt="Spy X Family, Vol. 6"
            style="display: inline-block"
            class="card-img-top"
            title="Spy X Family, Vol. 6"
          />
        </div>
      </b-col>
      <b-col cols="9">
        <div class="header">
          <div class="title mb-2">
            <h2 class="text-danger font-italic d-inline-block">
              Spy X Family, Vol 6
            </h2>
            <span>(Paperback)</span>
            <span> | </span>
            <span>Released: 05 Oct 2021</span>
          </div>
          <div class="author">
            <span>By: Tatsuya Endo (Author) | </span>
            <span>Publisher: Viz Media | </span>
            <span>Publisher Imprint: Viz Media</span>
          </div>
          <star-rating star-size="30"></star-rating>
        </div>
        <div class="body">
          <h3 class="text-danger">₹548</h3>
          <h5 class="text-muted"><del>₹830</del></h5>
          <span>International Edition</span>
          <span>Ships within <strong>16-18 Business Days</strong></span>
          <span>Free Shipping in India and low cost Worldwide.</span>
          <div class="mt-4">
            <b-button variant="danger">Buy Now</b-button>
            <b-button variant="light" class="btn-add-wishlist"
              >Add to Wishlist</b-button
            >
          </div>
        </div>
      </b-col>
    </b-row>
    <div class="d-flex flex-column mt-4" style="border-bottom: 1px solid rgba(0, 0, 0, 0.1);">
      <span class="text-danger font-weight-bold">About the book</span>
      <span class="font-weight-bold mb-3"
        >An action-packed comedy about a fake family that includes a spy, an
        assassin and a telepath!</span
      >
      <p>
        Master spy Twilight is unparalleled when it comes to going undercover on
        dangerous missions for the betterment of the world. But when he receives
        the ultimate assignment--to get married and have a kid--he may finally
        be in over his head! Twilight and Nightfall enter an underground tennis
        tournament, hoping for an opportunity to obtain an intelligence document
        that threatens to bring the world to the brink of war! But will their
        mission be compromised by Nightfall's secret crush on Twilight?! About
        the Author: Tatsuya Endo was born in Ibaraki Prefecture, Japan, on July
        23, 1980. He debuted as a manga artist with the one-shot "Seibu Yugi"
        (Western Game), which ran in the Spring 2000 issue of Akamaru Jump. He
        is the author of TISTA and Gekka Bijin (Moon Flower Beauty). Spy x
        Family is his first work published in English.
      </p>
    </div>
    <div class="mt-3">
      <span class="text-danger font-weight-bold">Product Details</span>
      <b-row>
        <b-col cols="6" class="d-flex flex-column">
          <span><strong>ISBN-13:</strong> 9781974725137</span>
          <span><strong>Publisher:</strong> Viz Media</span>
          <span><strong>Publisher:</strong> Viz Media</span>
          <span><strong>Height:</strong> 188 mm</span>
          <span><strong>No of Pages:</strong> 200</span>
          <span><strong>Series Title:</strong> Spy X Family</span>
          <span><strong>Weight:</strong> 184 gr</span>
        </b-col>
        <b-col cols="6" class="d-flex flex-column">
          <span><strong>ISBN-10:</strong> 1974725138</span>
          <span><strong>Publisher Date:</strong> 05 Oct 2021</span>
          <span><strong>Binding:</strong> Paperback</span>
          <span><strong>Language:</strong> English</span>
          <span><strong>Returnable:</strong> Y</span>
          <span><strong>Spine Width:</strong> 18 mm</span>
          <span><strong>Width:</strong> 127 mm</span>
        </b-col>
      </b-row>
    </div>
  </b-container>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      breadcrumbs: [
        {
          text: "Home",
          href: "#",
        },
        {
          text: "History & Humanities ",
          href: "#",
        },
        {
          text: "Philosophy",
          href: "#",
        },
        {
          text: "Philosophy: metaphysics & ontology ",
          href: "#",
        },
        {
          text: "Ikigai",
          active: true,
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.breadcrumb {
  background-color: none;
}
.book-img {
  padding: 25px;
  border: 1px solid #dee2e6 !important;
}
.header {
  font-size: 1rem;
  line-height: 1.5rem;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding-bottom: 15px;
}
.body {
  display: flex;
  flex-direction: column;
}
.btn-add-wishlist {
  background-color: #fff;
  border: 1px solid #d51912;
  color: #d51912;
}
</style>