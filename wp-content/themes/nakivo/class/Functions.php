<?php
namespace nakivo;

if (!defined('ABSPATH')) exit;

class Functions
    /**
     * construct method
     */
{
    function __construct()
    {

    }

    /**
     * get current dmt time
     */
    static function get_time_gmt(){
        return time()+(get_option('gmt_offset')*60*60);
    }


}