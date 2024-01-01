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
					<h2 class="title"><?php echo e(__('Checkout')); ?></h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
						<li class="active" aria-current="page"><?php echo e(__('Checkout')); ?></li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

<form class="needs-validation" action="javascript:;" id="payment_gateway_check" method="POST">
    <!-- Checkout Area Start -->
    <section class="checkout-area">
      <div class="container">
        <div class="row">
          <div class="col-md-5 order-md-2 mb-4">
            <div class="cart-product">
              <h4 class="d-flex justify-content-between align-items-center mb-3 g-title">
                <span><?php echo e(__('Your cart')); ?></span>
              <?php
                  $countitem = 0;
                  $cartTotal = 0;
                  if($cart){
                      foreach($cart as $p){
                          $cartTotal += (double)$p['price'] * (int)$p['qty'];
                          $countitem += $p['qty'];
                      }
                  }
  
              ?>
                <span class="badge badge-success badge-pill cart-item-view"><?php echo e($countitem); ?></span>
              </h4>
              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th class="img"><?php echo e(__('Image')); ?></th>
                      <th><?php echo e(__('Product Name')); ?></th>
                      <th class="t-total"><?php echo e(__('Total')); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                      <td>
                          <img src="<?php echo e(asset('assets/front/img/'.$item['image'])); ?>" class="w-70" alt="">
                      </td>
                    <td>
                      <?php
                          $product = App\Models\Product::findOrFail($id);
                      ?>
                      <h4 class="product-title">
                        <a href="<?php echo e(route('front.product.details',$product->slug)); ?>"><?php echo e($item['title']); ?></a></h4>
                    </td>
                    <td class="price"><?php echo e(Helper::showCurrencyPrice($item['price'])); ?> * <?php echo e($item['qty']); ?>

                      <br>
                      = <?php echo e(Helper::showCurrencyPrice($item['price'] * $item['qty'])); ?></td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
              <?php
                  $shipping_methods = DB::table('shippings')->where('language_id',$currentLang->id)->where('status',1)->get();
              ?>
              <?php if(count($shipping_methods)>0): ?>
              <div class="add-shiping-methods">
                <h4 class="g-title"><?php echo e(__('Shipping Methods')); ?></h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead class="cart-header">
                      <tr>
                        <th class="custom-space">#</th>
                        <th><?php echo e(__('Method')); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $shipping_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>
                            <input type="radio"  <?php if($loop->first): ?> checked <?php endif; ?>  name="shipping_charge" data="<?php echo e(Helper::showPrice($method->cost)); ?>" class="shipping-charge"
                              value="<?php echo e($method->id); ?>">
                          </td>
                          <td>
                            <p><strong><?php echo e($method->title); ?> (<span><?php echo e(Helper::showCurrencyPrice($method->cost)); ?></span>)</strong></p>
                            <p><small><?php echo e($method->subtitle); ?></small></p>
                          </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php endif; ?>
              <div class="cart-summery">
                <h4 class="title g-title">
                  <?php echo e(__('Cart Summery')); ?> :
                </h4>
                <table class="table table-bordered">
                  <tr>
                    <th width="33.3%"><?php echo e(__('Subtotal')); ?></th>
                    <td><?php echo e(Helper::showCurrencyPrice($cartTotal)); ?> </td>
                  </tr>
                  <?php if($shipping_methods->count() > 0): ?>
                  <?php
                      $shipping_cost = Helper::showPrice(json_decode($shipping_methods,true)[0]['cost']);
                  ?>
                    <tr>
                      <th width="33.3%"><?php echo e(__('Shiping Cost')); ?></th>
                      <td>+ <span><?php echo e(Helper::showCurrency()); ?></span><span class="shipping_cost"><?php echo e($shipping_cost); ?></span> </td>
                    </tr>
                  <?php endif; ?>
                  <tr>
                    <th width="33.3%">Total</th>
                    <td><span><?php echo e(Helper::showCurrency()); ?></span><span class="grand_total" data="<?php echo e(Helper::showPrice($cartTotal)); ?>" ><?php echo e(Helper::showPrice($cartTotal + $shipping_cost)); ?></span> </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-7 order-md-1">
            
              <div class="billing-area">
                <h4 class="mb-3 g-title"><?php echo e(__('Billing Address')); ?></h4>
                  <?php
                      $user = Auth::user();
                  ?>
                <div class="mb-3">
                  <label for="name"><?php echo e(__('Name')); ?></label>
                  <input type="text" class="form-control" id="name" name="billing_name" value="<?php echo e($user->name); ?>" placeholder="<?php echo e(__('Name')); ?>">
                  <?php if($errors->has('billing_name')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_name')); ?> </p>
                  <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="address"><?php echo e(__('Address')); ?></label>
                  <input type="text" class="form-control" name="billing_address" value="<?php echo e($user->address); ?>" id="address" placeholder="<?php echo e(__('Address')); ?>">
                  <?php if($errors->has('billing_address')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_address')); ?> </p>
                  <?php endif; ?>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email"><?php echo e(__('Email')); ?></label>
                    <input type="text" class="form-control" name="billing_email" value="<?php echo e($user->email); ?>" id="email" placeholder="<?php echo e(__('Email')); ?>" value="" >
                    <?php if($errors->has('billing_email')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_email')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="number"><?php echo e(__('Phone Number')); ?></label>
                    <input type="text" class="form-control" id="number" value="<?php echo e($user->phone); ?>" name="billing_number" placeholder="<?php echo e(__('Phone Number')); ?>" value="" >
                    <?php if($errors->has('billing_number')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_number')); ?> </p>
                    <?php endif; ?>
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country"><?php echo e(__('Country')); ?></label>
                    <input type="text" class="form-control" name="billing_country" value="<?php echo e($user->country); ?>" id="country" placeholder="<?php echo e(__('Country')); ?>" >
                    <?php if($errors->has('billing_country')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_country')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state">State</label>
                    <input type="text" class="form-control" name="billing_state" value="<?php echo e($user->state); ?>" id="state" placeholder="State" >
                    <?php if($errors->has('billing_state')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_state')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip-code"><?php echo e(__('Zip Code')); ?></label>
                    <input type="text" class="form-control" name="billing_zip_code" value="<?php echo e($user->zipcode); ?>" id="zip-code" placeholder="Zip Code" >
                    <?php if($errors->has('billing_zip_code')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('billing_zip_code')); ?> </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
  
              <div class="ship-diff-toogle">
                <div class="custom-control custom-switch">
                  <input type="checkbox" class="custom-control-input" name="is_ship" id="change_address"<?php echo e(old('is_ship') == 'on' ? 'checked' : ''); ?>>
                  <label class="custom-control-label" for="change_address"><?php echo e(__('Ship to a different location?')); ?></label>
                </div>
              </div>
  
              <div class="shipping-area <?php echo e(old('is_ship') == 'on' ? '' : 'd-none'); ?>" id="shipping-area">
                <h4 class="mb-3 g-title"><?php echo e(__('Shipping Address')); ?></h4>
                     <div class="mb-3">
                  <label for="name"><?php echo e(__('Name')); ?></label>
                  <input type="text" class="form-control" id="name" name="shipping_name" placeholder="<?php echo e(__('Name')); ?>">
                  <?php if($errors->has('shipping_name')): ?>
                  <p class="text-danger"> <?php echo e($errors->first('shipping_name')); ?> </p>
                  <?php endif; ?>
                </div>
                <div class="mb-3">
                  <label for="address"><?php echo e(__('Address')); ?></label>
                  <input type="text" class="form-control" name="shipping_address" id="address" placeholder="<?php echo e(__('Address')); ?>">
                  <?php if($errors->has('shipping_address')): ?>
                  <p class="text-danger"> <?php echo e($errors->first('shipping_address')); ?> </p>
                  <?php endif; ?>
                </div>
  
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="email"><?php echo e(__('Email')); ?></label>
                    <input type="text" class="form-control" name="shipping_email" id="email" placeholder="<?php echo e(__('Email')); ?>" value="" >
                    <?php if($errors->has('shipping_email')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('shipping_email')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="number"><?php echo e(__('Phone Number')); ?></label>
                    <input type="text" class="form-control" id="number" name="shipping_number" placeholder="<?php echo e(__('Phone Number')); ?>" value="" >
                    <?php if($errors->has('shipping_number')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('shipping_number')); ?> </p>
                    <?php endif; ?>
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-md-5 mb-3">
                    <label for="country"><?php echo e(__('Country')); ?></label>
                    <input type="text" class="form-control" name="shipping_country" id="country" placeholder="<?php echo e(__('Country')); ?>" >
                    <?php if($errors->has('shipping_country')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('shipping_country')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="state"><?php echo e(__('State')); ?></label>
                    <input type="text" class="form-control" name="shipping_state" id="state" placeholder="<?php echo e(__('State')); ?>" >
                    <?php if($errors->has('shipping_state')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('shipping_state')); ?> </p>
                    <?php endif; ?>
                  </div>
                  <div class="col-md-3 mb-3">
                    <label for="zip-code"><?php echo e(__('Zip Code')); ?></label>
                    <input type="text" class="form-control" name="shipping_zip_code" id="zip-code" placeholder="Zip Code" >
                    <?php if($errors->has('shipping_zip_code')): ?>
                    <p class="text-danger"> <?php echo e($errors->first('shipping_zip_code')); ?> </p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <?php echo csrf_field(); ?>
              <input type="hidden" value="" id="ref_id" name="ref_id">
              <div class="patment-area">
                <hr class="mb-4">
  
                <h4 class="mb-3"> <?php echo e(__('Select Payment Gateway')); ?> </h4>
                <div class="d-block my-3">
                  <div class="payment-gateway">
                      <ul class="select-payment">
                       
                          <?php $__currentLoopData = DB::table('payment_gateweys')->where('status',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <li class="product_payment_gateway_check" data-href="<?php echo e($gateway->id); ?>" id="<?php echo e($gateway->type == 'automatic' ? $gateway->title : $gateway->title); ?>">
                              <div class="img">
                                <img src="<?php echo e(asset('assets/front/img/'.$gateway->image)); ?>" title="<?php echo e($gateway->type == 'automatic' ? $gateway->title : $gateway->title); ?>" alt="gateway-image">
                              </div>
                          </li>

                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                      <?php if($errors->has('gateway')): ?>
                          <p class="text-danger"> <?php echo e($errors->first('gateway')); ?> </p>
                      <?php endif; ?>
                  </div>
                </div>
                <input type="hidden" value="" id="payment_gateway" name="payment_gateway" value="payment_gateway">
                
  
              <input type="hidden" name="currency_code" value="<?php echo e(Helper::showCurrencyCode()); ?>">
              <input type="hidden" name="currency_sign" value="<?php echo e(Helper::showCurrency()); ?>">
              <input type="hidden" name="currency_value" value="<?php echo e(Helper::showCurrencyValue()); ?>">
                <hr class="mb-4">
                <button class="main-btn paystack_btn" type="submit"><?php echo e(__('Place Order')); ?></button>
              </div>
          </div>
        </div>
      </div>
    </section>
</form>
<input type="hidden" id="product_paypal" value="<?php echo e(route('product.paypal.submit')); ?>">
<input type="hidden" id="product_stripe" value="<?php echo e(route('product.stripe.submit')); ?>">
<input type="hidden" id="product_paytm" value="<?php echo e(route('product.paytm.submit')); ?>">
<input type="hidden" id="product_paystack" value="<?php echo e(route('product.paystack.submit')); ?>">
<input type="hidden" id="product_cash_on_delivery" value="<?php echo e(route('product.cash_on_delivery.submit')); ?>">
<!-- Checkout Area End -->

<?php $__env->stopSection(); ?>
<?php
$data = App\Models\PaymentGatewey::whereKeyword('paystack')->first();
$paydata = $data->convertAutoData();

  if (Session::has('currency')){
        $curr = App\Models\Currency::where('id', session()->get('currency'))->first();
    }
    else
    {
        $curr = App\Models\Currency::where('is_default', 1)->first();
    }
?>

<?php $__env->startSection('script'); ?>

<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
 
  $(document).on('submit','.product_paystack',function(e){
    e.preventDefault();
    let shipcost = parseFloat($('.shipping_cost').text());
    
    shipcost = parseFloat(shipcost).toFixed();
      var total = parseFloat('<?php echo e(Helper::showPrice($cartTotal)); ?>') + parseFloat($('.shipping_cost').text());
          
          var handler = PaystackPop.setup({
            key: '<?php echo e($paydata['key']); ?>',
            email: '<?php echo e($user->email); ?>',
            amount: total * 100,
            currency: '<?php echo e(Helper::showCurrencyCode()); ?>',
            ref: ''+Math.floor((Math.random() * 1000000000) + 1),
            callback: function(response){
              $('#ref_id').val(response.reference);
              $('.product_paystack').removeClass('product_paystack');
              $('.paystack_btn').click();
            },
            onClose: function(){
              window.location.reload();
            }
          });
          handler.openIframe();
              return false;
  });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/product/checkout.blade.php ENDPATH**/ ?>