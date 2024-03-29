

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Page Visibility')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Page Visibility')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-12">
                <form class="form-horizontal" action="<?php echo e(route('admin.innerpage_visibility.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                        
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <?php echo e(__('Inner Page Visibility')); ?>

                            </h3>
                            <div class="card-tools">
                                <a href="<?php echo e(route('admin.pagevisibility')); ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                </a>
                            </div>
                            </div>
                        <div class="card-body">
                          
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('About - About Section')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_about_about == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_about" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_about_about')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_about_about')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('About - Who we Are Section')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_about_w_w_a == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_w_w_a" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_about_w_w_a')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_about_w_w_a')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('About - Video')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_about_choose_us == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_choose_us" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_about_choose_us')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_about_choose_us')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('About - About history Section')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_about_history == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_history" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_about_history')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_about_history')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('Quote Page')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_quote_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_quote_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_quote_page')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_quote_page')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('Ecommerce')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_shop == '1' ? 'checked' : ''); ?> data-size="large" name="is_shop" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_shop')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_shop')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 control-label"><?php echo e(__('User Login & Dashboard')); ?><span
                                            class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="checkbox" <?php echo e($visibility->is_user_system == '1' ? 'checked' : ''); ?> data-size="large" name="is_user_system" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                    <?php if($errors->has('is_user_system')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_user_system')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Update')); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- /.col -->
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/admin/settings/pv/innerpage.blade.php ENDPATH**/ ?>