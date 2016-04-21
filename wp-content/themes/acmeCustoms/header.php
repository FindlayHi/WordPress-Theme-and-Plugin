
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

   <!-- Le styles -->
<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
  </head>
  <body>

  <div class="navbar navbar-inverse navbar-fixed-top dropdown">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
        <div id="navbarCollapse" class="nav-collapse collapse">
          <?php /* Primary navigation */
		wp_nav_menu( array(
  		'menu' => 'primary',
		'theme_location'    => 'primary',
  		'depth' => 2,
  		'container' => false,
		'container_class'   => 'collapse navbar-collapse',
        	'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
  		//Process nav menu using our custom nav walker
  		'walker' => new wp_bootstrap_navwalker())
);
?>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>

  <div class="container">
