<?php
/**
 * The comments pagination template part
 *
 * @package Octothorpe
 * @subpackage Templates
 */

if ( get_comment_pages_count() > 1 ) { ?>
	<nav role="navigation">
		<?php previous_comments_link( __( 'Previous', 'octothorpe' ) ); ?>
		<?php next_comments_link( __( 'Next', 'octothorpe' ) ); ?>
	</nav>
<?php }
