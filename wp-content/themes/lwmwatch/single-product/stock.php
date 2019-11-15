<?php
/**
 * Single Product stock.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/stock.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<!--<p class="stock <?php //echo esc_attr( $class ); ?>"><?php //echo wp_kses_post( $availability ); ?></p>-->


<div class="tab">
  <button class="tablinks stock <?php echo esc_attr( $class ); ?>" onclick="openCity(event, 'LMW')"><?php echo wp_kses_post( $availability ); ?></button>
</div>


<div id="LMW" class="tabcontent">

<span onclick="this.parentElement.style.display='none'" class="topright">&times;</span>
  
  
  <?php echo do_shortcode( '[contact-form-7 id="316" title="Single Product Form"]' );?>

 </div> 
