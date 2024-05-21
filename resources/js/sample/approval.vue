<template>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <Header></Header>
        <!-- /Header -->

        <!-- Sidebar -->
        <Sidebar></Sidebar>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">

                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">APPROVAL SAMPLE REQUISITION</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
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
                                <tr>
                                    <td colspan="8">
                                        <a href="#"  @click="deletePost(post.id)" class="btn btn-success btn-lg">Approve</a> &nbsp;
                                        <a href="#" class="btn btn-warning btn-lg">Hold</a> &nbsp;
                                        <a href="#" class="btn btn-danger btn-lg">Reject</a>
                                    </td>
                                </tr>
                            </table>
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
    components: {Sidebar, Header},
    data() {
        return {
            posts: [],
            // id: '',
            // tracking_no: '',
            // buyer: '',
            // style: '',
            // item_desc: '',
            // fabric: '',
            // color: '',
            // req_fab_qty: '',
            // fab_hand_date: '',
            // org_sample: '',
            // tech_park: '',
            // type_of_sample: '',
            // sample_size: '',
            // sample_qty: '',
            // sample_req_date: '',
            // sewing_thread: '',
            // req_thread_count: '',
            // req_thread_qty: '',
            // thread_handover_date: '',
            // main_label: '',
            // size_label: '',
            // care_label: '',
            // interlining: '',
            // zipper: '',
            // button: '',
            // twill_tape: '',
            // elastic: '',
            // hangtag: '',
            // stickers: '',
            // fab_shrinkage: '',
            // wash_type: '',
            // sewing_type: '',
            // pocketing: '',
            // sample_sub_date: '',
            // strSuccess: '',
            // strError: '',
        }
    },

    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/approval/${this.$route.params.id}`)
                .then(response => {
                    this.posts = response.data;
                    // this.tracking_no = response.data['tracking_no'];
                    // this.buyer = response.data['buyer'];
                    // this.style = response.data['style'];
                    // this.item_desc = response.data['item_desc'];
                    // this.fabric = response.data['fabric'];
                    // this.color = response.data['color'];
                    // this.req_fab_qty = response.data['req_fab_qty'];
                    // this.fab_hand_date = response.data['fab_hand_date'];
                    // this.org_sample = response.data['org_sample'];
                    // this.tech_park = response.data['tech_park'];
                    // this.type_of_sample = response.data['type_of_sample'];
                    // this.sample_size = response.data['sample_size'];
                    // this.sample_qty = response.data['sample_qty'];
                    // this.sample_req_date = response.data['sample_req_date'];
                    // this.sewing_thread = response.data['sewing_thread'];
                    // this.req_thread_count = response.data['req_thread_count'];
                    // this.req_thread_qty = response.data['req_thread_qty'];
                    // this.thread_handover_date = response.data['thread_handover_date'];
                    // this.main_label = response.data['main_label'];
                    // this.size_label = response.data['size_label'];
                    // this.care_label = response.data['care_label'];
                    // this.interlining = response.data['interlining'];
                    // this.zipper = response.data['zipper'];
                    // this.button = response.data['button'];
                    // this.twill_tape = response.data['twill_tape'];
                    // this.elastic = response.data['elastic'];
                    // this.hangtag = response.data['hangtag'];
                    // this.stickers = response.data['stickers'];
                    // this.fab_shrinkage = response.data['fab_shrinkage'];
                    // this.wash_type = response.data['wash_type'];
                    // this.sewing_type = response.data['sewing_type'];
                    // this.pocketing = response.data['pocketing'];
                    // this.sample_sub_date = response.data['sample_sub_date'];
                })
                .catch(function (error) {
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
                formData.append('buyer_name', this.buyer_name);
                this.$axios.post(`/api/sample/buyer_update/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "Buyer Information Update Successfully !!!",
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
        deletePost(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;

                if (confirm("Do you really want to delete this data?")) {
                    this.$axios.delete(`/api/sample/approve/${id}`)
                    this.$swal({
                        title: "Requisition Approve Successfully !!!!",
                        text: "You clicked the button!",
                        icon: "error"
                    }).then(response => {
                        this.get_product()

                        let i = this.posts.map(item => item.id).indexOf(id);
                        this.posts.splice(i, 1);
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;

                    })
                        .catch(function (error) {
                            existingObj.strError = "";
                            existingObj.strSuccess = error.response.data.message;
                        });
                }
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
