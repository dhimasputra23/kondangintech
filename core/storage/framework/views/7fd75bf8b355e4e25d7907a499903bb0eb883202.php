

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
						<?php echo e(__('Service')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Service')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!--Main Breadcrumb Area End -->
    
    <!-- Service Area Start -->
	<section class="service-area service-page">
		<div class="container">
			<div class="row">
				<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 col-md-6">
					<a href="<?php echo e(route('front.service.details', $service->slug)); ?>" class="single-service">
						<div class="left-area">
							<img class="w-80" src="<?php echo e(asset('assets/front/img/'.$service->icon)); ?>" alt="">
						</div>
						<div class="right-area">
							<h4 class="title">
								<?php echo e($service->name); ?>

							</h4>
							<p class="text">
								<?php echo e((strlen(strip_tags(Helper::convertUtf8($service->content))) > 120) ? substr(strip_tags(Helper::convertUtf8($service->content)), 0, 120) . '...' : strip_tags(Helper::convertUtf8($service->content))); ?>

							
							</p>
						</div>
					</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<!-- Service Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/front/service.blade.php ENDPATH**/ ?>