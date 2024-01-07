

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Cookie Alert')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Cookie Alert')); ?></li>
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
                        <h3 class="card-title"><?php echo e(__('Update Cookie Text')); ?> </h3>
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
                        <form class="form-horizontal" action="<?php echo e(route('admin.cookie.update', $cookie->language_id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                       
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea class="form-control summernote" name="cookie_alert_text" placeholder="<?php echo e(__('Cookie Alert Text')); ?>"  rows="4"><?php echo e($cookie->cookie_alert_text); ?></textarea>
                                    <?php if($errors->has('cookie_alert_text')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('cookie_alert_text')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-12">
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/settings/cookie.blade.php ENDPATH**/ ?>