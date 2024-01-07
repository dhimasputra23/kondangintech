

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <h1>
       <?php echo e(__('About')); ?>

    </h1>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                            <div class="card-header  with-border">
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Fact')); ?></h3>
                                <div class="card-tools">
                                <a href="<?php echo e(route('admin.funfact'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                    <form class="form-horizontal" action="<?php echo e(route('admin.funfact.update', $funfact->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group row">
                                            <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <select class="form-control lang" name="language_id">
                                                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($lang->id); ?>" <?php echo e($funfact->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                                <?php if($errors->has('language_id')): ?>
                                                    <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="icon" class="col-sm-2 control-label"><?php echo e(__('Icon')); ?><span class="text-danger">*</span></label>
            
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="icon" placeholder="<?php echo e(__('Enter Fact Icon')); ?>" value="<?php echo e($funfact->icon); ?>">
                                            </div>
                                        </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 control-label"><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Enter Fact Name')); ?>" value="<?php echo e($funfact->name); ?>">
                                                </div>
                                            </div>
                
                                            <div class="form-group row">
                                                <label for="value" class="col-sm-2 control-label"><?php echo e(__('Value')); ?><span class="text-danger">*</span></label>
                
                                                <div class="col-sm-10">
                                                    <input type="number" class="form-control" name="value" placeholder="<?php echo e(__('Enter Fact Value')); ?>" value="<?php echo e($funfact->value); ?>">
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/funfact/edit.blade.php ENDPATH**/ ?>