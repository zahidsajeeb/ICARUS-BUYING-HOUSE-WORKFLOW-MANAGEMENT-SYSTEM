<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Order Add Section:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:2px solid darkgrey !important;">
                            <div class="card-header" style="background:white !important; border-bottom:2px solid darkgrey !important;">
                                <h1 class="card-title mb-0" style="color:black; text-align:left; font-size:16px !important;">Order Form</h1>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" @submit="formSubmit">
                                <table class="table table-bordered">
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center; ">ORDER CONFIRM DT</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="form.order_confirm_date"></td>
                                        <td style="vertical-align:middle; text-align:center;">ORDER NUMBER / NAMER</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.order_no"></td>
                                        <td style="vertical-align:middle; text-align:center;">FACTORY</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.factory"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">L/C NUMBER</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.lc_no"></td>
                                        <td style="vertical-align:middle; text-align:center;">DESCRIPTION</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.description"></td>
                                        <td style="vertical-align:middle; text-align:center;">SHIPMENT DATE</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="form.shipment_date"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">ORDER QTY</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.order_qty"></td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="4">SHELL FAB</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                        <td style="vertical-align:middle; text-align:center;">PLAN ETD</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="form.shell_fab_p_e"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.shell_fab_a"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">POCKETING</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.pocketing"></td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="4">ZIPPER</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.zipper_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.zipper_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">FUSING</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.fusing"></td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="4">SWING THREAD </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.swing_thread_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.swing_thread_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">BUTTON</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.button"></td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="4">PRINT / EMB </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.print_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.print_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">RIVET</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.rivet"></td>
                                        <td style="vertical-align:middle; text-align:center;">MAIN LABEL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.main_label"></td>
                                        <td style="vertical-align:middle; text-align:center;">SIZE LABEL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.size_label"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">CARE LABEL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.care_label"></td>
                                        <td style="vertical-align:middle; text-align:center;">OTHER LABEL</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.other_label"></td>
                                        <td style="vertical-align:middle; text-align:center;">BACK PATCH / METAL PLAQUE</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.back_patch"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">HANG TAG</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.hang_tag"></td>
                                        <td style="vertical-align:middle; text-align:center;">STRETCH TAG</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.stretch_tag"></td>
                                        <td style="vertical-align:middle; text-align:center;">WAIST TAG</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.waist_tag"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">PRICE TAG/STICKER POLY STICKER CTN  STICKER</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PRICE</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.price"></td>
                                        <td style="vertical-align:middle; text-align:center;">POLY</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.poly"></td>
                                        <td style="vertical-align:middle; text-align:center;">CTN</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.ctn"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">SINGLE POLY / BLISTER POLY</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.single_poly"></td>
                                        <td style="vertical-align:middle; text-align:center;">CARTON</td>
                                        <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="form.carton"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">HANGER / SIZER</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.hanger_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.hanger_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">FIT SAMPLE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.fit_sample_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.fit_sample_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">PP SAMPLE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.pp_sample_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.pp_sample_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">SHIPPING / TOP SAMPLE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.shipping_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.shipping_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">SIZE SET SWING / SWING FINISH</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">START</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.swing_start"></td>
                                        <td style="vertical-align:middle; text-align:center;">FINISH</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.swing_finish"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">SIZE SET WASH / WASH FINISH</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">START</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.wash_start"></td>
                                        <td style="vertical-align:middle; text-align:center;">FINISH</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.wash_finsh"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">SWING INPUT DATE & FINISH DATE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.swing_input_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.swing_input_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">BULK WASH APP  & FINISH DATE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.bulk_wash_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.bulk_wash_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">PACKING START & FINISH DT</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2">
                                            <input type="text" class="form-control" v-model="form.packing_start_plan">
                                        </td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2">
                                            <input type="text" class="form-control" v-model="form.packing_start_actual">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">FINAL INSPECTION DATE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2">
                                            <input type="text" class="form-control" v-model="form.final_inspection_plan">
                                        </td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2">
                                            <input type="text" class="form-control" v-model="form.final_inspection_actual">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;" colspan="6">EX FTY DATE</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.ex_fty_plan"></td>
                                        <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.ex_fty_actual"></td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">SHIP QTY</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.ship_qty"></td>
                                        <td style="vertical-align:middle; text-align:center;">REMARKS</td>
                                        <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="form.remarks"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-danger" style="border-radius:0px;"><i
                                                class="la la-check"></i> SUBMIT FORM
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
import Sidebar from '../components/sidebar.vue';
import Header from '../components/header.vue';
import Footer from '../components/footer.vue';

export default {
    name: "Dashboard",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            name: '',
            description: '',
            img: '',
            strSuccess: '',
            strError: '',
            imgPreview: null,
            form: {
            },
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    methods: {
        formSubmit: function (e) {
            e.preventDefault();
            let currentObj = this;

            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);

            axios.post('/api/order/order_store', {data: this.form})
            this.$swal({
                title: "DONE!!!",
                text: "ORDER INSERT SUCCESSFULLY!",
                icon: "success",
                showCancelButton: false,
                showConfirmButton: true,
                timer: 4000
            }).then(response => {
                $(location).attr('href', '/dashboard')
            })
                .catch(function (error) {
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

