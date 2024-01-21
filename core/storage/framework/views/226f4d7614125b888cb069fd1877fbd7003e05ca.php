

<?php $__env->startSection('content'); ?>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">
                        <?php echo e(__('Customer Details')); ?>

                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item">
                            <?php echo e(__('Customer Details')); ?>

                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Customer Details')); ?></h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th><?php echo e(__('Name')); ?> </th>
                                    <td> <?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Username')); ?> </th>
                                    <td> <?php echo e($user->username); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Email:')); ?> </th>
                                    <td> <?php echo e($user->email); ?> </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Number:')); ?> </th>
                                    <td>  <?php echo e($user->phone); ?></td>
                                </tr>
                                <tr>
                                    <th> <?php echo e(__('Country:')); ?></th>
                                    <td>  <?php echo e($user->country); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('City:')); ?></th>
                                    <td>  <?php echo e($user->city); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Zip Code:')); ?> </th>
                                    <td><?php echo e($user->zipcode); ?> </td>
                                </tr>
                                <tr>
                                    <th> <?php echo e(__('Address:')); ?></th>
                                    <td> <?php echo e($user->address); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php if($package): ?>
                <div class="col-md-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Active Package')); ?></h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th><?php echo e(__('Package Name')); ?> </th>
                                    <td> <?php echo e($package->name); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Speed Limit')); ?></th>
                                    <td><?php echo e($package->speed); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Package Price')); ?></th>
                                    <td><?php echo e(Helper::showCurrency()); ?><?php echo e($package->price); ?> / <?php echo e($package->time); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Package Feature')); ?></th>
                                    <td><?php echo e($package->feature); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php if($bills->count() > 0): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card  card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Bill Pay')); ?></h3>
                        </div>
                        <div class="card-body">
                            <table  class="table table-bordered table-striped data_table">
                                <thead>
                                <tr>
                                    <th><?php echo e(__('#')); ?></th>
                                    <th><?php echo e(__('Package Name')); ?></th>
                                    <th><?php echo e(__('Price')); ?></th>
                                    <th><?php echo e(__('Method')); ?></th>
                                    <th><?php echo e(__('Bill Paid')); ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($id); ?></td>
                                        <td>
                                            <?php echo e($bill->package->name); ?>

                                        </td>
                                        <td>
                                            <strong><?php echo e($bill->currency_sign); ?><?php echo e($bill->package_cost); ?></strong> / <?php echo e($bill->package->time); ?>

                                        </td>
                                        <td>
                                            <?php echo e($bill->method); ?>

                                        </td>
                                        <td>
                                            <?php echo e($bill->fulldate); ?>

                                        </td>
                                  
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/admin/register_user/details.blade.php ENDPATH**/ ?>