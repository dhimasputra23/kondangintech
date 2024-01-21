

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Feature-1')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Feature-1')); ?></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><?php echo e(__('Feature-1 Content')); ?></h3>
                        <div class="card-tools">
                            <div class="d-inline-block mr-4">
                        <select class="form-control lang languageSelect"  data="<?php echo e(url()->current() . '?language='); ?>">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.feature1content.update',  $saectiontitle->language_id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Feature-1 Title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="feature_first_title" placeholder="<?php echo e(__('Feature-1 Title')); ?>" value="<?php echo e($saectiontitle->feature_first_title); ?>">
                                    <?php if($errors->has('feature_first_title')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('feature_first_title')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Feature-1 Description')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input name="feature_first_subtitle" class="form-control" data-role="tagsinput" placeholder="<?php echo e(__('Feature-1 Description')); ?>" value="<?php echo e($saectiontitle->feature_first_subtitle); ?>" >
                                    <?php if($errors->has('feature_first_subtitle')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('feature_first_subtitle')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Feature-1 Image')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="w-100 mb-3 show-img img-demo" src="
                                    <?php if($saectiontitle->feature_first_image): ?>
                                    <?php echo e(asset('assets/kondangintech-landing/img/'.$saectiontitle->feature_first_image)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="feature_first_image">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="feature_first_image" id="feature_first_image">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 550X550 (Pixel) Size image for best quality.
                                        Only jpg, jpeg, png image is allowed.')); ?>

                                    </p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/feature-1/index.blade.php ENDPATH**/ ?>