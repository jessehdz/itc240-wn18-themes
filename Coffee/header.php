<?php include_once 'includes/config.php'?>
<!--HEADER INCLUDE BEGINS HERE-->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$config->title?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?=$config->theme_virtual?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=$config->theme_virtual?>css/widget.css" rel="stylesheet">
    <?=$config->loadhead?>
    
    <!-- Custom font-awesome icons per page -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>

<body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
        <span class="site-heading-upper text-primary mb-3"><?=$config->slogan?></span>
        <span class="site-heading-lower"><?=$config->banner?></span>
    </h1>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
        <div class="container">
            <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="index.php"><?=$banner?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto">
                    <?=widgets2_links($config->nav1)?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="page-section cta">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="cta-inner text-center rounded">
                        <!--             HEADER INCLUDE ENDS HERE-->

<?php
/*
function to create navigation from 
as associative array



*/
function coffee_links($nav1){
    
    global $config;
    $myReturn = '';
    foreach($nav1 as $url => $text){
        
        $url = $config->virtual_path . $url; //add virtual path
        if(THIS_PAGE == $url)
        {//current page - add highlight
              $myReturn .= '
            <li class="nav-item active px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }else{//no highlight
             $myReturn .= '
            <li class="nav-item px-lg-4">
                <a class="nav-link text-uppercase text-expanded" href="' . $url . '">' . $text . '</a>
            </li>
            '; 
        }  

    }

    return $myReturn;
}//end coffee_links()
            
?>