<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">COMMERCIAL SECTION:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:1px solid darkslategray !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <h1 class="card-title mb-0" style="color:white; text-align:left; font-size:16px !important;">EDIT ORDER FORM:</h1>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="formSubmit" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ORDER CONFIRM DT:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="order_confirm_date"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ORDER NUMBER:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_no"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">FACTORY:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="factory"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">L/C NUMBER:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="lc_no"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">DESCRIPTION:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="description"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHIPMENT DATE:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shipment_date"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHIPMENT DATE (After EXT):</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shipment_date_after_ext"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ORDER QTY:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="number" class="form-control" v-model="order_qty"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PI TO BUYER DATE:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="pi_to_buyer_date"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SC/LC TO FTY DATE:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="lc_to_fty_date"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">BUYER:</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <input type="text" class="form-control" v-model="buyer_name" readonly> <br>
                                                <span><b>Edit:</b></span>
                                                <select v-model="buyer" class="form-control">
                                                    <option>Please select one</option>
                                                    <option v-for="(buyer_name, index) in buyers_name" :key="buyer_name.id" :value="buyer_name.id">{{ buyer_name.buyer_name }}</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <button type="submit" class="btn btn-danger pull-right" style="border-radius:0px;"><i
                                                    class="la la-check"></i> UPDATE FORM
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    <div>Welcome {{ name }}</div>-->
</template>

<script>
import Sidebar from '../../components/sidebar.vue';
import Header from '../../components/header.vue';
export default {
    name: "order_form",
    components: {Header, Sidebar},
    data() {
        return {
            buyers_name: [],
            id:'',
            order_confirm_date: '',
            order_no: '',
            factory: '',
            lc_no: '',
            description: '',
            shipment_date: '',
            shipment_date_after_ext: '',
            order_qty: '',
            pi_to_buyer_date: '',
            lc_to_fty_date: '',
            buyer_name:'',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/commercial_order_info_edit/${this.$route.params.id}`)
                .then(response => {
                    this.order_no = response.data['order_no'];
                    this.order_confirm_date = response.data['order_confirm_date'];
                    this.factory = response.data['factory'];
                    this.lc_no = response.data['lc_no'];
                    this.description = response.data['description'];
                    this.shipment_date = response.data['shipment_date'];
                    this.shipment_date_after_ext = response.data['shipment_date_after_ext'];
                    this.order_qty = response.data['order_qty'];
                    this.pi_to_buyer_date = response.data['pi_to_buyer_date'];
                    this.lc_to_fty_date = response.data['lc_to_fty_date'];
                    this.buyer_name = response.data['buyer_name'];
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/buyer_list/`).then(response => {
                this.buyers_name = response.data;
            }).catch(function (error) {
                console.log(error);
            });
            if (window.Laravel.user) {
                this.name = window.Laravel.user.name
            }
        });
    },
    methods: {
        formSubmit(e) {
            e.preventDefault();
            let existingObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let data = new FormData();
            data.append('order_confirm_date', this.order_confirm_date);
            data.append('order_no', this.order_no);
            data.append('factory', this.factory);
            data.append('lc_no', this.lc_no);
            data.append('description', this.description);
            data.append('shipment_date', this.shipment_date);
            data.append('shipment_date_after_ext', this.shipment_date_after_ext);
            data.append('pi_to_buyer_date', this.pi_to_buyer_date);
            data.append('lc_to_fty_date', this.lc_to_fty_date);
            data.append('order_qty', this.order_qty);
            data.append('buyer', this.buyer);
            data.append('buyer_name', this.buyer_name);
            this.$axios.post(`/api/order/commercial_order_info_update/${this.$route.params.id}`, data, config)
            this.$swal({
                title: "DONE!!!",
                text: "ORDER INSERT SUCCESSFULLY!",
                icon: "success",
                showCancelButton: false,
                showConfirmButton: true,
                timer: 4000
            }).then(response => {
                $(location).attr('href', '/dashboard')
            }).catch(function (error) {
                    alert('Error');
                });
        },
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        } else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        }
    },
    beforeRouteEnter(to, from, next) {
        if (!window.Laravel.isLoggedin) {
            window.location.href = "/";
        }
        next();
    }
}
</script>

