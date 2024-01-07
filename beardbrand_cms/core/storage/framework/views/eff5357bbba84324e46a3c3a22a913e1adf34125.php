

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Blogs')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Blogs')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Blog Category')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.blog'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.blog.update', $blog->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="blog_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lang->id); ?>" <?php echo e($blog->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
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
                                            <img class="mw-400 mb-3 show-img img-demo" src="<?php echo e(asset('assets/kondangintech-landing/img/'.$blog->main_image)); ?>" alt="">
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="main_image"><?php echo e(__('Choose New Image')); ?></label>
                                                <input type="file" class="custom-file-input up-img" name="main_image" id="main_image">
                                            </div>
                                            <?php if($errors->has('main_image')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('main_image')); ?> </p>
                                            <?php endif; ?>
                                            <p class="help-block text-info"><?php echo e(__('Upload 730X455 (Pixel) Size image for best quality.
                                                Only jpg, jpeg, png image is allowed.')); ?>

                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($blog->title); ?>">
                                            <?php if($errors->has('title')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bcategory_id" class="col-sm-2 control-label"><?php echo e(__('Category')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="bcategory_id" id="bcategory_id">
                                                <?php $__currentLoopData = $bcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($bcategory->id); ?>" <?php echo e($bcategory->id == $blog->bcategory_id ? 'selected' : ''); ?> ><?php echo e($bcategory->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('bcategory_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('bcategory_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                                <textarea name="content" class="form-control  summernote" rows="6" placeholder="<?php echo e(__('Content')); ?>"><?php echo e($blog->content); ?></textarea>
                                            <?php if($errors->has('content')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('content')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-sm-2 control-label"><?php echo e(__('Meta Keywords')); ?> </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" data-role="tagsinput" name="meta_keywords" placeholder="<?php echo e(__('Meta Keywords')); ?>" value="<?php echo e($blog->meta_keywords); ?>">
                                            <?php if($errors->has('meta_keywords')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('meta_keywords')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_description" class="col-sm-2 control-label"><?php echo e(__('Meta Description')); ?></label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="meta_description" placeholder="<?php echo e(__('Meta Description')); ?>"  rows="4"><?php echo e($blog->meta_description); ?></textarea>
                                            <?php if($errors->has('meta_description')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('meta_description')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                    <option value="0" <?php echo e($blog->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                                    <option value="1" <?php echo e($blog->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>