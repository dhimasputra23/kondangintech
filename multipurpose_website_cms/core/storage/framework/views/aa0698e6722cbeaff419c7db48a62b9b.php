

<div class="tab-pane fade active show" id="v-pills-ptab<?php echo e($category_id->id); ?>" role="tabpanel" aria-labelledby="v-pills-ptab<?php echo e($category_id->id); ?>-tab">
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-md-3">
        <div class="product-item">
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
            <p class="price"><del><?php echo e(Helper::showCurrencyPrice($product->previous_price)); ?></del> <?php echo e(Helper::showCurrencyPrice($product->current_price)); ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>

<?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/load/product.blade.php ENDPATH**/ ?>