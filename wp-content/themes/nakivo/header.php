<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title>Test</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="main">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 no-padding">
                    <div class="header-img">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/main_page_01.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>