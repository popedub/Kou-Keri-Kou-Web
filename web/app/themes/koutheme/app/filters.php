<?php

namespace App;

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
});

/**
 * Customize ACF path
 */
add_filter('acf/settings/path', function ( $path ) {

    $path = get_stylesheet_directory() . '/../vendor/advanced-custom-fields/advanced-custom-fields-pro/';

    return $path;

});

/**
 * Customize ACF dir
 */
add_filter('acf/settings/dir', function ( $dir ) {

    $dir = get_stylesheet_directory_uri() . '/../vendor/advanced-custom-fields/advanced-custom-fields-pro/';

    return $dir;

});

/**
 * Hide ACF field group menu item
 */
// add_filter('acf/settings/show_admin', '__return_false');

/**
 * include ACF
 */
include_once( get_stylesheet_directory() . '/../vendor/advanced-custom-fields/advanced-custom-fields-pro/acf.php' );

/**
 * Browsersync reload on post save
 */
add_action('save_post', function () {
    // WP_ENV must be set on your development environment in order for this to work
    // This is already defined if you are using Bedrock
    if (WP_ENV === 'development') {
        $args = ['blocking' => false];
        wp_remote_get('http://localhost:3000/__browser_sync__?method=reload', $args);
    }
});



add_filter('wp_handle_upload_prefilter', function ($file){

    $img=getimagesize($file['tmp_name']);
    $minimum = array('width' => '780', 'height' => '400');
    $width= $img[0];
    $height =$img[1];

    if ($width < $minimum['width'] )
        return array("error"=>"Image dimensions are too small. Minimum width is {$minimum['width']}px. Uploaded image width is $width px");

    elseif ($height <  $minimum['height'])
        return array("error"=>"Image dimensions are too small. Minimum height is {$minimum['height']}px. Uploaded image height is $height px");
    else
        return $file;
});
