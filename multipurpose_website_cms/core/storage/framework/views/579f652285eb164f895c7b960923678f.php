
<?php $__env->startSection('meta-keywords', "$seo->contact_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->contact_meta_desc"); ?>

<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Contact')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Contact')); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== CONTACT DETAILS PART START ======-->
         
 <div class="contact-info-section section-gap">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
					<div class="contact-info-items mb-md-gap-50">
						<div class="contact-info-item text-center">
							<i class="fal fa-phone"></i>
							<h5 class="title"><?php echo e(__('Phone Number')); ?></h5>
								<?php
                                    $fnumber = explode( ',', $setting->number );
                                    for ($i=0; $i < count($fnumber); $i++) { 
                                        echo '<p>'.$fnumber[$i].'</p>';
                                    }
                                ?>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-envelope"></i>
							<h5 class="title"><?php echo e(__('Email Address')); ?></h5>
							<?php
								$femail = explode( ',', $setting->email );
								for ($i=0; $i < count($femail); $i++) { 
									echo '<p>'.$femail[$i].'</p>';
								}
							?>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-map"></i>
							<h5 class="title"><?php echo e(__('Office Location')); ?></h5>
							<p><?php echo e($setting->address); ?></p>
						</div>
						<div class="contact-info-item text-center">
							<i class="fal fa-globe"></i>
							<h5 class="title"><?php echo e(__('Opening Hours')); ?></h5>
							<p><?php echo e($setting->opening_hours); ?></p>
						</div>
					</div>
			</div>
			<div class="col-lg-6 ">
				<div class="contact-map-three">
					<?php echo $sinfo->contact_map; ?>

				</div> <!-- map area -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== CONTACT DETAILS PART ENDS ======-->

<!--====== GET IN TOUCH PART START ======-->
<section class="conatct-section section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title white-color text-center mb-60">
					<span class="title-tag"><?php echo e($sinfo->contact_sub_title); ?></span>
					<h2 class="title"><?php echo e($sinfo->contact_title); ?></h2>
				</div>
			</div>
		</div>
		<div class="contact-form-area wow fadeInUp" data-wow-delay="0.3s">
			<div class="row">
				<div class="col-lg-5">
					<div class="contact-thumb mb-md-gap-50">
						<img src="<?php echo e(asset('assets/front/img/'.$sinfo->contact_form_image)); ?>" alt="">
					</div>
				</div>
				<div class="col-lg-7">
					<div class="contact-form">
						<form action="<?php echo e(route('front.contact.submit')); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<h3 class="form-title"><?php echo e($sinfo->contact_form_title); ?></h3>
							<div class="row">
								<div class="col-lg-6">
									<div class="input-group mt-30">
										<input type="text" placeholder="<?php echo e(__('Full Name Here')); ?>" name="name">
										<span class="icon"<i class="fal fa-user"></i></span>
									</div> <!-- input box -->
									<?php if($errors->has('name')): ?>
										<p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
									<?php endif; ?>
								</div>
								<div class="col-lg-6">
									<div class="input-group mt-30">
										<input type="email" placeholder="<?php echo e(__('Email Here')); ?>" name="email">
										<span class="icon"<i class="fal fa-envelope-open"></i></span>
									</div> <!-- input box -->
									<?php if($errors->has('email')): ?>
										<p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
									<?php endif; ?>
								</div>
								<div class="col-lg-6">
									<div class="input-group mt-30">
										<input type="text" placeholder="<?php echo e(__('Phone No')); ?>" name="phone">
										<span class="icon"<i class="fal fa-phone"></i></span>
									</div> <!-- input box -->
									<?php if($errors->has('phone')): ?>
										<p class="text-danger"> <?php echo e($errors->first('phone')); ?> </p>
									<?php endif; ?>
								</div>
								<div class="col-lg-6">
									<div class="input-group mt-30">
										<input type="text" placeholder="<?php echo e(__('Subject')); ?>" name="subject">
										<span class="icon"<i class="fal fa-edit"></i></span>
										<?php if($errors->has('subject')): ?>
										<p class="text-danger"> <?php echo e($errors->first('subject')); ?> </p>
									<?php endif; ?>
									</div> <!-- input box -->
								</div>
								<div class="col-lg-12">
									<div class="input-group textarea-group mt-30">
										<textarea name="message" id="#" cols="30" rows="10" placeholder="<?php echo e(__('Message Us')); ?>"></textarea>
										<span class="icon"<i class="fal fa-pencil"></i></span>
										<?php if($errors->has('message')): ?>
										<p class="text-danger"> <?php echo e($errors->first('message')); ?> </p>
										<?php endif; ?>
									</div> <!-- input box -->
								</div>
								<div class="col-lg-12">
									<div class="input-grou textarea-groupp">
										<div class="contact-btn-captcha-wrapper  align-items-center pt-3">
										
											<button class="main-btn wow slideInUp d-inline-block" data-wow-duration="1.5s" data-wow-delay="0s" type="submit"><?php echo e(__('Send Message')); ?>

											<i class="fal fa-long-arrow-right"></i></button>
											<?php if($visibility->is_recaptcha == 1): ?>
												<div class="mt-3 d-inline-block ml-4" >
													<?php echo NoCaptcha::renderJs(); ?>

													<?php echo NoCaptcha::display(); ?>

													<?php if($errors->has('g-recaptcha-response')): ?>
													<?php
														$errmsg = $errors->first('g-recaptcha-response');
													?>
													<p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
													<?php endif; ?>
												</div>
											<?php endif; ?>
										</div>
									</div> <!-- input box -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="conatct-one-bg" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->contact_section_bg_image)); ?>)"></div>
</section>
<!--====== GET IN TOUCH PART ENDS ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/front/contact.blade.php ENDPATH**/ ?>