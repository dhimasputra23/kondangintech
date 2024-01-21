<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('team')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('team')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Team')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.team'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.team.update',$team->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id">
                                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lang->id); ?>" <?php echo e($team->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Image')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <img class="w-100 mb-3 show-img img-demo" src="<?php echo e($team->image ? asset('assets/kondangintech-landing/img/'.$team->image) : asset('assets/admin/img/img-demo.jpg')); ?>" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="image"><?php echo e(__('Choose Image')); ?></label>
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
                                            <input type="text" class="form-control" name="name" placeholder="<?php echo e(__('Name')); ?>" value="<?php echo e($team->name); ?>">
                                            <?php if($errors->has('name')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('name')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="designation" class="col-sm-2 control-label"><?php echo e(__('Dagenation')); ?><span class="text-danger">*</span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="dagenation" placeholder="<?php echo e(__('Dagenation')); ?>" value="<?php echo e($team->dagenation); ?>">
                                            <?php if($errors->has('dagenation')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('dagenation')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  class="col-sm-2 control-label"><?php echo e(__('Description')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <textarea name="description" class="form-control summernote" placeholder="<?php echo e(__('Description')); ?>" rows="7"><?php echo e($team->description); ?></textarea>
                                            <?php if($errors->has('description')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('description')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="icon1" class="col-sm-2 control-label"><?php echo e(__('Social Icon 1')); ?><span class="d-block"><small><?php echo e(__('(Fontawesome icon class )')); ?></small></span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon1" placeholder="<?php echo e(__('Social Icon 1')); ?>" value="<?php echo e($team->icon1); ?>">
                                            <?php if($errors->has('icon1')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('icon1')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url1" class="col-sm-2 control-label"><?php echo e(__('Social Url 1')); ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url1" placeholder="<?php echo e(__('Social Url 1')); ?>" value="<?php echo e($team->url1); ?>">
                                            <?php if($errors->has('url1')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('url1')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Social Icon 2')); ?><span class="d-block"><small><?php echo e(__('(Fontawesome icon class )')); ?></small></span></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon2" placeholder="<?php echo e(__('Social Icon 2')); ?>" value="<?php echo e($team->icon2); ?>">
                                            <?php if($errors->has('icon2')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('icon2')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url2" class="col-sm-2 control-label"><?php echo e(__('Social Url 2')); ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url2" placeholder="<?php echo e(__('Social Url 2')); ?>" value="<?php echo e($team->url2); ?>">
                                            <?php if($errors->has('url2')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('url2')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Social Icon 3')); ?><span class="d-block"><small><?php echo e(__('(Fontawesome icon class )')); ?></small></span></label>

                                        <div class="col-sm-10">
                                           <input type="text" class="form-control" name="icon3" placeholder="<?php echo e(__('Social Icon 3')); ?>" value="<?php echo e($team->icon3); ?>">
                                            <?php if($errors->has('icon3')): ?>
                                            <p class="text-danger"> <?php echo e($errors->first('icon3')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="url3" class="col-sm-2 control-label"><?php echo e(__('Social Url 3')); ?></label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="url3" placeholder="<?php echo e(__('Social Url 3')); ?>" value="<?php echo e($team->url3); ?>">
                                            <?php if($errors->has('url3')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('url3')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label"><?php echo e(__('Status')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                               <option value="0" <?php echo e($team->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                               <option value="1" <?php echo e($team->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/team/edit.blade.php ENDPATH**/ ?>