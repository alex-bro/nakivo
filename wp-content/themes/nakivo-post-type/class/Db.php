<?php
namespace nakivo_pt;

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



}