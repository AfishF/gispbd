<!DOCTYPE html>
<html>

<?php $this->load->view('templates/_partials/header.php') ?>

<body class="bg-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex" style="padding-left: 0px;  padding-right: 0px;">
                                <div class="bg-dark flex-grow-1 align-items-center bg-login-image" style="background-image: url(&quot;assets/img/pemalang.png&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5" style="height: 535px;">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="height: 49px;">Welcome Back!</h4>
                                    </div>
                                    <form class="user" style="height: 279px;">
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password"></div>
                                        <hr><button class="btn btn-primary btn-block text-white btn-user" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center"></div>
                                    <div class="text-center"></div><a class="small" href="<?= base_url('register'); ?> ">Create an Account!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/_partials/footer'); ?>
</body>

</html>