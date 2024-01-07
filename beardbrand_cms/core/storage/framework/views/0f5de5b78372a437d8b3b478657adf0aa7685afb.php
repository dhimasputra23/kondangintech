

<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><?php echo e(__('Customers')); ?> </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item"><?php echo e(__('Customers')); ?></li>
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
                            <h3 class="card-title mt-1"><?php echo e(__('Customer Lists')); ?></h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-striped table-bordered data_table">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('#')); ?></th>
                                        <th><?php echo e(__('Image')); ?></th>
                                        <th><?php echo e(__('Username')); ?></th>
                                        <th><?php echo e(__('Email')); ?></th>
                                        <th><?php echo e(__('Number')); ?></th>
                                        <th><?php echo e(__('Address')); ?></th>
                                        <th><?php echo e(__('View More')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <?php echo e($id); ?>

                                        </td>
                                        <td>
                                            <img src="<?php echo e(!empty($user->photo) ? asset('assets/front/img/'.$user->photo) : ''); ?>" alt="" width="60">
                                        </td>
                                        <td><?php echo e($user->username); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td><?php echo e($user->phone); ?></td>
                                        <td><?php echo e($user->address); ?></td>
                                        <td>
                                            <a  href="<?php echo e(route('register.user.view',$user->id)); ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/register_user/index.blade.php ENDPATH**/ ?>