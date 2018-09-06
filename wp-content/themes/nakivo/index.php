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
                    <?php \nakivo\Widgets::show_filter(); ?>
                </ul>
            </div>
            <div class="post_wrapper_all">
                <?php echo \nakivo\Widgets::get_all_posts(); ?>
            </div>

            <div class="row">
                <button id="load_more" class="btn btn-light d-block mx-auto">Load More</button>
            </div>
        </div>
    </div>
<?php get_footer(); ?>