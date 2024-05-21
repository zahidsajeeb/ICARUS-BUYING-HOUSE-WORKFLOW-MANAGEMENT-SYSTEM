<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">MERCHANDISING SECTION:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/merchant_order_list" class="btn btn-danger add-btn" style="border-radius:0px;margin-bottom: 5px;"><i class="fa fa-backward"></i> Back To The Previous Page</a> <br>
                    </div>
                    <div class="col-md-12">
                        <div class="card" style="border:1px solid darkslategray !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <h1 class="card-title mb-0" style="color:white; text-align:left; font-size:16px !important;">ORDER FORM:</h1>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" @submit="formSubmit">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ORDER NO:</td>
                                            <td colspan="3" style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_no" readonly style="background-color:darkred; color:white;"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">FIT SAMPLE PLAN:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="fit_sample_plan"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">FIT SAMPLE ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="fit_sample_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PP SAMPLE PLAN:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="pp_sample_plan"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PP SAMPLE ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="pp_sample_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHIPPING / TOP SAMPLE PLAN:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="shipping_plan"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHIPPING / TOP SAMPLE ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="shipping_actual"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <button type="submit" class="btn btn-danger pull-right" style="border-radius:0px;"><i class="la la-check"></i> SUBMIT FORM</button>
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
</template>

<script>
import Sidebar from '../../components/sidebar.vue';
import Header from '../../components/header.vue';
import Footer from '../../components/footer.vue';

export default {
    name: "order_form",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            id:'',
            order_no: '',
            fit_sample_plan: '',
            fit_sample_actual: '',
            pp_sample_plan: '',
            pp_sample_actual: '',
            shipping_plan: '',
            shipping_actual: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/merchant_order_info_form/${this.$route.params.id}`)
                .then(response => {
                    this.order_no = response.data['order_no'];
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    },
    methods: {
        formSubmit(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                const formData = new FormData();
                formData.append('order_no', this.order_no);
                formData.append('fit_sample_plan', this.fit_sample_plan);
                formData.append('fit_sample_actual', this.fit_sample_actual);
                formData.append('pp_sample_plan', this.pp_sample_plan);
                formData.append('pp_sample_actual', this.pp_sample_actual);
                formData.append('shipping_plan', this.shipping_plan);
                formData.append('shipping_actual', this.shipping_actual);
                this.$axios.post(`/api/order/merchant_order_info_store/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Merchant Department Order Information Store Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    router.go(n);
                })
                    .catch(function(error) {
                        existingObj.strSuccess ="";
                        existingObj.strError = error.response.data.message;
                    });
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


