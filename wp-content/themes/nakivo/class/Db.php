<?php
namespace nakivo;

if (!defined('ABSPATH')) exit;

class Db
{
    /**
     *  construct method
     */
    function __construct()
    {
    }

    /**
     * Get all categories
     * @return array category
     */
    function get_all_categories(){
        $categories = get_categories( array(
            'type'         => 'post',
            'child_of'     => 0,
            'parent'       => '',
            'orderby'      => 'name',
            'order'        => 'ASC',
            'hide_empty'   => 0,
            'hierarchical' => 0,
            'exclude'      => '',
            'include'      => '',
            'number'       => 0,
            'taxonomy'     => 'category',
            'pad_counts'   => false,
        ) );
        return $categories;
    }

    function get_categories_counts(){
        $cats = $this->get_all_categories();
        $arr[0] = wp_count_posts()->publish;
        foreach($cats as $item){
            $arr[$item->cat_ID] = $item->category_count;
        }
        return $arr;
    }

}