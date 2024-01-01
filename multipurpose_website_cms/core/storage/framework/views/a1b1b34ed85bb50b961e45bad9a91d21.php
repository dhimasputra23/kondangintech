

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Scripts')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Scripts')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Update Scripts')); ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.commonsetting.updateScripts')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Tawk.to Status <span
                                            class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="checkbox" <?php echo e($visibility->is_tawk_to == '1' ? 'checked' : ''); ?> data-size="large" name="is_tawk_to" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                    <?php if($errors->has('is_tawk_to')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_tawk_to')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Tawk.to Widget Code<span
                                    class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="tawk_to" rows="5"><?php echo $commonsetting->tawk_to; ?></textarea>
                                    <?php if($errors->has('tawk_to')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('tawk_to')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row mt-5">
                                <label class="col-sm-2 control-label">Messenger Status <span
                                            class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="checkbox" <?php echo e($visibility->is_messenger == '1' ? 'checked' : ''); ?> data-size="large" name="is_messenger" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                    <?php if($errors->has('is_messenger')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_messenger')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">FB Page ID<span
                                    class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" rows="5" name="messenger" placeholder=""><?php echo e($commonsetting->messenger); ?></textarea>
                                    <?php if($errors->has('messenger')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('messenger')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Google Analytics Status <span
                                            class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="checkbox" <?php echo e($visibility->is_google_analytics == '1' ? 'checked' : ''); ?> data-size="large" name="is_google_analytics" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                    <?php if($errors->has('is_google_analytics')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_google_analytics')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Google Analytics Code<span
                                    class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="google_analytics" rows="5"><?php echo $commonsetting->google_analytics; ?></textarea>
                                    <?php if($errors->has('google_analytics')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('google_analytics')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Google Recaptcha Status <span
                                            class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="checkbox" <?php echo e($visibility->is_recaptcha == '1' ? 'checked' : ''); ?> data-size="large" name="is_recaptcha" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                    <?php if($errors->has('is_recaptcha')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_recaptcha')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Google Recaptcha Site key<span
                                    class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="google_recaptcha_site_key" rows="1"><?php echo $commonsetting->google_recaptcha_site_key; ?></textarea>
                                    <?php if($errors->has('google_recaptcha_site_key')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('google_recaptcha_site_key')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label">Google Recaptcha Secret key<span
                                    class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name="google_recaptcha_secret_key" rows="1"><?php echo $commonsetting->google_recaptcha_secret_key; ?></textarea>
                                    <?php if($errors->has('google_recaptcha_secret_key')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('google_recaptcha_secret_key')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>

          

                            <div class="form-group row mt-5">
                                <label class="col-sm-2 control-label"><?php echo e(__('Disqus Status')); ?><span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                        <input type="checkbox" <?php echo e($visibility->is_disqus == '1' ? 'checked' : ''); ?> data-size="large" name="is_disqus" data-bootstrap-switch data-off-color="danger" data-on-color="success" data-on-text="Active" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Deactive">
                                        <?php if($errors->has('is_disqus')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('is_disqus')); ?> </p>
                                        <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Disqus Shortname')); ?><span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="disqus" value="<?php echo e($commonsetting->disqus); ?>" placeholder="<?php echo e(__('Disqus Shortname')); ?>">
                                    <?php if($errors->has('disqus')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('disqus')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            

                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
    </div>


</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/admin/settings/scripts.blade.php ENDPATH**/ ?>