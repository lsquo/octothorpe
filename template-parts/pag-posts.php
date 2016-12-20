<?php
/**
 * The posts pagination template part
 *
 * @package Octothorpe
 * @subpackage Templates
 */

the_posts_navigation(
	array(
		'prev_text' => __( 'Previous', 'octothorpe' ),
		'next_text' => __( 'Next', 'octothorpe' )
	)
);
