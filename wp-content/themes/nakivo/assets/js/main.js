jQuery(document).ready(function($){

    function toggle_load_more(cat_id){
        if($('[data-cat-posts="'+cat_id+'"] .item').length < Number(abv.cat_counts[cat_id])){
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
        var cat_id = $this.attr('data-cat');
        $('.filter li').removeClass('active');
        $this.parents('li').addClass('active');
        $('.post_wrapper_all .posts-wrapper').removeClass('active');
        $('[data-cat-posts="'+cat_id+'"]').addClass('active');

        toggle_load_more(cat_id);

        return false;
    });

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
                    console.log(data.cat_counts);
                    if(data.result) {
                        $(".post_wrapper_all .active").append($(data.html).html());
                        abv.cat_counts = data.cat_counts;
                        toggle_load_more(cat);
                    }
                }
            });
        }

    })


});
