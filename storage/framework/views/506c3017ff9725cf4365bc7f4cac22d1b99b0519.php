

<?php $__env->startSection('content'); ?>
<?php
    

?>
<div class="row showall-wrapper">
    <div class="col-md-12">
        <section id="" style="padding: 40px 0;" class="list-item li px-3" data-list="slider">
            <div class="wpb_wrapper py-3">
                <h2 class="font__family-open-sans font__size-20  mt-15 mb-15 title__divider title__divider--line"
                    style="margin-right: 0px;"><span class="title__divider__wrapper text-header">  <?php echo e($title); ?> <span
                            class="line brk-base-bg-gradient-right"></span>
                    </span></h2>
                <a href="#">   
                </a>
            </div>
            <div class="container position-relative">
                <div id="sizes" class="d-flex flex-sm-wrap position-absolute  refinement-group-wrapper my-2" style="left: 30px;top: -100px;">
                   
                    <div class="show--filters refinement-group mb-3 text-right pr-3" style="max-width: 1000px;">
                       
                    </div>

                </div>
                <div class="row content-page justify-content-sm-center justify-content-md-start ">
                   
                    <?php if(request()->path() == 'category/videos'): ?>
                    <?php $__env->startComponent('Main.components.video',['videos' => $posts]); ?>
                
                    <?php if (isset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba)): ?>
<?php $component = $__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba; ?>
<?php unset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if(request()->path() == 'category/genplus'): ?>
                    <?php $__env->startComponent('Main.components.video',['videos' => $posts]); ?>
                
                    <?php if (isset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba)): ?>
<?php $component = $__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba; ?>
<?php unset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if(request()->path() == 'category/animations'): ?>
                    <?php $__env->startComponent('Main.components.video',['videos' => $posts]); ?>
                
                    <?php if (isset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba)): ?>
<?php $component = $__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba; ?>
<?php unset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if(request()->path() == 'category/podcasts'): ?>
                    <?php $__env->startComponent('Main.components.podcast',['podcasts' => $posts]); ?>
                    <?php if (isset($__componentOriginal499b5f8004307d5f3c8fc9852dc47e7018e5fa1e)): ?>
<?php $component = $__componentOriginal499b5f8004307d5f3c8fc9852dc47e7018e5fa1e; ?>
<?php unset($__componentOriginal499b5f8004307d5f3c8fc9852dc47e7018e5fa1e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                 
                    <?php if(request()->path() == 'category/musics'): ?>
                    <?php $__env->startComponent('Main.components.music',['musics' => $posts]); ?>
                    <?php if (isset($__componentOriginal3f4b5a3d350223054b91697b5f2734dccaae4b6a)): ?>
<?php $component = $__componentOriginal3f4b5a3d350223054b91697b5f2734dccaae4b6a; ?>
<?php unset($__componentOriginal3f4b5a3d350223054b91697b5f2734dccaae4b6a); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
                    <?php if(request()->path() == 'category/tutorial'): ?>
                    <?php $__env->startComponent('Main.components.video',['videos' => $posts]); ?>
                
                    <?php if (isset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba)): ?>
<?php $component = $__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba; ?>
<?php unset($__componentOriginald7ef89c74a2a6fd287c782bf336d87ee05cae3ba); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
                    <?php endif; ?>
    
                </div>
                <div class="paginate-item">
                    <?php echo e($posts->links()); ?>


                </div>
            </div>
        </section>
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
  $(document).ready(function(){
var lang_array=[];
var subject_array=[];
var level_array=[];
var labels = [];
var category_id = "<?php echo e($cid); ?>";
// ajax for category

$(document).on('change','input[name="lang[]"]',function(e){
    e.preventDefault();
    $('.page-loader').fadeIn(300)
    var lang_array=[];
    var subject_array=[];
    var level_array=[];
    $('.show--filters').empty() 
       $('input[name="lang[]"]').each(function(){
        
                if($(this).is(':checked')){
                    lang_array.push($(this).val())
                   let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2" > ${name}</a>`);

               }
            })
            $('input[name="subject[]"]').each(function(){
                if($(this).is(':checked')){
                    subject_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2" > ${name}</a>`);
                  
            
               }
            })
            $('input[name="level[]"]').each(function(){
                if($(this).is(':checked')){
                    level_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3" > ${name}</a>`);

                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2" > ${name}</a>`);
                  
            
               }
            })
            
            
            let url = '<?php echo e(route("FilterData")); ?>';
           
            $.ajax({ 
                url: url,
                type: 'GET',
                data:{
                    
                    langs:lang_array,
                    subjects:subject_array,
                    levels:level_array,
                    category_id:category_id
                },
                dataType: 'JSON', 
                
                success: function(res) {

                    $('.content-page').html(res[0])
                    $('.paginate-item').html(res[1])
                    $('.page-loader').fadeOut(300)
                }
        })

  
});
$(document).on('change','input[name="subject[]"]',function(e){
    e.preventDefault();
    $('.page-loader').fadeIn(300)
    var lang_array=[];
var subject_array=[];
var level_array=[];
        $('.show--filters').empty() 
         $('input[name="subject[]"]').each(function(){
                if($(this).is(':checked')){
                    subject_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
        $('input[name="level[]"]').each(function(){
                if($(this).is(':checked')){
                    level_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
        $('input[name="lang[]"]').each(function(){
                if($(this).is(':checked')){
                    lang_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
        
       
            let url = '<?php echo e(route("FilterData")); ?>';
            
            $.ajax({ 
                url: url,
                type: 'GET',
                data:{
                    langs:lang_array,
                    subjects:subject_array,
                    levels:level_array,
                    category_id:category_id

                },
                dataType: 'JSON', 
              
                success: function(res) {
                    $('.content-page').html(res[0])
                    $('.paginate-item').html(res[1])
                    $('.page-loader').fadeOut(300)
                }
             })

});
$(document).on('change','input[name="level[]"]',function(e){
    e.preventDefault();
    $('.page-loader').fadeIn(300)
    var lang_array=[];
    var subject_array=[];
    var level_array=[];
    $('.show--filters').empty() 
    $('input[name="level[]"]').each(function(){
                if($(this).is(':checked')){
                    level_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
       $('input[name="lang[]"]').each(function(){
                if($(this).is(':checked')){
                    lang_array.push($(this).val()) 
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                       
               }
            })
            $('input[name="subject[]"]').each(function(){
                if($(this).is(':checked')){
                    subject_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
            let url = '<?php echo e(route("FilterData")); ?>';
           
            $.ajax({ 
                url: url,
                type: 'GET',
                data:{langs:lang_array,
                    subjects:subject_array,
                    levels:level_array,
                    category_id:category_id

                },
                dataType: 'JSON', 
                
                success: function(res) {
                    $('.content-page').html(res[0])
                    $('.paginate-item').html(res[1])
                    $('.page-loader').fadeOut(300)
                }
            
        })

       

});

$(document).on('click','.page-link',function(e){
    e.preventDefault()
    var page = $(this).attr('href').split('page=')[1];
    $('.page-loader').fadeIn(300)
    var lang_array=[];
    var subject_array=[];
    var level_array=[];
    $('.show--filters').empty() 
    $('input[name="level[]"]').each(function(){
                if($(this).is(':checked')){
                    level_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
       $('input[name="lang[]"]').each(function(){
                if($(this).is(':checked')){
                    lang_array.push($(this).val()) 
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                       
               }
            })
            $('input[name="subject[]"]').each(function(){
                if($(this).is(':checked')){
                    subject_array.push($(this).val())
                    let name = $(this).data('name')
                    $('.show--filters').append( `<a href="#" class=" text-dark color-bg-white radius-5 border-1 bc-theme px-2 py-1 mr-3 mb-2 d-inline-block" > ${name}</a>`);
                  
               }
            })
            let url = '<?php echo e(route('BaseUrl')); ?>/filterdata?page='+page+'';
           
            $.ajax({ 
                url: url,
                type: 'GET',
                data:{langs:lang_array,
                    subjects:subject_array,
                    levels:level_array,
                    category_id:category_id

                },
                dataType: 'JSON', 
               
                success: function(res) {
                    $('.content-page').html(res[0])
                    $('.paginate-item').html(res[1])
                    $('.page-loader').fadeOut(300)
                }
            
        })
})
var request = false;
$(document).on('keyup','.search-field',function(e){
    e.preventDefault()
    setTimeout(() => {
        if (!request) {
        $('.page-loader').fadeIn(300)
        request = true;
        let key = $(this).val();
        let cat_id = '<?php echo e($cid); ?>';
        let url = '<?php echo e(route('FilterWithName')); ?>';
    
          $.ajax({ 
               url: url,
               type: 'GET',
               data:{key:key,cat_id:cat_id},
               dataType: 'JSON', 
              
               success: function(res) {
                   
                   $('.page-loader').fadeOut(300)
                   $('.content-page').html(res[0])
                   $('.paginate-item').html(res[1])
                   setTimeout(()=>{
                       request=false;
                   },500)
                   
               }
           
       })
       
     }
   },1000)
})

  });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.Main.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\media\resources\views/Main/ShowAll.blade.php ENDPATH**/ ?>