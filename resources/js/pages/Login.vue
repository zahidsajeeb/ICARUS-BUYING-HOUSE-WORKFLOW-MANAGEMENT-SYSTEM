<template>
    <div class="container" style="padding: 70px 0;">
        <div class="row jutify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div v-if="error !== null" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>{{error}}</strong>
                </div>

                <div class="card card-default" style="border-radius:0px;">
                    <div class="card-header"><h5 style=" vertical-align: middle; display: table-cell; padding:10px; ">PORTAL LOGIN12</h5></div>
                    <div class="card-body">
                        <form>
                            <div class="form-group row" style="margin-bottom:20px">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control" v-model="email" required autofocus autocomplete="off" placeholder="Enter your email" style="border-radius: 0px">
                                </div>
                            </div>


                            <div class="form-group row mt-1" style="margin-bottom:20px">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control" v-model="password" required autocomplete="off" placeholder="Enter your password" style="border-radius: 0px">
                                </div>
                            </div>

                            <div class="form-group row mt-1 mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success" @click="handleSubmit" style="border-radius: 0px">
                                        Login
                                    </button>
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-md-8 offset-md-4">
                                    <small class="text-muted">
                                        Don't have any account yet? Please
                                        <router-link to="/register" >Register</router-link>
                                    </small>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: "",
                password: "",
                error: null
            }
        },

        methods: {
            handleSubmit(e) {
                e.preventDefault()
                if(this.password.length > 0) {
                    this.$axios.get('/sanctum/csrf-cookie').then(response => {
                        this.$axios.post('api/login', {
                            email: this.email,
                            password: this.password
                        })
                        .then(response => {
                            if (response.data.success) {
                                this.$router.go('/login')
                            } else {
                                this.error = response.data.message
                            }
                        })
                        .catch(function (error) {
                            console.error(error);
                        });
                    })
                }
            }
        },

        beforeRouteEnter(to, from, next) {
            if (window.Laravel.isLoggedin) {
                return next('dashboard');
            }
            next();
        }
    }
</script>
