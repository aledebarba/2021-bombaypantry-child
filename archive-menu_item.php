<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>
<div class="container menu__header">
	<h1>Our Menu</h1>
	<p>We take huge pride in the quality of the ingredientes used and the variety of dishes we have on offer. There is something on our menus for everyone, no matter how you like to eat</p>
</div>

<div class="container menu__filters ">
	<div class="row search  d-flex flex-row justify-content-center align-items-center">
		<div class="col-sm-12 col-md-2"><h1>Search by meal type:</h1></div>
		<ul class="col-sm-12 col-md-10">
			<?php 
				$buttons = wp_get_nav_menu_items( 'Shortcuts' );
				foreach ( $buttons as $button ) {
					echo ('<li><a href="'.$button->url.'" class="btn btn-danger">'.$button->title.'</a></li>');
				}			
			?>
		</ul>
	</div>
	<div class="row filters  d-flex flex-row justify-content-center align-items-center">
		<div class="col-sm-12 col-md-3">
			<p>Showinf 125 items out of 200</p>
		</div>
		<div class="col-sm-12 col-md-6">
			<ul>
				<li><p><i class="fas fa-filter"></i> Filter by</p></li>
				<li><a href="#" class="btn btn-outline-dark rounded-pill">Allergens</a></li>
				<li><a href="#" class="btn btn-outline-dark rounded-pill">Calories</a></li>
				<li><a href="#" class="btn btn-outline-dark rounded-pill">Ingredients</a></li>
			</ul>
		</div>
		<div class="col-sm-12 col-md-3 justify-self-end">
			<button class="btn btn-dark rounded-pill"><i class="fas fa-download"></i> Download Selected Menu</button>
		</div>
	</div>
</div>
<div class="container menu__cards">
	<div class='row'>
		<?php if ( have_posts() ) : ?>
			
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<div class="col-sm-6 col-md-4 col-lg-3">
					<div class="menu__card">
						<div class="menu__card__flag-<?php the_field('item_flag'); ?>"></div>
						<div class="menu__card__header">
							<div class="menu__card__header-image">
								<img src=<?php the_field('image'); ?> alt="actual photo of the meal">
							</div>
							<div class="menu__card__header-price">
								<?php the_field('item_price'); ?><i class="far fa-question-circle" style="font-size: 0.7rem; transform: translate(3px,-3px);"></i>
							</div>
						</div>
						<div class="menu__card__details">
							<div class="menu__card__details-categories">
								<ul>
								<?php 
									$category = get_terms('meal_type');
									foreach ($category as $catVal) {
										echo '<li>'.$catVal->name.'</li>'; 
									}
								?>
								</ul>
							</div>
							<div class="menu__card__details-calories">
							<i class="fas fa-burn"></i><?php the_field('calories'); ?>
							</div>
						</div>
						<div class="menu__card__body">
							<div class="menu__card__title">
								<h1><?php the_title(); ?></h1>
							</div>
							<div class="menu__card__contains">
								<p>Contains</p>
								<ul>
								<?php 
									$category = wp_get_post_terms(get_the_ID(),'contains');
									foreach ($category as $catVal) {
										echo '<li>'.$catVal->name.'</li>'; 
									}
								?>
								</ul>
							</div>
							<div class="menu__card__allergens">
								<p>Allergens</p>
								<ul>
								<?php 
									$category = wp_get_post_terms(get_the_ID(),'allergen');
									foreach ($category as $catVal) {
										echo '<li>'.$catVal->name.'</li>'; 
									}
								?>
								</ul>
							</div>
						</div>
						<div class="menu__card__footer">
							<div class="menu__card__spiceness">
								<span>Spiceness</span>
								<div class="spiceness-level-<?php the_field('spiceness'); ?>"></div>
							</div>
							<div class="menu__card__more-details">
								<a href="<?php the_permalink(); ?>" target="_blank">More Details <i class="fa fa-long-arrow-right"></i></a>
							</div>
						</div>
											
					</div>
				</div>
			<?php endwhile; ?>

			<div class="container p-4 menu__load_more d-flex flex-row justify-content-center align-tems-center">
				<a href="#" class="btn btn-warning">Load More</a>
			</div>
			<?php twenty_twenty_one_the_posts_navigation(); ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content/content-none' ); ?>
		<?php endif; ?>
	</div>
</div>


<?php get_template_part( 'template-parts/modules/call-to-action' ); ?>
<?php get_footer(); ?>
