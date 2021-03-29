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

<header class="container page__header mt-4">
	<nav class="navbar navbar-expand-lg navbar-light mt-4">
            <a class="navbar-brand" href="http://bombaypantry.uxdir.com">
				<div class="navbar-brand__logo">
                	<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/nav__logo.png" alt="Bombay Pantry Logo"/>
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
                  <a href="#" role="button" class="btn btn-primary rounded-2">Take me to the order</a>
              </div>
            </div>
	</nav>
	<div class="row"> 
		<div class="col-sm-12 col-md-8">
			<nav aria-label="breadcrumb" class="menu__location">
				<ol class="breadcrumb" style="background-color: transparent;">
					<?php 
					
						foreach ( $locationsNav as $navItem ) {
							$url = $navItem->url;
							$pid = url_to_postid( $url );
							$title = $navItem->title;

								echo '<li class="breadcrumb-item">
										<a  class="text-dark font-weight-bold  location__link" 
											role="button"
											rel="'.$pid.'"
											title="' . $title .'">'.$title.'
										</a>
									  </li>';
						}	

					?>
				</ol>
			</nav>
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
	<div>

	<?php if( is_front_page() ) : ?>

		<div class="jumbotron hero" style="--bgimage:url('<?php echo $heroImage ?>')">
			<div class="container">
				<h1 class="display-4 hero__title">Award winning food delivered straight to your door.</h1>
				<a class="btn btn-lg btn-outline-light rounded-pill text-uppercase" href="http://bombaypantry.uxdir.com/menu_item/" role="button">I need to explore the menu <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>
		
	<?php endif; ?>
</header><!-- #masthead -->
