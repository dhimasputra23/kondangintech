

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Social Links')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                    <li class="breadcrumb-item"><?php echo e(__('Social Links')); ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><?php echo e(__('Update Social Link')); ?> </h3>
                        <div class="card-tools">
                            <a href="<?php echo e(route('admin.slinks')); ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                            </a>
                          </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body">
                        <form id="slink" class="form-horizontal" action="<?php echo e(route('admin.updateSlinks', $slink->id)); ?>" method="POST" onsubmit="store(event)">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Social Icon ')); ?><span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <button class="btn btn-secondary biconpicker" data-iconset="fontawesome5" data-icon="<?php echo e($slink->icon); ?>" role="iconpicker"></button>
                                    <input id="inputIcon" type="hidden" name="icon" value="">
                                    <?php if($errors->has('icon')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('icon')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="website_title" class="col-sm-2 control-label"><?php echo e(__('Social URL')); ?><span
                                        class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" value="<?php echo e($slink->url); ?>" placeholder="<?php echo e(__('Social URL')); ?>">
                                    <?php if($errors->has('url')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('url')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-success"><?php echo e(__('Update')); ?></button>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/settings/social/edit.blade.php ENDPATH**/ ?>