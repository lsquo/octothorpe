<?php
/**
 * The sidebar template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

if ( is_active_sidebar( 'footer' ) ) { ?>
	<aside>
		<?php dynamic_sidebar( 'footer' ); ?>
	</aside>
<?php }
