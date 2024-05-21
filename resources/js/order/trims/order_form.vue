<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">TRIMS SECTION:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/trims_order_list" class="btn btn-danger add-btn" style="border-radius:0px;margin-bottom: 5px;"><i class="fa fa-backward"></i> Back To The Previous Page</a> <br>
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
                                            <td style="vertical-align:middle; text-align:center; background:#e9ecef;">ORDER NO:</td>
                                            <td colspan="3" style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="order_no" readonly style="background:darkred; color:white;"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">FUSING:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="fusing"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ZIPPER PLAN:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="zipper_plan"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">ZIPPER ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="zipper_actual"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SWING THREAD PLAN:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_thread_plan"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SWING THREAD ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="swing_thread_actual"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PRINT / EMB PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="print_plan"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PRINT / EMB ACTUAL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="print_actual"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">BUTTON:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="button"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">RIVET:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="rivet"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">MAIN LABEL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="main_label"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SIZE LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="size_label"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">CARE LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="care_label"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">OTHER LABEL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="other_label"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">BACK PATCH / METAL PLAQUE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="back_patch"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">HANG TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="hang_tag"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">STRETCH TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="stretch_tag"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">WAIST TAG</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="waist_tag"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PRICE TAG/STICKER POLY STICKER CTN STICKER PRICE</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="price"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PRICE TAG/STICKER POLY STICKER CTN STICKER POLY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="poly"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">PRICE TAG/STICKER POLY STICKER CTN STICKER CTN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="ctn"> </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">SINGLE POLY / BLISTER POLY</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="single_poly"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">CARTON</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="carton"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">HANGER / SIZER PLAN</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="hanger_plan"></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">HANGER / SIZER ACTUAL</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="hanger_actual"></td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">REMARKS</td>
                                            <td style="vertical-align:middle; text-align:center;" colspan="3"><input type="text" class="form-control" v-model="trims_remarks"></td>
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
            trims_remarks: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/order/trims_order_info_form/${this.$route.params.id}`)
                .then(response => {
                    this.order_no = response.data['order_no'];
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
                formData.append('ctn', this.ctn);
                formData.append('hanger_plan', this.hanger_plan);
                formData.append('hanger_actual', this.hanger_actual);
                formData.append('single_poly', this.single_poly);
                formData.append('carton', this.carton);
                formData.append('trims_remarks', this.trims_remarks);
                this.$axios.post(`/api/order/trims_order_info_store/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Trims Department Order Information Store Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    $(location).attr('href', '/dashboard')
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


