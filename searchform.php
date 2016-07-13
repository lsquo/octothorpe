<?php
/**
 * The search form template
 *
 * @package Octothorpe
 * @subpackage Templates
 */
?>

<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s"><?php esc_html_e( 'Search', 'octothorpe' ); ?></label>
	<input type="search" name="s" id="s" value="<?php echo esc_attr( get_search_query() ); ?>">
</form>
