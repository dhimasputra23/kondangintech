
<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
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


  <!-- Cart Area Start -->
  <section class="shoping-cart-area  section-gap">
    <?php if($cart !=null): ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="cart-table table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo e(__('Image')); ?></th>
                      <th><?php echo e(__('Product Name')); ?></th>
                      <th><?php echo e(__('Quantity')); ?></th>
                      <th><?php echo e(__('Price')); ?></th>
                      <th><?php echo e(__('Total')); ?></th>
                      <th><?php echo e(__('Action')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                          $i = 1;
                          $cartTotal = 0;
                          $countitem = 0;
                      ?>
                      <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pid => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php
                          $countitem += $item['qty'];
                          $cartTotal += (double)$item['price'] * (int)$item['qty'];
                          $product = App\Models\Product::findOrFail($pid);
                      ?>
                      <input type="hidden" value="<?php echo e($pid); ?>" class="product_id">
                      <tr class="remove<?php echo e($pid); ?>">
                          <td><?php echo e($i++); ?></td>
                          <td class="product-thumbnail">
                              <img src="<?php echo e(asset('assets/front/img/'.$item['image'])); ?>" alt="product-image">
                          </td>
                          <td class="product-name"> 
                            <?php
                                $cproduct = App\Models\Product::where('id', $item['id'])->first();
                            ?>
                            <a href="<?php echo e(route('front.product.details',$cproduct->slug)); ?>"><?php echo e($item['title']); ?></a>
                          </td>
                          <td class="product-quantity"><input type="number" aria-details="<?php echo e($product->stock); ?>" name="product_quantity[]" class="quantity form-control cart_qty_update" value="<?php echo e($item['qty']); ?>">
                          </td>
                          <td class="product-subtotal">
                            <?php echo e(Helper::showCurrencyPrice($item['price'])); ?>

                            
                             <span class="fas fa-times"></span> <?php echo e($item['qty']); ?></td>
                          <td class="product-subtotal"><span><?php echo e(Helper::showCurrency()); ?></span><span class="cart_price"><?php echo e(Helper::showPrice($item['price']) * $item['qty']); ?></td></span>
                          <td class="product-remove">
                            <a href="javascript:;" class="item-remove" rel="<?php echo e($pid); ?>" data-href="<?php echo e(route('cart.item.remove',$pid)); ?>"><i class="far fa-trash-alt"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
            </div>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-right">
            <div class="update-cart d-inline-block">
              <button id="cart_update" rel="<?php echo e(__('Updating...')); ?>" rel2="<?php echo e(__('Update Cart')); ?>"  data-href="<?php echo e(route('cart.update')); ?>" class="main-btn"><?php echo e(__('Update Cart')); ?></button>

            </div>
          </div>
      </div>
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="cart-total-box">
              <h4 class="title">
                Cart Summery :
              </h4>
              <ul class="list">
                <li>
                    <?php echo e(__('Total Item')); ?><span><?php echo e($countitem); ?></span>
                </li>
                <li>
                  <?php echo e(__('Total')); ?> <span><?php echo e(Helper::showCurrencyPrice($cartTotal)); ?></span>
                </li>
              </ul>
              <a href="<?php echo e(route('front.checkout')); ?>" class="main-btn"> Checkout </a>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="bg-light py-5 text-center">
              <h3 class="text-uppercase"><?php echo e(__('Cart is empty!')); ?></h3>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </section>
  <!-- Cart Area End -->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/product/cart.blade.php ENDPATH**/ ?>