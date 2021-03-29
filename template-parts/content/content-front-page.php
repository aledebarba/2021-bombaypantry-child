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
			<div class="col-2">
				<div class="section__header-arrows">
					<a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="deals__carousel">
			<div class="carousel" data-flickity='{ "freeScroll": true, "contain":true, "cellAlign":"center", "pageDots":false }'>
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

<section class="container-full mb-5 latest-news">
<div class="container">
		<div class="row section__header">
			<div class="col-10 p-0">
				<h1>Latest news!</h1>
			</div>
			<div class="col-2">
				<div class="section__header-arrows">
					<a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="news__carousel">
			<div class="carousel" data-flickity='{ "freeScroll": true, "contain":true, "cellAlign":"center", "pageDots":false }'>
				<?php
					$args = array(
						'numberposts'	=> 5,
						'post_type'		=> 'post',
						'orderby'		=> 'date',
						'order'			=> 'DESC'
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

<section class="container-full pt-4" style="background-color: var(--color-gray-bright);">
	<div class="container instagram__carousel">

		<?php echo do_shortcode("[instagram-feed]"); ?>
		
		<div class="row py-2 justify-content-center">
			<a href="https://instagram.com" role="button" class="btn btn-instagram" aria-label="Click here to open instagram and follow us">
				Follow us on instagram
				<i class="fab fa-instagram"></i>
			</a>
		</div>
	</div>

	<div class="call-to-action">
		<div class="container">
			<div class="row my-5 cta cta__pink">
				<div class="col-sm-12 col-md-8 align-self-center order-1 px-5">
					<h2>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</h2>
					<a href="#" role="button" class="btn btn-outline-light rounded btn-lg px-4">Order Now</a>
				</div>
				<div class="col-sm-12 col-md-4 cta__image-col order-2">
					<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/cta-image-1.png" alt="call to action illustration">
				</div>
			</div>
			<div class="row cta cta__orange">
				<div class="col-sm-12 col-md-8 align-self-center order-2 px-5">
					<h2>Take a quick survey and be in with a chance to win a dinner for two!</h2>
					<a href="#" role="button" class="btn btn-outline-light rounded btn-lg">Take the Survey</a>
				</div>
				<div class="col-sm-12 col-md-4 cta__image-col order-1">
					<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/cta-image-2.png" alt="call to action illustration">
				</div>
			</div>
		</div>
	</div>
</section>