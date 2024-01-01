

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
                <form class="form-horizontal" action="<?php echo e(route('admin.update_others_visibility.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <?php echo e(__('Other Visibility')); ?>

                                </h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.pagevisibility')); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                                </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label"><?php echo e(__('Social Share Blog Details')); ?><span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" <?php echo e($visibility->is_blog_share_links == '1' ? 'checked' : ''); ?> data-size="large" name="is_blog_share_links" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        <?php if($errors->has('is_blog_share_links')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('is_blog_share_links')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label"><?php echo e(__('Social Share Shop Details')); ?><span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" <?php echo e($visibility->is_shop_share_links == '1' ? 'checked' : ''); ?> data-size="large" name="is_shop_share_links" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        <?php if($errors->has('is_shop_share_links')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('is_shop_share_links')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label"><?php echo e(__('Cooki Alert')); ?><span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" <?php echo e($visibility->is_cooki_alert == '1' ? 'checked' : ''); ?> data-size="large" name="is_cooki_alert" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        <?php if($errors->has('is_cooki_alert')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('is_cooki_alert')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label"><?php echo e(__('WhatsApp Button')); ?><span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" <?php echo e($visibility->is_whatsapp == '1' ? 'checked' : ''); ?> data-size="large" name="is_whatsapp" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        <?php if($errors->has('is_whatsapp')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('is_whatsapp')); ?> </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-5 control-label"><?php echo e(__('Phone Call Button')); ?><span
                                                class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" <?php echo e($visibility->is_call_button == '1' ? 'checked' : ''); ?> data-size="large" name="is_call_button" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                        <?php if($errors->has('is_call_button')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('is_call_button')); ?> </p>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/admin/settings/pv/others.blade.php ENDPATH**/ ?>