<?php
/**
 * Template Name: Home Page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>


<!-- SLIDER START -->

<div class="mainslider">

<div id="owl-demo" class="owl-carousel owl-theme">

<?php foreach( get_cfc_meta( 'homeslider' ) as $key => $value ){ ?>

	<div class="item">

    <div class="homeslider" style="background-image:url(<?php the_cfc_field( 'homeslider','slider-photo', false, $key ); ?>); background-repeat:no-repeat; background-position:top center;">

    <div class="sliderphoto"><img src="<?php the_cfc_field( 'homeslider','slider-photo', false, $key ); ?>" /></div>

    <div class="wrap">
    <div class="<?php the_cfc_field( 'homeslider','slider-number', false, $key ); ?>">
    <div class="text_slider">
    <?php the_cfc_field( 'homeslider','slider-text', false, $key ); ?></div>
</div>
    </div>

	</div>



    </div>

     <?php } ?>

</div>

</div>

<!-- SLIDER END -->


<!--------------------------- New Arrivals Start ------------------------------->

    <div class="trusted-seller">
       <div class="wrap">
	    <?php dynamic_sidebar( 'trusted-seller' ); ?>
       </div>
    </div>
   <div class="clearme">&nbsp;</div>
   


<!---------------------------- New Arrivals End ----------------------------------->



<!--------------------------- New Arrivals Start ------------------------------->

    <div class="home-products">
       <div class="wrap">
	    <?php dynamic_sidebar( 'new-arrivals' ); ?>
       </div>
    </div>
   <div class="clearme">&nbsp;</div>
   


<!---------------------------- New Arrivals End ----------------------------------->


<!--------------------------- 3 Block Start Here ------------------------------->

 
 
 
 <div class="category_box">  
 
  <div class="wrap">
   <ul>
   
<?php foreach( get_cfc_meta( 'homeblock' ) as $key => $value ){ ?>
<li>

    <div class="category_img" style="background-image:url(<?php the_cfc_field( 'homeblock','background-imges', false, $key ); ?>); background-repeat:no-repeat; background-position:top center;">


    <div class="category_title">
	<?php the_cfc_field( 'homeblock','brand-logo', false, $key ); ?>
    </div>

</div>
</li>

     <?php } ?>
 <div class="clearme">&nbsp;</div>
 </ul>
 </div>
   </div>

<!--------------------------- 3 Block End ------------------------------->




<div class="home-content-area">

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php // Show the selected frontpage content.
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif; ?>

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== twentyseventeen_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Twenty Seventeen.
			 *
			 * @since Twenty Seventeen 1.0
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'twentyseventeen_front_page_sections', 4 );
			global $twentyseventeencounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$twentyseventeencounter = $i;
				twentyseventeen_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== twentyseventeen_panel_count() ) ends here. ?>

	</main><!-- #main -->
</div><!-- #primary -->
   <div class="clearme">&nbsp;</div>

</div>


<!--------------------------- New Arrivals Start ------------------------------->

    <div class="brands-logo">
       <div class="wrap">
	    <?php dynamic_sidebar( 'brands-logo' ); ?>
        
     
       </div>
    </div>
   <div class="clearme">&nbsp;</div>
   


<!---------------------------- New Arrivals End ----------------------------------->

<!--------------------------- New Arrivals Start ------------------------------->

    <div class="homecontact_form">
       <div class="wrap">
	    <?php dynamic_sidebar( 'home-contact-form' ); ?>
        
     
       </div>
    </div>
   <div class="clearme">&nbsp;</div>
   
   

<!---------------------------- New Arrivals End ----------------------------------->


<!--------------------------- NEWSLETTER Start ------------------------------->
<div class="Newsletter_area">
  <div class="wrap">
     <div class="newsletter_left">
     	 <?php dynamic_sidebar( 'home-newsletter' ); ?>
     </div>
 
     <div class="chorono_right">
         <?php dynamic_sidebar( 'chrono-24' ); ?>
      </div>
    </div>
   <div class="clearme">&nbsp;</div>
</div>   

<!---------------------------- NEWSLETTER End ----------------------------------->






<?php get_footer();
