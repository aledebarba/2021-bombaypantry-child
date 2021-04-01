<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$primaryNav = wp_get_nav_menu_items('Primary menu');
$locationsNav = wp_get_nav_menu_items('Locations');
$extraNav = wp_get_nav_menu_items('Extra');
$heroImage = get_the_post_thumbnail_url( null, 'full' );
?>

<header class="page__header">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light px-0">
				<a class="navbar-brand" href="https://bombay.circulateonline.com">
					<div class="navbar-brand__logo">
						<img src="<?php echo wp_get_attachment_url( 37 ); ?>" alt="Bombay Pantry Logo"/>
					</div>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto mr-auto">
				<?php 
					foreach ( $primaryNav as $navItem ) {
						echo '<li class="nav-item menu__setup"><a class="nav-link text__menu-item" href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
					}
					?>
				</ul>
				<div class="navbar__button">
					<a href="#" role="button" class="btn btn-primary rounded-2">Take me to order</a>
				</div>
				</div>
		</nav>
		<div class="row mt-3"> 
			<div class="col-sm-12 col-md-8">
				<div class="menu__location">
					<ul>
						<li><i class="far fa-thumbtack"></i>Our Locations</li>
						<?php 
							// TODO Create open/flip menu with all locations (side bar style?)
							foreach ( $locationsNav as $navItem ) {
								$url = $navItem->url;
								$pid = url_to_postid( $url );
								$title = $navItem->title;

									echo '<li class="breadcrumb-item">
											<a  class="text-dark location__link" 
												role="button"
												rel="'.$pid.'"
												title="' . $title .'">'.$title.'
											</a>
										</li>';
							}	

						?>
					</ul>
					<div class="menu__location__all">
						<a href='#' role="button">See All 7 Locations</a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-4 ml-auto">
				<nav class="nav menu__extras">
					<?php 
					
							foreach( $extraNav as $navItem ) {

								echo '<a class="nav-link text-dark" href="'.$navItem->url.'">'.$navItem->title.'</a>';

							}
					
					?>
				</nav>
			</div>
		</div>
	</div>

	<?php if( is_front_page() ) : ?>

		<div class="jumbotron hero mt-5" style="--bgimage:url('<?php echo $heroImage ?>')">
			<div class="container mt-5 pt-2">
				<h1 class="display-3 hero__title mt-3">Award winning food delivered straight to your door.</h1>
				<a class="btn btn-lg btn-outline-light rounded-pill text-uppercase mt-3" href="http://bombay.circulateonline.com/menu_item/" role="button">I need to explore the menu <i class="fal fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		
	<?php endif; ?>
</header><!-- #masthead -->
