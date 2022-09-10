<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sevima - InstaApp</title>
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
    <link href="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"
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
    <link href="<?php echo base_url(); ?>assets/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/toast/toastr.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/loading/jquery.loading.min.css" rel="stylesheet"
        media="all">
    <link href="<?php echo base_url(); ?>assets/admin/vendor/datepicker/bootstrap-datetimepicker.min.css"
        rel="stylesheet" media="all">

    <link href="<?php echo base_url(); ?>assets/admin/krajee-bootstrap/css/fileinput.css" media="all" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">

    <!-- Main CSS-->
    <link href="<?php echo base_url(); ?>assets/admin/css/theme.css" rel="stylesheet" media="all">
    <!-- Jquery JS-->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/33.0.0/classic/ckeditor.js"></script>
</head>

<body class="">
    <div id="page-load"
        style="position: fixed; z-index: 999999; opacity: 0.7;  background: #757272; width: 100%; height: 100%; display: none;  ">
        <div class="page-loader__spin">
        </div>
    </div>
    <div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <?php 
        if (isset($form)) {
            $this->load->view($form); 
        } 
        ?>
    </div>


    <div class="page-wrapper">

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header">
                                <div class="logo">
                                    <a href="<?=base_url()?>login/home">
                                        <img src="https://sevima.com/wp-content/themes/sevima2019/img/logo-sevima.png"
                                            style="width:20%;" alt="Sevima" />
                                    </a>
                                </div>
                            </div>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="<?=base_url()?>login/logout/">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-card">
                                    <?php  $this->load->view($content); ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

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
<script src="<?php echo base_url(); ?>assets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/toast/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/loading/jquery.loading.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/krajee-bootstrap/js/fileinput.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/krajee-bootstrap/js/locales/LANG.js"></script>



<!-- Main JS-->
<script src="<?php echo base_url(); ?>assets/admin/js/main.js"></script>
<script type="text/javascript">
$('.select2').select2();
$(".datetime").datetimepicker({
    minView: 2,
    format: 'dd-mm-yyyy'
});
var csfrData = {};
csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
$.ajaxSetup({
    data: csfrData
});

let editor;

ClassicEditor
    .create(document.querySelector('#editor'))
    .then(newEditor => {
        editor = newEditor;
    })
    .catch(error => {
        console.error(error);
    });

$("#gambar").fileinput({
    'showUpload': false,
    'previewFileType': 'image',
    'required': true,
    'allowedFileTypes': ['image']
});
</script>

</html>