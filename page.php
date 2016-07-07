<?php
/**
 * The page template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

get_header();
while ( have_posts() ) : the_post(); ?>
	<main>
		<article <?php post_class(); ?>>
			<?php the_title( '<header><h1>', '</h1></header>' ); ?>
			<?php if ( has_post_thumbnail() ) { ?>
				<figure>
					<?php the_post_thumbnail(); ?>
				</figure>
			<?php }
			the_content();
			get_template_part( 'template-parts/pag', 'post' );
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			} ?>
		</article>
	</main>
<?php endwhile;
get_footer();
