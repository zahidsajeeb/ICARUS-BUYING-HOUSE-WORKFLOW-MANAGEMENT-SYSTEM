<template>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul style="display:block !important;">
                    <li>
                        <router-link to="/dashboard" active-class="active" exact class="nav-item nav-link"><i class="la la-home"></i><span> Home</span></router-link>
                    </li>
                    <li v-if="role.match('Admin')"><router-link to="/settings/user" active-class="active" exact class="nav-item nav-link"><i class="la la-gear"></i><span> User</span></router-link></li>
                    <li v-if="role.match('Admin')"><router-link to="/settings/role" active-class="active" exact class="nav-item nav-link"><i class="la la-gear"></i><span> Role</span></router-link></li>
                    <li v-if="role.match('Admin')"><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="la la-gear"></i><span> Buyer</span></router-link></li>
                    <li v-if="role.match('Admin')"><router-link to="/order_report" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order Report</span></router-link></li>

                    <li v-if="role.match('Commercial')" class="submenu">
                        <a href="javascript:void(0);"><i class="las la-bars"></i><span> Commercial Order Section</span><span class="menu-arrow"></span></a>
                        <ul style="display:block !important;">
                            <li><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Buyer</span></router-link></li>
                            <li><router-link to="/commercial_order" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order Form</span></router-link></li>
                            <li><router-link to="/commercial_order_list" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order List</span></router-link></li>
                        </ul>
                    </li>
                    <li v-if="role.match('Fabric')" class="submenu">
                        <a href="javascript:void(0);"><i class="las la-bars"></i><span> Fabric Order Section</span><span class="menu-arrow"></span></a>
                        <ul style="display:block !important;">
                            <li><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Buyer</span></router-link></li>
                            <li><router-link to="/fabric_order_list" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order List</span></router-link></li>
                        </ul>
                    </li>
                    <li v-if="role.match('Trims')" class="submenu">
                        <a href="javascript:void(0);"><i class="las la-bars"></i><span> Trims Order Section</span><span class="menu-arrow"></span></a>
                        <ul style="display:block !important;">
                            <li><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Buyer</span></router-link></li>
                            <li><router-link to="/trims_order_list" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order List</span></router-link></li>
                        </ul>
                    </li>
                    <li v-if="role.match('Merchandiser')" class="submenu">
                        <a href="javascript:void(0);"><i class="las la-bars"></i><span> Merchandiser Order Section</span><span class="menu-arrow"></span></a>
                        <ul style="display:block !important;">
                            <li><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Buyer</span></router-link></li>
                            <li><router-link to="/merchant_order_list" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order List</span></router-link></li>
                        </ul>
                    </li>
                    <li v-if="role.match('Production')" class="submenu">
                        <a href="javascript:void(0);"><i class="las la-bars"></i><span> Production Order Section</span><span class="menu-arrow"></span></a>
                        <ul style="display:block !important;">
                            <li><router-link to="/settings/buyer" active-class="active" exact class="nav-item nav-link"><i class="la la-gear"></i><span> Buyer</span></router-link></li>
                            <li><router-link to="/production_order_list" active-class="active" exact class="nav-item nav-link"><i class="las la-chevron-right"></i><span> Order List</span></router-link></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "header",
    data() {
        return {
            isLoggedIn: false,
            users: [],
            role:'',
        }
    },
    created() {
        if (window.Laravel.isLoggedin) {
            this.isLoggedIn = true
        }
        if (window.Laravel.user) {
            this.name = window.Laravel.user.name
            // this.role = window.Laravel.user.role
        }
        this.$axios.get('/sanctum/csrf-cookie').then(response => {
            this.$axios.get(`/api/settings/get_user_role/`).then(response => {
                this.role = response.data['role'];

            }).catch(function (error) {
                console.log(error);
            });
            if (window.Laravel.user) {
                this.name = window.Laravel.user.name
            }
        });
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
