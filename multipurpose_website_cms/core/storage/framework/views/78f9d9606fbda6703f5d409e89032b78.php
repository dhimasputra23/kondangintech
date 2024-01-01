<?php $__env->startSection('content'); ?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Edit Payment Gateway')); ?> </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item"><?php echo e(__('Payment Setting')); ?></li>
                <li class="breadcrumb-item"><?php echo e(__('Edit Payment Gateway')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Payment Gateway')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.payment.index')); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.payment.update',$data->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Image')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <img class="mw-400 mb-3 show-img img-demo" src="<?php echo e(asset('assets/front/img/'.$data->image)); ?>" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image"><?php echo e(__('Choose New Image')); ?></label>
                                                <input type="file" class="custom-file-input up-img" name="image" id="image">
                                            </div>
                                            <?php if($errors->has('image')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('image')); ?> </p>
                                            <?php endif; ?>
                                            <p class="help-block text-info"><?php echo e(__('Upload 730X455 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.')); ?>

                                            </p>
                                        </div>
                                    </div>

                                    <?php if($data->type == 'automatic'): ?>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label"><?php echo e(__('Name')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e($data->title); ?>">
                                            <?php if($errors->has('title')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                    <?php if($data->information != null): ?>
                                    <?php $__currentLoopData = $data->convertAutoData(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pkey => $pdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($pkey == 'sandbox_check'): ?>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label"><?php echo e(__( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="checkbox" class="form-control" name="pkey[<?php echo e(__($pkey)); ?>]" value="1" <?php echo e($pdata == 1 ? "checked":""); ?>>
                                        </div>
                                    </div>
                                    <?php else: ?>

                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 control-label"><?php echo e(__( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pkey[<?php echo e(__($pkey)); ?>]" placeholder="<?php echo e(__( $data->name.' '.ucwords(str_replace('_',' ',$pkey)) )); ?>" value="<?php echo e($pdata); ?>" required="">
                                        </div>
                                    </div>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    <?php endif; ?>
                                    <?php else: ?>

                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($data->title); ?>">
                                            <?php if($errors->has('title')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if($data->keyword == null): ?>

                                    <div class="form-group row">
                                        <label for="details" class="col-sm-2 control-label"><?php echo e(__('Description')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <textarea id="area1" class="form-control" name="details"><?php echo e($data->details); ?></textarea>
                                        </div>
                                    </div>


                                    <?php endif; ?>
                                    <?php endif; ?>

                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label"><?php echo e(__('Status')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0" <?php echo e($data->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                               <option value="1" <?php echo e($data->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/admin/payment_gateway/edit.blade.php ENDPATH**/ ?>