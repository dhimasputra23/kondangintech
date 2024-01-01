

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
					<h2 class="title"><?php echo e(__('Success')); ?></h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Success')); ?></li>
						</ul>
					
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->


 <!--====== ABOT FAQ PART START ======-->
         
 <div class="section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="order-success-box">
                    <h1><?php echo e(__('Successfuly Order Done !')); ?></h1>
                    <p><?php echo e(__('Payment Compleate, and Invoice sent to your email.')); ?></p>
					<a href="<?php echo e(route('front.index')); ?>" class="main-btn mt-4"><?php echo e(__('Back Home')); ?></a>
                </div>
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== ABOT FAQ PART ENDS ======-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/success/product.blade.php ENDPATH**/ ?>