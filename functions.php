<?php

add_action( 'wp_enqueue_scripts', 'enqueue_load_cdns', 90 );
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles', 99);

add_action( 'init', 'custom_post_menu_item' );
add_action( 'init', 'create_menu_items_tag_taxonomies', 0 );
add_action( 'init', 'create_menu_item_categories_taxonomies', 0 );

add_filter( 'post_thumbnail_html', 'remove_img_attr' );

add_action( 'wp_ajax_load_post_content', 'load_post_content' );
add_action( 'wp_ajax_nopriv_load_post_content', 'load_post_content' );

/************
 * Load post content via Ajax call
 * !!! load_post_content() is a callback for the wp_ajax_load_post_content function
 * 
 */
function load_post_content() {


  if( isset($_GET["pid"]) ){
    $post = get_post( $_GET["pid"] );
    if( $post instanceof WP_Post ) {
        echo '<h1 class="post_title">'.$post->post_title.'</h1>';
        echo '<div class="ajax-loaded-content">'.$post->post_content.'"</div>';

    } else {
        // nothing found with the post id
    }
  } else {
    // no post id
  }
  wp_die();


    // $the_post_id = $_POST['the_ID'];
    // $args = array(
    //     'post_type' => 'post',
    //     'category_name' => 'Locations',
    //     'p' => $the_post_id
    // );

    // $ajax_query = new WP_Query($args);

    // $the_content = '<p>Nothing found</p>';

    // if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
    //     $the_content = the_content();
    // endwhile;
    // endif; 

    // echo $the_content;

    // wp_reset_postdata();

    // die();
}


/*******
 *  Import CDNs scripts and CSS
 */
function enqueue_load_cdns() {

    //add bootstrap css
    wp_register_style( 'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css", false, NULL, 'all' );
    wp_enqueue_style( 'bootstrap' );

    //add bootstrap js bundle
    wp_register_script( 'bootstrap', "https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js", ['jquery'], NULL, true );
    wp_enqueue_script( 'bootstrap' );
   
    // add jquery
    // 1. remove default jqeury version
    wp_deregister_script( 'jquery' );
    
    // 2. register new version
    wp_register_script( 'jquery', "https://code.jquery.com/jquery-3.5.1.min.js", false, NULL, true );
    wp_enqueue_script( 'jquery' );

    // add flickit
    wp_register_script ('flickit',"https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js", false, NULL, true);
    wp_enqueue_script  ('flickit');
    wp_register_style  ('flickit',"https://unpkg.com/flickity@2/dist/flickity.min.css", false, NULL, 'all');
    wp_enqueue_style   ('flickit');

    // add custom local scripts 
    // use localize to setup 'global' js variables
    wp_register_script ('bombay-pantry-common', get_stylesheet_directory_uri() . "/js/common.js", false, NULL, true );
    wp_enqueue_script( 'bombay-pantry-common');
    wp_localize_script('bombay-pantry-common', 'jsGlobal', array(
          'ajaxUrl' => admin_url('admin-ajax.php'),
      )
    );
}   

/*******
 * Load child style after all styles
 */
function enqueue_child_styles() {
    wp_enqueue_style( '2021bombay-child', get_stylesheet_directory_uri() . '/style.css', false, NULL, 'all' );
}


/*****
 * Create and register custom post type Menu Item
 */
function custom_post_menu_item() {
    $labels = array(
      'name'               => _x( 'Menu items', 'post type general name' ),
      'singular_name'      => _x( 'Menu item', 'post type singular name' ),
      'add_new'            => _x( 'Add New', 'item' ),
      'add_new_item'       => __( 'Add New Item to Menu' ),
      'edit_item'          => __( 'Edit Item' ),
      'new_item'           => __( 'New Item' ),
      'all_items'          => __( 'All Menu Items' ),
      'view_item'          => __( 'View Menu Item' ),
      'search_items'       => __( 'Search Menu Items' ),
      'not_found'          => __( 'No items found' ),
      'not_found_in_trash' => __( 'No items found in the Trash' ), 
      'parent_item_colon'  => ’,
      'menu_name'          => 'Menu Items'
    );
    $args = array(
      'labels'        => $labels,
      'description'   => 'All menu items',
      'public'        => true,
      'menu_position' => 5,
      'supports'      => array('title', 'revisions', 'page-attributes', 'thumbnail', 'custom-fields'),
      'has_archive'   => true,
      'show_in_menu' => true,
      'show_in_nav_menus' => true,
      'show_in_menu_bar' => true,
    );
    register_post_type( 'menu_item', $args ); 
  }

function create_menu_items_tag_taxonomies() 
{
  $labels = array(
    'name' => _x( 'Tags', 'taxonomy general name' ),
    'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Tags' ),
    'popular_items' => __( 'Popular Tags' ),
    'all_items' => __( 'All Tags' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Tag' ), 
    'update_item' => __( 'Update Tag' ),
    'add_new_item' => __( 'Add New Tag' ),
    'new_item_name' => __( 'New Tag Name' ),
    'separate_items_with_commas' => __( 'Separate tags with commas' ),
    'add_or_remove_items' => __( 'Add or remove tags' ),
    'choose_from_most_used' => __( 'Choose from the most used tags' ),
    'menu_name' => __( 'Tags' ),
  ); 

  register_taxonomy('tag','menu_item',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'tag' ),
  ));
}

/**
 * Create custom taxonomies/categories for the post type "Menu Items".
 *
 */
function create_menu_item_categories_taxonomies() {

/** Allergens */
  $labels = array(
      'name'              => _x( 'Allergens', 'taxonomy general name', 'textdomain' ),
      'singular_name'     => _x( 'Allergen', 'taxonomy singular name', 'textdomain' ),
      'search_items'      => __( 'Search Allergens', 'textdomain' ),
      'all_items'         => __( 'All Allergens', 'textdomain' ),
      'parent_item'       => __( 'Parent Allergen', 'textdomain' ),
      'parent_item_colon' => __( 'Parent Allergen:', 'textdomain' ),
      'edit_item'         => __( 'Edit Allergen', 'textdomain' ),
      'update_item'       => __( 'Update Allergen', 'textdomain' ),
      'add_new_item'      => __( 'Add New Allergen', 'textdomain' ),
      'new_item_name'     => __( 'New Allergen Name', 'textdomain' ),
      'menu_name'         => __( 'Allergen', 'textdomain' ),
  );

  $args = array(
      'hierarchical'      => true,
      'labels'            => $labels,
      'show_ui'           => true,
      'show_admin_column' => true,
      'query_var'         => true,
      'rewrite'           => array( 'slug' => 'allergen' ),
  );

  register_taxonomy( 'allergen', array( 'menu_item' ), $args );

  unset( $args );
  unset( $labels );

/** Meal Types */
$labels = array(
      'name'                       => _x( 'Meal Types', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Meal Type', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Meal Types', 'textdomain' ),
      'popular_items'              => __( 'Popular Meal Types', 'textdomain' ),
      'all_items'                  => __( 'All Meal Types', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Meal Type', 'textdomain' ),
      'update_item'                => __( 'Update Meal Type', 'textdomain' ),
      'add_new_item'               => __( 'Add New Meal Type', 'textdomain' ),
      'new_item_name'              => __( 'New Meal Type Name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate Meal Types with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove Meal Types', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used Meal Types', 'textdomain' ),
      'not_found'                  => __( 'No Meal Types found.', 'textdomain' ),
      'menu_name'                  => __( 'Meal Types', 'textdomain' ),
  );

  $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'meal_type' ),
  );

  register_taxonomy( 'meal_type', 'menu_item', $args );


  unset( $args );
  unset( $labels );

/** Contains */
$labels = array(
      'name'                       => _x( 'Contains', 'taxonomy general name', 'textdomain' ),
      'singular_name'              => _x( 'Contains', 'taxonomy singular name', 'textdomain' ),
      'search_items'               => __( 'Search Contains', 'textdomain' ),
      'popular_items'              => __( 'Popular Contains items', 'textdomain' ),
      'all_items'                  => __( 'All Contains items', 'textdomain' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Contains', 'textdomain' ),
      'update_item'                => __( 'Update Contains', 'textdomain' ),
      'add_new_item'               => __( 'Add New', 'textdomain' ),
      'new_item_name'              => __( 'New item name', 'textdomain' ),
      'separate_items_with_commas' => __( 'Separate items with commas', 'textdomain' ),
      'add_or_remove_items'        => __( 'Add or remove items', 'textdomain' ),
      'choose_from_most_used'      => __( 'Choose from the most used', 'textdomain' ),
      'not_found'                  => __( 'No Contains items found.', 'textdomain' ),
      'menu_name'                  => __( 'Contains items', 'textdomain' ),
  );

  $args = array(
      'hierarchical'          => true,
      'labels'                => $labels,
      'show_ui'               => true,
      'show_admin_column'     => true,
      'update_count_callback' => '_update_post_term_count',
      'query_var'             => true,
      'rewrite'               => array( 'slug' => 'contains' ),
  );

  register_taxonomy( 'contains', 'menu_item', $args );
}




//
// utilities functions
// remove width & height attributes from images
//
function remove_img_attr ($html)
{
    return preg_replace('/(width|height)="\d+"\s/', "", $html);
}

function console_dot_log($arg) {
  echo('<script>console.log("'.$arg.'");</script>');
}
