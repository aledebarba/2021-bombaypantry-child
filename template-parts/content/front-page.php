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
<section class="special-deals">
	<div class="container">
		<div class="row section__header">
			<div class="col-10 p-0">
				<h1>Looking for special deals?</h1>
			</div>
			<div class="col-2 px-0">
				<div class="section__header-arrows">
					<button class="d-carousel-prev"><i class="fal fa-arrow-left" aria-hidden="true"></i></button>
					<button class="d-carousel-next"><i class="fal fa-arrow-right" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-2 p-0">
		<div class="deals__carousel">
			<div class="d-carousel" data-flickity='{ "freeScroll": true, "contain":true, "cellAlign":"center", "pageDots":false, "prevNextButtons":false }'>
				<?php
					$args = array(
						'numberposts'	=> -1,
						'post_type'		=> 'menu_item',
						'meta_key'		=> 'front_page',
						'meta_value'	=> true
					);
					$result = new WP_Query($args);
				?>
				<?php if( $result->have_posts() ): ?>
					<?php while( $result->have_posts() ) : $result->the_post(); ?>
						<div class="carousel-cell">
							<div class="hcard">
								<div class="card__header">
									<div class="card__image">
										<?php the_post_thumbnail('medium', ['style' => 'height:100%;width:auto', 'alt' => 'meal photos has illustrative purposes only']); ?>
									</div>
								</div>
								<div class="card__body">
									<div class="card__title">
										<?php the_title(); ?>
									</div>
									<div class="card__info-price">
										<?php the_field('item_price'); ?>
									</div>
									<div class="card__info-text">
										<?php the_field('description'); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>							
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>

<section class="container-full my-2 latest-news">
<div class="container">
		<div class="row section__header">
			<div class="col-10 p-0">
				<h1>Latest news!</h1>
			</div>
			<div class="col-2 px-0">
				<div class="section__header-arrows">
					<button class="n-carousel-prev"><i class="fal fa-arrow-left" aria-hidden="true"></i></button>
					<button class="n-carousel-next"><i class="fal fa-arrow-right" aria-hidden="true"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="container p-0">
		<div class="news__carousel">
			<div class="n-carousel" data-flickity='{ "freeScroll": true, "contain":true, "cellAlign":"center", "pageDots":false, "prevNextButtons":false }'>
				<?php
					$args = array(
						'numberposts'	=> 5,
						'post_type'		=> 'post',
						'orderby'		=> 'date',
						'order'			=> 'DESC',
						'category_name' => 'news'
					);
					$result = new WP_Query($args);
				?>
				<?php if( $result->have_posts() ): ?>
					<?php while( $result->have_posts() ) : $result->the_post(); ?>
						<div class="carousel-cell">
							<div class="news-card">
								<div class="card__header">
									<div class="card__image">
										<?php the_post_thumbnail('medium', ['style' => 'height:100%;width:auto', 'alt' => 'meal photos has illustrative purposes only']); ?>
									</div>
								</div>
								<div class="card__body">
									<div class="card__title">
										<?php the_title(); ?>
									</div>
									<div class="card__info-text">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>							
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div>
</section>

<section class="container-full pt-5" style="background-color: var(--color-gray-bright);">
	<div class="container pt-0 mt-0 mb-5 pb-3 instagram__carousel">

		<?php echo do_shortcode("[instagram-feed]"); ?>
		
		<div class="row py-2 justify-content-center">
			<a href="https://instagram.com" role="button" class="btn btn-instagram" aria-label="Click here to open instagram and follow us">
				Follow us on instagram
				<i class="fab fa-instagram"></i>
			</a>
		</div>
	</div>

	
	<?php get_template_part( 'template-parts/modules/call-to-action' ); ?>

</section>