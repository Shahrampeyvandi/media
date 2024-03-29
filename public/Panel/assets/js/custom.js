$(document).ready(function(){

    $(document).on("click",".button__", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        $("#comment_id").attr("value", id);
        $(".overlay").css({
            visibility: "visible",
            opacity: "1",
            "z-index": "10",
        });
    });
 
    $('.close').click(function(e){
     e.preventDefault()
     $('.overlay').css({  'visibility': 'hidden',
         'opacity': '0',
         'z-index': '10',})
    })

    $('.btn--delete').click(function(e){
        e.preventDefault()
        let id = $(this).data('id')
       $('#comment_id').attr('value',id)
     $('.overlay').css({  'visibility': 'visible',
         'opacity': '1',
         'z-index': '10',})
    })
    
   
 
    $('.close').click(function(e){
     e.preventDefault()
     $('.overlay').css({  'visibility': 'hidden',
         'opacity': '0',
         'z-index': '0',})
    })

    $('.post--delete').click(function(e){
        e.preventDefault()
        let postid = $(this).data('id')
        let memberid = $(this).data('member')
       $('#post-id').attr('value',postid)
       $('#member-id').attr('value',memberid)
     $('.overlay.delete').css({'visibility': 'visible',
         'opacity': '1',
         'z-index': '10',})
    })

    
    $('.post-check').click(function(e){
        e.preventDefault()
        let id = $(this).data('id')
       $('#post-id').attr('value',id)
     $('.overlay.confirm').css({  'visibility': 'visible',
         'opacity': '1',
         'z-index': '10',})
    })

  

    $(document).on('click','.delete-post',function(e){
        e.preventDefault()
        let id = $(this).data('id')
        $('#post_id').attr('value',id)
        $('.overlay').css({  'visibility': 'visible',
        'opacity': '1',
        'z-index': '10',})
    })
   



    
})

