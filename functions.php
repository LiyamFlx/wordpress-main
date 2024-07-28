// functions.php

/**
 * Register Custom Post Types
 */
function register_custom_post_types() {
    // Register News Post Type
    register_post_type('news', array(
        'labels' => array(
            'name' => __('News'),
            'singular_name' => __('News')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));

    // Register Games Post Type
    register_post_type('games', array(
        'labels' => array(
            'name' => __('Games'),
            'singular_name' => __('Game')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'games'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));

    // Register Top Stories Post Type
    register_post_type('top_stories', array(
        'labels' => array(
            'name' => __('Top Stories'),
            'singular_name' => __('Top Story')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'top-stories'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));

    // Register News Cards Post Type
    register_post_type('news_cards', array(
        'labels' => array(
            'name' => __('News Cards'),
            'singular_name' => __('News Card')
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news-cards'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    ));
}
add_action('init', 'register_custom_post_types');

/**
 * Register Custom Taxonomy for News Categories
 */
function create_news_taxonomy() {
    $labels = array(
        'name'              => _x('News Categories', 'taxonomy general name'),
        'singular_name'     => _x('News Category', 'taxonomy singular name'),
        'search_items'      => __('Search News Categories'),
        'all_items'         => __('All News Categories'),
        'parent_item'       => __('Parent News Category'),
        'parent_item_colon' => __('Parent News Category:'),
        'edit_item'         => __('Edit News Category'),
        'update_item'       => __('Update News Category'),
        'add_new_item'      => __('Add New News Category'),
        'new_item_name'     => __('New News Category Name'),
        'menu_name'         => __('News Categories'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'news-category'),
    );

    register_taxonomy('news_category', array('news'), $args);
}
add_action('init', 'create_news_taxonomy', 0);

/**
 * Register Custom Taxonomy for Games Categories
 */
function create_games_taxonomy() {
    $labels = array(
        'name'              => _x('Games Categories', 'taxonomy general name'),
        'singular_name'     => _x('Games Category', 'taxonomy singular name'),
        'search_items'      => __('Search Games Categories'),
        'all_items'         => __('All Games Categories'),
        'parent_item'       => __('Parent Games Category'),
        'parent_item_colon' => __('Parent Games Category:'),
        'edit_item'         => __('Edit Games Category'),
        'update_item'       => __('Update Games Category'),
        'add_new_item'      => __('Add New Games Category'),
        'new_item_name'     => __('New Games Category Name'),
        'menu_name'         => __('Games Categories'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'games-category'),
    );

    register_taxonomy('games_category', array('games'), $args);
}
add_action('init', 'create_games_taxonomy', 0);

/**
 * Enqueue JavaScript for Carousel
 */
function enqueue_scripts() {
    wp_enqueue_script('carousel-script', get_template_directory_uri() . '/js/main.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');
