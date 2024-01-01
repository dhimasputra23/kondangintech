<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>

	<!--Main Breadcrumb Area Start -->
    <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title"><?php echo e(__('Login')); ?></h2>
                        <ul class="breadcrumb-nav">
                            <li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
                            <li class="active" aria-current="page"><?php echo e(__('Login')); ?></li>
                        </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
	<!--Main Breadcrumb Area End -->

        <!-- Login Area Start -->
        <section class="auth section-gap">
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
                                <?php if(Session::has('error')): ?>
                                <p class="mb-3 text-danger"><?php echo e(Session::get('error')); ?></p>
                                <?php endif; ?>
                                <?php if(Session::has('success')): ?>
                                <p  class="mb-3 text-success"><?php echo e(Session::get('success')); ?></p>
                                <?php endif; ?>
                            <form class="" action="<?php echo e(route('user.login.submit')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="input-group">
                                    <input class="" type="email" value="<?php echo e(old('email')); ?>" name="email" placeholder="<?php echo e(__('Enter Email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                    <p  class="m-1 text-danger"><?php echo e($errors->first('email')); ?></p>
                                    <?php endif; ?>
                                </div>
                            
                                <div class="input-group">
                                    <input class="" type="password" name="password" placeholder="<?php echo e(__('Enter Password')); ?>">
                                    <?php if($errors->has('password')): ?>
                                    <p  class="m-1 text-danger"><?php echo e($errors->first('password')); ?></p>
                                    <?php endif; ?>
                                </div>

                                <span class="fp"><a href="<?php echo e(route('user.forgot')); ?>"><?php echo e(__('Forgot Password ?')); ?></a></span>

                                <?php if($visibility->is_recaptcha == 1): ?>
                                    <div class="d-block my-4">
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
                                
                                <button class="main-btn" type="submit"><?php echo e(__('Login Now')); ?></button>

                                <p class="reg-text text-center mb-0"><?php echo e(__("Don't have an account?")); ?> <a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register Now')); ?></a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/user/login.blade.php ENDPATH**/ ?>