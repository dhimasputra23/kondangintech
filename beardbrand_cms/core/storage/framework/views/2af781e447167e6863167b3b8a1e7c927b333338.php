

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
                        <h3 class="card-title mt-1"><?php echo e(__('Pakage Content')); ?></h3>
                        <div class="card-tools">
                            <div class="d-inline-block mr-4">
                        <select class="form-control lang" id="languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.plancontent.update',  $saectiontitle->language_id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Pakage Title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="plan_title" placeholder="<?php echo e(__('Pakage Title')); ?>" value="<?php echo e($saectiontitle->plan_title); ?>">
                                    <?php if($errors->has('plan_title')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('plan_title')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Pakage Sub-title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="plan_subtitle" placeholder="<?php echo e(__('Pakage Sub-Title')); ?>" value="<?php echo e($saectiontitle->plan_subtitle); ?>">
                                    <?php if($errors->has('plan_subtitle')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('plan_subtitle')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Pakage BG Image')); ?> </label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    <?php if($saectiontitle->pricing_bg): ?>
                                    <?php echo e(asset('assets/front/img/'.$saectiontitle->pricing_bg)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="pricing_bg">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="pricing_bg" id="pricing_bg">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 1920X900 (Pixel) Size image for best quality.
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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-1"><?php echo e(__('Pakage List')); ?></h3>
                        <div class="card-tools d-flex">
                            <div class="d-inline-block mr-4">
                                <select class="form-control lang languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                                    <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <a href="<?php echo e(route('admin.package.add'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> <?php echo e(__('Add Package')); ?>

                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('#')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Discount Price')); ?></th>
                                <th><?php echo e(__('Speed')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($id); ?>

                                </td>
                                <td>
                                    <?php echo e($package->name); ?>

                                </td>
                                <td>
                                    <?php echo e(Helper::showCurrency()); ?><?php echo e($package->price); ?>

                                </td>
                                <td>
                                    <?php if($package->discount_price): ?>
                                    <?php echo e(Helper::showCurrency()); ?><?php echo e($package->discount_price); ?>

                                    <?php else: ?> 
                                    <span class="badge badge-info"><?php echo e(__('No Discount')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo e($package->speed); ?><?php echo e(__(' / mbps')); ?>

                                </td>
                                <td>
                                    <?php if($package->status == 1): ?>
                                        <span class="badge badge-success"><?php echo e(__('Publish')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-warning"><?php echo e(__('Unpublish')); ?></span>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.package.edit', $package->id)); ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i><?php echo e(__('Edit')); ?></a>
                                    <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.package.delete', $package->id )); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($package->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        <i class="fas fa-trash"></i><?php echo e(__('Delete')); ?>

                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/package/index.blade.php ENDPATH**/ ?>