<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">TRIMS SECTION:</h3>
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
                                            <th style="background:#0082f1 !important; color:white;">FUSING</th>
                                            <th style="background:#0082f1 !important; color:white;">ZIPPER (PLAN)</th>
                                            <th style="background:#0082f1 !important; color:white;">ZIPPER (ACTUAL)</th>
                                            <th style="background:#0082f1 !important; color:white;">SWING THREAD (PLAN)</th>
                                            <th style="background:#0082f1 !important; color:white;">SWING THREAD (ACTUAL)</th>
                                            <th style="background:#0082f1 !important; color:white;">PRINT/EMB (PLAN)</th>
                                            <th style="background:#0082f1 !important; color:white;">PRINT/EMB (ACTUAL)</th>
                                            <th style="background:#0082f1 !important; color:white;">BUTTON</th>
                                            <th style="background:#0082f1 !important; color:white;">RIVET</th>
                                            <th style="background:#0082f1 !important; color:white;">MAIN LABEL</th>
                                            <th style="background:#0082f1 !important; color:white;">SIZE LABEL</th>
                                            <th style="background:#0082f1 !important; color:white;">CARE LABEL</th>
                                            <th style="background:#0082f1 !important; color:white;">OTHER LABEL</th>
                                            <th style="background:#0082f1 !important; color:white;">BACK PATCH/METAL PLAQUE</th>
                                            <th style="background:#0082f1 !important; color:white;">HANG TAG</th>
                                            <th style="background:#0082f1 !important; color:white;">STRETCH TAG</th>
                                            <th style="background:#0082f1 !important; color:white;">WAIST TAG</th>
                                            <th style="background:#0082f1 !important; color:white;">PRICE TAG/STICKER POLY STICKER CTN  STICKER (PRICE)</th>
                                            <th style="background:#0082f1 !important; color:white;">PRICE TAG/STICKER POLY STICKER CTN  STICKER (POLY)</th>
                                            <th style="background:#0082f1 !important; color:white;">PRICE TAG/STICKER POLY STICKER CTN  STICKER (CTN)</th>
                                            <th style="background:#0082f1 !important; color:white;">HANGER/SIZER (PLAN)</th>
                                            <th style="background:#0082f1 !important; color:white;">HANGER/SIZER (ACTUAL)</th>
                                            <th style="background:#0082f1 !important; color:white;">SINGLE POLY/BLISTER POLY</th>
                                            <th style="background:#0082f1 !important; color:white;">CARTON</th>
                                            <th style="background:#0082f1 !important; color:white;">REMARKS</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(post, index) in posts" :key="post.id">
                                            <td class="text-center">{{ index + 1 }}.</td>
                                            <td class="text-center">
                                                <a v-if="post.trims_id==0" class="btn btn-success btn-sm" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'trims_order_form', params: {id:post.id}}" style="color:white;">
                                                        <i class="la la-plus" style="color:white;"></i> Order Entry
                                                    </router-link>
                                                </a> &nbsp;
                                                <a v-else class="btn btn-warning btn-sm" style="color:white;background:darkgreen;border-radius:0px;">
                                                    <router-link :to="{name:'edit_trims_order', params: {id:post.id}}" style="color:white;">
                                                        <i class="la la-edit" style="color:white;"></i> Order Edit
                                                    </router-link>
                                                </a>
                                                <!--                                                <a class="btn btn-danger" style="color:white;border-radius:0px;" @click="deletePost(post.id)"><i class="la la-trash" style="color:white;"></i> Delete</a>-->
                                            </td>
                                            <td>{{ post.order_no }}</td>
                                            <td>{{ post.fusing }}</td>
                                            <td>{{ post.zipper_plan }}</td>
                                            <td>{{ post.zipper_actual }}</td>
                                            <td>{{ post.zipper_actual }}</td>
                                            <td>{{ post.swing_thread_actual }}</td>
                                            <td>{{ post.print_plan }}</td>
                                            <td>{{ post.print_actual }}</td>
                                            <td>{{ post.button }}</td>
                                            <td>{{ post.rivet }}</td>
                                            <td>{{ post.main_label }}</td>
                                            <td>{{ post.size_label }}</td>
                                            <td>{{ post.care_label }}</td>
                                            <td>{{ post.other_label }}</td>
                                            <td>{{ post.back_patch }}</td>
                                            <td>{{ post.hang_tag }}</td>
                                            <td>{{ post.stretch_tag }}</td>
                                            <td>{{ post.waist_tag }}</td>
                                            <td>{{ post.price }}</td>
                                            <td>{{ post.poly }}</td>
                                            <td>{{ post.ctn }}</td>
                                            <td>{{ post.hanger_plan }}</td>
                                            <td>{{ post.hanger_actual }}</td>
                                            <td>{{ post.single_poly }}</td>
                                            <td>{{ post.carton }}</td>
                                            <td>{{ post.trims_remarks }}</td>
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
