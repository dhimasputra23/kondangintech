

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Portfolios')); ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Portfolio Content')); ?></h3>
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
                        <form class="form-horizontal" action="<?php echo e(route('admin.portfoliocontent.update',  $saectiontitle->language_id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Portfolio Title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="portfolio_title" placeholder="<?php echo e(__('Portfolio Title')); ?>" value="<?php echo e($saectiontitle->portfolio_title); ?>">
                                    <?php if($errors->has('portfolio_title')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('portfolio_title')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 control-label"><?php echo e(__('Portfolio Sub-title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="portfolio_subtitle" placeholder="<?php echo e(__('Portfolio Sub-Title')); ?>" value="<?php echo e($saectiontitle->portfolio_subtitle); ?>">
                                    <?php if($errors->has('portfolio_subtitle')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('portfolio_subtitle')); ?> </p>
                                    <?php endif; ?>
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
                    <h3 class="card-title"><?php echo e(__('Portfolio List:')); ?></h3>
                    <div class="card-tools d-flex">
                        <div class="d-inline-block mr-4">
                            <select class="form-control lang" id="languageSelect" data="<?php echo e(url()->current() . '?language='); ?>">
                                <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($lang->code); ?>" <?php echo e($lang->code == request()->input('language') ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <a href="<?php echo e(route('admin.portfolio.add'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> <?php echo e(__('Add')); ?>

                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="idtable" class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Client')); ?></th>
                                <th><?php echo e(__('Category')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(++$id); ?></td>

                                <td>
                                    <?php echo e($portfolio->title); ?>

                                </td> 
                                <td>
                                    <?php echo e($portfolio->client->name); ?>

                                </td>
                                <td>
                                    <?php echo e($portfolio->portfoliocategory->name); ?>

                                </td> 
                                <td>
                                        <?php if($portfolio->status == 1): ?>
                                            <span class="badge badge-success"><?php echo e(__('Publish')); ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-warning"><?php echo e(__('Unpublish')); ?></span>
                                        <?php endif; ?>
                                        
                                    </td>
                                <td>
                                    <a href="<?php echo e(route('admin.portfolio.edit', $portfolio->id)); ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i><?php echo e(__('Edit')); ?></a>
                                    <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.portfolio.delete', $portfolio->id )); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($portfolio->id); ?>">
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
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/portfolio/index.blade.php ENDPATH**/ ?>