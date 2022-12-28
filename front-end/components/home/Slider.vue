<template>
    <b-container fluid>
        <b-img class="w-100" src="https://www.bookswagon.com/images/promotionimages/web/1_alltimefavourite.jpg?v=1.2"></b-img>
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
        <b-list-group horizontal class="list-group-nav">
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo-best-seller/best-seller/03AC998EBDC2">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon1.png" width="71px" height="71px" alt="Best seller"><br>
                    <span>Best Seller</span>
                </a>
            </b-list-group-item>
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo-best-seller/award-winning/2109CDC4B4DC">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon8.png" width="71px" height="71px" alt="Award Winners"><br>
                    <span>Award Winners</span>
                </a>
            </b-list-group-item>
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo-best-seller/box-sets/389DA2389287">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon4.png" width="71px" height="71px" alt="Box Sets"><br>
                    <span>Box Sets</span>
                </a>
            </b-list-group-item>
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo-best-seller/new-arrivals/99325F010C89">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon2.png" width="71px" height="71px" alt="New Arrivals"><br>
                    <span>New Arrivals</span>
                </a>
            </b-list-group-item>
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo/fiction-books/9D7S5K6U3M">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/icon5.png" width="71px" height="71px" alt="Fictions Books"><br>
                    <span>Fictions Books</span>
                </a>
            </b-list-group-item>
            <b-list-group-item class="col-2 d-flex justify-content-center">
                <a href="https://www.bookswagon.com/promo/best-tarot-card-decks/9H1N7S3D0P">
                    <img src="https://d2g9wbak88g7ch.cloudfront.net/staticimages/tarot.png" width="71px" height="71px" alt="Tarot Cards"><br>
                    <span>Tarot Cards</span>
                </a>
            </b-list-group-item>
        </b-list-group>
        
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