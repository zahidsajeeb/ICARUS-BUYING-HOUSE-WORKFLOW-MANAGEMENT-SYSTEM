<template>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        <Header></Header>
        <!-- /Header -->
        <!-- Sidebar -->
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">ADD BUYER</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--                    <div class="col-md-6">-->
                    <!--                        <div class="card">-->
                    <!--                            <div class="card-header" style="background:ivory;">-->
                    <!--                                <h4 class="card-title mb-0" style="color:black;">Buyer Add Form</h4>-->
                    <!--                            </div>-->
                    <!--                            <div class="card-body">-->
                    <!--                                <form @submit.prevent="addPost" enctype="multipart/form-data">-->
                    <!--                                    <div class="row">-->
                    <!--                                        <div class="col-xl-8">-->
                    <!--                                            <div class="form-group row">-->
                    <!--                                                <label class="col-lg-3 col-form-label"><b>BUYER NAME:</b></label>-->
                    <!--                                                <div class="col-lg-9">-->
                    <!--                                                    <input type="text" v-model="buyer_name" class="form-control"-->
                    <!--                                                           required>-->
                    <!--                                                </div>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                        <div class="col-xl-4">-->
                    <!--                                            <div class="form-group row">-->
                    <!--                                                <button type="submit" class="btn btn-primary"-->
                    <!--                                                        style="border-radius:0px;"><i class="la la-check"></i> Submit-->
                    <!--                                                </button>-->
                    <!--                                            </div>-->
                    <!--                                        </div>-->
                    <!--                                    </div>-->
                    <!--                                </form>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background:ivory;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="card-title mb-0" style="color:black;">Buyer Lists</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <!--                                        <a data-toggle="modal" data-target="#user" style="float:right;cursor: pointer; color: black; padding: 2px; border-radius:0px;" @click="openModalWindow" class="btn btn-success py-0">-->
                                        <!--                                            <i class="fa fa-plus-square"> Add</i>-->
                                        <!--                                        </a>-->
                                        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_indicator"
                                           @click="openModalWindow" style="border-radius:0px;"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="buyer_list" class="table table-stripped table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Buyer ID</th>
                                            <th>Buyer Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center">{{ index + 1 }}.</td>
                                            <td>{{ post.id }}</td>
                                            <td>{{ post.buyer_name }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-success" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'edit_buyer', params: {id:post.id}}" style="color:white;"><i class="la la-edit" style="color:white;"></i> Edit</router-link>
                                                </a> &nbsp;
                                                <a class="btn btn-danger" style="color:white;border-radius:0px;" @click="deletePost(post.id)"><i class="la la-trash" style="color:white;"></i> Delete</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
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
                                <h5 class="modal-title">Add New Buyer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="addPost" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label">Buyer Name:</label>
                                                <input type="text" v-model="buyer_name" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Add Performance Indicator Modal -->
            </div>
        </div>
        <!-- /Page Wrapper -->

    </div>
    <!-- /Main Wrapper -->

        <div>Welcome {{ name }}</div>
</template>

<script>
import Sidebar from '../components/sidebar.vue';
import Header from '../components/header.vue';
import Footer from '../components/footer.vue';

export default {
    name: "User",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            posts: [],
            name: null,
            buyer_name: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/sample/buyer_list')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#buyer_list').DataTable(
                                {
                                    "pagingType": 'full_numbers',
                                    "pageLength": 50,
                                }
                            );
                        },
                        1000
                    )
                })
        }).catch(function (error) {
            console.log(error);
        })
    },
    methods: {
        openModalWindow() {
            // this.resetForm();
            $('#user').modal('show');
        },
        get_product() {
            axios.get('/api/sample/buyer_list')
                .then(response => this.posts = response.data)
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
        },
        addPost(e) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }

                const formData = new FormData();
                formData.append('buyer_name', this.buyer_name);
                this.$axios.post('/api/sample/buyer_save', formData, config)
                $('#user').modal('hide');
                $('.modal-backdrop').remove();
                this.$swal({
                    title: "Buyer Information Insert Successfully !!!",
                    text: "You clicked the button!",
                    icon: "success"
                }).then(response => {
                    this.get_product()
                    this.buyer_name = '';
                    // this.$router.go('/buyer')
                    existingObj.strError = "";
                    existingObj.strSuccess = response.data.success;
                })
                    .catch(function (error) {
                        existingObj.strSuccess = "";
                        // existingObj.strError = error.response.data.message;
                    });
            });
        },
        deletePost(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;

                if (confirm("Do you really want to delete this data?")) {
                    this.$axios.delete(`/api/sample/buyer_delete/${id}`)
                    this.$swal({
                        title: "Buyer Deleted Successfully!",
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
