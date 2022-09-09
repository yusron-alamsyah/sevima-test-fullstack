<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="<?php echo base_url(); ?>assets/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css"
        rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css"
        rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet"
        media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url(); ?>assets/admin/vendor/animsition/animsition.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css"
        rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/toast/toastr.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/loading/jquery.loading.min.css" rel="stylesheet"
        media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/admin/css/theme.css" rel="stylesheet" media="all">
</head>

<body class="animsition">
    <div id="page-load"
        style="position: absolute; z-index: 1500; opacity: 0.7;  background: white; width: 100%; height: 100%; display: none;  ">
        <div class="page-loader__spin">

        </div>
    </div>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap" id="form-login">
                    <div class="login-content">
                        <div class="login-logo">
                            <h2>
                                <img src="https://sevima.com/wp-content/themes/sevima2019/img/logo-sevima.png"
                                    alt="CoolAdmin" />
                            </h2>
                        </div>
                        <div class="login-form">
                            <form action="" method="post" onsubmit="return ajax_action_login();">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" id="username"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" id="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                </div>
                                <button id="btn-login" class="au-btn au-btn--block btn-danger m-b-20" type="submit">Sign
                                    in</button>
                                <div class="text-center">
                                    <span onclick="$('#form-register').fadeIn(); $('#form-login').hide();">
                                        Register Here
                                    </span>
                                </div>
                            </form>
                            <div id="alert_login">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="login-wrap" id="form-register" style="display: none;">
                    <div class="login-content">
                        <div class="login-logo">
                            <h2>
                                <img src="https://sevima.com/wp-content/themes/sevima2019/img/logo-sevima.png"
                                    alt="CoolAdmin" />
                            </h2>
                        </div>
                        <div class="login-form">
                            <div class="mb-4">
                                <h3><strong>Register</strong></h3>
                            </div>
                            <form method="post" id="form-add" onsubmit="return ajax_action_add();">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="au-input au-input--full" type="text" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                </div>
                                <button class="au-btn au-btn--block btn-danger m-b-20" type="submit">Register</button>
                                <button onclick="$('#form-login').fadeIn(); $('#form-register').hide();"
                                    class="au-btn au-btn--block btn-danger m-b-20" type="button">Back sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/toast/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/loading/jquery.loading.min.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>

    <script type="text/javascript">
    function ajax_action_login() {
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            url: "<?php echo base_url(); ?>/login/ajax_action_login/",
            type: 'POST',
            dataType: "json",
            data: {
                username: username,
                password: password,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            beforeSend: function() {
                $('#page-load').show();
            },
            success: function(data) {
                $('#page-load').hide();
                if (data.result) {
                    toastr["success"](data.message.body);
                    setTimeout(function() {
                        window.location = data.redirect
                    }, 500);
                } else {
                    toastr["error"](data.message.body);
                }

            },
            error: function(request, status, error) {
                $('#page-load').hide();
                toastr["error"]("Error, Please try again later");
            }
        });

        return false;
    }

    function ajax_action_add() {

        $.ajax({
            url: "<?php echo base_url() ?>login/ajax_action_add/",
            type: 'POST',
            dataType: "json",
            data: $("#form-add").serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=" +
                "<?php echo $this->security->get_csrf_hash(); ?>",
            beforeSend: function() {
                $('#page-load').show();
            },
            success: function(data) {
                $('#page-load').hide();
                if (data.result) {
                    toastr["success"](data.message.body);
                    document.getElementById("form-add").reset();
                    $('#form-login').fadeIn(); $('#form-register').hide();
                } else {
                    toastr["error"](data.message.body);
                }

            },
            error: function(request, status, error) {
                $('#page-load').hide();
                toastr["error"]("Error, Please try again later");
            }
        });

        return false;
    }
    </script>

</body>

</html>
<!-- end document-->