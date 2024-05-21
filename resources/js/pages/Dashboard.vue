<template>
    <div class="main-wrapper">
        <Header></Header>
        <Sidebar></Sidebar>
        <div class="page-wrapper">
            <div class="content container-fluid">
<!--                <div class="page-header">-->
<!--                    <div class="row">-->
<!--                        <div class="col-sm-12">-->
<!--                            <h3 class="page-title">Welcome Admin!</h3>-->
<!--                            <ul class="breadcrumb">-->
<!--                                <li class="breadcrumb-item active">Dashboard</li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <h1 style="text-align:center;">WELCOME TO, ICARUS SOFTWARE PANEL</h1>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="row">-->
<!--                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">-->
<!--                        <div class="card dash-widget">-->
<!--                            <div class="card-body">-->
<!--                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>-->
<!--                                <div class="dash-widget-info">-->
<!--                                    <h3>112</h3>-->
<!--                                    <span>Projects</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">-->
<!--                        <div class="card dash-widget">-->
<!--                            <div class="card-body">-->
<!--                                <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>-->
<!--                                <div class="dash-widget-info">-->
<!--                                    <h3>44</h3>-->
<!--                                    <span>Clients</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">-->
<!--                        <div class="card dash-widget">-->
<!--                            <div class="card-body">-->
<!--                                <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>-->
<!--                                <div class="dash-widget-info">-->
<!--                                    <h3>37</h3>-->
<!--                                    <span>Tasks</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">-->
<!--                        <div class="card dash-widget">-->
<!--                            <div class="card-body">-->
<!--                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>-->
<!--                                <div class="dash-widget-info">-->
<!--                                    <h3>218</h3>-->
<!--                                    <span>Employees</span>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
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
            name: null,
        }
    },
    created() {
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
        }
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
