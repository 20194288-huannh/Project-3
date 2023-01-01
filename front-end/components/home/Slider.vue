<template>
    <b-container fluid>
        <b-img class="w-100 mt-1 mb-1" src="https://www.bookswagon.com/images/promotionimages/web/1_alltimefavourite.jpg?v=1.2"></b-img>
        <b-carousel
            id="carousel-fade"
            style="text-shadow: 0px 0px 2px #000"
            fade
            controls
            indicators
            img-width="1024"
            img-height="480"
        >
            <b-carousel-slide
            caption="Upto 55% off"
            img-src="https://d2g9wbak88g7ch.cloudfront.net/bannerimages/80_inr.jpg"
            ></b-carousel-slide>
            <b-carousel-slide
            caption="Second Slide"
            img-src="https://d2g9wbak88g7ch.cloudfront.net/bannerimages/79_inr.jpg"
            ></b-carousel-slide>
            <b-carousel-slide
            caption="Third Slide"
            img-src="https://d2g9wbak88g7ch.cloudfront.net/bannerimages/82_inr.jpg"
            ></b-carousel-slide>
            <b-carousel-slide
            caption="Third Slide"
            img-src="https://d2g9wbak88g7ch.cloudfront.net/bannerimages/83_inr.jpg"
            ></b-carousel-slide>
            <b-carousel-slide
            caption="Third Slide"
            img-src="https://d2g9wbak88g7ch.cloudfront.net/bannerimages/81_inr.jpg"
            ></b-carousel-slide>
        </b-carousel>        
    </b-container>
</template>

<script>

export default {

}
</script>

<style scope>
.carousel-control-prev-icon, .carousel-control-next-icon{
    background-color: #e42b26 !important;
    padding: 15px !important;
}
.list-group-nav{
    width: 100%;
    padding: 24px;
    justify-content: center;
    border-top: 2px solid #aeaeae;
    border-bottom: 2px solid #aeaeae;
    margin-top: 48px;
    margin-bottom: 48px;
}
</style>