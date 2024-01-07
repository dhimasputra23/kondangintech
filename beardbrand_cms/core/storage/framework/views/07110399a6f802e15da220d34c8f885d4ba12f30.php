

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Testimonials')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Testimonials')); ?></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header  card-primary card-outline">
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Testimonial')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.testimonial'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                  </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.testimonial.update', $testimonial->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id">
                                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lang->id); ?>" <?php echo e($testimonial->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Image')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mb-3 show-img img-demo" src="<?php echo e(asset('assets/kondangintech-landing/img/'.$testimonial->image)); ?>" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image"><?php echo e(__('Choose New Image')); ?></label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            <?php if($errors->has('image')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('image')); ?> </p>
                                            <?php endif; ?>
                                            <p class="help-block text-info"><?php echo e(__('Upload 70X70 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.')); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label"><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e($testimonial->name); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="position" class="col-sm-2 control-label"><?php echo e(__('Position')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="position" placeholder="<?php echo e(__('Position')); ?>" value="<?php echo e($testimonial->position); ?>">
                                            <?php if($errors->has('position')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('position')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="freelance" class="col-sm-2 control-label"><?php echo e(__('Rating')); ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="onestar" name="rating" value="1" <?php echo e($testimonial->rating == '1' ? 'checked' : ''); ?>>
                                                    <label for="onestar"><?php echo e(__('1 Star')); ?></label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="twostar" name="rating"  value="2" <?php echo e($testimonial->rating == '2' ? 'checked' : ''); ?>>
                                                    <label for="twostar"><?php echo e(__('2 Star')); ?></label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="threestar" name="rating"  value="3" <?php echo e($testimonial->rating == '3' ? 'checked' : ''); ?>>
                                                    <label for="threestar"><?php echo e(__('3 Star')); ?></label>
                                                </div>
                                                <div class="icheck-success d-inline mr-3">
                                                    <input type="radio" id="fourstar" name="rating"  value="4" <?php echo e($testimonial->rating == '4' ? 'checked' : ''); ?>>
                                                    <label for="fourstar"><?php echo e(__('4 Star')); ?></label>
                                                </div>
                                                <div class="icheck-success d-inline">
                                                    <input type="radio" id="fivestar" name="rating"  value="5" <?php echo e($testimonial->rating == '5' ? 'checked' : ''); ?>>
                                                    <label for="fivestar"><?php echo e(__('5 Star')); ?></label>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="message" class="col-sm-2 control-label"><?php echo e(__('Message')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="message" placeholder="<?php echo e(__('Message')); ?>" " rows="5"><?php echo e($testimonial->message); ?></textarea>
                                            <?php if($errors->has('message')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('message')); ?> </p>
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
                            <!-- /.card-body -->
                        </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/testimonial/edit.blade.php ENDPATH**/ ?>