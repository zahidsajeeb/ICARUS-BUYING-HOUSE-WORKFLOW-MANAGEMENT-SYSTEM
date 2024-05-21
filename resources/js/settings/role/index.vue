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
                    <!--<div>Welcome {{ name }}</div>-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:1px solid darkslategray !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="card-title mb-0" style="color:white; vertical-align:middle;">ROLE LIST:</p>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-danger add-btn" data-toggle="modal"
                                           data-target="#add_indicator" @click="openModalWindow"
                                           style="border-radius:0px;"><i class="fa fa-plus"></i> ADD NEW ROLE</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="role_list" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white;">#</th>
                                            <th style="background:#0082f1 !important; color:white;">Action</th>
                                            <th style="background:#0082f1 !important; color:white;">Employee Name</th>
                                            <th style="background:#0082f1 !important; color:white;">Role</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center" style="vertical-align:middle;">{{ index + 1 }}.</td>
                                            <td class="text-center" style="vertical-align:middle;">
                                                &nbsp;<a class="btn btn-danger btn-sm" style="color:white;border-radius:0px;" @click="deletePost(post.id)"><i class="la la-trash" style="color:white;"></i> Delete</a>
                                            </td>
                                            <td>{{post.name}}</td>
                                            <td>{{post.role }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="role" class="modal fade" role="dialog">
                    <form ref="anyName" @submit="formSubmit" enctype="multipart/form-data">
                        <div class="modal-dialog" style="max-width:800px !important;">
                            <div class="modal-content">
                                <div class="modal-header" style="background:#0082f1 !important;">
                                    <button type="button" class="close" data-bs-dismiss="modal" style="color:white;">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" style="color:white;">Add User Role</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Employee Name :</b></label>
                                                <select v-model="user_id" class="form-control">
                                                    <option>-SELECT BUYER NAME-</option>
                                                    <option v-for="(user, index) in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="col-form-label"><b>Role:</b></label>
<!--                                                <div class="form-group" v-for="(role, index) in roles" :key="index">-->
<!--                                                    <input type="checkbox" v-model="role_name" value="role.role_name">-->
<!--                                                    <label for="">{{ role.role_name }}</label>-->
<!--                                                </div>-->
                                                <ul style="list-style:none;">
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Admin">
                                                            <span class="input-span"></span> Admin
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Merchandiser">
                                                            <span class="input-span"></span> Merchandiser Department
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Commercial">
                                                            <span class="input-span"></span> Commercial Department
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Fabric">
                                                            <span class="input-span"></span> Fabric Department
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Trims">
                                                            <span class="input-span"></span> Trims Department
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="ui-checkbox ui-checkbox-info ui-checkbox-inline">
                                                            <input type="checkbox" v-model="role_name" value="Production">
                                                            <span class="input-span"></span> Production Department
                                                        </label>
                                                    </li>
                                                </ul>

<!--                                                <select class="form-control" v-model="role_name" required>-->
<!--                                                    <option value="">-Select Role</option>-->
<!--                                                    <option value="admin">Admin</option>-->
<!--                                                    <option value="management">Management</option>-->
<!--                                                    <option value="merchandiser">Merchandiser Department </option>-->
<!--                                                    <option value="commercial">Commercial Department </option>-->
<!--                                                    <option value="fabric">Fabric Department </option>-->
<!--                                                    <option value="trims">Trims Department </option>-->
<!--                                                    <option value="production">Production Department </option>-->
<!--                                                </select>-->
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
            users: [],
            roles: [],
            role_name:[],
            name: '',
            file: '',
            success: ''
        }
    },
    created() {
        document.title = "role | Website Admin Panel";
        if (window.Laravel.role) {
            this.name = window.Laravel.role.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get('/api/settings/role_list')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#role_list').DataTable(
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

        this.$axios.get('/sanctum/csrf-cookie').then(response => {
             this.$axios.get(`/api/settings/user_list/`).then(response => {
                 this.users = response.data;
             }).catch(function (error) {
                console.log(error);
             });
             if (window.Laravel.user) {
                 this.name = window.Laravel.user.name
             }
         });
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/settings/role_name_list/`).then(response => {
                this.roles = response.data;
            }).catch(function (error) {
                console.log(error);
            });
            if (window.Laravel.user) {
                this.name = window.Laravel.user.name
            }
        });
    },
    methods: {
        openModalWindow() {
            $('#role').modal('show');
        },
        get_product() {
            axios.get('/api/settings/role_list').then(response => this.posts = response.data)
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
            data.append('user_id', this.user_id);
            data.append('role_name', this.role_name);
            $('#role').modal('hide');
            axios.post('/api/settings/role_save', data, config)
            this.user_id = '';
            this.role = '';
            $('.modal-backdrop').remove();
            this.$swal({
                title: "Role Insert Successfully !!!",
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
                    this.$axios.delete(`/api/settings/role_delete/${id}`)
                    this.$swal({
                        title: "role Deleted Successfully!",
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
