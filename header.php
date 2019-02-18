<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title>USAID RALF - <?php esc_html_e(get_the_title()); ?></title>

  <?php wp_head(); ?>

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
  <nav id="header-nav">
    <div class="container">
      <div class="navbar-header">
        <a href="<?php echo esc_url(home_url()); ?>" class="header-logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-responsive" alt="" /></a>
        <h1><?php esc_html_e('Environmental Compliance RALF', 'usaidralf'); ?></h1>
        <button type="button" class="navbar-toggle hidden-print collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only"><?php esc_html_e('Toggle Navigation', 'usaidralf'); ?></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <?php 
        $header_nav_args = array(
          'theme_location' => 'header-nav',
          'menu' => '',
          'container' => 'div',
          'container_id' => 'navbar',
          'container_class' => 'collapse navbar-collapse',
          'menu_class' => 'nav navbar-nav navbar-right',
          'menu_id' => '',
          'echo' => true,
          'fallback_cb' => 'usaidralf_header_fallback_menu',
          'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth' => 2,
          'walker' => new wp_bootstrap_navwalker()
        );
        wp_nav_menu($header_nav_args);
      ?>
    </div>
  </nav>
