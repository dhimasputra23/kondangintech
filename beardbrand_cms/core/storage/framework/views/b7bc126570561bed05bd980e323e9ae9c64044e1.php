

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
            <div class="col-md-12">
                    <form class="form-horizontal" action="<?php echo e(route('admin.pagevisibility.update')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo e(__('Home Page Section Visibility')); ?> </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('About Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_about_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_about_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_about_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Package Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_package_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_package_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_package_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_package_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Offer Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_offer_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_offer_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_offer_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_offer_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Counter Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_counter_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_counter_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_counter_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_counter_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Service Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_service_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_service_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_service_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_service_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Testimonial Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_testimonial_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_testimonial_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_testimonial_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_testimonial_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Blog Section')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_blog_section == '1' ? 'checked' : ''); ?> data-size="large" name="is_blog_section" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_blog_section')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_blog_section')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo e(__('Page Visibility')); ?> </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('About Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_about_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_about_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_about_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_about_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Media Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_media_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_media_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_media_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_media_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Shop Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_shop_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_shop_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_shop_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_shop_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Faq Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_faq_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_faq_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_faq_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_faq_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Team Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_team_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_team_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_team_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_team_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Branch Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_branch_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_branch_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_branch_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_branch_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Blog Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_blog_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_blog_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_blog_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_blog_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Contact Page')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_contact_page == '1' ? 'checked' : ''); ?> data-size="large" name="is_contact_page" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_contact_page')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_contact_page')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h3 class="card-title"><?php echo e(__('Other Visibility')); ?> </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Speed Test')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_speed_test == '1' ? 'checked' : ''); ?> data-size="large" name="is_speed_test" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_speed_test')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_speed_test')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Social Share (blog & product)')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_blog_share_links == '1' ? 'checked' : ''); ?> data-size="large" name="is_blog_share_links" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_blog_share_links')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_blog_share_links')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Cooki Alert')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_cooki_alert == '1' ? 'checked' : ''); ?> data-size="large" name="is_cooki_alert" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_cooki_alert')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_cooki_alert')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Testimonial BG Image')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_testimonial_bg == '1' ? 'checked' : ''); ?> data-size="large" name="is_testimonial_bg" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_testimonial_bg')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_testimonial_bg')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Counter BG Image')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_counter_bg == '1' ? 'checked' : ''); ?> data-size="large" name="is_counter_bg" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_counter_bg')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_counter_bg')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-5 control-label"><?php echo e(__('Package BG Image')); ?><span
                                                        class="text-danger">*</span></label>
                                            <div class="col-sm-7">
                                                <input type="checkbox" <?php echo e($commonsetting->is_package_bg == '1' ? 'checked' : ''); ?> data-size="large" name="is_package_bg" data-bootstrap-switch data-off-color="danger" data-on-color="primary" data-on-text="Visible" data-label-text="<i class='fas fa-mouse'></i>"  data-off-text="Invisible">
                                                <?php if($errors->has('is_package_bg')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('is_package_bg')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
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
            <!-- /.col -->
        </div>
    </div>


</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/settings/page-visibility.blade.php ENDPATH**/ ?>