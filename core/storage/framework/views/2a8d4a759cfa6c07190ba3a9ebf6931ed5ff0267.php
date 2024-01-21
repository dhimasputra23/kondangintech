<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('meta-keywords'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
    <title><?php echo e($setting->website_title); ?></title>

    <!-- favicon -->
	<link rel="shortcut icon" href="<?php echo e(asset('assets/front/img/' . $commonsetting->fav_icon)); ?>" type="image/x-icon">
	<!-- Google Front -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,800&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/bootstrap.min.css">
    <!-- Plugin css -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/plugin.css">
    <!-- Sweetalert2 css -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')); ?>">

	<?php echo $__env->yieldContent('style'); ?>
    <!-- stylesheet -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/style.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/responsive.css">
	<!-- dynamic Style change -->
	<link rel="stylesheet" href="<?php echo e(asset('assets/front/css/dynamic-css.css')); ?>">
	<link href="<?php echo e(url('/')); ?>/assets/front/css/dynamic-style.php?color=<?php echo e($commonsetting->base_color); ?>" rel="stylesheet">
	<?php if($currentLang->direction == 'rtl'): ?>
	<!-- RTL css -->
	<link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/rtl.css">
	<?php endif; ?>
	
</head>

<body <?php echo e(Session::has('notification') ? 'data-notification' : ''); ?> <?php if(Session::has('notification')): ?> data-notification-message='<?php echo e(json_encode(Session::get('notification'))); ?> <?php endif; ?>' >

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="loader loader-1">
            <div class="loader-outter"></div>
            <div class="loader-inner"></div>
        </div>
    </div>
    <!-- preloader area end -->

	<!--Main-Menu Area Start-->
	<div class="mainmenu-area">
		<!-- Top Menu -->
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-md-6 align-self-center d-none d-lg-block">
						<div class="left-content">
							<ul>
								<li>
									<a href="#">
										<i class="fas fa-phone"></i>
										<?php
										$number = explode( ',', $commonsetting->number );
										?>
										<?php echo e($number[0]); ?>

									</a>
								</li>
								<li>
									<a href="#">
										<i class="fas fa-envelope"></i>
										<?php
										$number = explode( ',', $commonsetting->email );
										?>
										<?php echo e($number[0]); ?>

									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 align-self-center">
						<div class="right-content">
							<ul>

								<?php if(auth()->check()): ?>
									<li>
										<a href="<?php echo e(route('user.dashboard')); ?>"><i class="fas fa-user"></i> <?php echo e(Auth::user()->name); ?></a>
									</li>
								<?php else: ?>
									<li>
										<a href="<?php echo e(route('user.login')); ?>"><?php echo e(__('Login')); ?></a>
									</li>
									<li>
										<a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a>
									</li>
								<?php endif; ?>
								<?php if(count($langs) > 0): ?>
								<li class="language-change">
									<p class="name"><i class="fas fa-globe"></i><?php echo e($currentLang->name); ?></p>
									<div class="language-menu">
										<?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<a href="<?php echo e(route('changeLanguage', $lang->code)); ?>" class="<?php echo e($lang->name == $currentLang->name ? 'active' : ''); ?>"><?php echo e($lang->name); ?></a>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</div>
								</li>
								<?php endif; ?>
								<li>
									<?php if(Auth::user()): ?>
									<a href="<?php echo e(route('front.billpay')); ?>" class="mybtn1"><?php echo e(__('Pay Bill')); ?></a>
									<?php else: ?>
									<a href="<?php echo e(route('user.login')); ?>" class="mybtn1"><?php echo e(__('Pay Bill')); ?></a>
									<?php endif; ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="<?php echo e(route('front.index')); ?>">
							<img src="<?php echo e(asset('assets/front/img/'.$commonsetting->header_logo)); ?>" alt="">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_menu" aria-controls="main_menu"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse fixed-height" id="main_menu">
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == '/'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?></a>
								</li>
								<?php if($commonsetting->is_about_page): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'about'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.about')); ?>"><?php echo e(__('About')); ?></a>
								</li>
								<?php endif; ?>
								<li class="nav-item">
									<a class="nav-link 
									<?php if(request()->path() == 'service'): ?> active  
									<?php elseif(request()->is('service/*')): ?> active
									<?php endif; ?>" href="<?php echo e(route('front.service')); ?>"><?php echo e(__('Service')); ?></a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'package'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.package')); ?>"><?php echo e(__('Package')); ?></a>
								</li>
								<?php if($commonsetting->is_media_page): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'media'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.media')); ?>"><?php echo e(__('Media')); ?></a>
								</li>
								<?php endif; ?>
								<?php if($commonsetting->is_shop_page): ?>
								<li class="nav-item dropdown">
									<a class="nav-link 
									<?php if(request()->path() == 'shop'): ?> active  
									<?php endif; ?>
									 dropdown-toggle" href="<?php echo e(route('front.products')); ?>">
										<?php echo e(__('Shop')); ?>

									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="<?php echo e(route('front.products')); ?>"><?php echo e(__('All Product')); ?></a>
										<a class="dropdown-item" href="<?php echo e(route('front.cart')); ?>">
											<?php echo e(__('Cart')); ?>

										</a>
									</div>
								</li>
								<?php endif; ?>
								<li class="nav-item dropdown">
									<a class="nav-link 
									<?php if(request()->path() == 'faq'): ?> active  
									<?php elseif(request()->path() == 'team'): ?> active
									<?php elseif(request()->path() == 'branch'): ?> active
									<?php elseif(request()->path() == 'blog'): ?> active  
									<?php elseif(request()->is('blog-details/*')): ?> active
									<?php endif; ?>
									 dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php echo e(__('Pages')); ?>

									</a>
									<div class="dropdown-menu">
										<?php if($commonsetting->is_faq_page): ?>
										<a class="dropdown-item" href="<?php echo e(route('front.faq')); ?>"><?php echo e(__('Faq')); ?></a>
										<?php endif; ?>
										<?php if($commonsetting->is_team_page): ?>
										<a class="dropdown-item" href="<?php echo e(route('front.team')); ?>"><?php echo e(__('Team')); ?></a>
										<?php endif; ?>
										<?php if($commonsetting->is_branch_page): ?>
										<a class="dropdown-item" href="<?php echo e(route('front.branch')); ?>"><?php echo e(__('Branch')); ?></a>
										<?php endif; ?>
										<?php if($commonsetting->is_blog_page): ?>
										<a class="dropdown-item" href="<?php echo e(route('front.blogs')); ?>"><?php echo e(__('Blog')); ?></a>
										<?php endif; ?>
										<?php $__currentLoopData = $front_dynamic_pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dynamicpage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<a class="dropdown-item" href="<?php echo e(route('front.front_dynamic_page', $dynamicpage->slug)); ?>"><?php echo e($dynamicpage->title); ?></a>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									</div>
								</li>
								<?php if($commonsetting->is_speed_test): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'speed-test'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.speed.test')); ?>"><?php echo e(__('Speed Test')); ?></a>
								</li>
								<?php endif; ?>
								<?php if($commonsetting->is_contact_page): ?>
								<li class="nav-item">
									<a class="nav-link <?php if(request()->path() == 'contact'): ?> active  <?php endif; ?>" href="<?php echo e(route('front.contact')); ?>"><?php echo e(__('Contact')); ?></a>
								</li>
								<?php endif; ?>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--Main-Menu Area Start-->


	<?php echo $__env->yieldContent('content'); ?>

	<!-- Footer Area Start -->
	<footer class="footer" id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget about-widget">
						<div class="footer-logo">
							<a href="#">
								<img src="<?php echo e(asset('assets/front/img/'.$commonsetting->header_logo)); ?>" alt="">
							</a>
						</div>
						<div class="text">
							<p>
								<?php echo e($setting->footer_text); ?>

							</p>
						</div>

					</div>
				</div>
				<div class="col-md-6 col-lg-4">
					<div class="footer-widget address-widget">
						<h4 class="title">
							<?php echo e(__('Address')); ?>

						</h4>
						<ul class="about-info">
							<li>
								<p>
										<i class="fas fa-globe"></i>
									<?php echo e($setting->address); ?>

								</p>
							</li>
							<li>
								<p>
										<i class="fas fa-phone"></i>
										<?php
										$number = explode( ',', $commonsetting->number );
										for ($i=0; $i < count($number); $i++) {
											echo $number[$i].', ';
										}
										?>
								</p>
							</li>
							<li>
								<p>
										<i class="far fa-envelope"></i>
										<?php
										$email = explode( ',', $commonsetting->email );
										for ($i=0; $i < count($email); $i++) {
											echo $email[$i].', ';
										}
										?>
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-6 col-lg-4">
						<div class="footer-widget  footer-newsletter-widget">
							<h4 class="title">
								<?php echo e(__('Newsletter')); ?>

							</h4>
							<div class="newsletter-form-area">
								<form action="<?php echo e(route('front.newsletter')); ?>" method="POST">
									<?php echo csrf_field(); ?>
									<input type="email" name="email" placeholder="<?php echo e(__('Email Address')); ?>">
									<button type="submit">
										<i class="far fa-paper-plane"></i>
									</button>
								</form>
							</div>
							<div class="social-links">
								<h4 class="title">
									<?php echo e(__('Connect with us on social media :')); ?>

								</h4>
								<div class="fotter-social-links">
									<ul>
										<?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li>
											<a href="<?php echo e($social->url); ?>">
												<i class="<?php echo e($social->icon); ?>"></i>
											</a>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
							</div>

						</div>
				</div>
			</div>
		</div>
		<div class="copy-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
							<div class="content">
								<div class="content">
									<?php echo $setting->copyright_text; ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Area End -->

 <!-- Back to Top Start -->
 <div class="bottomtotop">
  <i class="fas fa-chevron-right"></i>
 </div>
 <!-- Back to Top End -->

	
	<?php if($setting->is_cooki_alert == 1): ?>
		<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
	

 <input type="hidden" id="main_url" value="<?php echo e(route('front.index')); ?>">


 <!-- jquery -->
 <script src="<?php echo e(asset('/')); ?>assets/front/js/jquery.js"></script>
 <!-- bootstrap -->
 <script src="<?php echo e(asset('/')); ?>assets/front/js/bootstrap.min.js"></script>
 <!-- popper -->
 <script src="<?php echo e(asset('/')); ?>assets/front/js/popper.min.js"></script>
 <!-- plugin js-->
 <script src="<?php echo e(asset('/')); ?>assets/front/js/plugin.js"></script>
 <!-- Sweetalert2 js -->
 <script src="<?php echo e(asset('assets/admin/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>

 <?php echo $__env->yieldContent('script'); ?>
 <!-- main -->
 <script src="<?php echo e(asset('/')); ?>assets/front/js/main.js"></script>


 <?php if($commonsetting->is_tawk_to	== 1): ?>
	<?php echo $commonsetting->tawk_to; ?>

<?php endif; ?>


</body>

</html>
<?php /**PATH C:\xampp\htdocs\internet\core\resources\views/front/layout.blade.php ENDPATH**/ ?>