

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Clients')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Clients')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Clients Content')); ?></h3>
                        <div class="card-tools">
                            <div class="d-inline-block mr-4">
                        <select class="form-control lang languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                            <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.clientscontent.update',  $saectiontitle->language_id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Clients Title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="clients_title" placeholder="<?php echo e(__('Clients Title')); ?>" value="<?php echo e($saectiontitle->clients_title); ?>">
                                    <?php if($errors->has('clients_title')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('clients_title')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Clients Description')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <textarea name="clients_subtitle" class="form-control summernote" placeholder="<?php echo e(__('Clients Description')); ?>" rows="5"><?php echo e($saectiontitle->clients_subtitle); ?></textarea>
                                    <?php if($errors->has('clients_subtitle')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('clients_subtitle')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Clients BG Image')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <img class="mw-400 mb-3 show-img img-demo" src="
                                    <?php if($saectiontitle->clients_image): ?>
                                    <?php echo e(asset('assets/kondangintech-landing/img/'.$saectiontitle->clients_image)); ?>

                                    <?php else: ?>
                                    <?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>

                                    <?php endif; ?>" alt="">
                                    <div class="custom-file">
                                        <label class="custom-file-label" for="clients_image">Choose New Image</label>
                                        <input type="file" class="custom-file-input up-img" name="clients_image" id="clients_image">
                                    </div>
                                    <p class="help-block text-info"><?php echo e(__('Upload 1920X500 (Pixel) Size image for best quality.
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
                    <h3 class="card-title mt-1"><?php echo e(__('Clients List')); ?></h3>
                    <div class="card-tools d-flex">
                        <div class="d-inline-block mr-4">
                            <select class="form-control lang" id="languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <a href="<?php echo e(route('admin.clients.add'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> <?php echo e(__('Add clients')); ?>

                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Logo')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                                </tr>
                        </thead>
                        <tbody>
                        
                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$id); ?></td>
                            <td>
                                <img  class="w-60" src="<?php echo e(asset('assets/kondangintech-landing/img/'.$client->logo)); ?>" alt="">
                            </td>
                            <td><?php echo e($client->name); ?></td>
                            <td>
                                <a href="<?php echo e(route('admin.clients.edit', $client->id )); ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i><?php echo e(__('Edit')); ?></a>

                                <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.clients.delete', $client->id )); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="id" value="<?php echo e($client->id); ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                    <i class="fas fa-trash"></i><?php echo e(__('Delete')); ?>

                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/clients/index.blade.php ENDPATH**/ ?>