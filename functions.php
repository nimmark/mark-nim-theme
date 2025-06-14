<?php

function mark_theme_files()
{
    wp_enqueue_script('scroll-reavel', '//unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js', array(), null, true);
    wp_enqueue_script('main-mark-theme-js', get_theme_file_uri('/build/index.js'), array('jquery'), 1.0, true);
    wp_enqueue_style('icon', '//cdn.lineicons.com/5.0/lineicons.css');
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css');
    wp_enqueue_style('custom-google-font', '//fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap');
    wp_enqueue_style('mark_theme_main_styles', get_theme_file_uri('/build/index.css'));

    // wp_localize_script('main-mark-theme-js', 'markThemeData', array(
    //     'root_url' => get_site_url(),
    // ));
}
add_action('wp_enqueue_scripts', 'mark_theme_files');


function mark_theme_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
}
add_action('after_setup_theme', 'mark_theme_features');


//this funtion add additional class to body_class();
function cstm_body_class($classes)
{
    if (is_page('home')) {
        $classes[] = 'grid-container';
    }
    return $classes;
}
add_filter('body_class', 'cstm_body_class');



//Security & Performance start====================================================


function mark_theme_optimizations()
{
    // Remove unnecessary <head> tags
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');

    // Disable emojis and embeds
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    wp_deregister_script('wp-embed');
}
add_action('init', 'mark_theme_optimizations');


// Disable Dashicons, jQuery Migrate, etc.
function mark_theme_optimize_scripts()
{
    if (!is_user_logged_in()) wp_deregister_style('dashicons');
    wp_deregister_script('comment-reply');
}
add_action('wp_enqueue_scripts', 'mark_theme_optimize_scripts');

// Hide WordPress version
add_filter('the_generator', '__return_empty_string');

//Security & Performance end===========================================================


//CF7 HONEY POT
add_filter('wpcf7_validate', function ($result, $tags) {
    foreach ($tags as $tag) {
        if ($tag->name === 'honeypot') {
            $submission = WPCF7_Submission::get_instance();
            $data = $submission->get_posted_data();
            if (!empty($data['honeypot'])) {
                $result->invalidate($tag, 'Spam detected.');
            }
        }
    }
    return $result;
}, 10, 2);
