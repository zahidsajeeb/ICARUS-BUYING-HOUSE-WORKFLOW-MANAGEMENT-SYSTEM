<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">SAMPLE REQUISITION (CAD SECTION)</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border: 2px solid darkgrey !important;">
                            <div class="card-header" style="background:white !important;">
                                <h4 class="card-title mb-0" style="color:black;">Requisition Lists (CAD SECTION)</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableId" class="table table-stripped table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Action</th>
                                            <th>Tracking ID</th>
                                            <th>Sample Making Status</th>
                                            <th>Sample Submission Date (Merchandiser)</th>
                                            <th>Sample Submission Date (Cad Manager)</th>
                                            <th>Buyer</th>
                                            <th>Requisition Person</th>
                                            <th>Requisition Date</th>
                                            <th>Approval Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center">{{ index + 1 }}.</td>
                                            <td v-if="post.sample_sub_date_cadman!='' && post.sample_pattern_date!=''" class="text-center">
                                                <a class="btn btn-success btn-sm" style="color:white; margin-right:5px;">
                                                    <i class="la la-check" style="color:white;"></i>
                                                    <router-link :to="{name:'view_requisition', params: {id:post.id}}" style="color:white;"> View Requisition</router-link>
                                                </a>
                                                <a v-if="post.sample_status_date=='' && post.sample_done_qty==''" class="btn btn-danger btn-sm" @click="edit(post)" style="color:white;"><i class="la la-close" style="color:white;"></i>Status Change</a>
                                                <a v-else class="btn btn-warning btn-sm" style="color:black;"><i class="la la-check-circle" style="color:white;"></i>Sample Done - {{ post.sample_status_date }}</a>
                                            </td>
                                            <td v-else class="text-center">
                                                <a class="btn btn-success btn-sm"
                                                   style="color:white; margin-right:5px;">
                                                    <i class="la la-check" style="color:white;"></i>
                                                    <router-link :to="{name:'view_requisition', params: {id:post.id}}"
                                                                 style="color:white;"> View Requisition
                                                    </router-link>
                                                </a> &nbsp;
                                            </td>
                                            <td>{{ post.tracking_no }}</td>
                                            <td>
                                              <span v-if="post.sample_sub_date_cadman=='' && post.sample_status=='' && post.sample_pattern_date!=''" class="badge badge-info"><i class="la la-sort-amount-up"></i> IN PROGRESS</span>
                                              <span v-if="post.sample_sub_date_cadman!='' && post.sample_status=='' && post.sample_pattern_date!=''" class="badge badge-primary"><i class="la la-arrow-up"></i> IN PROGRAM</span>
                                              <span v-if="post.sample_sub_date_cadman=='' && post.sample_status=='' && post.sample_pattern_date==''" class="badge bg-warning"><i class="la la-exclamation"></i> PENDING</span>
                                              <span v-if="post.sample_sub_date_cadman!='' && post.sample_status!='' && post.sample_pattern_date!=''" class="badge bg-success"><i class="la la-check"></i> DONE</span>
                                            </td>
                                            <td>{{ post.buyer }}</td>
                                            <td>{{ post.r_req_prs_name }}</td>
                                            <td>{{ post.approval_datetime }}</td>
                                            <td>{{ post.sample_sub_date }}</td>
                                            <td>{{ post.sample_sub_date_cadman }}</td>
                                            <td>{{ post.sample_sub_date_cadman }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Performance Indicator Modal -->
            <div id="user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Change Sample Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="form.id ? ChangeStatus() : createUser()">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Date:</label>
                                            <input type="date" v-model="sample_status_date" class="form-control"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Complete Sample Qty:</label>
                                            <input type="text" v-model="sample_done_qty" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Add Performance Indicator Modal -->
        </div>
    </div>
</template>
<script>
import Sidebar from '../components/sidebar.vue';
import Header from '../components/header.vue';
import Footer from '../components/footer.vue';

export default {
    name: "CadIndex",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            posts: [],
            name: null,
            form: {
                id: '',
                sample_status_date: '',
                sample_done_qty: '',
            },
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/sample/all_requisition')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#tableId').DataTable(
                                {
                                    pagingType: 'full_numbers',
                                    pageLength: 10,
                                    processing: true,
                                    dom: 'Bfrtip',
                                    buttons: ['copy', 'csv', 'print']
                                }
                            );
                        },
                        1000
                    )
                })
        }).catch(function (error) {
            console.log(error);
        });
    },
    methods: {
        edit(post) {
            // this.resetForm();
            $('#user').modal('show');
            this.form = post;
        },
        ChangeStatus() {
            const formData = new FormData();
            formData.append('sample_status_date', this.sample_status_date);
            formData.append('sample_done_qty', this.sample_done_qty);
            // axios.post('/api/sample/change_status/' + this.form.id, this.form)
            this.$axios.post(`/api/sample/change_status/${this.form.id}`, formData)
            $('#user').modal('hide');
            this.$swal({
                title: "Buyer Deleted Successfully!",
                text: "You clicked the button!",
                icon: "error"
            }).catch((error) => {
                console.log("Error.....");
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            })
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
