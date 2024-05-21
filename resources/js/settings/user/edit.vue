<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">ADMIN SECTION:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:2px solid darkgrey !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <h1 class="card-title mb-0" style="color:white; text-align:left; font-size:16px !important;">USER EDIT:</h1>
                            </div>
                            <div class="card-body">
                                <form enctype="multipart/form-data" @submit="formSubmit">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left;background:#e9ecef;">EMPLOYEE NAME:</td>
                                            <td colspan="2" style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="user_name" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">DESIGNATION:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="designation" required>
                                            </td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">EMPLOYEE EMAIL:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="email" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">OLD PASSWORD:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="confirm_password" readonly></td>
                                            <td style="vertical-align:middle; text-align:left; background:#e9ecef;">NEW PASSWORD:</td>
                                            <td style="vertical-align:middle; text-align:center;"><input type="text" class="form-control" v-model="password">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <button type="submit" class="btn btn-danger pull-right" style="border-radius:0px;"><i class="la la-check"></i> UPDATE FORM</button>
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
            user_name: '',
            email: '',
            confirm_password: '',
            password: '',
            designation: '',
            strSuccess: '',
            strError: '',
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/settings/user_edit/${this.$route.params.id}`)
                .then(response => {
                    this.user_name = response.data['user_name'];
                    this.email  = response.data['email'];
                    this.confirm_password = response.data['confirm_password'];
                    this.designation = response.data['designation'];
                    this.role = response.data['role'];
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
                formData.append('user_name', this.user_name);
                formData.append('email', this.email);
                formData.append('password', this.password);
                formData.append('designation', this.designation);
                this.$axios.post(`/api/settings/user_update/${this.$route.params.id}`, formData, config)
                this.$swal({
                    title: "User Information Update Successfully !!!",
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
        // logout(e) {
        //     e.preventDefault()
        //     this.$axios.get('/sanctum/csrf-cookie').then(response => {
        //         this.$axios.post('/api/logout')
        //             .then(response => {
        //                 if (response.data.success) {
        //                     window.location.href = "/"
        //                 } else {
        //                     console.log(response);
        //                 }
        //             })
        //             .catch(function (error) {
        //                 console.error(error);
        //             });
        //     })
        // }
    },
    // beforeRouteEnter(to, from, next) {
    //     if (!window.Laravel.isLoggedin) {
    //         window.location.href = "/";
    //     }
    //     next();
    // }
}
</script>

