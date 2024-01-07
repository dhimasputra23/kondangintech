

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Packages')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Packages')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Package')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.package'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.package.update',  $package->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id">
                                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lang->id); ?>" <?php echo e($package->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e($package->name); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Package Image')); ?><span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 show-img img-demo" src="
                                            <?php if($package->image): ?>
                                            <?php echo e(asset('assets/kondangintech-landing/img/'.$package->image)); ?>

                                            <?php else: ?>
                                            <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                            <?php endif; ?>" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image">Choose New Image</label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            <p class="help-block text-info"><?php echo e(__('Upload 1920X900 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.')); ?>

                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Price')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="price" placeholder="<?php echo e(__('Price')); ?>" value="<?php echo e($package->price); ?>">
                                            <?php if($errors->has('price')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('price')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Discount Price')); ?></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="discount_price" placeholder="<?php echo e(__('Discount Price')); ?>" value="<?php echo e($package->discount_price); ?>">
                                            <?php if($errors->has('discount_price')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('discount_price')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Start Price')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="start_price" placeholder="<?php echo e(__('Start Price')); ?>" value="<?php echo e($package->start_price); ?>">
                                            <?php if($errors->has('start_price')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('start_price')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('End Price')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="end_price" placeholder="<?php echo e(__('End Price')); ?>" value="<?php echo e($package->end_price); ?>">
                                            <?php if($errors->has('end_price')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('end_price')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Feature')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input name="feature" class="form-control" data-role="tagsinput" placeholder="<?php echo e(__('Feature')); ?>" value="<?php echo e($package->feature); ?>" >
                                            <?php if($errors->has('feature')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('feature')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label"><?php echo e(__('Status')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0" <?php echo e($package->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                               <option value="1" <?php echo e($package->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
                                              </select>
                                            <?php if($errors->has('status')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('status')); ?> </p>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/package/edit.blade.php ENDPATH**/ ?>