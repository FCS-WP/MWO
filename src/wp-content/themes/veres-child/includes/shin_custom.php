<?php
add_action('wp_enqueue_scripts', 'shin_scripts');
function shin_scripts()
{
    $version = time();

    wp_enqueue_style('main-style-css', THEME_URL . '-child' . '/assets/dist/css/main.min.css', array(), $version, 'all');

    wp_enqueue_script('main-scripts-js', THEME_URL . '-child' . '/assets/dist/js/main.min.js', array('jquery'), $version, true);
}


add_filter('wp_sitemaps_add_provider', function ($provider, $name) {
    if ('users' === $name) {
        return false;
    }

    return $provider;
}, 10, 2);

add_filter('wp_sitemaps_register_providers', function ($providers) {
    unset($providers['users']);
    return $providers;
});
