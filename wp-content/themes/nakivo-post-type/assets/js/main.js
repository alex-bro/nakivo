jQuery(document).ready(function($){

    /**
     * show or hide button load more
     * @param post_slug post slug
     */
    function toggle_load_more(post_slug){
        if($('[data-cat-posts="'+post_slug+'"] .item').length < Number(abv.post_counts[post_slug])){
            $('#load_more').css('cssText','display:block!important;');
        } else {
            $('#load_more').css('cssText','display:none!important;');
        }
    }

    /**
     *  click on filter
     */
    $('[data-cat]').on('click',function(){
        var $this = $(this);
        var post_slug = $this.attr('data-cat');
        $('.filter li').removeClass('active');
        $this.parents('li').addClass('active');
        $('.post_wrapper_all .posts-wrapper').removeClass('active');
        $('[data-cat-posts="'+post_slug+'"]').addClass('active');

        toggle_load_more(post_slug);

        return false;
    });

    /**
     *  get ajax posts
     */
    var processed = false;
    $('#load_more').click(function(){
        if(!processed){
            processed = true;
            var cat = $('.post_wrapper_all .active').attr('data-cat-posts');
            var count = $('.post_wrapper_all .active .item').length;
            $('#spinner').css('visibility','visible');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: abv.ajaxurl,
                data: {
                    'action': 'ajax_get_news',
                    'security': $('#security_va').val(),
                    'data':{
                        'cat':cat,
                        'count':count
                    },
                },
                success: function (data) {
                    processed = false;
                    $('#spinner').css('visibility','hidden');
                    if(data.result) {
                        $(".post_wrapper_all .active").append($(data.html).html());
                        abv.post_counts = data.post_counts;
                        toggle_load_more(cat);
                    }
                }
            });
        }

    })


});
