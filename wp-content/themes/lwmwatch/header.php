<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">



<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/css/owl.theme.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />


<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  
 <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/analogClock.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Lora:400,700,700i|Noto+Sans:400,700|Roboto:300,400,500,700,700i,900,900i" rel="stylesheet">


<?php wp_head(); ?>
</head>

<body onLoad="rClock()" <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>


<header  class="header_bar">
<header id="masthead" class="site-header" role="banner"> 


<div class="sub-nav clearfix">
<div class="wrap">

<div class="col-md-12 GoogleTranslate"><div id="google_translate_element"></div></div>

<div class="mobile_respoonsiv_code">
<div class="col-md-4 topLeftItems"> 
<?php dynamic_sidebar( 'header-user' ); ?>
</div>
</div>


<div class="col-md-4 topLeftItems"> 
<?php dynamic_sidebar( 'topleftitems' ); ?>

<div class="rlx-container gold">
		<div class="clock">
			<div class="h-hand" id="hour">
			</div>
			<div class="m-hand" id="min">
			</div>
			<div class="s-hand" id="sec">
            
         			</div>
                    
                    <div class="logo_in">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/logo_rolex.png">
                    </div>
                    <div class="rlx-retailer">
                    OFFICIAL RETAILER
                    </div>
                    </div>
</div>
</div>


<div class="col-md-4 topCenterItems">

   <div class="site-branding header-logo">
      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/lwm_logo.png" title="<?php bloginfo( 'name' ); ?>" /></a></div>
    </div><!-- .site-branding --></div>

	<div class="header-logo2">
	 <div class="site-branding">
      <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png" title="<?php bloginfo( 'name' ); ?>" /></a></div>
    </div><!-- .site-branding --></div>
	


<div class="col-md-4 topRightItems">

  <div class="header-search">
  <div class="sing_in">
  
  <?php dynamic_sidebar( 'header-user' ); ?>
  </div>
  
<div class="serch_in">
<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="outle" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" /><?php dynamic_sidebar( 'header-search' ); ?>
	<button  type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'woocommerce' ); ?>"><?php echo esc_html_x( '', 'submit button', 'woocommerce' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form>       <div class="clearme">&nbsp;</div> 

  </div>
  </div>
  
  
    
    

<!-------------------- SERCH BOX -------------------->



     <div class="responsiv_serch">
     
     <div class="user"><?php dynamic_sidebar( 'header-user' ); ?></div>
     
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><i class="fa fa-search" aria-hidden="true"></i></button>   
  </div>

  </div>

<!----------------------------------- SERCH BOX --------------------------------------> 

</div>

</div>

 <!------------------------->
 <div id="myDropdown" class="dropdown-content">

<div class="serch_in">

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

<?php dynamic_sidebar( 'header-search' ); ?>

	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="outle" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button  type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'woocommerce' ); ?>"><?php echo esc_html_x( '', 'submit button', 'woocommerce' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form>       <div class="clearme">&nbsp;</div> 
</div>

 <!-------------------------->
   <div class="clearme">&nbsp;</div> 
 </div>
 
 
 
 
 
 
 <!------------------ REASPONSIV TAG START HERE--------------------------------->
 
<!-------------------- SERCH BOX -------------------->



<div  class="responsiv_bar">
<div class="mobile-nav hidden-lg hidden-md">



<div class="mobileNavItem mobileNavItem-menu pull-left">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">
    <i class="fa fa-bars"></i></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
   		  <?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
 
    </ul>
    </div>


<!---<div class="responsiv-menu">
       <div class="navigation-top">
		  <?php //get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	   </div><!-- .wrap --><!--
       </div>-->





     <div class="responsiv_serch serch2">
     
     <div class="mobileNavItem mobileNavItem-search pull-right">
     
<div class="dropdown">
<button onclick="myFunction()" class="dropbtn"><i class="fa fa-search" aria-hidden="true"></i></button>   
  </div>

  </div>
     
 <div class="mobileNavItem mobileNavItem-storeFinder pull-right">   <?php dynamic_sidebar( 'topleftitems' ); ?></div>
<div class="mobileNavItem mobileNavItem-basket pull-right"><?php dynamic_sidebar( 'header-user' ); ?></div>


  </div>

<!----------------------------------- SERCH BOX --------------------------------------> 
</div>
</div>

</div>

 <!------------------------->
 <div id="myDropdown" class="dropdown-content">

<div class="serch_in">

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">

<?php dynamic_sidebar( 'header-search' ); ?>

	<label class="screen-reader-text" for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'woocommerce' ); ?></label>
	<input type="search" id="outle" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button  type="submit" value="<?php echo esc_attr_x( '', 'submit button', 'woocommerce' ); ?>"><?php echo esc_html_x( '', 'submit button', 'woocommerce' ); ?></button>
	<input type="hidden" name="post_type" value="product" />
</form>       <div class="clearme">&nbsp;</div> 
</div>

 <!-------------------------->
   <div class="clearme">&nbsp;</div> 
 </div>
 
 </div>
  </div>

   <div class="clearme">&nbsp;</div> 

 </div>
   	</header><!-- #masthead -->
  
   <div class="menu_top_bar">
			<div class="navigation-top">
				
                		<?php if ( has_nav_menu( 'top' ) ) : ?>

					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
	</div><!-- .wrap -->
  </div><!-- .navigation-top -->
  
  <div class="clearme">&nbsp;</div> 
  </div>
  

  
  
  
  </header>

  
  <div class="header-services">
	    <div class="wrap">
			<div id="owl-demo3">

   <?php dynamic_sidebar( 'header-services' ); ?>
			</div>
     <div class="clearme">&nbsp;</div> 
	  </div>
  
  </div>
       

		<?php endif; ?>
        


	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">
		<div id="content" class="site-content">