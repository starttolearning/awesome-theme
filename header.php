<?php
/**
 * The header for our theme
 *
 * @package awesometheme
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php bloginfo( 'name' ); ?></title> 
	<?php wp_head(); ?>
</head>

<?php 
	if( is_front_page()):
		$awesome_classes = array( 'awesome-class', 'my-class' );
	else:
		$awesome_classes = array( 'no-awesome-class' );
	endif;
 ?>

<body <?php body_class( $awesome_classes ); ?>>
	<header>
		<nav class="navbar navbar-default awesome-nav">
		  <div class="container">
              <div class="site-logo">
                  <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
                      <img class="img-responsive" src="<?php echo get_template_directory_uri().'/assets/images/logo.png' ?>" alt="brand-logo">
                  </a>
              </div>
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <?php
                  wp_nav_menu( array(
                      'theme_location' 	=> 'primary',
                      'container'			=> false,
                      'menu_class'		=> 'nav navbar-nav'
                  ) ); ?>
              </div><!-- /.navbar-collapse -->

		  </div><!-- /.container-fluid -->
		</nav>
	</header>