

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
						<?php echo e(__('Login')); ?>

					</h1>
					<ul class="pages">
						<li>
							<a href="<?php echo e(route('front.index')); ?>">
								<?php echo e(__('Home')); ?>

							</a>
						</li>
						<li class="active">
							<a href="#">
								<?php echo e(__('Login')); ?>

							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!--Main Breadcrumb Area End -->

        <!-- Login Area Start -->
        <section class="auth">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10">
                        <div class="sign-form">
                            <div class="heading">
                                <h4 class="title">
                                    <?php echo e(__('Login')); ?>

                                </h4>
                                <p class="subtitle">
                                    <?php echo e(__('Login to your account to continue.')); ?>

                                </p>
                            </div>

                            <form class="form-group mb-0" action="<?php echo e(route('user.login.submit')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input class="form-control " type="email" value="<?php echo e(old('email')); ?>" name="email" placeholder="<?php echo e(__('Enter Email')); ?>">
                                <?php if(Session::has('error')): ?>
                                <p class="m-1 text-danger"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <input class="form-control" type="password" name="password" placeholder="<?php echo e(__('Enter Password')); ?>">
                                <?php if($errors->has('password')): ?>
                                <p  class="m-1 text-danger"><?php echo e($errors->first('password')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <p  class="m-1 text-success"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>

                                <button class="mybtn1" type="submit"><?php echo e(__('Login')); ?></button>
                                <p class="reg-text text-center mb-0"><?php echo e(__("Don't have an account?")); ?> <a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register Now')); ?></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/user/login.blade.php ENDPATH**/ ?>