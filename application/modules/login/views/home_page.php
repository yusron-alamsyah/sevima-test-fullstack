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

     <link href="<?php echo base_url(); ?>assets/admin/krajee-bootstrap/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

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
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?=base_url()?>login/home">
                            <img src="https://sevima.com/wp-content/themes/sevima2019/img/logo-sevima.png" style="width:50%;" alt="Sevima" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub <?php if($this->uri->segment(1)=="login"){ echo "active"; } ?>">
                            <a class="js-arrow" href="<?=base_url()?>login/home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="user"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>user">
                                <i class="fas fa-user"></i>User</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="customer"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>customer">
                                <i class="fas fa-users"></i>Customer</a>
                        </li>
                        <li
                            class="has-sub <?php if($this->uri->segment(1)=="product" or $this->uri->segment(1)=="product" or $this->uri->segment(1)=="product_type"){ echo "active"; } ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-archive"></i>Management Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?php if($this->uri->segment(1)=="product"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>product">Product</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="kategori"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>kategori">Category</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub <?php if($this->uri->segment(1)=="supplier"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>supplier">
                                <i class="fas fa-truck"></i>Supplier</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="sales"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>sales">
                                <i class="fas fa-shopping-cart"></i>Sales</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="reports" ){ echo "active"; } ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Reports</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?php if($this->uri->segment(2)=="category"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>post/category">Category</a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="<?=base_url()?>login/home">
                    <img src="https://sevima.com/wp-content/themes/sevima2019/img/logo-sevima.png" style="width:50%;" alt="Sevima" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="has-sub <?php if($this->uri->segment(1)=="login"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>login/home">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="user"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>user">
                                <i class="fas fa-user"></i>User</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="customer"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>customer">
                                <i class="fas fa-users"></i>Customer</a>
                        </li>
                        <li
                            class="has-sub <?php if($this->uri->segment(1)=="produk" or $this->uri->segment(1)=="kategori"){ echo "active"; } ?>">
                            <a class="js-arrow " href="#">
                                <i class="fas fa-archive"></i>Management Product</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?php if($this->uri->segment(1)=="produk"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>produk">Product</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="kategori"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>kategori">Category</a>
                                </li>
                            </ul>
                        </li>

                        <li class="has-sub <?php if($this->uri->segment(1)=="supplier"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>supplier">
                                <i class="fas fa-truck"></i>Supplier</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="penerimaan_barang"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>penerimaan_barang">
                                <i class="fa fa-inbox"></i>Receipt Item</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="penjualan"){ echo "active"; } ?>">
                            <a href="<?=base_url()?>penjualan">
                                <i class="fas fa-shopping-cart"></i>Sales</a>
                        </li>
                        <li class="has-sub <?php if($this->uri->segment(1)=="reports_sales" || $this->uri->segment(1)=="reports_sales_produk" || $this->uri->segment(1)=="reports_stok" ){ echo "active"; } ?>">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Reports</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li class="<?php if($this->uri->segment(1)=="reports_sales"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>reports/sales">Sales</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="reports_sales_produk"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>reports/sales_produk">Sales Product</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="reports_stok"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>reports/stok">Stock</a>
                                </li>
                                <li class="<?php if($this->uri->segment(1)=="receipt_item"){ echo "active"; } ?>">
                                    <a href="<?=base_url()?>reports/receipt_item">Receipt Item</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <small class="form-header">
                            Point Of Sales 
                            <?php
                                if ($this->uri->segment(1) != '' ) {
                                    if ($this->uri->segment(1) == 'login') {
                                        echo "&nbsp;&nbsp;/&nbsp;&nbsp;Home";
                                    }else{
                                        echo "&nbsp;&nbsp;/&nbsp;&nbsp;".$this->uri->segment(1);    
                                    }
                                    
                                }    
                                
                             ?>
                            </small>
                            
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
            <!-- Modal Tambah -->
            <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <center>
                                <h5 style="color: white;" class="modal-title" id="title-tambah">Modal</h5>
                            </center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body" id="body-tambah">

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
    $(".datetime").datetimepicker({minView: 2,format: 'dd-mm-yyyy'});
    var csfrData = {};
    csfrData['<?php echo $this->security->get_csrf_token_name(); ?>'] = '<?php echo $this->security->get_csrf_hash(); ?>';
    $.ajaxSetup({
      data: csfrData
    });

    let editor;

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( newEditor => {
        editor = newEditor;
    } )
    .catch( error => {
        console.error( error );
    } );

    $("#gambar").fileinput({'showUpload':false, 'previewFileType':'image','required':true,'allowedFileTypes':['image']});
</script>
</html>