<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="page-404">
<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
            <div class="img-404">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/product-big-10-zoom.png">
            </div>
    
            
				<header class="page-header">
					<h1 class="page-title"><?php _e( '404', 'twentyseventeen' ); ?></h1>
                    
                    <h3><?php _e( 'Page not found.', 'twentyseventeen' ); ?></h3>
				
				<div class="page-content">
					<p><?php _e( 'Luxury Watch Market Watch Trading for sale here', 'twentyseventeen' ); ?></p>
                    
                    <a class="error_button" href="">LWM</a>

					
				</div><!-- .page-content -->
                </header><!-- .page-header -->

   <div class="clearme">&nbsp;</div> 			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->
</div>

<?php get_footer();
