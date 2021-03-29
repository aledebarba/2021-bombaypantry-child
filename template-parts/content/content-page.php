<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php if ( ! is_front_page() ) : ?>
		<header class="container">
			<?php the_title('<h1>','</h1>'); ?>
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="container page-with-image">
			<?php the_title('<h1>','</h1>'); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>


	<div class="container">
		<?php
			the_content();
		?>
	</div>



	<?php if ( get_edit_post_link() ) : ?>
		<div class="container d-flex flex-row justify-content-center">
			<?php
			edit_post_link(
				'Edit this content',
				'<span class="edit-link">',
				'</span>',
			);
			?>
		</div><!-- .entry-footer -->
	<?php endif; ?>

</article>
