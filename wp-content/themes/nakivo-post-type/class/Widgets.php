<?php
namespace nakivo_pt;

if (!defined('ABSPATH')) exit;

class Widgets

{
    /**
     * construct method
     */
    function __construct(){

    }

    /**
     * Show filter menu
     */
    static function show_filter(){
        global $nakivo_pt;
        ?> <li class="active"><a href="#" data-cat="all">All News</a></li> <?php
        foreach($nakivo_pt->list_post_types as $item) {
            ?>
            <li><a href="#" data-cat="<?php echo $item ?>"><?php echo get_post_type_object($item)->labels->name;  ?></a></li>
            <?php
        }
    }

    /**
     *  return posts on main page in POST method query
     * @return string html code
     */
    static function get_all_posts(){
        $html = self::get_posts('all',0);
        global $nakivo_pt;
        foreach($nakivo_pt->list_post_types as $item) {
            $html .= self::get_posts($item,0);
        }
        return $html;
    }

    /**
     * get all post types and by category and offset
     * @param int $all all posts switch
     * @param int $count offset
     * @param string $post_type post type slag
     * @return string html code
     */
    static function get_posts($post_type = 'all', $count = 0){
        if($post_type == 'all'){
            global $nakivo_pt;
            $args = [
                'post_type'=>$nakivo_pt->list_post_types,
                'offset'=>$count,
                'posts_per_page' => 3,
                'orderby'=>'date',
                'order'=>'DESC ',
            ];
        } else {
            $args = [
                'post_type'=>$post_type,
                'offset'=>$count,
                'posts_per_page' => 3,
                'orderby'=>'date',
                'order'=>'DESC ',
            ];
        }

        $items = get_posts( $args );
        wp_reset_postdata();

        ob_start();
        include get_template_directory().DIRECTORY_SEPARATOR.'template-parts'.DIRECTORY_SEPARATOR.'news'.DIRECTORY_SEPARATOR.'post-cat.php';
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}