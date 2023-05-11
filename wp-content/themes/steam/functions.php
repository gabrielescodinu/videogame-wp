<?php 

// init wordpress supports
add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_theme_support( 'widgets' );
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );

// add custom favicon support
add_theme_support( 'custom-logo', array(
    'height'      => 250,
    'width'       => 250,
    'flex-height' => true,
) );

// init wordpress menus
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'theme' ),
    'footer' => __( 'Footer Menu', 'theme' ),
) );

// init wordpress sidebars
// main footer
register_sidebar( array(
    'name' => __( 'Main Footer', 'theme' ),
    'id' => 'main-footer',
    'description' => __( 'Add widgets here to appear in your footer.', 'theme' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '',
    'after_title'   => '',
) );

// disable gutenberg
add_filter('use_block_editor_for_post', '__return_false');
// disable gutenberg for widgets and sidebars
add_filter( 'use_widgets_block_editor', '__return_false' );
// disable theme and plugin editor
define('DISALLOW_FILE_EDIT', true);
// optimize wordpress
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
remove_action( 'wp_head', 'wp_resource_hints', 2 );



// ACF save json folder
add_filter( 'acf/settings/save_json', function( $path ) {
    $path = get_stylesheet_directory() . '/acf-json';
    return $path;
});

// ACF load json folder
add_filter( 'acf/settings/load_json', function( $paths ) {
    unset( $paths[0] );
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;
});

// menu
function get_nested_menu_items($menu) {
    $navbar_items = wp_get_nav_menu_items($menu);
    $child_items = [];

    // pull all child menu items into separate object
    foreach ($navbar_items as $key => $item) {
        if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
    }

    // push child items into their parent item in the original object
    foreach ($navbar_items as $item) {
        foreach ($child_items as $key => $child) {
            if ($child->menu_item_parent == $item->ID) {
                if (!$item->child_items) {
                    $item->child_items = [];
                }

                array_push($item->child_items, $child);
                unset($child_items[$key]);
            }
        }
    }

    // return navbar object where child items are grouped with parents
    return $navbar_items;
}

// allow svg uploads
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// custom logo
add_theme_support( 'custom-logo' );
function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 200,
		'width'                => 100,
		'flex-height'          => false,
		'flex-width'           => false,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);

	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

// limit text
function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

// select your post type to find in search.php
function tg_exclude_pages_from_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'product' ) );
    }    
}
add_action( 'pre_get_posts', 'tg_exclude_pages_from_search_results' );


//fixing pagination of custom post type
function custom_posts_per_page( $query ) {
    if ( $query->is_archive('product') ) {
        set_query_var('posts_per_page', 1);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

// add styles and scripts
function theme_styles() {

    // add integrity and crossorigin attributes to stylesheet
    wp_style_add_data( 'font-awesome-css', 'integrity', 'sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==' );
    wp_style_add_data( 'font-awesome-css', 'crossorigin', 'anonymous' );
    wp_style_add_data( 'font-awesome-css', 'referrerpolicy', 'no-referrer' );

    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0', 'all' );

    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' );
    wp_dequeue_style( 'global-styles' );

    // add script js
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0', true );
    
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );