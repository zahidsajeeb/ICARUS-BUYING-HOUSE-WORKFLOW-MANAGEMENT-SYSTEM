<template>
    <div class="header">
        <!-- Logo -->
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="/backend/assets/img/logo.png" width="150" height="60" style="padding:5px;">
<!--                <img :src="image" width="120" height="40">-->
            </a>
        </div>
        <!-- /Logo -->
        <a id="toggle_btn" href="javascript:void(0);">
					<span class="bar-icon">
						<span></span>
						<span></span>
						<span></span>
					</span>
        </a>

        <!-- Header Title -->
        <div class="page-title-box">
            <h3>ICARUS INTERNAL APPLICATION PORTAL</h3>
        </div>
        <!-- /Header Title -->

        <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <!-- Search -->
            <li class="nav-item">
                <div class="top-nav-search">
                    <a href="javascript:void(0);" class="responsive-search">
                        <i class="fa fa-search"></i>
                    </a>
                    <form action="search.html">
                        <input class="form-control" type="text" placeholder="Search here">
                        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </li>
            <!-- /Search -->

            <!-- Flag -->
            <li class="nav-item dropdown has-arrow flag-nav">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">
                    <img src="/backend/assets/img/flags/us.png" height="20"> <span>English</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:void(0);" class="dropdown-item">
                        <img src="'/backend/assets/img/flags/us.png"  height="16"> English
                    </a>
                </div>
            </li>
            <!-- /Flag -->

            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img src="/backend/assets/img/profiles/avatar-21.jpg">
							<span class="status online"></span></span>
                    <span>{{ name }}</span>
                </a>
                <div class="dropdown-menu">
<!--                    <a class="dropdown-item" href="profile.html">My Profile</a>-->
<!--                    <a class="dropdown-item" href="settings.html">Settings</a>-->
                    <a class="dropdown-item" style="cursor: pointer;" @click="logout">Logout</a>
                </div>
            </li>
        </ul>
        <!-- /Header Menu -->

        <!-- Mobile Menu -->
        <div class="dropdown mobile-user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
<!--                <a class="dropdown-item" href="profile.html">My Profile</a>-->
<!--                <a class="dropdown-item" href="settings.html">Settings</a>-->
<!--                <a class="dropdown-item" href="login.html">Logout</a>-->
                <a class="dropdown-item" style="cursor: pointer;" @click="logout">Logout</a>
            </div>
        </div>
        <!-- /Mobile Menu -->

    </div>
</template>
<script>
export default {
    name: "header",
    data() {
        return {
            isLoggedIn: false,
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
            this.role = window.Laravel.user.role
        }
    },
    methods: {
        logout(e) {
            e.preventDefault()
            this.$axios.get('/sanctum/csrf-cookie').then(response => {
                this.$axios.post('/api/logout')
                    .then(response => {
                        if(response.data.success) {
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
}


</script>
