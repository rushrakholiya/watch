<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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







<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/post/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				) );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php get_footer();
