

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
						<?php echo e(__('User Dashboard')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('User Dashboard')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

    <!-- User Dashboard Start -->
	<section class="user-dashboard-area">
		<div class="container">
		  <div class="row">
			<div class="col-lg-3">
				<?php if ($__env->exists('user.dashboard-sidenav')) echo $__env->make('user.dashboard-sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			<div class="col-lg-9 ">
			  <div class="dashboard-inner pricingPlan-section  packag-page p-0">
				<div class="row">
					<?php if($packagedetail): ?>
					<div class="col-lg-5 col-md-9">
						<h4 class="mb-4"><strong><?php echo e(__('Active Package :')); ?></strong></h4>
						<div class="single-price">
							<h4 class="name">
								<?php echo e($packagedetail->name); ?>

							</h4>
							<div class="mbps">
								<?php echo e($packagedetail->speed); ?> <span><?php echo e(__('Mbps')); ?></span>
							</div>


							<div class="list">
								<?php
									$feature = explode( ',', $packagedetail->feature );
									for ($i=0; $i < count($feature); $i++) { 
										echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
									}
								?>
							</div>
							<div class="bottom-area">
								<div class="price-area">
									<div class="price-top-area">
										<?php if($packagedetail->discount_price == null): ?>
											<p class="price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetail->price); ?></p>
										<?php else: ?>
											<p class="discount_price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetail->discount_price); ?></p>
											<p class="price discounted"><del><?php echo e(Helper::showCurrency()); ?><?php echo e($packagedetail->price); ?></del></p>
										<?php endif; ?>
									</div>
									<p class="time">
										<?php echo e($packagedetail->time); ?>

									</p>
								</div>
							</div>
						</div>
					</div>
					<?php else: ?>
						<div class="col-lg-12">
							<h4 class="mb-4"><strong><?php echo e(__('Welcome')); ?>, <?php echo e(Auth::user()->name); ?></strong></h4>
							<h6><?php echo e(__("You don't purchase any package!!")); ?></h6>
						</div>
					<?php endif; ?>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	
	  </section>
    <!-- User Dashboard End -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/user/dashboard.blade.php ENDPATH**/ ?>