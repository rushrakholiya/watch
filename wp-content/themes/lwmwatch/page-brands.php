<?php
/**
 * The template for displaying all pages
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
<div class="wrap">




              <div class="benner_text">
              <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
<?php foreach( get_cfc_meta( 'bannertext' ) as $key => $value ){ ?>

    	
            <?php the_cfc_field( 'bannertext','banner-text', false, $key ); ?>
           <?php } ?>
                         </div>



<div class="clearme">&nbsp;</div>
</div>

</div>

<?php endif; ?>


</div>

<!-- .entry-header -->

<section class="brandListSec">


<div class="container">
<div class="row">
    
    
   
    
    <?php $brands = get_categories('taxonomy=pwb-brand&post_type=product'); ?>
        <?php foreach ($brands as $brand) : 
    $brand_name = $brand->name;
                        $brand_link = get_term_link( $brand->term_id );

                        $attachment_id = get_term_meta( $brand->term_id, 'pwb_brand_image', 1 );
                        $attachment_banner_id = get_term_meta( $brand->term_id, 'pwb_brand_banner', 1 );
                        $brand_logo = wp_get_attachment_image( $attachment_id, 'full' );
                        $brand_banner = wp_get_attachment_image( $attachment_banner_id, 'full' );
    
    ?>
    
    
    <?php //echo $brand_banner; ?>
    
    
    
       <div class=".col-6 col-sm-4 col-md-2">
        <div class="brandItem">
            <a href="<?php echo get_category_link($brand->cat_ID); ?>" title="<?php echo $brand->name; ?>"><?php echo $brand_logo; ?></a>
        </div>
    </div>
    

    
    <?php endforeach; ?>
</div>
</div>
</section>

<?php get_footer();
