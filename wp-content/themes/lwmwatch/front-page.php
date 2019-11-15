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


    <div class="wrap">
    <div class="<?php the_cfc_field( 'homeslider','slider-number', false, $key ); ?>">
    
        <div class="sliderphoto"><img src="<?php the_cfc_field( 'homeslider','slider-photo', false, $key ); ?>" /></div>
       
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

 
 
<?php /*
 <div class="category_box">  
 
  <div class="wrap">

   <div id="owl-demo2" class="owl-carousel owl-theme">

   
<?php foreach( get_cfc_meta( 'homeblock' ) as $key => $value ){ ?>
	<div class="item">

<a href="">

    <div class="category_img" style="background-image:url(<?php the_cfc_field( 'homeblock','background-imges', false, $key ); ?>); background-repeat:no-repeat; background-position:top center;">
       <div class="category_title"> <img src="<?php the_cfc_field( 'homeblock','brand-logo', false, $key ); ?>" /></div>
    </div>
    </a>

</div>
<?php } ?>
 </div>
 </div>
  <div class="clearme">&nbsp;</div>

   </div>
*/ ?>







<div class="category_box">  
    <div class="wrap">
        <div id="owl-demo2" class="owl-carousel owl-theme">
            
            
            
                <?php $brands = get_categories('taxonomy=pwb-brand&post_type=product'); ?>
        <?php foreach ($brands as $brand) : 
    $brand_name = $brand->name;
                        $brand_link = get_term_link( $brand->term_id );

                        $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', 1 );
                        $attachment_banner_id = get_term_meta( $brand->term_id, 'pwb_brand_banner', 1 );
                        $brand_logo = wp_get_attachment_image( $attachment_id, 'full' );
                        $brand_banner = wp_get_attachment_image( $attachment_banner_id, 'full' );
                        $brand_banner_url = wp_get_attachment_url( $attachment_banner_id, 'brand-banner' );
            
           
    
    ?>
    
    
    
    <?php if(get_field('show_brand_in_homepage',  $brand)): ?>
    <div class="item">
    <a href="<?php echo get_category_link($brand->cat_ID); ?>" title="<?php echo $brand->name; ?>">
        <div class="category_img" style="background-image:url(<?php echo $brand_banner_url; ?>); background-repeat:no-repeat; background-position:top center;">
            <div class="category_title"><?php echo $brand_logo; ?></div>
        </div>
    </a>
    
            </div>
    <?php endif; ?>
    <?php endforeach; ?>
            
        </div>
    </div>
    <div class="clearme">&nbsp;</div>    
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
           
           
           <div class="brandlogoSlider">
               <?php $brands = get_categories('taxonomy=pwb-brand&post_type=product'); ?>
               <?php foreach ($brands as $brand) : 
               $brand_name = $brand->name;
               $brand_link = get_term_link( $brand->term_id );
               $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', 1 );
               $brand_logo = wp_get_attachment_image( $attachment_id, 'full' );
               ?>
               <div class="brandSlideItem"><a href="<?php echo get_category_link($brand->cat_ID); ?>" title="<?php echo $brand->name; ?>"><?php echo $brand_logo; ?></a></div>
    
    <?php endforeach; ?>
           </div>
     
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

<div class="map-area">

          	 <?php dynamic_sidebar( 'map-area' ); ?>
     
   <div class="clearme">&nbsp;</div>
</div>   

<!---------------------------- NEWSLETTER End ----------------------------------->






<?php get_footer();
