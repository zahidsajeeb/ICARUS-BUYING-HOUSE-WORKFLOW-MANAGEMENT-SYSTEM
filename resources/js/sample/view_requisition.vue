<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">APPROVAL SAMPLE REQUISITION</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <form @submit.prevent="save_submission" enctype="multipart/form-data">
                        <table class="table table-bordered table-striped-columns" v-for="(post, index) in posts" :key="post.id">
                            <tr v-if="post.sample_sub_date_cadman==''">
                                <td><b>Sample Submission Date (Cad Manager):</b></td>
                                <td><input type="date" class="form-control" v-model="sample_sub_date_cadman"></td>
                                <td><button type="submit" class="btn btn-success"><i class="la la-check"></i> Submit</button></td>
                            </tr>
                            <tr v-if="post.sample_sub_date_cadman!=''">
                                <td><b>Sample Submission Date (Cad Manager):</b></td>
                                <td style="background:red; color:white;">{{ post.sample_sub_date_cadman }}</td>
                            </tr>
                        </table>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form @submit.prevent="save_pattern" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped-columns" v-for="(post, index) in posts" :key="post.id">
                                <tr v-if="post.sample_pattern_date==''">
                                    <td><b>Pattern Status Date (Cad Manager):</b></td>
                                    <td><input type="date" class="form-control" v-model="sample_pattern_date"></td>
                                    <td>
                                        <button type="submit" class="btn btn-success"><i class="la la-check"></i> Submit</button>
                                    </td>
                                </tr>
                                <tr v-if="post.sample_pattern_date!=''">
                                    <td><b>Pattern Status Date (Cad Manager):</b></td>
                                    <td style="background:red; color:white;">{{ post.sample_pattern_date }}</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped-columns" v-for="(post, index) in posts" :key="post.id">
                                <tr>
                                    <td><b>Tracking No:</b></td>
                                    <td colspan="2">{{ post.tracking_no }}</td>
                                    <td><b>Requisition Date:</b></td>
                                    <td colspan="2">{{ post.sample_req_date }}</td>
                                    <td><b>Buyer Name:</b></td>
                                    <td colspan="2">{{ post.buyer }}</td>
                                </tr>
                                <tr>
                                    <td><b>Style:</b></td>
                                    <td colspan="2">{{ post.style }}</td>
                                    <td><b>Fabric:</b></td>
                                    <td colspan="2">{{ post.fabric }}</td>
                                    <td><b>Color:</b></td>
                                    <td colspan="2">{{ post.color }}</td>
                                </tr>
                                <tr>
                                    <td><b>Item Description:</b></td>
                                    <td colspan="2">{{ post.item_desc }}</td>
                                    <td><b>Required Fabric Qty:</b></td>
                                    <td colspan="2">{{ post.req_fab_qty }}</td>
                                    <td><b>Original Sample:</b></td>
                                    <td colspan="2">{{ post.org_sample }}</td>
                                </tr>
                                <tr>
                                    <td><b>Type of Sample:</b></td>
                                    <td colspan="2">{{ post.type_of_sample }}</td>
                                    <td><b>Required Thread Qty:</b></td>
                                    <td colspan="2">{{ post.req_thread_qty }}</td>
                                    <td><b>Thread Handover Date:</b></td>
                                    <td colspan="2">{{ post.thread_handover_date }}</td>
                                </tr>
                                <tr>
                                    <td><b>Size Label:</b></td>
                                    <td colspan="2">{{ post.size_label }}</td>
                                    <td><b>Interlining:</b></td>
                                    <td colspan="2">{{ post.care_label }}</td>
                                    <td><b>Button:</b></td>
                                    <td colspan="2">{{ post.button }}</td>
                                </tr>
                                <tr>
                                    <td><b>Elastic:</b></td>
                                    <td colspan="2">{{ post.elastic }}</td>
                                    <td><b>Stickers:</b></td>
                                    <td colspan="2">{{ post.stickers }}</td>
                                    <td><b>Wash Type:</b></td>
                                    <td colspan="2">{{ post.wash_type }}</td>
                                </tr>
                                <tr>
                                    <td><b>Pocketing:</b></td>
                                    <td colspan="2">{{ post.pocketing }}</td>
                                    <td><b>Style:</b></td>
                                    <td colspan="2">{{ post.style }}</td>
                                    <td><b>Fabric:</b></td>
                                    <td colspan="2">{{ post.fabric }}</td>
                                </tr>
                                <tr>
                                    <td><b>Fabric Handover Date:</b></td>
                                    <td colspan="2">{{ post.fab_hand_date }}</td>
                                    <td><b>Tech Pack:</b></td>
                                    <td colspan="2">{{ post.tech_park }}</td>
                                    <td><b>Sewing Thread (Color):</b></td>
                                    <td colspan="2">{{ post.sewing_thread }}</td>
                                </tr>
                                <tr>
                                    <td><b>Required Thread Count:</b></td>
                                    <td colspan="2">{{ post.req_thread_count }}</td>
                                    <td><b>Main Label:</b></td>
                                    <td colspan="2">{{ post.main_label }}</td>
                                    <td><b>Care Label:</b></td>
                                    <td colspan="2">{{ post.care_label }}</td>
                                </tr>
                                <tr>
                                    <td><b>Zipper:</b></td>
                                    <td colspan="2">{{ post.zipper }}</td>
                                    <td><b>Twill Tape:</b></td>
                                    <td colspan="2">{{ post.twill_tape }}</td>
                                    <td><b>Hangtag:</b></td>
                                    <td colspan="2">{{ post.hangtag }}</td>
                                </tr>
                                <tr>
                                    <td><b>Fabric Shrinkage:</b></td>
                                    <td colspan="2">{{ post.fab_shrinkage }}</td>
                                    <td><b>Sewing Type:</b></td>
                                    <td colspan="2">{{ post.sewing_type }}</td>
                                    <td><b>Sample Submission Date:</b></td>
                                    <td>{{ post.sample_req_date }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>#</b></td>
                                <td><b>Color</b></td>
                                <td><b>Size</b></td>
                                <td><b>Type</b></td>
                                <td><b>Pcs</b></td>
                            </tr>
                            <tr v-for="(add_more_one, index) in add_more_ones" :key="add_more_one.id">
                                <td>{{ index + 1 }}.</td>
                                <td>{{ add_more_one.color }}</td>
                                <td>{{ add_more_one.size }}</td>
                                <td>{{ add_more_one.type }}</td>
                                <td>{{ add_more_one.qty }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered">
                            <tr>
                                <td><b>#</b></td>
                                <td><b>Submitted To</b></td>
                                <td><b>Pcs</b></td>
                            </tr>
                            <tr v-for="(add_more_two, index) in add_more_twos" :key="add_more_two.id">
                                <td>{{ index + 1 }}.</td>
                                <td>{{ add_more_two.submitted_to }}</td>
                                <td>{{ add_more_two.pcs }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '../components/sidebar.vue';
import Header from '../components/header.vue';
import Footer from '../components/footer.vue';

export default {
    components: {Sidebar, Header},
    data() {
        return {
            posts: [],
            add_more_ones: [],
            add_more_twos: [],
            sample_pattern_date: '',
            sample_sub_date_cadman: '',
        }
    },
    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/approval/${this.$route.params.id}`)
                .then(response => {
                    this.posts = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/sample_add_more_one_list`)
                .then(response => {
                    this.add_more_ones = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/sample_add_more_two_list`)
                .then(response => {
                    this.add_more_twos = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
    },
    methods: {
        save_submission(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                const formData = new FormData();
                formData.append('sample_sub_date_cadman', this.sample_sub_date_cadman);
                this.$axios.post(`/api/sample/add_submission_date/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Sample Submission Date Insert Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    this.$router.go();
                    existingObj.strError = "";
                    existingObj.strSuccess = response.data.success;
                })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        existingObj.strError = error.response.data.message;
                    });
            });
        },
        save_pattern(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                const formData = new FormData();
                formData.append('sample_pattern_date', this.sample_pattern_date);
                this.$axios.post(`/api/sample/add_pattern_date/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Sample Pattern Date Insert Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    this.$router.go();
                    existingObj.strError = "";
                    existingObj.strSuccess = response.data.success;
                })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        existingObj.strError = error.response.data.message;
                    });
            });
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
