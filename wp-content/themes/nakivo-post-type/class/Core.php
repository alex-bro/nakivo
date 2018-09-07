<?php
namespace nakivo_pt;

if (!defined('ABSPATH')) exit;

class Core
{
    /**
     * @var string version of theme
     */
    public $version;

    /**
     * @var array category post counts
     */
    public $post_counts;

    /**
     * @var array list post types for filter
     */
    public $list_post_types = [
        'post',
        'stories',
        'press',
        'events'
    ];

    /**
     * construct method
     */
    function __construct()
    {
        $ajax = new Ajax();

        $this->version = '0.0.1';
        $this->post_counts = $this->get_posts_counts();

        $this->theme_setting();
        $this->theme_action();
    }

    /**
     * get posts counts and all
     * @return array id=>count of post
     */
    function get_posts_counts(){
        $all = 0;
        $arr = [];
        foreach($this->list_post_types as $item){
            $count = (int)wp_count_posts($item)->publish;
            $arr[$item] = $count;
            $all += $count;
        }
        $arr['all'] = $all;
        return $arr;
    }

    /**
     * theme actions and filters
     */
    function theme_action()
    {
        add_action('wp_enqueue_scripts', [$this, 'add_scripts']);
        add_action('init', [$this, 'add_post_types']);
    }

    /**
     * add post types
     */
    function add_post_types()
    {
        /**
         * Post Type: Success Stories.
         */
        $labels = array(
            "name" => __("Success Stories", ""),
            "singular_name" => __("Success Store", ""),
            "menu_name" => __("Success Stories", ""),
            "all_items" => __("Success Stories", ""),
            "add_new" => __("Add New Success Story", ""),
            "add_new_item" => __("Add New Success Story", ""),
            "edit_item" => __("Edit Success Story", ""),
            "new_item" => __("New Success Story", ""),
            "view_item" => __("View Success Story", ""),
            "view_items" => __("View Success Stories", ""),
            "search_items" => __("Search Success Story", ""),
            "not_found" => __("No Success Story found", ""),
            "not_found_in_trash" => __("No Success Story found in Trash", ""),
            "parent_item_colon" => __("Parent Success Story", ""),
        );

        $args = array(
            "label" => __("Success Stories", ""),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array("slug" => "stories", "with_front" => true),
            "query_var" => true,
            "supports" => array("title", "editor", "thumbnail"),
        );

        register_post_type("stories", $args);

        /**
         * Post Type: Press Releases.
         */
        $labels = array(
            "name" => __("Press Releases", ""),
            "singular_name" => __("Press Release", ""),
            "menu_name" => __("Press Releases", ""),
            "all_items" => __("Press Releases", ""),
            "add_new" => __("Add New Press Release", ""),
            "add_new_item" => __("Add New Press Release", ""),
            "edit_item" => __("Edit Press Release", ""),
            "new_item" => __("New Press Release", ""),
            "view_item" => __("View Press Release", ""),
            "view_items" => __("View Press Releases", ""),
            "search_items" => __("Search Press Release", ""),
            "not_found" => __("No Press Release found", ""),
            "not_found_in_trash" => __("No Press Release found in Trash", ""),
            "parent_item_colon" => __("Parent Press Release", ""),
        );

        $args = array(
            "label" => __("Press Releases", ""),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array("slug" => "press", "with_front" => true),
            "query_var" => true,
            "supports" => array("title", "editor", "thumbnail"),
        );

        register_post_type("press", $args);

        /**
         * Post Type: Events.
         */

        $labels = array(
            "name" => __("Events", ""),
            "singular_name" => __("Event", ""),
            "menu_name" => __("Events", ""),
            "all_items" => __("Events", ""),
            "add_new" => __("Event Add New", ""),
            "add_new_item" => __("Add New Event", ""),
            "edit_item" => __("Edit Event", ""),
            "new_item" => __("New Event", ""),
            "view_item" => __("View Event", ""),
            "view_items" => __("View Events", ""),
            "search_items" => __("Search Event", ""),
            "not_found" => __("Not Found Event", ""),
            "not_found_in_trash" => __("Not Found Event in Trash", ""),
            "parent_item_colon" => __("Parent Event", ""),
        );

        $args = array(
            "label" => __("Events", ""),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => false,
            "rest_base" => "",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => array("slug" => "events", "with_front" => true),
            "query_var" => true,
            "supports" => array("title", "editor", "thumbnail"),
        );

        register_post_type("events", $args);
    }

    /**
     *  theme settings
     */
    function theme_setting()
    {
        // add post thumbnail
        add_theme_support('post-thumbnails', array(
            'post',
            'stories',
            'press',
            'events'
        ));


    }

    /**
     * add scripts and styles
     */
    function add_scripts()
    {
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css', array(), $this->version);
        wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css', array(), $this->version);

        wp_enqueue_script('jquery-3-2-1', get_template_directory_uri() . '/assets/lib/jquery-3.2.1.min.js', array(), $this->version, true);
        wp_enqueue_script('popper', get_template_directory_uri() . '/assets/lib/bootstrap-4.0.0-dist/js/popper.min.js', array(), $this->version, true);
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/lib/bootstrap-4.0.0-dist/js/bootstrap.min.js', array(), $this->version, true);
        wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), $this->version, true);

        wp_localize_script('jquery-3-2-1', 'abv', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'post_counts' => $this->post_counts,
        ));
    }

}