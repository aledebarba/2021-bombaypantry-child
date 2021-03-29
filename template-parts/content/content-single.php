<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
	$categories = get_the_category();
	if ( !empty( $categories ) ) {
		$category__class = $categories[0]->name;
	} else {
		$category__class = "single__post__generic";
	}
?>
<div class="container single__post__body <?php echo $category__class; ?>">
	<header>
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header>
</div>
<div class="container my-4 py-4">
	<?php
		the_content();
	?>
</div>
</article><!-- #post-<?php the_ID(); ?> -->
