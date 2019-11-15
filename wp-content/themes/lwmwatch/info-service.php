<?php
/**
 * Template Name: Info & Service Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="info_service">

<div class="innerpage">

  <?php if ( has_post_thumbnail() ) :
		$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twentyseventeen-featured-image' );

		// Calculate aspect ratio: h / w * 100%.
		$ratio = $thumbnail[2] / $thumbnail[1] * 100;
		?>

		<div class="panel-image" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);">
          <div class="wrap">
           
           <?php foreach( get_cfc_meta( 'bannertext' ) as $key => $value ){ ?>
              <div class="benner_text">
                  <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

	            <?php the_cfc_field( 'bannertext','banner-text', false, $key ); ?>
              </div>
           <?php } ?>

<div class="clearme">&nbsp;</div>
        </div>
      <div class="clearme">&nbsp;</div>
      </div>



    <?php else: ?>

<div  class="panel-image innerpage_background">





              <div class="benner_text">
              <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
<?php foreach( get_cfc_meta( 'bannertext' ) as $key => $value ){ ?>

    	
            <?php the_cfc_field( 'bannertext','banner-text', false, $key ); ?>
           <?php } ?>
                         </div>



<div class="clearme">&nbsp;</div>
</div>



<?php endif; ?>


</div>


<section class="scrollspy-nav">
<ul>
<li><a href="http://humanimedia.com/Designs/LWM/about-us/trusted-checkout/#protection-info">Buyer Protection</a></li>

<li><a href="http://humanimedia.com/Designs/LWM/about-us/trusted-checkout/#guarantee-info">Authenticity Guarantee</a></li>
<li><a href="http://humanimedia.com/Designs/LWM/about-us/trusted-checkout/#about-us">About Chrono24 </a></li>



</ul>
<div class="clearme">&nbsp;</div>

</section>

<a id="protection-info"> </a>

<!-- .entry-header -->

<div class="buyers-protection-info">

<div class="wrap">

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
  
</div><!-- .wrap -->
 
</div>

<a id="guarantee-info"> </a>

<div class="clearme">&nbsp;</div>



<div class="protection">
    

<?php foreach( get_cfc_meta( 'buyer-protection' ) as $key => $value ){ ?>

    <div class="banner_bg" style="background-image:url(<?php the_cfc_field( 'buyer-protection','background', false, $key ); ?>); background-repeat:no-repeat; background-position:top center; background-size: cover;">

<div class="wrap">
    <div class="banner-text"><?php the_cfc_field( 'buyer-protection','text-area', false, $key ); ?></div>
    </div>
    </div>


     <?php } ?>
     
     </div>
     
  <a id="about-us"> </a>   
     
<div class="info-about">

    
<?php foreach( get_cfc_meta( 'info-about' ) as $key => $value ){ ?>

<div class="wrap">
    <div class="about-text">
	    <?php the_cfc_field( 'info-about','about-text', false, $key ); ?>
        <img src="<?php the_cfc_field( 'info-about','about-images', false, $key ); ?>" />
        <a class="btn" href="<?php the_cfc_field( 'info-about','about-button', false, $key ); ?>">More About us</a>
        
        
     </div>
    </div>
    </div>
   


     <?php } ?>
     
     </div>



<?php get_footer();
