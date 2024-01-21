

<?php $__env->startSection('meta-keywords', "$setting->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$setting->meta_description"); ?>
<?php $__env->startSection('content'); ?>

	<!--Main Breadcrumb Area Start -->
	<div class="main-breadcrumb-area" style="background-image : url('<?php echo e(asset('assets/front/img/' . $commonsetting->breadcrumb_image)); ?>');">
        <div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="pagetitle">
						<?php echo e(__('Shop')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Shop')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

 	<!-- Shop Area Start -->
     <section class="shop-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="product-filter ">
						<div class="left">
							<p><?php echo e(__('Total Available Products :')); ?> <?php echo e($count_product); ?></p>
						</div>
						<div class="right">
							<form action="<?php echo e(route('front.products')); ?>" method="GET" class="product-search-form">
									<input type="text" class="form-control" name="search" placeholder="<?php echo e(__('Search')); ?>" value="<?php echo e(request()->input('search')); ?>">
									<button type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row ">
				<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-3 col-md-6">
					<div class="single-product">
						<div class="img">
							<img src="<?php echo e(asset('assets/front/img/'. $product->image)); ?>" alt="">
						</div>
						<div class="content">
							<h4 class="name">
								<a href="<?php echo e(route('front.product.details', $product->slug)); ?>"><?php echo e($product->title); ?></a>
							</h4>
							<div class="price">
								<?php echo e(Helper::showCurrency()); ?><?php echo e($product->current_price); ?> <del><?php echo e(Helper::showCurrency()); ?><?php echo e($product->current_price); ?></del>
							</div>
							<?php if(Auth::user()): ?>
								<a data-href="<?php echo e(route('add.cart',$product->id)); ?>" href="#" class="mybtn1 add-cart-btn first cart-link"> <?php echo e(__('Add
								to Cart')); ?> <i class="fas fa-shopping-cart"></i></a>
							<?php else: ?>
								<a href="<?php echo e(route('user.login')); ?>" class="mybtn1"><?php echo e(__('Add to Cart')); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="row">
				<div class="d-inline-block mx-auto">
				  <?php echo e($products->links()); ?>

				</div>
			  </div>
		</div>
	</section>
	<!-- Shop Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/front/product.blade.php ENDPATH**/ ?>