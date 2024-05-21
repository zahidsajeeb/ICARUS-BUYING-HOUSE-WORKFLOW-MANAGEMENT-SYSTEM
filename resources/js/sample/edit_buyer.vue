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
                            <h3 class="page-title">EDIT BUYER</h3>
                            <a class="btn btn-success" style="color:white;background:darkgreen;border-radius:0px;">
                                <router-link to="/buyer" class="nav-item nav-link" style="color:white;"><i class="la la-plus" style="color:white;"></i> <span> Back to Previous Page</span></router-link>
                            </a>
                            <hr>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header" style="background:darkslategray;">
                                <h4 class="card-title mb-0" style="color:white;">Edit Buyer Form</h4>
                            </div>
                            <div class="card-body">
                                <form @submit.prevent="updatePost" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="form-group row">
                                                <label class="col-lg-3 col-form-label"><b>Buyer Name:</b></label>
                                                <div class="col-lg-9">
                                                    <input type="text" v-model="buyer_name" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary"><i class="la la-send"></i> Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '../components/sidebar.vue';
import Header from '../components/header.vue';
import Footer from '../components/footer.vue';
export default{
    components: {Sidebar, Header},
    data() {
        return {
            id:'',
            buyer_name: '',
            strSuccess: '',
            strError: '',
        }
    },

    created() {
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/sample/buyer_edit/${this.$route.params.id}`)
                .then(response => {
                    this.buyer_name = response.data['buyer_name'];
                })
                .catch(function(error) {
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
                    .catch(function(error) {
                        existingObj.strSuccess ="";
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

