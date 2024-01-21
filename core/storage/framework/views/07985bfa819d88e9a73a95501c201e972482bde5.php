

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Bill pay')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Bill pay')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Bill pay List')); ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-striped table-bordered data_table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('#')); ?></th>
                                <th><?php echo e(__('Package Name')); ?></th>
                                <th><?php echo e(__('User Name')); ?></th>
                                <th><?php echo e(__('Price')); ?></th>
                                <th><?php echo e(__('Payment Method')); ?></th>
                                <th><?php echo e(__('Package Duration')); ?></th>
                                <th><?php echo e(__('Bill Paid')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($id); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->package->name); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->user->username); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->currency_sign); ?><?php echo e($bill->package_cost); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->method); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->package->time); ?>

                                </td>
                                <td>
                                    <?php echo e($bill->fulldate); ?>

                                </td>
                                <td>
                                    <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.billpay_delete', $bill->id )); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($bill->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form> <?php if($bill->invoice_number): ?>
                                    <a class="btn btn-warning btn-sm" href="<?php echo e(asset('assets/front/invoices/bill/'.$bill->invoice_number)); ?>" target="_blank">Invoice</a>
                                    <?php endif; ?>
                                    <a href="#" data-id="<?php echo e($bill->id); ?>" class="btn btn-primary btn-sm billpay_view" data-toggle="modal" data-target="#billpay_view"><i class="fas fa-eye mr-0"></i></a>
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
<!-- Billpay view modal -->
<div class="modal fade" id="billpay_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLaravel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('Bill Quick View')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                    <h6 class="mb-3"><strong><?php echo e(__('Customar Info :')); ?></strong></h6>
                    <table class="table border table-striped">
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo e(__('Full Name')); ?></th>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Username')); ?></th>
                                <td id="username"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Email')); ?></th>
                                <td id="email"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Phone')); ?></th>
                                <td id="phone"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Address')); ?></th>
                                <td id="address"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Country')); ?></th>
                                <td id="country"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('City')); ?></th>
                                <td id="city"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Zip Code')); ?></th>
                                <td id="zipcode"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6">
                    <h6 class="mb-3"><strong><?php echo e(__('Billpay Info :')); ?></strong></h6>
                    <table class="table border table-striped">
                        <tbody>
                            
                            <tr>
                                <th scope="row"><?php echo e(__('Billpay Date')); ?></th>
                                <td id="paydate"></td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><?php echo e(__('Payment Method')); ?></th>
                                <td id="method"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Package Name')); ?></th>
                                <td id="packname"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Speed Limit')); ?></th>
                                <td><span id="packspeed"></span> <span><?php echo e(__('Mbps')); ?></span></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Package Price')); ?></th>
                                <td><span id="currency_sign"></span> <span id="packprice"></span> / <span id="packtime"></span></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Attendance Id')); ?></th>
                                <td id="attendance_id"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Txn Id')); ?></th>
                                <td id="txn_id"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/bill/index.blade.php ENDPATH**/ ?>