<?php

/**
 * Glossary
 *
 * @package   Glossary
 * @author    Codeat <support@codeat.co>
 * @copyright 2016 GPL 2.0
 * @license   GPL-2.0
 * @link      http://codeat.co
 */

/**
 * Last glossary terms widget
 */
class Last_Glossary_Widget extends WPH_Widget {

	/**
	 * Initialize the widget
	 *
	 * @return void
	 */
	function __construct() {
		$args = array(
			'label' => __( 'Glossary Latest Terms', GT_TEXTDOMAIN ),
			'description' => __( 'List of latest Glossary Terms', GT_TEXTDOMAIN ),
		);

		$args[ 'fields' ] = array(
			array(
				'name' => __( 'Title', GT_TEXTDOMAIN ),
				'desc' => __( 'Enter the widget title.', GT_TEXTDOMAIN ),
				'id' => 'title',
				'type' => 'text',
				'class' => 'widefat',
				'std' => __( 'Latest Glossary Terms', GT_TEXTDOMAIN ),
				'validate' => 'alpha_dash',
				'filter' => 'strip_tags|esc_attr',
			),
			array(
				'name' => __( 'Number', GT_TEXTDOMAIN ),
				'desc' => __( 'The number of terms to be shown.', GT_TEXTDOMAIN ),
				'id' => 'number',
				'type' => 'text',
				'validate' => 'numeric',
				'std' => 5,
				'filter' => 'strip_tags|esc_attr',
			),
			array(
				'name' => __( 'Category', GT_TEXTDOMAIN ),
				'desc' => __( 'Filter from Glossary category.', GT_TEXTDOMAIN ),
				'id' => 'tax',
				'type' => 'taxonomyterm',
				'taxonomy' => 'glossary-cat',
			),
		);

		$this->create_widget( $args );
	}

	/**
	 * Print the widget
	 *
	 * @param array $args     Parameters.
	 * @param array $instance Values.
	 *
	 * @return void
	 */
	function widget( $args, $instance ) {
        $out = $args[ 'before_widget' ];
        $out .= $args[ 'before_title' ];
		if ( !isset( $instance[ 'tax' ] ) ) {
			$instance[ 'tax' ] = array();
        }

		$out .= $instance[ 'title' ];
		$out .= $args[ 'after_title' ];
		$out .= '<div class="widget-glossary-terms-list">';
		$out .= get_glossary_terms_list( 'ASC', $instance[ 'number' ], $instance[ 'tax' ] );
		$out .= '</div>';
		$out .= $args[ 'after_widget' ];
		echo $out;
	}

}

// Register widget
if ( !function_exists( 'glossary_last_register_widget' ) ) {

	/**
	 * Last item
	 *
	 * @return void
	 */
	function glossary_last_register_widget() {
		register_widget( 'Last_Glossary_Widget' );
	}

	add_action( 'widgets_init', 'glossary_last_register_widget', 1 );
}
