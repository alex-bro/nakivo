jQuery(document).ready(function($){
    /**
     *  click on filter
     */
    $('[data-cat]').on('click',function(){
        var $this = $(this);
        var cat_id = $this.attr('data-cat');
        $('.filter li').removeClass('active');
        $this.parents('li').addClass('active');
        $('.post_wrapper_all .posts-wrapper').removeClass('active');
        $('[data-cat-posts="'+cat_id+'"]').addClass('active');
        return false;
    })
});
