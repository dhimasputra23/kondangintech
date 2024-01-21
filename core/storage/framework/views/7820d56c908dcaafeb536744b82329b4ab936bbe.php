

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Portfolios')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Portfolios')); ?></li>
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
                                <h3 class="card-title mt-1"><?php echo e(__('Edit Portfolio Category')); ?></h3>
                                <div class="card-tools">
                                    <a href="<?php echo e(route('admin.portfolio'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form class="form-horizontal" action="<?php echo e(route('admin.portfolio.update', $portfolio->id)); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control lang" name="language_id" id="portfolio_lan">
                                                <option value="" selected disabled>Select a Language</option>
                                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($lang->id); ?>" <?php echo e($portfolio->language_id == $lang->id ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('language_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label"><?php echo e(__('Images')); ?><span class="text-danger">*</span></label>
                                    
                                        <div class="col-sm-10">
                                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <img class="mw-400 mb-3 show-img img-demo" src="<?php echo e(asset('assets/kondangintech-landing/img/'.$image->image_path)); ?>" alt="">
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div class="custom-file">
                                                <label class="custom-file-label" for="images"><?php echo e(__('Choose Images')); ?></label>
                                                <input type="file" class="custom-file-input up-img" name="images[]" id="images" multiple>
                                            </div>
                                            <?php if($errors->has('images')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('images')); ?> </p>
                                            <?php endif; ?>
                                            <p class="help-block text-info"><?php echo e(__('Upload images for best quality. Only jpg, jpeg, png images are allowed.')); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e($portfolio->title); ?>">
                                            <?php if($errors->has('title')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="portfoliocategory_id" class="col-sm-2 control-label"><?php echo e(__('Category')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="portfoliocategory_id" id="portfoliocategory_id">
                                                <?php $__currentLoopData = $portfoliocategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfoliocategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($portfoliocategory->id); ?>" <?php echo e($portfoliocategory->id == $portfolio->portfoliocategory_id ? 'selected' : ''); ?> ><?php echo e($portfoliocategory->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('portfoliocategory_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('portfoliocategory_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="client_id" class="col-sm-2 control-label"><?php echo e(__('Client')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="client_id" id="client_id">
                                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($client->id); ?>" <?php echo e($client->id == $portfolio->client_id ? 'selected' : ''); ?>><?php echo e($client->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php if($errors->has('client_id')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('client_id')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 control-label"><?php echo e(__('Content')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                                <textarea name="content" class="form-control  summernote" rows="6" placeholder="<?php echo e(__('Content')); ?>"><?php echo e($portfolio->content); ?></textarea>
                                            <?php if($errors->has('content')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('content')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project_url" class="col-sm-2 control-label"><?php echo e(__('Project URL')); ?><span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="project_url" placeholder="<?php echo e(__('Project URL')); ?>" value="<?php echo e($portfolio->project_url); ?>">
                                            <?php if($errors->has('project_url')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('project_url')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="project_date" class="col-sm-2 control-label"><?php echo e(__('Project Date')); ?><span class="text-danger">*</span></label>
                                        
                                        <div class="col-sm-10">
                                            <div class="input-group date" id="datepicker">
                                                <input type="date" class="form-control" name="project_date" placeholder="<?php echo e(__('Project Date')); ?>" value="<?php echo e($portfolio->project_date); ?>">
                                                <div class="input-group-addon">
                                                    <span class="glyphicon glyphicon-th"></span>
                                                </div>
                                            </div>
                                            <?php if($errors->has('project_date')): ?>
                                                <p class="text-danger"> <?php echo e($errors->first('project_date')); ?> </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 control-label">Status<span class="text-danger">*</span></label>
        
                                        <div class="col-sm-10">
                                            <select class="form-control" name="status">
                                                    <option value="0" <?php echo e($portfolio->status == '0' ? 'selected' : ''); ?>><?php echo e(__('Unpublish')); ?></option>
                                                    <option value="1" <?php echo e($portfolio->status == '1' ? 'selected' : ''); ?>><?php echo e(__('Publish')); ?></option>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/portfolio/edit.blade.php ENDPATH**/ ?>