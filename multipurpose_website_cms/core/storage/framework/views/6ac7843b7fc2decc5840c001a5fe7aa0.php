
<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>

<?php
    $reviews = App\Models\ProductReview::where('product_id', $product->id)->get();
    $avarage_rating = App\Models\ProductReview::where('product_id',$product->id)->avg('review');
    $avarage_rating =  round($avarage_rating,2);

    if(Auth::user()){
        $userID = Auth::user()->id;
    }else{
        $userID = null;
    }

    $userOrders = App\Models\Order::where('user_id', $userID)->get();

    $isBuyProduct = '';

    foreach ($userOrders as $key => $userOrder) {
      $cart = json_decode($userOrder->cart,true);
      foreach ($cart as $key => $item){
        if($item['id'] == $product->id){
          $isBuyProduct = true;
        }
      }
    }


?>

<?php $__env->startSection('content'); ?>

    <!--====== PAGE TITLE PART START ======-->

    <div class="page-title-area"
        style="background-image: url('<?php echo e(asset('assets/front/img/' . $setting->breadcrumb_image)); ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title"><?php echo e(__('Product Details')); ?></h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
                            <li class="active" aria-current="page"><?php echo e(__('Product Details')); ?></li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!-- Product Details Section Start -->
    <section class="product-details-area section-gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="product-gallery-wrap mb-md-gap-50">
                       <?php
                           $pc = App\Models\ProductImage::where('product_id', $product->id)->first();
                       ?>
                        <?php if($pc): ?>
                            <div class="product-main-slider">
                                <?php $__currentLoopData = $product->product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="image">
                                        <img src="<?php echo e(asset('assets/front/img/' . $image->image)); ?>" alt="Image">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="product-thumb-slider mt-30 row">
                                <?php $__currentLoopData = $product->product_images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="image col">
                                        <img src="<?php echo e(asset('assets/front/img/' . $image2->image)); ?>" alt="Image">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div> 
                        <?php else: ?>
                            <div class="s-image">
                                <img src="<?php echo e(asset('assets/front/img/'.$product->image)); ?>" alt="Image">
                            </div>
                        <?php endif; ?>
                        
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="product-summery">
                        <div class="rate">
                            <div class="rating" style="width:<?php echo e($product->rating * 20); ?>%"></div>
                        </div>

                        <h4 class="title"><?php echo e($product->title); ?></h4>
                        <p class="price"><?php echo e(Helper::showCurrencyPrice($product->current_price)); ?>

                            <del><?php echo e(Helper::showCurrencyPrice($product->previous_price)); ?>

                        </p>

                        <div class="product-meta">
                            <ul>
                                <?php if($product->stock > 0): ?>
                                    <?php if($product->is_downloadable != 1): ?>
                                        <li class="stock"><span><?php echo e(__('Stock')); ?>:</span> <?php echo e(__('In Stock')); ?></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li class="out-stock"><span><?php echo e(__('Stock')); ?>:</span> <?php echo e(__('Out of Stock')); ?>

                                    </li>
                                <?php endif; ?>
                                <li><span><?php echo e(__('Category')); ?> : </span><?php echo e($product->category->name); ?></li>
                                <?php if($product->sku): ?>
                                    <li><span><?php echo e(__('SKU')); ?> : </span><?php echo e($product->sku); ?></li>
                                    <?php endif; ?>
                            </ul>
                        </div>
                        <p class="short-desc"><?php echo e($product->short_description); ?></p>
                            <?php if($product->is_downloadable != 1): ?>
                                <div class="qtySelector product-quantity">
                                    <span class="decreaseQty subclick"><i class="fas fa-minus "></i></span>
                                    <input type="text" class="qtyValue cart-amount" value="1" />
                                    <span class="increaseQty addclick"><i class="fas fa-plus"></i></span>
                                    <input type="hidden" value="<?php echo e($product->stock); ?>" id="current_stock">
                                </div>
                            <?php endif; ?>
                        <div class="cart-buttons">
                            <a data-href="<?php echo e(route('add.cart', $product->id)); ?>" href="javascript:;"
                                class="main-btn add-cart-btn first cart-link"> <?php echo e(__('Add
                    to Cart')); ?>

                                <i class="fas fa-shopping-cart"></i></a>

                            <form class="d-inline-block ml-2" method="GET"
                                action="<?php echo e(route('front.product.checkout', $product->slug)); ?>">
                                <input type="hidden" class="qtyValue cart-amount" value="1" />
                                <button class="main-btn add-cart-btn"> <?php echo e(__('Buy Now')); ?> <i
                                        class="fas fa-shopping-basket"></i></button>
                            </form>
                        </div>

                        <?php if($visibility->is_shop_share_links == 1 ): ?>
                        <div class="a2a_kit a2a_kit_size_32">
                            <ul class="social-share">
                                <li>
                                    <a class="facebook a2a_button_facebook" href="">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="twitter a2a_button_twitter" href="">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="linkedin a2a_button_linkedin" href="">
                                        <i class="fab fa-linkedin-in"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="pinterest a2a_button_pinterest" href="">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">

                    <div class="product-details-tab">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#descriptions"
                                    role="tab"><?php echo e(__('Description')); ?></a> 
                            </li>
                            <?php if($product->attributes_title  &&  $product->attributes_description ): ?>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specifications"
                                        role="tab"><?php echo e(__('Features')); ?></a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#review" role="tab"><?php echo e(__('Reviews')); ?></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="descriptions" role="tabpanel">
                                <?php echo $product->description; ?>

                            </div>
                            <?php if($product->attributes_title  &&  $product->attributes_description): ?>
                            <div class="tab-pane fade" id="specifications" role="tabpanel">
                                <table class="table table-bordered">
                                    <?php if($product->attributes_title && $product->attributes_description): ?>
                                        <?php $__currentLoopData = explode(',,,', $product->attributes_title); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr_key => $attr_title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $attr_desc = explode(',,,', $product->attributes_description)[$attr_key];
                                            ?>
                                            <tr>
                                                <th><?php echo e($attr_title); ?></th>
                                                <td><?php echo e($attr_desc); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </table>
                            </div>
                            <?php endif; ?>
                            <div class="tab-pane fade" id="review" role="tabpanel">
                                <div class="review-wrapper">

                                  <?php if(count($reviews) > 0): ?>
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <div class="review-single">
                                        <div class="avatar">
                                            <img src="<?php echo e($review->user->image ? asset('assets/front/img/' . $review->user->image) : 'no-image'); ?>"
                                                class="img-fluid" alt="">
                                        </div>
                                        <div class="comnt-text">
                                            <div class="comnt-info">
                                                <h5><?php echo e($review->user->name); ?></h5>
                                                <div class="review-block">
                                                  <div class="rate">
                                                    <div class="rating" style="width:<?php echo e($review->review * 20); ?>%"></div>
                                                  </div>
                                                </div>
                                                <p class="date-area"><?php echo e($review->created_at->diffForHumans()); ?></p>
                                            </div>
                                            <p class=""><?php echo e($review->comment); ?></p>
                                        </div>
                                      </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php else: ?>
                                    <div class="bg-light mt-4 text-center py-5">
                                      <?php echo e(__('No Rating Available')); ?>

                                    </div>
                                  <?php endif; ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(Auth::user()): ?>
                                            <?php if($isBuyProduct == true): ?>

                                                <div class="review-form">
                                                    <h3 class="mb-60"><?php echo e(__('Add a Review')); ?></h3>

                                                    <div class="star-area d-flex justify-content-between">
                                                        <h5><?php echo e(__('Your Rating:')); ?></h5>
                                                        <ul class="star-list">
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="1">
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="2">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="active">
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="3">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="4">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="review-block">
                                                                    <div class="star-review">
                                                                        <div class="star" data="5">
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                            <i class="fas fa-star"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <form action="<?php echo e(route('front.review.submit')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="review" id="rating_get" value="">
                                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>"
                                                            id="">
                                                        <div class="form-group mb-30">
                                                            <textarea class="form-control"  name="comment" rows="10"
                                                                placeholder="<?php echo e(__('Your Message')); ?>"></textarea>
                                                        </div>
                                                        <button class="main-btn"
                                                            type="submit"><?php echo e(__('Post a Review')); ?></button>
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <div class="review-form">
                                                <a href="<?php echo e(route('user.login')); ?>"
                                                    class="main-btn"><?php echo e(__('Login')); ?></a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Product Details Section Start -->


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/product/details.blade.php ENDPATH**/ ?>