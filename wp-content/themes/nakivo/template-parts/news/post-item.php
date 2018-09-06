<div class="col-md-4">
    <a href="<?php echo get_the_permalink($item->ID) ?>">
        <div class="item">
            <div class="text-wrap">
                <p class="date"><?php echo get_the_date('F j, Y', $item) ?></p>
                <p class="title">
                    <?php echo get_the_title($item) ?>
                </p>
                <p class="text">
                   <?php
                   if(strpos($item->post_content,'<!--more-->') !== false){
                       echo get_extended($item->post_content)['main'];
                   } else {
                       echo wp_trim_words($item->post_content, 10, '');
                   }
                   ?>
                </p>
            </div>
        </div>
    </a>
</div>