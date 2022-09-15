<?php

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

class Paikarz_Child
{
    function __construct()
    {
        $this->init();
        $this->globals();
        $this->includes();
    }

    private function init()
    {
        add_filter('locale_stylesheet_uri', array($this, 'paikarz_child_locale_css'));
        add_action('wp_enqueue_scripts', array($this, 'paikarz_child_parent_css'), 10);
    }

    public function paikarz_child_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }

    public function paikarz_child_parent_css()
    {
        wp_enqueue_style('paikarz_child_parent', trailingslashit(get_template_directory_uri()) . 'style.css', array('slick', 'chosen', 'fancybox-css', 'fancybox-buttons', 'fancybox-thumbs'));

        // Custom CSS Front
        wp_enqueue_style('paikarz-child-css', get_stylesheet_directory_uri() . '/assets/css/custom.css', '', PKZ_VERSION);
    }

    /**
     * Includes
     */
    public function includes()
    {
        require_once(get_stylesheet_directory() . '/inc/custom-functions.php');
    }

    /**
     * Globals
     */
    public function globals()
    {
        if (!defined('PKZ_SITE_URL')) {
            define('PKZ_SITE_URL', get_site_url());
        }

        if (!defined('PKZ_VERSION')) {
            define('PKZ_VERSION', '1.0.0');
        }

        if (!defined('PKZ_MAP_VERSION')) {
            define('PKZ_MAP_VERSION', '1.0.0');
        }

        if (!defined('PKZ_ADMIN_VERSION')) {
            define('PKZ_ADMIN_VERSION', '1.0.0');
        }

        if (!defined('PKZ_CHILD_FILE_DIR')) {
            define('PKZ_CHILD_FILE_DIR', get_stylesheet_directory() . '/assets/file');
        }
    }
}

new Paikarz_Child;
