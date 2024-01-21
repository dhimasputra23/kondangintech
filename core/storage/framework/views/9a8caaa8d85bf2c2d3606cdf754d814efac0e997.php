

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Package Orders')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Package Orders')); ?></li>
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
                        <h3 class="card-title mt-1"><?php echo e(__('Pending Order List')); ?></h3>
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
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $__currentLoopData = $package_pendingorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e($id); ?>

                                </td>
                                <td>
                                    <?php echo e($order->package->name); ?>

                                </td>
                                <td>
                                    <?php echo e($order->user->username); ?>

                                </td>
                                <td>
                                    <?php echo e($order->currency_sign); ?> <?php echo e($order->package_cost); ?>

                                </td>
                                <td>
                                    <?php echo e($order->method); ?>

                                </td>
                                <td>
                                    <?php if($order->status == 0): ?>
                                        <span class="badge badge-info"><?php echo e(__('Pending')); ?></span>
                                    <?php elseif($order->status == 1): ?>
                                        <span class="badge badge-primary"><?php echo e(__('In Progress')); ?></span>
                                    <?php elseif($order->status == 2): ?>
                                        <span class="badge badge-success"><?php echo e(__('Completed')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.package.delete_order', $order->id )); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($order->id); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" id="delete">
                                        <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    <a href="#" data-id="<?php echo e($order->id); ?>" class="btn btn-primary btn-sm package_order_view" data-toggle="modal" data-target="#package_order_view"><i class="fas fa-eye mr-0"></i></a>
                                    <?php if($order->invoice_number): ?>
                                    <a class="btn btn-warning btn-sm" href="<?php echo e(asset('assets/front/invoices/package/'.$order->invoice_number)); ?>" target="_blank">Invoice</a>
                                    <?php endif; ?>
                                    <a href="#" data-id="<?php echo e($order->id); ?>" class="btn btn-info btn-sm package_order_status"  data-toggle="modal" data-target="#package_order_status"><?php echo e(__('Update Status')); ?></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    </div>
                </div>
                <span class="text-danger"><?php echo e(__('If package orders are deleted then all bill pay information under this package will be deleted !!!')); ?></span>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- Package order view modal -->
<div class="modal fade" id="package_order_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLaravel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('Order Quick View')); ?></h5>
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
                                <td id="fname"></td>
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
                    <h6 class="mb-3"><strong><?php echo e(__('Order Info :')); ?></strong></h6>
                    <table class="table border table-striped">
                        <tbody>
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
                                <th scope="row"><?php echo e(__('Package Feature')); ?></th>
                                <td id="packfeature"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Payment Method')); ?></th>
                                <td id="method"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Attendance Id')); ?></th>
                                <td id="attendance_id"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Txn Id')); ?></th>
                                <td id="txn_id"></td>
                            </tr>
                            <tr>
                                <th scope="row"><?php echo e(__('Status')); ?></th>
                                <td id="status"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> 
      </div>
    </div>
</div>
<!-- package_order_status  modal -->
<div class="modal fade" id="package_order_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLaravel" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('Update Order Status')); ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" action="<?php echo e(route('admin.package.order_update_status')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="status_orderid" id="status_orderid" value="">
                <div class="form-group">
                    <div id="status-wrape">
                        <select class="form-control" name="status">
                        </select>
                    </div>
                    <?php if($errors->has('status')): ?>
                        <p class="text-danger"> <?php echo e($errors->first('status')); ?> </p>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                    </div>
                </div>
            
            </form>
        </div> 
      </div>
    </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/package/order/pendingorder.blade.php ENDPATH**/ ?>