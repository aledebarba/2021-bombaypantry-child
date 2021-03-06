<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

$footerNav = wp_get_nav_menu_items('Footer Menu');
$locationsNav = wp_get_nav_menu_items('Locations');
$extraNav = wp_get_nav_menu_items('Extra');
$socialNav = wp_get_nav_menu_items('Social Networks');

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<!-- ?php get_template_part( 'template-parts/footer/footer-widgets' ); ?-->

	<footer class="container-full pt-5" style="background-color:var(--color-gray-bright)">
		<div class="container pt-5">
			<div class="row pt-5">
				<div class="col-sm-12 col-md-6">
					<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/nav__logo.png" alt="Bombay Pantry Logo" style="width: 280px"/>
				</div>
				<div class="col-sm-12 col-md-6 d-flex flex-row justify-content-end align-items-start footer__buttons">
					<a href="#" role="button" class="btn btn-outline-warning" style="border-width: 2px;">Get in touch</a>
					<a href="#" role="button" class="btn btn-danger btn-lg ml-2 footer__buttons-pink">Take me to order</a>
				</div>
			</div>
			<div class="row footer__menus">
				<div class="col-sm-12 col-md-3">
					<ul class="flex-column">
						<?php 
						foreach ( $footerNav as $navItem ) {
							echo '<li class="nav-item"><a class="nav-link pl-0" href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></li>';
						}
						?>
						<?php 
						foreach ( $extraNav as $navItem ) {
							echo '<li class="nav-item"><a class="nav-link pl-0" href="'.$navItem->url.'">'.$navItem->title.'</a></li>';
						}
						?>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3">
					<ul class="flex-column">
						<li class="footer__menu-title"><i class="far fa-thumbtack" style="transform: rotate(45deg); margin-right: 8px;"></i>Locations</li>
						<?php 
							foreach ( $locationsNav as $navItem ) {
								echo ('<li class="nav-item"><a class="nav-link pl-0" href="'.$navItem->url.'">'.$navItem->title.'</a></li>');
							}
						?>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3">
					<ul class="flex-column">
						<?php 
							foreach ( $socialNav as $navItem) {
								echo ('<li class="nav-item"><a class="nav-link pl-0" href="'.$navItem->url.'">'.$navItem->title.'</a></li>');
							}
						?>
					</ul>
				</div>
			</div>
			<div class="row my-4">
				<div class="col-sm-12 col-md-6">
					<div class="row awards align-items-center">
						<div class="col-3">
							<span>
								Awards<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</span>
						</div>
						<div class="col-9">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/award-_0004_05.png" alt="award icon">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/award-_0003_04.png" alt="award icon">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/award-_0002_03.png" alt="award icon">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/award-_0001_02.png" alt="award icon">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/award-_0000_01.png" alt="award icon">
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-6">
					<div class="row download-apps align-items-center">
						<div class="col-6 d-flex flex-row justify-content-end">
							<span>
								Dowload Our App<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
							</span>
						</div>
						<div class="col-6 d-flex flex-row justify-content-end">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/app_store_badge_0000_app_store_badge.png" alt="apple store icon">
							<img src="http://bombaypantry.uxdir.com/wp-content/uploads/2021/03/app_store_badge_0001_google_play_badge.png" alt="google play store icon">
						</div>
					</div>
				</div>
			</div>
			<div class="row legal-text pt-5">
				<div class="col-8">
					<p>Legal statement, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget feugiat orci, viverra iaculis dui Nunc viverra massa sem, sed eleifend ipsum viverra ut.</p>
				</div>
			</div>
			<div class="row copyright pb-5">
				<div class="col-sm-12 col-md-10"><span>??2021 Bombay Pantry <strong>/</strong> Privacy Policy <strong>/</strong> Cookies Management</span></div>
				<div class="col-sm-12 col-md-2 d-flex flex-row justify-content-end devby"><span>Developed by Circulate</span></div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
