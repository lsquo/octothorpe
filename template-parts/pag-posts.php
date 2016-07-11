<?php
/**
 * The posts pagination template part
 *
 * @package Octothorpe
 * @subpackage Templates
 */

global $wp_query;
if ( $wp_query->max_num_pages > 1 ) { ?>
	<nav role="navigation">
		<?php previous_posts_link( __( 'Previous', 'octothorpe' ) ); ?>
		<?php next_posts_link( __( 'Next', 'octothorpe' ) ); ?>
	</nav>
<?php }
