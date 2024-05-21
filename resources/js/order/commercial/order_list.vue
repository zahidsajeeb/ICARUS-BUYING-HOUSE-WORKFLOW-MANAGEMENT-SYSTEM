<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">COMMERCIAL SECTION:</h3>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="border:1px solid darkslategray !important;">
                            <div class="card-header" style="background:darkslategray !important; border-bottom:1px solid darkslategray !important;">
                                <h1 class="card-title mb-0" style="color:white; text-align:left; font-size:16px !important;">ORDER LIST:</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="order_list" class="table table-stripped table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th style="background:#0082f1 !important; color:white;">#</th>
                                            <th style="background:#0082f1 !important; color:white; text-align:center;">Action</th>
                                            <th style="background:#0082f1 !important; color:white;">Order No</th>
                                            <th style="background:#0082f1 !important; color:white;">Buyer</th>
                                            <th style="background:#0082f1 !important; color:white;">Order Confirm Date</th>
                                            <th style="background:#0082f1 !important; color:white;">FACTORY</th>
                                            <th style="background:#0082f1 !important; color:white;">L/C NUMBER</th>
                                            <th style="background:#0082f1 !important; color:white;">DESCRIPTION</th>
                                            <th style="background:#0082f1 !important; color:white;">SHIPMENT DATE</th>
                                            <th style="background:#0082f1 !important; color:white;">SHIPMENT DATE (AFTER EXT)</th>
                                            <th style="background:#0082f1 !important; color:white;">ORDER QTY</th>
                                            <th style="background:#0082f1 !important; color:white;">PI TO BUYER DATE</th>
                                            <th style="background:#0082f1 !important; color:white;">SC/LC TO FTY DATE</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center">{{ index + 1 }}.</td>
                                            <td class="text-center">
                                                <a v-if="post.commercial_id==0" class="btn btn-success btn-sm" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'fabric_order', params: {id:post.id}}" style="color:white;">
                                                        <i class="la la-plus" style="color:white;"></i> Order Entry
                                                    </router-link>
                                                </a> &nbsp;
                                                <a v-if="post.commercial_id!=0" class="btn btn-warning btn-sm" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'edit_commercial_order', params: {id:post.id}}" style="color:white;">
                                                        <i class="la la-edit" style="color:white;"></i> Order Edit
                                                    </router-link>
                                                </a> &nbsp;
                                                <a v-if="post.commercial_id!=0" class="btn btn-danger btn-sm" style="color:white;border-radius:0px;" @click="deletePost(post.id)"><i class="la la-trash" style="color:white;"></i> Delete</a>
                                            </td>
                                            <td>{{ post.order_no }}</td>
                                            <td>{{ post.buyer_name }}</td>
                                            <td>{{ post.order_confirm_date }}</td>
                                            <td>{{ post.factory }}</td>
                                            <td>{{ post.lc_no }}</td>
                                            <td>{{ post.description }}</td>
                                            <td>{{ post.shipment_date }}</td>
                                            <td>{{ post.shipment_date_after_ext }}</td>
                                            <td>{{ post.order_qty }}</td>
                                            <td>{{ post.pi_to_buyer_date }}</td>
                                            <td>{{ post.lc_to_fty_date }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    </div>
</template>
<script>
import Sidebar from '../../components/sidebar.vue';
import Header from '../../components/header.vue';
import Footer from '../../components/footer.vue';

export default {
    name: "OrderList",
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
            this.$axios.get('/api/order/order_list')
                .then(response => {
                    this.posts = response.data;
                    setTimeout(function () {
                            $('#order_list').DataTable(
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
            axios.get('/api/order/order_list')
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
                }).catch(function (error) {
                    existingObj.strSuccess = "";
                    // existingObj.strError = error.response.data.message;
                });
            });
        },
        deletePost(id) {
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                let existingObj = this;

                if (confirm("Do you really want to delete this data?")) {
                    this.$axios.delete(`/api/order/order_delete/${id}`)
                    this.$swal({
                        title: "Commercial Order Information Deleted Successfully!",
                        text: "You clicked the button!",
                        icon: "error"
                    }).then(response => {
                        this.get_product()
                        this.$router.go('/commercial_order_list')
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
