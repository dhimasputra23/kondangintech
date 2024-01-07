

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Custom Bill')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Custom Bill')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Add Custom  Bill')); ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.bill_save')); ?>" method="POST" >
                                    <?php echo csrf_field(); ?>
                      
                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label"><?php echo e(__('Select User')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" name="user_id" >
                                                <option value="" disabled selected>Select User</option>
                                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('user_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('user_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label"><?php echo e(__('Select Package')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control select2bs4" name="package_id" >
                                                <option value="" disabled selected>Select Package</option>
                                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($package->id); ?>"><?php echo e($package->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('package_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('package_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label"><?php echo e(__('Select Month & Year')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control month-year" name="month" placeholder="MM/YYYY">
                                            <?php if($errors->has('package_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('package_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save Bill')); ?></button>
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


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/bill/add.blade.php ENDPATH**/ ?>