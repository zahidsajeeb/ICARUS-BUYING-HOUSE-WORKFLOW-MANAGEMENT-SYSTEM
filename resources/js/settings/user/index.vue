<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">ADMIN SECTION</h3>
                            <hr>
                        </div>
                    </div>
<!--                    <div>Welcome {{ name }}</div>-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:1px solid darkslategray !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-title mb-0" style="color:white; vertical-align:middle;">USER LIST:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-danger add-btn" data-toggle="modal"
                                           data-target="#add_indicator" @click="openModalWindow"
                                           style="border-radius:0px;"><i class="fa fa-plus"></i> ADD NEW USER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="user_list" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white;">#</th>
                                            <th style="background:#0082f1 !important; color:white;">Action</th>
                                            <th style="background:#0082f1 !important; color:white;">Full Name</th>
                                            <th style="background:#0082f1 !important; color:white;">Designation</th>
                                            <th style="background:#0082f1 !important; color:white;">Email</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center" style="vertical-align:middle;">{{ index + 1 }}.</td>
                                            <td class="text-center" style="vertical-align:middle;">
                                                <a v-if="post.role!='Superadmin'" class="btn btn-success btn-sm" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'edit_user', params: {id:post.id}}" style="color:white;">
                                                        <i class="la la-edit" style="color:white;"></i> Edit
                                                    </router-link>
                                                </a> &nbsp;
                                                &nbsp;<a v-if="post.role!='Superadmin'" class="btn btn-danger btn-sm" style="color:white;border-radius:0px;" @click="deletePost(post.id)"><i class="la la-trash" style="color:white;"></i> Delete</a>
                                            </td>
                                            <td>{{post.user_name}}</td>
                                            <td>{{post.designation}}</td>
                                            <td>{{post.email }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="user" class="modal fade" role="dialog">
                    <form ref="anyName" @submit="formSubmit" enctype="multipart/form-data">
                        <div class="modal-dialog" style="max-width:800px !important;">
                            <div class="modal-content">
                                <div class="modal-header" style="background:#0082f1 !important;">
                                    <button type="button" class="close" data-bs-dismiss="modal" style="color:white;">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" style="color:white;">Add user </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Name:</b></label>
                                                <input type="text" class="form-control" v-model="user_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>DESIGNATION:</b></label>
                                                <input type="text" class="form-control" v-model="designation" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>E-mail:</b></label>
                                                <input type="email" class="form-control" v-model="email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Password:</b></label>
                                                <input type="text" class="form-control" v-model="password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-danger btn-sm submit-btn"><i class="la la-check"></i> SAVE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Sidebar from '../../components/sidebar.vue';
import Header from '../../components/header.vue';
import Footer from '../../components/footer.vue';
export default {
    name: "Logo",
    components: {Footer, Header, Sidebar},
    data() {
        return {
            posts: [],
            name: '',
            file: '',
            success: ''
        }
    },
    created() {
        document.title = "user | Website Admin Panel";
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/settings/user_list')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#user_list').DataTable(
                                {
                                    "pagingType": 'full_numbers',
                                    "pageLength": 10,
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
            $('#user').modal('show');
        },
        get_product() {
            axios.get('/api/settings/user_list').then(response => this.posts = response.data)
        },
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if (response.data.success) {
                            window.location.href = "/"
                        }
                        else {
                            console.log(response);
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            })
        },
        onChange(e) {
            this.file = e.target.files[0];
        },
        formSubmit(e) {
            e.preventDefault();
            let existingObj = this;
            const config = {
                headers: {
                    'content-type': 'multipart/form-data'
                }
            }
            let data = new FormData();
            data.append('user_name', this.user_name);
            data.append('designation', this.designation);
            data.append('email', this.email);
            data.append('password', this.password);
            $('#user').modal('hide');
            axios.post('/api/settings/user_save', data, config)
            this.name = '';
            this.user_id = '';
            this.email = '';
            this.role = '';
            this.password = '';
            $('.modal-backdrop').remove();
            this.$swal({
                title: "User Insert Successfully !!!",
                text: "You clicked the button!",
                icon: "success",
                timer: 5000
            }).then(response => {
                this.get_product()
                this.$refs.anyName.reset();
                existingObj.strError = "";
                existingObj.strSuccess = response.data.success;
            }).catch(function (err) {
                existingObj.output = err;
            });
        },
        deletePost(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;
                if (confirm("Do you really want to delete this data?")) {
                    this.$axios.delete(`/api/settings/user_delete/${id}`)
                    this.$swal({
                        title: "user Deleted Successfully!",
                        text: "You clicked the button!",
                        icon: "error"
                    }).then(response => {
                        this.get_product()
                        let i = this.posts.map(item => item.id).indexOf(id);
                        this.posts.splice(i, 1);
                        existingObj.strError = "";
                        existingObj.strSuccess = response.data.success;

                    }).catch(function (error) {
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





