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
        add_action('wp_ajax_ajax_get_news', [$this, 'get_news']);
        add_action('wp_ajax_nopriv_ajax_get_news', [$this, 'get_news']);
    }

    /**
     * get news by ajax
     */
    function get_news(){
        check_ajax_referer('ajax-va-nonce', 'security');
        global $nakivo;

        $res = Widgets::get_posts($_POST["data"]["cat"],$_POST["data"]["count"]);

        if ($res){
            echo json_encode(['result'=>true,'html'=>$res,'cat_counts'=>$nakivo->cat_counts]);
        } else {
            echo json_encode(['result'=>false,'html'=>'','cat_counts'=>$nakivo->cat_counts]);
        }

        wp_die();
    }

}