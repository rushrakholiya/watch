<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

<div class="specifications">

<div class="wrap">

<h2>Details</h2>


  
    <div class="col-md-6">
  
  
  <div class="specifications product_list">

<table>
<tbody>
<?php foreach( get_cfc_meta( 'productdetailslist' ) as $key => $value ){ ?>

<tr><td colspan="2" list_hedding style="display:none<?php the_cfc_field( 'productdetailslist','dispaly-hedding', false, $key ); ?>; padding-top:30px;" > <h4 class="h4-lead text-left m-b-0"> 
	    <?php the_cfc_field( 'productdetailslist','list-title', false, $key ); ?>
      </h4>
    </td></tr>
    
   </span> 

   <tr> 
   <td ><strong><?php the_cfc_field( 'productdetailslist','list-left', false, $key ); ?></strong></td>
    <td><?php the_cfc_field( 'productdetailslist','list-right', false, $key ); ?></td></tr>


     <?php } ?>

</tbody>
</table>
</div>
  
  
  </div>
  



<div class="col-md-6"> 
	<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $tabs as $key => $tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', esc_html( $tab['title'] ), $key ); ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php if ( isset( $tab['callback'] ) ) { call_user_func( $tab['callback'], $key, $tab ); } ?>
			</div>
		<?php endforeach; ?>
	</div>
    </div>
    
  
  

</div>
</div>

<?php endif; ?>
