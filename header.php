<html>
  <head>
    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no, user-scalable=no" />

    <!-- CSS Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="<?php echo get_bloginfo('template_directory'); ?>/css/main.css" rel="stylesheet">
    <link href="<?php echo get_bloginfo('template_directory'); ?>/css/<?php echo substr(get_page_template_slug(), 0, -4) ?>.css" rel="stylesheet">

    <title><?php echo get_bloginfo( 'name' ); ?> - <?php echo get_bloginfo( 'description' ); ?></title>
    <?php wp_head(); ?>
  </head>

  <body>
    <!-- *** -->
    <!-- NAV -->
    <!-- *** -->
    <nav class="main">
      <a href="<?php echo get_bloginfo( 'wpurl' );?>" class="logo">
        <?php echo get_bloginfo( 'name' );?>
      </a>
    </nav>