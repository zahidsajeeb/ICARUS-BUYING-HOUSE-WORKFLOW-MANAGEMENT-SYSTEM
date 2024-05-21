<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Order Update Section:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:2px solid darkgrey !important;">
                            <div class="card-header" style="background:white !important; border-bottom:2px solid darkgrey !important;">
                                <h1 class="card-title mb-0" style="color:black; text-align:left; font-size:16px !important;">Order Update Form</h1>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="updatePost" enctype="multipart/form-data">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center; ">ORDER CONFIRM DT</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="order_confirm_date"></td>
                                            <td style="vertical-align:middle; text-align:center;">ORDER NUMBER / NAMER</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_no"></td>
                                            <td style="vertical-align:middle; text-align:center;">FACTORY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="factory"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">L/C NUMBER</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="lc_no"></td>
                                            <td style="vertical-align:middle; text-align:center;">DESCRIPTION</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="description"></td>
                                            <td style="vertical-align:middle; text-align:center;">SHIPMENT DATE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shipment_date"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">ORDER QTY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_qty"></td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="4">SHELL FAB</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                            <td style="vertical-align:middle; text-align:center;">PLAN ETD</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="date" class="form-control" v-model="shell_fab_p_e"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="shell_fab_a"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">POCKETING</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="pocketing"></td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="4">ZIPPER</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="zipper_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="zipper_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">FUSING</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="fusing"></td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="4">SWING THREAD </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_thread_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_thread_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">BUTTON</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="button"></td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="4">PRINT / EMB </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"></td>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="print_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="print_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">RIVET</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="rivet"></td>
                                            <td style="vertical-align:middle; text-align:center;">MAIN LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="main_label"></td>
                                            <td style="vertical-align:middle; text-align:center;">SIZE LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="size_label"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">CARE LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="care_label"></td>
                                            <td style="vertical-align:middle; text-align:center;">OTHER LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="other_label"></td>
                                            <td style="vertical-align:middle; text-align:center;">BACK PATCH / METAL PLAQUE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="back_patch"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">HANG TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="hang_tag"></td>
                                            <td style="vertical-align:middle; text-align:center;">STRETCH TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="stretch_tag"></td>
                                            <td style="vertical-align:middle; text-align:center;">WAIST TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="waist_tag"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">PRICE TAG/STICKER POLY STICKER CTN  STICKER</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PRICE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="price"></td>
                                            <td style="vertical-align:middle; text-align:center;">POLY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="poly"></td>
                                            <td style="vertical-align:middle; text-align:center;">CTN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="ctn"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">SINGLE POLY / BLISTER POLY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="single_poly"></td>
                                            <td style="vertical-align:middle; text-align:center;">CARTON</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="carton"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">HANGER / SIZER</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="hanger_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="hanger_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">FIT SAMPLE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="fit_sample_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="fit_sample_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">PP SAMPLE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="pp_sample_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="pp_sample_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">SHIPPING / TOP SAMPLE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="shipping_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="shipping_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">SIZE SET SWING / SWING FINISH</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">START</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="swing_start"></td>
                                            <td style="vertical-align:middle; text-align:center;">FINISH</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="swing_finish"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">SIZE SET WASH / WASH FINISH</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">START</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="wash_start"></td>
                                            <td style="vertical-align:middle; text-align:center;">FINISH</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="wash_finish"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">SWING INPUT DATE & FINISH DATE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="swing_input_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="swing_input_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">BULK WASH APP  & FINISH DATE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="bulk_wash_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="bulk_wash_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">PACKING START & FINISH DT</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2">
                                                <input type="text" class="form-control" v-model="packing_start_plan">
                                            </td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2">
                                                <input type="text" class="form-control" v-model="packing_start_actual">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">FINAL INSPECTION DATE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2">
                                                <input type="text" class="form-control" v-model="final_inspection_plan">
                                            </td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2">
                                                <input type="text" class="form-control" v-model="final_inspection_actual">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;" colspan="6">EX FTY DATE</td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="ex_fty_plan"></td>
                                            <td style="vertical-align:middle; text-align:center;">ACCTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="ex_fty_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">SHIP QTY</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="ship_qty"></td>
                                            <td style="vertical-align:middle; text-align:center;">REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="2"><input type="text" class="form-control" v-model="remarks"></td>
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
            id:'',
            order_confirm_date: '',
            factory: '',
            order_no: '',
            lc_no: '',
            description: '',
            shipment_date: '',
            order_qty: '',
            shell_fab_p_e: '',
            shell_fab_a: '',
            pocketing: '',
            fusing: '',
            zipper_plan: '',
            zipper_actual: '',
            swing_thread_plan: '',
            swing_thread_actual: '',
            print_plan: '',
            print_actual: '',
            button: '',
            rivet: '',
            main_label: '',
            size_label: '',
            care_label: '',
            other_label: '',
            back_patch: '',
            hang_tag: '',
            stretch_tag: '',
            waist_tag: '',
            price: '',
            poly: '',
            ctn: '',
            hanger_plan: '',
            hanger_actual: '',
            single_poly: '',
            carton: '',
            fit_sample_plan: '',
            fit_sample_actual: '',
            pp_sample_plan: '',
            pp_sample_actual: '',
            shipping_plan: '',
            shipping_actual: '',
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
            remarks: '',
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
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/order_edit/${this.$route.params.id}`)
                .then(response => {
                    this.order_confirm_date = response.data['order_confirm_date'];
                    this.factory = response.data['factory'];
                    this.order_no = response.data['order_no'];
                    this.lc_no = response.data['lc_no'];
                    this.description = response.data['description'];
                    this.shipment_date = response.data['shipment_date'];
                    this.order_qty = response.data['order_qty'];
                    this.shell_fab_p_e = response.data['shell_fab_p_e'];
                    this.shell_fab_a = response.data['shell_fab_a'];
                    this.pocketing = response.data['pocketing'];
                    this.fusing = response.data['fusing'];
                    this.zipper_plan = response.data['zipper_plan'];
                    this.zipper_actual = response.data['zipper_actual'];
                    this.swing_thread_plan = response.data['swing_thread_plan'];
                    this.swing_thread_actual = response.data['swing_thread_actual'];
                    this.print_plan = response.data['print_plan'];
                    this.print_actual = response.data['print_actual'];
                    this.button = response.data['button'];
                    this.rivet = response.data['rivet'];
                    this.main_label = response.data['main_label'];
                    this.size_label = response.data['size_label'];
                    this.care_label = response.data['care_label'];
                    this.other_label = response.data['other_label'];
                    this.back_patch = response.data['back_patch'];
                    this.hang_tag = response.data['hang_tag'];
                    this.stretch_tag = response.data['stretch_tag'];
                    this.waist_tag = response.data['waist_tag'];
                    this.price = response.data['price'];
                    this.poly = response.data['poly'];
                    this.ctn = response.data['ctn'];
                    this.hanger_plan = response.data['hanger_plan'];
                    this.hanger_actual = response.data['hanger_actual'];
                    this.single_poly = response.data['single_poly'];
                    this.carton = response.data['carton'];
                    this.fit_sample_plan = response.data['fit_sample_plan'];
                    this.fit_sample_actual = response.data['fit_sample_actual'];
                    this.pp_sample_plan = response.data['pp_sample_plan'];
                    this.pp_sample_actual = response.data['pp_sample_actual'];
                    this.shipping_plan = response.data['shipping_plan'];
                    this.shipping_actual = response.data['shipping_actual'];
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
                    this.remarks = response.data['remarks'];
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    },
    methods: {
        updatePost(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                const formData = new FormData();
                formData.append('order_confirm_date', this.order_confirm_date);
                formData.append('factory', this.factory);
                formData.append('order_no', this.order_no);
                formData.append('lc_no', this.lc_no);
                formData.append('description', this.description);
                formData.append('shipment_date', this.shipment_date);
                formData.append('order_qty', this.order_qty);
                formData.append('shell_fab_p_e', this.shell_fab_p_e);
                formData.append('shell_fab_a', this.shell_fab_a);
                formData.append('pocketing', this.pocketing);
                formData.append('fusing', this.fusing);
                formData.append('zipper_plan', this.zipper_plan);
                formData.append('zipper_actual', this.zipper_actual);
                formData.append('swing_thread_plan', this.swing_thread_plan);
                formData.append('swing_thread_actual', this.swing_thread_actual);
                formData.append('print_plan', this.print_plan);
                formData.append('print_actual', this.print_actual);
                formData.append('button', this.button);
                formData.append('rivet', this.rivet);
                formData.append('main_label', this.main_label);
                formData.append('size_label', this.size_label);
                formData.append('care_label', this.care_label);
                formData.append('other_label', this.other_label);
                formData.append('back_patch', this.back_patch);
                formData.append('hang_tag', this.hang_tag);
                formData.append('stretch_tag', this.stretch_tag);
                formData.append('waist_tag', this.waist_tag);
                formData.append('price', this.price);
                formData.append('poly', this.poly);
                formData.append('poly', this.poly);
                formData.append('hanger_plan', this.hanger_plan);
                formData.append('hanger_actual', this.hanger_actual);
                formData.append('single_poly', this.single_poly);
                formData.append('carton', this.carton);
                formData.append('fit_sample_plan', this.fit_sample_plan);
                formData.append('fit_sample_actual', this.fit_sample_actual);
                formData.append('pp_sample_plan', this.pp_sample_plan);
                formData.append('pp_sample_actual', this.pp_sample_actual);
                formData.append('shipping_plan', this.shipping_plan);
                formData.append('shipping_actual', this.shipping_actual);
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
                formData.append('remarks', this.remarks);
                this.$axios.post(`/api/order/order_update/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Order Information Update Successfully !!!",
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


