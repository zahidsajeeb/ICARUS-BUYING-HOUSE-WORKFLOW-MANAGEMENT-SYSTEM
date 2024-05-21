<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">PENDING SAMPLE REQUISITION</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border: 2px solid darkgrey !important;">
                            <div class="card-header" style="background:white !important;">
                                <h4 class="card-title mb-0" style="color:black;">Pending Requisition Lists</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="tableId" class="table table-stripped table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white;">#</th>
                                            <th style="background:#0082f1 !important; color:white;">Tracking ID</th>
                                            <th style="background:#0082f1 !important; color:white;">Buyer</th>
                                            <th style="background:#0082f1 !important; color:white;">Requisition Person</th>
                                            <th style="background:#0082f1 !important; color:white;">Requisition Date</th>
                                            <th style="background:#0082f1 !important; color:white;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center">{{ index + 1 }}.</td>
                                            <td>{{ post.tracking_no }}</td>
                                            <td>{{ post.buyer }}</td>
                                            <td>{{ post.Name }}</td>
                                            <td>{{ post.sample_req_date }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-sm" style="color:white;">
                                                    <i class="la la-check" style="color:white;"></i>
                                                    <router-link :to="{name:'approval', params: {id:post.id}}" style="color:white;"> Approval</router-link>
                                                </a> &nbsp;
                                                <a class="btn btn-sm btn-danger" style="color:white;" @click="deletePost(post.id)">
                                                    <i class="la la-trash" style="color:white;"></i> Delete
                                                </a>

                                                <!--<router-link :to="{name:'editpost', params: {id:post.id}}" class="btn btn-warning">Edit</router-link>-->
                                                <!--<button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>-->
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

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
            posts: [],
            name: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/sample')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#tableId').DataTable(
                                {
                                    pagingType: 'full_numbers',
                                    pageLength: 10,
                                    processing: true,
                                    dom: 'Bfrtip',
                                    buttons: ['copy', 'csv', 'print'
                                    ]
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
