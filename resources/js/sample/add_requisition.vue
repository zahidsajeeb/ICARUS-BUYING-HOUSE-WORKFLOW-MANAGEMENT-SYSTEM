<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Sample Requisition Add Section:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:2px solid darkgrey !important;">
                            <div class="card-header" style="background:white !important; border-bottom:2px solid darkgrey !important;">
                                <h1 class="card-title mb-0" style="color:black; text-align:center; font-size:32px !important;">Sample Requisition Form</h1>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" @submit="formSubmit">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b style="font-size:large;">REQUISITION
                                                        DATE:</b></label>
                                                    <input type="text" class="form-control"
                                                           v-model="form.sample_req_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>APPROVAL PERSON:</b></label>
                                                    <select class="form-control" v-model="form.r_apr_prs_name" required>
                                                        <option>-Select-</option>
                                                        <option>Abu Barak Siddique Khan</option>
                                                        <option>Ananto Jalil</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>Buyer Name:</b></label>
                                                    <select class="form-control" v-model="form.buyer">
                                                        <option>-Select-</option>
                                                        <option>X</option>
                                                        <option>Y</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>Style:</b></label>
                                                    <input type="text" class="form-control" v-model="form.style"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>Item Description:</b></label>
                                                    <input type="text" class="form-control" v-model="form.item_desc"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>Fabric:</b></label>
                                                    <input type="text" class="form-control" v-model="form.fabric"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group row">
                                                <div class="col-lg-12">
                                                    <label class="col-form-label"><b>Required Fabric Qty:</b></label>
                                                    <input type="text" class="form-control" v-model="form.req_fab_qty"
                                                           required>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-xl-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-form-label"><b>Fabric Handover Date:</b></label>
                                                <input type="text" class="form-control" v-model="form.fab_hand_date"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label class="col-form-label"><b>Original Sample:</b></label>
                                                <input type="text" class="form-control" v-model="form.org_sample"
                                                       required>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Tech Pack:</b></label>
                                            <input type="text" class="form-control" v-model="form.tech_park" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Type of Sample:</b></label>
                                            <input type="text" class="form-control" v-model="form.type_of_sample"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Sewing Thread (Color):</b></label>
                                            <input type="text" class="form-control" v-model="form.sewing_thread" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Required Thread Qty:</b></label>
                                            <input type="text" class="form-control" v-model="form.req_thread_qty" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Required Thread Count:</b></label>
                                            <input type="text" class="form-control" v-model="form.req_thread_count" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Thread Handover Date:</b></label>
                                            <input type="text" class="form-control" v-model="form.thread_handover_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Main Label:</b></label>
                                            <input type="text" class="form-control" v-model="form.main_label" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Size Label:</b></label>
                                            <input type="text" class="form-control" v-model="form.size_label" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Care Label:</b></label>
                                            <input type="text" class="form-control" v-model="form.care_label" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Interlining:</b></label>
                                            <input type="text" class="form-control" v-model="form.interlining" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-lg-12 col-form-label"><b>Zipper:</b></label>
                                            <input type="text" class="form-control" v-model="form.zipper" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Button:</b></label>
                                            <input type="text" class="form-control" v-model="form.button" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Twill Tape:</b></label>
                                            <input type="text" class="form-control" v-model="form.twill_tape" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Elastic:</b></label>
                                            <input type="text" class="form-control" v-model="form.elastic" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Hangtag:</b></label>
                                            <input type="text" class="form-control" v-model="form.hangtag" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Stickers:</b></label>
                                            <input type="text" class="form-control" v-model="form.stickers" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Fabric Shrinkage:</b></label>
                                            <input type="text" class="form-control" v-model="form.fab_shrinkage" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Wash Type:</b></label>
                                            <input type="text" class="form-control" v-model="form.wash_type" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-bottom:15px !important;">
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Sewing Type:</b></label>
                                            <input type="text" class="form-control" v-model="form.sewing_type" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <label class="col-form-label"><b>Pocketing:</b></label>
                                        <div class="col-lg-12">
                                            <input type="text" class="form-control" v-model="form.pocketing" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label class="col-form-label"><b>Sample Submission Date:</b></label>
                                            <input type="text" class="form-control" v-model="form.sample_sub_date" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <h3>Add Elements Section-01:</h3>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">COLOR</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">SIZE</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">TYPE</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">QTY</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">
                                                <button type="button" @click="add_more_one()" class="btn btn-success" style="border-radius:5px !important;">
                                                    <i class="la la-plus"></i> ADD MORE</button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(lineOne,k) in form.lineOnes">
                                            <td><input type="text" v-model="lineOne.color" class="form-control"
                                                       required>
                                            </td>
                                            <td><input type="text" v-model="lineOne.size" class="form-control"
                                                       required>
                                            </td>
                                            <td><input type="text" v-model="lineOne.type" class="form-control"
                                                       required>
                                            </td>
                                            <td><input type="number" v-model="lineOne.qty" class="form-control"
                                                       required>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" @click="removeLineOne(k)" v-if="form.lineOnes.length != 1" required style="border-radius:25px !important;">
                                                    <i class="la la-close"></i> REMOVE
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <h3>Add Elements Section-02:</h3>
                                    <hr>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">Submitted To</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">PCS</th>
                                            <th style="background:#0082f1 !important; color:white; font-weight:bold; vertical-align:middle;">
                                                <button type="button" @click="add_more_two()" class="btn btn-success" style="border-radius:5px;"><i class="la la-plus"></i> ADD MORE</button>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(lineTwo,k) in form.lineTwos">
                                            <td><input type="text" v-model="lineTwo.submitted_to" class="form-control" required></td>
                                            <td><input type="text" v-model="lineTwo.pcs" class="form-control" required></td>
                                            <td>
                                                <button class="btn btn-danger" @click="removeLineTwo(k)" v-if="form.lineTwos.length != 1" required style="border-radius:25px;"><i class="la la-close"></i> REMOVE</button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-danger" style="border-radius:0px;"><i
                                    class="la la-check"></i> SUBMIT FORM
                                </button>
                            </div>
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
    mounted: function () {
        this.add_more_one();
        this.add_more_two();
    },
    data() {
        return {
            name: '',
            description: '',
            img: '',
            strSuccess: '',
            strError: '',
            imgPreview: null,
            form: {
                lineOnes: [],
                lineTwos: [],
                color: '',
                size: '',
                type: '',
                qty: '',
                submitted_to: '',
                pcs: '',
            },
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
    },
    methods: {
        add_more_one: function () {
            this.form.lineOnes.push({
                color: '',
                size: '',
                type: '',
                qty: ''
            })
        },
        add_more_two: function () {
            this.form.lineTwos.push({
                submitted_to: '',
                pcs: '',
            })
        },
        removeLineOne: function (index) {
            this.form.lineOnes.splice(index, 1);
        },
        removeLineTwo: function (index) {
            this.form.lineTwos.splice(index, 1);
        },
        formSubmit: function (e) {
            e.preventDefault();
            let currentObj = this;

            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('description', this.description);

            axios.post('/api/sample/requisition_store', {data: this.form})
            this.$swal({
                title: "DONE!!!",
                text: "SAMPLE REQUISITION INSERT SUCCESSFULLY!",
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
