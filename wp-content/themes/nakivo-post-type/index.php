<?php get_header(); ?>
    <div class="news-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title text-center">Latest NAKIVO News</h2>
                </div>
            </div>
            <div class="row">
                <ul class="filter text-center d-block mx-auto">
                    <?php \nakivo_pt\Widgets::show_filter(); ?>
                </ul>
            </div>
            <div class="post_wrapper_all">
                <?php echo \nakivo_pt\Widgets::get_all_posts(); ?>
            </div>

            <div class="row">
                <img id="spinner" class="d-block mx-auto" src="<?php echo get_template_directory_uri() ?>/assets/img/spinner.gif" alt="">
            </div>
            <div class="row">
                <button id="load_more" class="btn btn-light d-block mx-auto" <?php global $nakivo_pt;  if($nakivo_pt->post_counts['all']) echo ' style="display: block!important;"'  ?>>Load More</button>
            </div>
        </div>
    </div>
<?php get_footer(); ?>