<?php
namespace nakivo;

if (!defined('ABSPATH')) exit;

class Core
{
    /**
     * @var string version of theme
     */
    public $version;
    /**
     * construct method
     */
    function __construct()
    {
        $this->version = '0.0.1';

        //(new Ajax());

        $this->theme_setting();

        add_action('wp_enqueue_scripts', [$this, 'add_scripts']);


    }

    /**
     *  theme settings
     */
    function theme_setting(){
        add_theme_support('post-thumbnails', array(
            'post',
        ));
    }

    /**
     * add scripts in admin side
     */
    function add_scripts()
    {
        wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css', array(), $this->version );
        wp_enqueue_style( 'main-css', get_template_directory_uri().'/assets/css/main.css', array(), $this->version );

        wp_enqueue_script( 'jquery-3-2-1', get_template_directory_uri() . '/assets/lib/jquery-3.2.1.slim.min.js', array(), $this->version, true );
        wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/lib/bootstrap-4.0.0-dist/js/popper.min.js', array(), $this->version, true );
        wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/lib/bootstrap-4.0.0-dist/js/bootstrap.min.js', array(), $this->version, true );
        wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array(), $this->version, true );
    }

}