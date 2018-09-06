<?php
namespace nakivo;

if (!defined('ABSPATH')) exit;

class Ajax
    /**
     * construct method
     */
{
    function __construct()
    {
        add_action('init', [$this, 'ajax_init']);
    }

    /**
     * init ajax actions
     */
    function ajax_init()
    {

        add_action('wp_ajax_ajax_post_bulk', [$this, 'post_bulk']);
    }

    /**
     * post bulk
     */
    function post_bulk(){
        check_ajax_referer('ajax-va-nonce', 'security');
        $data = $_POST['data'];
        $res = (new Core())->post_bulk($data);
        if ($res){
            echo json_encode(wp_list_pluck($data['data'],'yt_id') );
        } else {
            echo json_encode(0);
        }

        wp_die();
    }

}