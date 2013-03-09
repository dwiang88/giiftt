<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo $css_tags; ?>">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <div class="loader_tmp" style="display:none;">
            <div class="loader">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>

        <div class="loader_overlay">
            <div class="loader">
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
                <div class="circle"></div>
            </div>
        </div>

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a href="<?php echo base_url(); ?>" class="brand">givthing</a>
                    <ul class="nav pull-right">
                        <!--
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Photo Book <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Coffee Table Book</a></li>
                                <li><a href="#">Seamless Table Book</a></li>
                            </ul>
                        </li>
                        -->
                        <li><a href="#">Photo Book</a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="#">Canvas</a></li>
                        <li class="divider-vertical"></li>

                        <?php if ($this->session->userdata('islogin')){ 

                            $users = $this->session->userdata('users');

                            ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $users['NamaUser']; ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">InProgress</a></li>
                                <li><a href="#">Love</a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
                            </ul>
                        </li>
                        <?php 
                        $shoppingCart = $this->session->userdata('shoppingCart');
                        if (!empty($shoppingCart)){ ?>
                        <li class="menu_order"><span class="label label-info"><a href="<?php echo base_url(); ?>checkout/shopping_cart" style="color:white;"><?php echo count($shoppingCart); ?> Order<?php echo (!empty($order) && $order > 1) ? "s" : ""; ?></a></span></li>
                        <?php } ?>
                        <?php }else{ ?>
                        <li><a href="<?php echo $this->access->loginUrl; ?>" class="btn_loginfb">Login FB</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>