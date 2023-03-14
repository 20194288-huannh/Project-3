<template>
<b-container style="background-color: #85879" class="mt-5">
    <b-row>
        <b-col cols="8">
            <b-card>
                <h4 class="text-center font-weight-bold">Payment</h4>
                <b-row>
                    <b-col cols="12">
                        <b-table :items="orders" :fields="fields">
                            <template #cell(actions)="row">
                                <b-button size="sm" variant="link" @click="AddtoWishList(row.item)" class="mr-1">
                                    Add to Wishlist
                                </b-button>
                                <b-button size="sm" variant="link" @click="remove(row.item.id)">
                                    Remove
                                </b-button>
                            </template>
                            <template #cell(id)="row">
                                <span>{{ row.item.product.id }}</span>
                            </template>
                            <template #cell(description)="row">
                                <div class="d-flex">
                                    <b-img left :src="row.item?.product?.image" alt="Left image" height="50" class="mr-3"></b-img>
                                    <div>
                                        <div>
                                            <strong>{{ row.item?.product?.name }}</strong>
                                        </div>
                                        <div>by {{ row.item?.product?.author }}</div>
                                    </div>
                                </div>
                            </template>
                            <template #cell(price)="row">
                                <div class="d-flex flex-column justify-content-between">
                                    <span class="text-muted actual-price">${{ row.item?.product?.price }}</span>
                                    <span class="text-muted">${{ row.item?.product?.price }}</span>
                                </div>
                            </template>
                            <template #cell(total_price)="row">
                                <div class="d-flex flex-column justify-content-between">
                                    <span class="text-muted actual-price">${{ row.item?.product?.price }}</span>
                                    <span class="text-muted">${{ row.item?.product?.price }}</span>
                                </div>
                            </template>
                        </b-table>
                    </b-col>
                </b-row>
                <div class="d-flex flex-column">
                    <label>❖ <b>Payment Methods</b></label>
                    <b style="color: tomato">Wallet <span style="color: #6fbe44">Mobile Banking</span>,
                        <span style="color: #a50064">MOMO</span>,
                        <span style="color: #0068ff">Zalopay</span>... choose
                        <span style="color: blue">QRPAY Method</span></b>
                </div>
                <br />
                <b-row class="d-flex text-center ml-1" style="font-size: 14px">
                    <b-card class="col-5 col-lg-3 mr-2" :class="item_payment == 1 ? 'active' : ''" pay-method="atm" body-class="body-payment-card" @click="item_payment = 1">
                        <b-row class="justify-content-around">
                            <b-col cols="3">
                                <b-card-img src="https://www.vietqr.io/img/vietqr%20api%20-%20payment%20kit.png" style="width: 45px" class="" alt="mua bằng thanh toán atm">
                                </b-card-img>
                            </b-col>
                            <b-col cols="8">
                                <b class="text-muted">QRPAY</b>
                                <p class="text-danger" style="font-size: 13px"><b>0đ</b></p>
                            </b-col>
                        </b-row>
                    </b-card>
                    <b-card class="col-5 col-lg-3 mr-2" :class="item_payment == 2 ? 'active' : ''" pay-method="atm" body-class="body-payment-card" @click="item_payment = 2">
                        <b-row class="justify-content-around">
                            <b-col cols="3">
                                <b-card-img src="https://paythe.vn/theme/images/banks/visa.png" style="width: 38px" class="" alt="mua bằng thanh toán visa/mastercard callback">
                                </b-card-img>
                            </b-col>
                            <b-col cols="8">
                                <b class="text-muted">VISA</b>
                                <p class="text-danger" style="font-size: 13px">
                                    <b>2.6% + 2200đ</b>
                                </p>
                            </b-col>
                        </b-row>
                    </b-card>
                    <b-card class="col-5 col-lg-3 mr-2" :class="item_payment == 3 ? 'active' : ''" pay-method="atm" body-class="body-payment-card" @click="item_payment = 3">
                        <b-row class="justify-content-around">
                            <b-col cols="3">
                                <b-card-img src="https://paythe.vn/theme/images/banks/bank.jpg" style="width: 48px" class="" alt="mua bằng thanh toán atm callback">
                                </b-card-img>
                            </b-col>
                            <b-col cols="8">
                                <b class="text-muted">ATM</b>
                                <p class="text-danger" style="font-size: 13px">
                                    <b>0.8% + 550d</b>
                                </p>
                            </b-col>
                        </b-row>
                    </b-card>
                </b-row>
                <button type="button" id="submit_muacard" class="btn btn btn-danger justify-content-between mt-3" @click="$bvModal.show('qr-modal');">
                    <span class="text">Payment</span>
                    <span class="icon text-white-50">
                        <svg class="svg-inline--fa fa-circle-right fa-1x" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM294.6 135.1l99.9 107.1c3.5 3.8 5.5 8.7 5.5 13.8s-2 10.1-5.5 13.8L294.6 376.9c-4.2 4.5-10.1 7.1-16.3 7.1C266 384 256 374 256 361.7l0-57.7-96 0c-17.7 0-32-14.3-32-32l0-32c0-17.7 14.3-32 32-32l96 0 0-57.7c0-12.3 10-22.3 22.3-22.3c6.2 0 12.1 2.6 16.3 7.1z"></path>
                        </svg><!-- <i class="fas fa-1x fa-arrow-alt-circle-right" aria-hidden="true"></i> Font Awesome fontawesome.com -->
                    </span>
                </button>
            </b-card>
        </b-col>
        <b-col cols="4">
            <b-card>
                <b-card-body>
                    <h6>
                        <svg class="svg-inline--fa fa-rectangle-list" style="height: 1em" aria-hidden="true" focusable="false" data-prefix="far" data-icon="rectangle-list" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"></path>
                        </svg>
                        Details
                    </h6>
                    <hr />
                    <table class="table table-striped table-bordered hide-form" style="color: black">
                        <tbody>
                            <tr>
                                <td><b>Actual Price:</b></td>
                                <td id="fee-total-card-table" class="content-sum-price text-danger text-center notranslate">
                                    19.300 VNĐ
                                </td>
                            </tr>
                            <tr>
                                <td><b>Shipping:</b></td>
                                <td id="fee-total-card-table" class="content-sum-price text-danger text-center notranslate">
                                    78
                                </td>
                            </tr>
                            <tr>
                                <td><b>Voucher:</b></td>
                                <td id="fee-total-card-table" class="content-sum-price text-danger text-center notranslate">
                                    None
                                </td>
                            </tr>
                            <tr>
                                <td><b>Price:</b></td>
                                <td id="fee-total-card-table" class="content-sum-price text-danger text-center notranslate">
                                    None
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </b-card-body>
            </b-card>
        </b-col>
    </b-row>
    <b-modal centered scrollable size="l" id="qr-modal">
        <template #modal-title class="title"> Payments </template>
        <img src="~/assets/images/QR.jpg" class="w-100 h-100"></img>
    </b-modal>
</b-container>
</template>

<script>
export default {
    data() {
        return {
            item_payment: 1,
            orders: [],
            total_gross: null,
            fields: [{
                    key: "id",
                    label: "Sr.#"
                },
                {
                    key: "description",
                    label: "Item Description"
                },
                {
                    key: "quantity",
                    label: "Quantity"
                },
                {
                    key: "price",
                    label: "Item Price"
                },
                {
                    key: "total_price",
                    label: "Total Price"
                },
                {
                    key: "actions",
                    label: "Actions"
                },
            ],
        }
    },
    methods: {
        async fetchOrders() {
            const response = await this.$axios.get("/orders/all");
            if (response.status === 200 && response.data) {
                this.orders = response.data.data.data;
                this.total_gross = response.data.data.total_gross;
            }
        },
    },
    created() {
        this.fetchOrders();
    },
};
</script>

<style lang="scss" scoped>
.svg-inline--fa {
    display: var(--fa-display, inline-block);
    height: 1em;
    overflow: visible;
    vertical-align: -0.125em;
    padding-right: 1em;
}

svg:not(:host).svg-inline--fa,
svg:not(:root).svg-inline--fa {
    overflow: visible;
    box-sizing: content-box;
}

.body-payment-card {
    padding: 10px 5px 5px 5px;
}

.body-payment-card p {
    margin: 0px;
}

.active {
    border: 2px solid #17a2b8;
}
</style>
