

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Basic Information')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Basic Information')); ?></li>
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
                        <h3 class="card-title"><?php echo e(__('Update Basic Information')); ?> </h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang languageSelect"  data="<?php echo e(url()->current() . '?language='); ?>">
                                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.setting.updateBasicinfo', $basicinfo->language_id )); ?>" method="POST" >
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label"><?php echo e(__('Site Title')); ?> <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="website_title" value="<?php echo e($basicinfo->website_title); ?>" placeholder="<?php echo e(__('Site Title')); ?>">
                                    <?php if($errors->has('website_title')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('website_title')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Address')); ?> <span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="address" value="<?php echo e($basicinfo->address); ?>" placeholder="<?php echo e(__('Address')); ?>">
                                    <?php if($errors->has('address')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('address')); ?> </p>
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
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo e(__('Update Basic Information')); ?> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.setting.commoninfo')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="base_color" class="col-sm-2 control-label"><?php echo e(__('Theme Color')); ?></label>
                                <div class="col-sm-10">
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" value="<?php echo e($commoninfo->base_color); ?>"  placeholder="#000000" name="base_color">
                                        <div class="input-group-append">
                                          <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Phone Number')); ?><span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" data-role="tagsinput" name="number" placeholder="<?php echo e(__('Number')); ?>" value="<?php echo e($commoninfo->number); ?>">
                                    <p class="help-block text-info"><?php echo e(__('The first entered number will show in the header top menu')); ?>

                                    <?php if($errors->has('number')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('number')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Email')); ?><span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" data-role="tagsinput" name="email" placeholder="<?php echo e(__('Email')); ?>" value="<?php echo e($commoninfo->email); ?>">
                                    <p class="help-block text-info"><?php echo e(__('The first entered email will show in the header top menu')); ?>

                                    <?php if($errors->has('email')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Contact Form Email')); ?><span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control"  name="contactemail" placeholder="<?php echo e(__('Contact Form Email')); ?>" value="<?php echo e($commoninfo->contactemail); ?>">
                                    <p class="help-block text-info"><?php echo e(__('Contact page form  maill will send this email')); ?>

                                    <?php if($errors->has('contactemail')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('contactemail')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Favicon')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" src="
                                    <?php if($commoninfo->fav_icon): ?>
                                    <?php echo e(asset('assets/kondangintech-landing/img/'.$commoninfo->fav_icon)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="fav_icon"><?php echo e(__('Choose New Image')); ?></label>
                                        <input type="file" class="custom-file-input up-img" name="fav_icon" id="fav_icon">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 40X40 (Pixel) Size image or Squre size image for best quality. 
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Site Header Logo')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" src="
                                    <?php if($commoninfo->header_logo): ?>
                                    <?php echo e(asset('assets/kondangintech-landing/img/'.$commoninfo->header_logo)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="header_logo">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="header_logo" id="header_logo">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 150X40 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Company Logo')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mb-3 show-img img-demo" width="50%" src="
                                    <?php if($commoninfo->company_logo): ?>
                                    <?php echo e(asset('assets/kondangintech-landing/img/'.$commoninfo->company_logo)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="company_logo">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="company_logo" id="company_logo">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 150X40 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Breadcrumb Image')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    <?php if($commoninfo->breadcrumb_image): ?>
                                    <?php echo e(asset('assets/front/img/'.$commoninfo->breadcrumb_image)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>"
                                    " alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="breadcrumb_image"><?php echo e(__('Choose New Image')); ?></label>
                                        <input type="file" class="custom-file-input up-img" name="breadcrumb_image" id="breadcrumb_image">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 1920X390 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/settings/basicinfo.blade.php ENDPATH**/ ?>