<?php
/**
 * The sidebar template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

if ( is_active_sidebar( 'footer' ) ) {
	dynamic_sidebar( 'footer' );
}
