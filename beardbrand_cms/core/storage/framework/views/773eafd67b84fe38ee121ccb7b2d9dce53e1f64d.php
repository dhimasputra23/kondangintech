
<?php $__env->startSection('meta-keywords', "$setting->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$setting->meta_description"); ?>
<?php $__env->startSection('content'); ?>

		<!-- Hero Area Start -->
	<section class="hero-area">
		<div class="hero-area-slider">
			<div class="intro-carousel">
				<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="intro-content slide-one" style="background-image: url(<?php echo e(asset('assets/front/img/'.$slider->image)); ?>)">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="slider-content">
									<!-- layer 1 -->
									<div class="layer-1">
										<h4 class="subtitle"><?php echo e($slider->name); ?></h4>
										<h2 class="title"><?php echo e($slider->offer); ?></h2>
									</div>
									<!-- layer 2 -->
									<div class="layer-2">
										<p class="text">
											<?php echo e($slider->desc); ?>

										</p>
									</div>
									<!-- layer 3 -->
									<div class="layer-3">
										<a href="<?php echo e(route('front.package')); ?>" class="mybtn1"><span><?php echo e(__('Start Now')); ?>

												<i class="fas fa-angle-right"></i>
											</span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				
			</div>
		</div>
	</section>
	<!-- Hero Area End -->

	<?php if($commonsetting->is_about_section): ?>
	<!-- About Area Start -->
	<section class="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 align-self-center">
						<div class="section-heading">
							<h4 class="title">
								<?php echo e($sectionInfo->about_title); ?>

							</h4>
							<p class="text">
								<?php echo $sectionInfo->about_subtitle; ?>

							</p>
						</div>
						
						<ul class="list">
							<?php $__currentLoopData = $abouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<li>
								<p><?php echo e($about->feature); ?></p>
							</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="right-images">
						<img  src="<?php echo e(asset('assets/front/img/'.$sectionInfo->about_image)); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About Area End -->
	<?php endif; ?>

	<?php if($commonsetting->is_package_section): ?>
	<!-- Pricingplan Area Start -->
	<section class="pricingPlan-section" 
	<?php if($commonsetting->is_package_bg): ?>
		style="background-image : url('<?php echo e(asset('assets/front/img/' . $sectionInfo->pricing_bg)); ?>')"
	<?php endif; ?>
	>
	<?php if($commonsetting->is_package_bg): ?>
		<div class="overlay"></div>
	<?php endif; ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading
					<?php if($commonsetting->is_package_bg): ?>
					white-color
					<?php endif; ?>
					">
						<h2 class="title">
							<?php echo e($sectionInfo->plan_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->plan_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="pricing-slider">
						<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="slider-item">
							<div class="single-price">
								<h4 class="name">
									<?php echo e($plan->name); ?>

								</h4>
								<div class="mbps">
									<?php echo e($plan->speed); ?> <span><?php echo e(__('Mbps')); ?></span>
								</div>
									
									
								<div class="list">
									<?php
								$feature = explode( ',', $plan->feature );
								for ($i=0; $i < count($feature); $i++) { 
									echo '<li><p href="mailto:'.$feature[$i].'">'.$feature[$i].'</p></li>';
								}
							?>
								</div>
								<div class="bottom-area">
									<div class="price-area">
										<div class="price-top-area">
											<?php if($plan->discount_price == null): ?>
												<p class="price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->price); ?></p>
											<?php else: ?>
												<p class="discount_price showprice"><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->discount_price); ?></p>
												<p class="price discounted"><del><?php echo e(Helper::showCurrency()); ?><?php echo e($plan->price); ?></del></p>
											<?php endif; ?>
										</div>
										<p class="time">
											<?php echo e($plan->time); ?>

										</p>
									</div>
									<?php if(Auth::user()): ?>
									<a href="<?php echo e(route('front.packagecheckout', $plan->id)); ?>" class="mybtn1"><?php echo e(__('Get Start')); ?></a>
									<?php else: ?>
									<a href="<?php echo e(route('user.login')); ?>" class="mybtn1"><?php echo e(__('Get Start')); ?></a>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Pricingplan Area End -->
	<?php endif; ?>

	<?php if($commonsetting->is_offer_section): ?>
	<!-- Offer Area Start -->
	<section class="offer-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($sectionInfo->offer_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->offer_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 align-self-center">
					<ul class="offer-list">
						<?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<div class="content">
								<?php echo $offer->offer; ?>

							</div>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
				<div class="col-lg-6 align-self-center">
					<div class="offer-image">
						<img class="w-80" src="<?php echo e(asset('assets/front/img/'.$sectionInfo->offer_image)); ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Offer Area End -->
	<?php endif; ?>

	<?php if($commonsetting->is_counter_section): ?>
	<!-- Counter Area Start -->
	<section class="counter-section"  
	<?php if($commonsetting->is_counter_bg): ?>
	style="background-image : url('<?php echo e(asset('assets/front/img/' . $sectionInfo->funfact_bg)); ?>')"
	<?php endif; ?>
	>
	<?php if($commonsetting->is_counter_bg): ?>
		<div class="overlay"></div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<?php $__currentLoopData = $funfacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $funfact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3 col-md-6">
						<div class="single-counter">
							<div class="icon">
								<img src="<?php echo e(asset('assets/front/img/'.$funfact->icon)); ?>" alt="">
							</div>
							<div class="content">
								<h4><?php echo e($funfact->value); ?></h4>
								<p><?php echo e($funfact->name); ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>
	</section>
	<!-- Counter Banner Area End -->
	<?php endif; ?>

	<?php if($commonsetting->is_service_section): ?>
	<!-- Service Area Start -->
	<section class="service-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($sectionInfo->service_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->service_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
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
	<?php endif; ?>

	<?php if($commonsetting->is_testimonial_section): ?>
	<!-- Testimonial Start -->
	<section class="testimonial" id="testimonial"  
	<?php if($commonsetting->is_testimonial_bg): ?>
	style="background-image : url('<?php echo e(asset('assets/front/img/' . $sectionInfo->testimonial_bg)); ?>')"
	<?php endif; ?>
	>
	<?php if($commonsetting->is_testimonial_bg): ?>
		<div class="overlay"></div>
		<?php endif; ?>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading
					<?php if($commonsetting->is_testimonial_bg): ?>
					white-color
					<?php endif; ?>
					">
						<h2 class="title">
							<?php echo e($sectionInfo->testimonial_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->testimonial_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="testimonial-slider">
						<?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="slider-item">
							<div class="single-review">
								<div class="stars">
									<?php for($i = 0; $i < $testimonial->rating; $i++): ?>
									<i class="fas fa-star"></i>
								<?php endfor; ?>
								</div>
								<div class="content">
									<p>
										<?php echo e($testimonial->message); ?>

									</p>
								</div>
								<div class="reviewr">
									<div class="img">
										<img src="<?php echo e(asset('assets/front/img/'.$testimonial->image)); ?>" alt="">
									</div>
									<div class="content">
										<h4 class="name">
											<?php echo e($testimonial->name); ?>

										</h4>
										<p>
											<?php echo e($testimonial->position); ?>

										</p>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Testimonial End -->
	<?php endif; ?>


	<?php if($commonsetting->is_blog_section): ?>
	<!-- Blog Area Start -->
	<section class="blog-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8">
					<div class="section-heading">
						<h2 class="title">
							<?php echo e($sectionInfo->blog_title); ?>

						</h2>
						<p class="text">
							<?php echo e($sectionInfo->blog_subtitle); ?>

						</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-lg-4 col-md-6">
					<a href="<?php echo e(route('front.blogdetails', $blog->slug)); ?>" class="single-blog">
						<div class="img">
							<img src="<?php echo e(asset('assets/front/img/'.$blog->main_image)); ?>" alt="">
						</div>
						<div class="content">
							<ul class="top-meta">
								<li>
									<p class="date">
										<?php echo e(date ( 'd M, Y', strtotime($blog->created_at) )); ?>

									</p>
								</li>
								<li>
									<p class="post-by">
										<?php echo e(__('By,')); ?>  <?php echo e(__('Admin')); ?>

									</p>
								</li>
							</ul>
								<h4 class="title">
									<?php echo e((strlen(strip_tags(Helper::convertUtf8($blog->title))) > 50) ? substr(strip_tags(Helper::convertUtf8($blog->title)), 0, 50) . '...' : strip_tags(Helper::convertUtf8($blog->title))); ?>

							</h4>
						</div>
					</a>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
			</div>
		</div>
	</section>
	<!-- Blog Area End -->
	<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\internet\core\resources\views/front/index.blade.php ENDPATH**/ ?>