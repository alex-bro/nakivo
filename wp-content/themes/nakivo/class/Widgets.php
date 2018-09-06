<?php
namespace nakivo;

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
        $db = new Db();
        $cats = $db->get_all_categories();
        ?> <li class="active"><a href="#" data-cat="0">All News</a></li> <?php
        foreach($cats as $item) {
            ?>
            <li><a href="#" data-cat="<?php echo $item->cat_ID ?>"><?php echo $item->name ?></a></li>
            <?php
        }
    }

    static function get_all_posts(){
        $html = self::get_posts();
        $db = new Db();
        $cats = $db->get_all_categories();
        foreach($cats as $item) {
            $html .= self::get_posts($item->cat_ID);
        }
        return $html;
    }

    static function get_posts($cat = 0, $count = 0){
        if(!$cat){
            $args = [
                'offset'=>$count,
                'posts_per_page' => 3,
                'orderby'=>'date',
                'order'=>'DESC ',
            ];
        } else {
            $args = [
                'category'=>$cat,
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