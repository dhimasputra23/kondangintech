<?php $__env->startSection('content'); ?>

<div class="content-header">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><?php echo e(__('Payment Gateway')); ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item"><?php echo e(__('Payment Gateway')); ?></li>
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
                    <h3 class="card-title mt-1"><?php echo e(__('Payment Gateway List')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table id="idtable" class="table table-bordered table-striped data_table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('Title')); ?></th>
                                <th><?php echo e(__('Description')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($gateway->name); ?></td>
                            <td>
                            <?php if($gateway->type == 'automatic'): ?>
                                <?php echo e($gateway->getAutoDataText()); ?>

                            <?php else: ?>
                                <?php echo e(mb_strlen(strip_tags($gateway->details),'utf-8') > 250 ? mb_substr(strip_tags($gateway->details),0,250,'utf-8').'...' : strip_tags($gateway->details)); ?>

                            <?php endif; ?>
                            </td>

                            <td>
                                <?php if($gateway->status == 1): ?>
                                    <span class="badge badge-success"><?php echo e(__('Active')); ?></span>
                                <?php else: ?>
                                    <span class="badge badge-warning"><?php echo e(__('Dactive')); ?></span>
                                <?php endif; ?>
                            </td>

                            <td width="18%">
                                <a href="<?php echo e(route('admin.payment.edit', $gateway->id)); ?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i><?php echo e(__('Edit')); ?></a>
                                <?php if($gateway->type == 'menual' && $gateway->keyword == null): ?>
                                <a href="javascript:;" data-href="<?php echo e(route('admin.payment.delete', $gateway->id )); ?>" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target=".deleteModel"><i class="fas fa-trash"></i><?php echo e(__('Delete')); ?></a>
                                <?php endif; ?>
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
    <div class="modal fade deleteModel" tabindex="-1" role="dialog"
    aria-labelledby="deleteModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"><?php echo e(__("Confirm Delete")); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <p class="text-center"><?php echo e(__("Are you sure")); ?></p>
            <p class="text-center"><?php echo e(__("Do you want to proceed?")); ?></p>
        </div>
        <div class="modal-footer">
            <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("Cancel")); ?></a>
            <a href="javascript:;" class="btn btn-danger btn-delete"><?php echo e(__("Delete")); ?></a>
        </div>
    </div>
    </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/payment_gateway/index.blade.php ENDPATH**/ ?>