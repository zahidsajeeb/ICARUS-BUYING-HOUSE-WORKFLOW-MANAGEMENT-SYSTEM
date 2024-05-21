<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">PRODUCTION SECTION:</h3>
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
                                <form enctype="multipart/form-data" @submit="formSubmit">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">ORDER NO:</td>
                                            <td colspan="3" style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_no" readonly style="background-color:darkred; color:white;"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SIZE SET SWING / SWING FINISH START</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_start"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SIZE SET SWING / SWING FINISH FINISH</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_finish"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SIZE SET WASH / WASH FINISH START</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="wash_start"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SIZE SET WASH / WASH FINISH FINISH</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="wash_finish"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SWING INPUT DATE & FINISH DATE PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_input_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SWING INPUT DATE & FINISH DATE ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_input_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">BULK WASH APP  & FINISH DATE PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="bulk_wash_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">BULK WASH APP  & FINISH DATE ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="bulk_wash_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">BULK WASH APP  & FINISH DATE APPROVED DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="bulk_wash_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">BULK WASH APP  & FINISH DATE REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="bulk_wash_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">PACKING START & FINISH DT PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="packing_start_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">PACKING START & FINISH DT ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="packing_start_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">FINAL INSPECTION DATE PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="final_inspection_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">FINAL INSPECTION DATE ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="final_inspection_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">EX FTY DATE PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="ex_fty_plan"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">EX FTY DATE ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="ex_fty_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">SHIP QTY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="ship_qty"></td>
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="production_remarks"></td>
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
import Footer from '../../components/footer.vue';
import order from "../order.vue";

export default {
    name: "order_form",
    computed: {
        order() {
            return order
        }
    },
    components: {Footer, Header, Sidebar},
    data() {
        return {
            id:'',
            order_no: '',
            swing_start: '',
            swing_finish: '',
            wash_start: '',
            wash_finish: '',
            swing_input_plan: '',
            swing_input_actual: '',
            bulk_wash_plan: '',
            bulk_wash_actual: '',
            packing_start_plan: '',
            packing_start_actual: '',
            final_inspection_plan: '',
            final_inspection_actual: '',
            ex_fty_plan: '',
            ex_fty_actual: '',
            ship_qty: '',
            production_remarks: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/production_order_info_edit/${this.$route.params.id}`)
                .then(response => {
                    this.order_no = response.data['order_no'];
                    this.swing_start = response.data['swing_start'];
                    this.swing_finish = response.data['swing_finish'];
                    this.wash_start = response.data['wash_start'];
                    this.wash_finish = response.data['wash_finish'];
                    this.swing_input_plan = response.data['swing_input_plan'];
                    this.swing_input_actual = response.data['swing_input_actual'];
                    this.bulk_wash_plan = response.data['bulk_wash_plan'];
                    this.bulk_wash_actual = response.data['bulk_wash_actual'];
                    this.packing_start_plan = response.data['packing_start_plan'];
                    this.packing_start_actual = response.data['packing_start_actual'];
                    this.final_inspection_plan = response.data['final_inspection_plan'];
                    this.final_inspection_actual = response.data['final_inspection_actual'];
                    this.ex_fty_plan = response.data['ex_fty_plan'];
                    this.ex_fty_actual = response.data['ex_fty_actual'];
                    this.ship_qty = response.data['ship_qty'];
                    this.production_remarks = response.data['production_remarks'];
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
                formData.append('swing_start', this.swing_start);
                formData.append('swing_finish', this.swing_finish);
                formData.append('wash_start', this.wash_start);
                formData.append('wash_finish', this.wash_finish);
                formData.append('swing_input_plan', this.swing_input_plan);
                formData.append('swing_input_actual', this.swing_input_actual);
                formData.append('bulk_wash_plan', this.bulk_wash_plan);
                formData.append('bulk_wash_actual', this.bulk_wash_actual);
                formData.append('packing_start_plan', this.packing_start_plan);
                formData.append('packing_start_actual', this.packing_start_actual);
                formData.append('final_inspection_plan', this.final_inspection_plan);
                formData.append('final_inspection_actual', this.final_inspection_actual);
                formData.append('ex_fty_plan', this.ex_fty_plan);
                formData.append('ex_fty_actual', this.ex_fty_actual);
                formData.append('ship_qty', this.ship_qty);
                formData.append('production_remarks', this.production_remarks);
                this.$axios.post(`/api/order/production_order_info_update/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Production Department Order Information Update Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    existingObj.strError = "";
                    existingObj.strSuccess = response.data.success;
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



