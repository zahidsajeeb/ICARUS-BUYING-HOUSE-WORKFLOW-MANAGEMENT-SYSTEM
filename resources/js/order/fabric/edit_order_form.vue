<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">FABRIC SECTION:</h3>
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
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ORDER NO</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="3"><input type="text" class="form-control" v-model="order_no" readonly style="background-color:darkred; color:white;"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHELL FABRIC BOOKING DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shell_fabric_booking_date"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHELL FABRIC PLAN DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shell_fabric_plan_date"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHELL FABRIC ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="shell_fabric_actual"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SHELL FABRIC REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="shell_fabric_remarks"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">POCKETING BOOKING DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="pocketing_booking_date"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">POCKETING PLAN DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="pocketing_plan_date">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">POCKETING ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="pocketing_actual_date"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">POCKETING REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="pocketing_remarks"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <button type="submit" class="btn btn-danger pull-right" style="border-radius:0px;">
                                                    <i class="la la-check"></i> UPDATE FORM
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

export default {
    name: "order_form",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            id: '',
            order_no: '',
            shell_fabric_booking_date: '',
            shell_fabric_plan_date: '',
            shell_fabric_actual: '',
            shell_fabric_remarks: '',
            pocketing_booking_date: '',
            shipment_date_after_ext: '',
            pocketing_plan_date: '',
            pocketing_actual_date: '',
            pocketing_remarks: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/fabric_order_info_edit/${this.$route.params.id}`)
                .then(response => {
                    this.order_no = response.data['order_no'];
                    this.shell_fabric_booking_date = response.data['shell_fabric_booking_date'];
                    this.shell_fabric_plan_date = response.data['shell_fabric_plan_date'];
                    this.shell_fabric_actual = response.data['shell_fabric_actual'];
                    this.shell_fabric_remarks = response.data['shell_fabric_remarks'];
                    this.pocketing_booking_date = response.data['pocketing_booking_date'];
                    this.shipment_date_after_ext = response.data['shipment_date_after_ext'];
                    this.pocketing_plan_date = response.data['pocketing_plan_date'];
                    this.pocketing_actual_date = response.data['pocketing_actual_date'];
                    this.pocketing_remarks = response.data['pocketing_remarks'];
                })
                .catch(function (error) {
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
                formData.append('shell_fabric_booking_date', this.shell_fabric_booking_date);
                formData.append('shell_fabric_plan_date', this.shell_fabric_plan_date);
                formData.append('shell_fabric_actual', this.shell_fabric_actual);
                formData.append('shell_fabric_remarks', this.shell_fabric_remarks);
                formData.append('pocketing_booking_date', this.pocketing_booking_date);
                formData.append('pocketing_plan_date', this.pocketing_plan_date);
                formData.append('pocketing_actual_date', this.pocketing_actual_date);
                formData.append('pocketing_remarks', this.pocketing_remarks);
                this.$axios.post(`/api/order/fabric_order_info_update/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Fabric Department Order Information Update Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    existingObj.strError = "";
                    existingObj.strSuccess = response.data.success;
                })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
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



