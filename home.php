<?php
/**
 * The home template
 *
 * @package Octothorpe
 * @subpackage Templates
 */

get_header(); ?>
<main role="main">
	<header>
		<h1><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
	</header>
	<p><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
	<?php if ( have_posts() ) : ?>
		<ul class="post-list">
			<?php while ( have_posts() ) : the_post(); ?>
				<li <?php post_class(); ?>>
					<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
					<?php the_title(
						sprintf(
							'<a href="%1$s">',
							esc_url( get_permalink() )
						),
						'</a>'
					); ?>
				</li>
			<?php endwhile; ?>
		</ul>
		<?php get_template_part( 'template-parts/pag', 'posts' );
	else : ?>
		<p><?php esc_html_e( 'No posts found.', 'octothorpe' ); ?></p>
	<?php endif; ?>
</div>
<?php get_footer();
