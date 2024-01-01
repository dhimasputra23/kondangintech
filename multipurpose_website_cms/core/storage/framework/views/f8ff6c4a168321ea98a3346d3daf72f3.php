
<?php $__env->startSection('meta-keywords', "$seo->product_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->product_meta_desc"); ?>


<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/jquery-ui.css">
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Products')); ?></h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
						<li class="active" aria-current="page"><?php echo e(__('Products')); ?></li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

  <!-- Product Area Start -->
  <section class="product-area section-gap">
    <div class="container">
      <div class="row justify-content-center">
       <?php echo $__env->make('front.load.search_product',$categories, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="col-lg-9">
            <div class="shop-top-bar">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-md-4">
                        <div class="shop-search-form serch-form">
                            <div class="input-box">
                                <input type="text" id="searchProductInput" value="<?php echo e(request()->input('search')); ?>" placeholder="<?php echo e(__('Search Product')); ?>...">
                                <button id="searchProduct"><i class="fal fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="product-sorting">
                            <select class="form-control product-sorting-select" id="sorting">
                              <option value="new" <?php echo e(request()->input('type') == 'new' ? 'selected' : ''); ?> ><?php echo e(__('Newest')); ?></option>
                              <option value="old" <?php echo e(request()->input('type') == 'old' ? 'selected' : ''); ?> ><?php echo e(__('Oldest')); ?></option>
                              <option value="high_low" <?php echo e(request()->input('type') == 'high_low' ? 'selected' : ''); ?>><?php echo e(__('Highest To Lowest')); ?></option>
                              <option value="low_high" <?php echo e(request()->input('type') == 'low_high' ? 'selected' : ''); ?>><?php echo e(__('Lowest To Highest')); ?></option>
                            </select>
                          </div>
                    </div>
                </div>
            </div>
          <div class="row entry-products">
           
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 col-sm-6">
                <div class="product-item mb-30">
                    <div class="product-thumb">
                        <img src="<?php echo e(asset('assets/front/img/'.$product->image)); ?>" alt="Image">
                        <?php if($product->stock <= 0): ?>
                            <?php if($product->is_downloadable != 1): ?>
                                <span class="tag"><?php echo e(__('Stock Out')); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div class="product-overlay">
                            <ul>
                                <li><a href="javascript:;" data-href="<?php echo e(route('add.cart',$product->id)); ?>" class="cart-link"  data-toggle="tooltip" data-placement="right" title="<?php echo e(__('Add To Cart')); ?>"><i class="fal fa-shopping-cart"></i></a></li>
                                <li>
                                  <form class="d-inline-block" method="GET" action="<?php echo e(route('front.product.checkout',$product->slug)); ?>">
                                    <button class=""  data-toggle="tooltip" data-placement="right" title="<?php echo e(__('Buy Now')); ?>"> <i class="fal fa-shopping-bag"></i></button>
                                  </form>
                                <li><a href="<?php echo e(route('front.product.details',$product->slug)); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo e(__('View Details')); ?>"><i class="fal fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5 class="title"><a href="<?php echo e(route('front.product.details',$product->slug)); ?>"><?php echo e($product->title); ?></a></h5>
                        <div class="rate">
                          <div class="rating" style="width:<?php echo e($product->rating * 20); ?>%"></div>
                        </div>
                        <p class="price"><del><?php echo e(Helper::showCurrencyPrice($product->previous_price)); ?></del> <?php echo e(Helper::showCurrencyPrice($product->current_price)); ?></p>
                    </div>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <nav aria-label="Page navigation example">
                  <?php echo e($products->links()); ?>

              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Product Area End -->
  <form action="<?php echo e(route('front.products')); ?>" method="GET" id="search_product">
    <input type="hidden" name="category" value="<?php echo e(request()->input('category')); ?>" id="category_id">
    <input type="hidden" name="search" value="<?php echo e(request()->input('search')); ?>" id="search">
    <input type="hidden" name="max" value="<?php echo e(request()->input('max')); ?>" id="max">
    <input type="hidden" name="min" value="<?php echo e(request()->input('min')); ?>" id="min">
    <input type="hidden" name="type" value="<?php echo e(request()->input('type')); ?>" id="type">
    <input type="hidden" name="rating" value="<?php echo e(request()->input('rating')); ?>" id="rating">
    <button type="submit" id="search_submit" class="d-none"></button>
  </form>
    


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/front/')); ?>/js/jquery-ui.js"></script>


    <script>
        $(document).on('change','.rating_count',function(){
            $('#search_product #rating').val($(this).val());
            submit();
        });

        $(document).on('click','.filter_price',function(){
            let max = $('.price-range-max').html();
            let min = $('.price-range-min').html();
            $('#search_product #max').val(max);
            $('#search_product #min').val(min);
            submit();
        });

        $(document).on('change','#sorting',function(){
            let sort = $(this).val();
            $('#type').val(sort);
            submit();
        });

        $(document).on('click','#searchProduct',function(){
            let search = $('#searchProductInput').val();
            console.log(search);
            $('#search').val(search);
            submit();
        });


        $(document).on('click','#category',function(){
            let category = $(this).attr('data');
            $('#category_id').val(category);
            submit();
        });



        function submit(){
            $('#search_submit').click();
        }



        function collision($div1, $div2) {
        var x1 = $div1.offset().left;
        var w1 = 40;
        var r1 = x1 + w1;
        var x2 = $div2.offset().left;
        var w2 = 40;
        var r2 = x2 + w2;
        if (r1 < x2 || x1 > r2) return false;
        return true;
        }

        // Fetch Url value
        var getQueryString = function (parameter) {
        var href = window.location.href;
        var reg = new RegExp("[?&]" + parameter + "=([^&#]*)", "i");
        var string = reg.exec(href);
        return string ? string[1] : null;
        };
        // End url

        // // slider call
        $("#slider").slider({
            range: true,
            min: 0,
            max: 9999,
            step: 1,
            values: [
            getQueryString("minval") ? getQueryString("minval") : '<?php echo e(request()->input('min') ? request()->input('min') : 0); ?>',
            getQueryString("maxval") ? getQueryString("maxval") :'<?php echo e(request()->input('max') ? request()->input('max') : ''); ?>',
            ],

            slide: function (event, ui) {
            $(".ui-slider-handle:eq(0) .price-range-min").html( ui.values[0]);
            $(".ui-slider-handle:eq(1) .price-range-max").html( ui.values[1]);
            $(".price-range-both").html(
                "<i>" + ui.values[0] + " - </i>" + ui.values[1]
            );

            // get values of min and max
            $("#minval").val(ui.values[0]);
            $("#maxval").val(ui.values[1]);

            if (ui.values[0] == ui.values[1]) {
                $(".price-range-both i").css("display", "none");
            } else {
                $(".price-range-both i").css("display", "inline");
            }

            if (collision($(".price-range-min"), $(".price-range-max")) == true) {
                $(".price-range-min, .price-range-max").css("opacity", "0");
                $(".price-range-both").css("display", "block");
            } else {
                $(".price-range-min, .price-range-max").css("opacity", "1");
                $(".price-range-both").css("display", "none");
            }
            },
        });

        $(".ui-slider-range").append(
            '<span class="price-range-both value"><i>' +
            $("#slider").slider("values", 0) +
            " - </i>" +
            $("#slider").slider("values", 1) +
            "</span>"
        );

        $(".ui-slider-handle:eq(0)").append(
            '<span class="price-range-min value">' +
            $("#slider").slider("values", 0) +
            "</span>"
        );

        $(".ui-slider-handle:eq(1)").append(
            '<span class="price-range-max value">' +
            $("#slider").slider("values", 1) +
            "</span>"
        );

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/product/index.blade.php ENDPATH**/ ?>