<div class="col-lg-4 col-md-6 item-wrap">
    <a href="<?php echo get_the_permalink($item->ID) ?>">
        <div class="item" <?php if($url = get_the_post_thumbnail_url($item, 'medium')) echo 'style="background-image: url('.$url.')"' ?> >
            <div class="text-wrap">
                <p class="date"><?php echo get_the_date('F j, Y', $item) ?></p>
                <p class="title">
                    <?php echo get_the_title($item) ?>
                </p>
                <p class="text">
                   <?php
                   if(strpos($item->post_content,'<!--more-->') !== false){
                       echo wp_trim_words(get_extended($item->post_content)['main'], 10, '');
                   } else {
                       echo wp_trim_words($item->post_content, 10, '');
                   }
                   ?>
                </p>
            </div>
        </div>
    </a>
</div>