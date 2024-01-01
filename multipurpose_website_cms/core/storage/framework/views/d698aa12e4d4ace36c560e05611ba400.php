
<?php
    $user = json_decode($order->user_info,true);
    $cart = json_decode($order->cart,true);
    $shipping_charge_info = json_decode($order->shipping_charge_info,true);
?>



<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">
              <?php echo e(__('Order Details')); ?>

            </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item">
              <?php echo e(__('Order Details')); ?>

            </li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="
            <?php if($order->shipping_name && $order->shipping_email && $order->shipping_number &&  $order->shipping_address): ?>
                col-md-4
                <?php else: ?>
                col-md-6 
            <?php endif; ?>
            ">
                <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Order')); ?>  [ <?php echo e($order->order_number); ?> ]</h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th><?php echo e(__('Payment Status')); ?> :</th>
                                    <td>
                                        <?php if($order->payment_status =='0'): ?>
                                        <span class="badge badge-danger">Pending </span>
                                        <?php else: ?>
                                        <span class="badge badge-success">Completed  </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Order Status')); ?> :</th>
                                    <td>
                                        <?php if($order->order_status == '0'): ?>
                                        <span class="badge badge-warning"> Pending </span>
                                        <?php elseif($order->order_status == '1'): ?>
                                        <span class="badge badge-primary">Processing </span>
                                        <?php elseif($order->order_status == '2'): ?>
                                        <span class="badge badge-success"> Completed </span>
                                        <?php elseif($order->order_status == '3'): ?>
                                        <span class="badge badge-danger"> Rejected  </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Paid amount')); ?> :</th>
                                    <td><?php echo e($order->currency_sign); ?> <?php echo e($order->total); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Shipping Info')); ?> :</th>
                                    <td>
                                        <strong>Title :</strong> <?php echo e($shipping_charge_info['title']); ?> <br>
                                        <strong>Duration :</strong> <?php echo e($shipping_charge_info['subtitle']); ?> <br>
                                        <strong>Cost :</strong> <?php echo e($order->currency_sign); ?><?php echo e($shipping_charge_info['cost']); ?> <br>
                                    </td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Payment Method')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->method)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Order Date')); ?> :</th>
                                    <td><?php echo e(Carbon\Carbon::parse($order->created_at)->format('d-m-Y')); ?></td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <?php if($order->shipping_name && $order->shipping_email && $order->shipping_number &&  $order->shipping_address): ?>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Billing Details')); ?></h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th><?php echo e(__('Email')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->billing_email)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Phone')); ?> :</th>
                                    <td> <?php echo e($order->billing_number); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('State')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->billing_state)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Address')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->billing_address)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Country')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->billing_country)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Zip Code')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->billing_zip)); ?></td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Shipping Details')); ?></h3>
                        </div>

                        <div class="card-body">
                            <table class="table  table-bordered">
                                <tr>
                                    <th><?php echo e(__('Email')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->shipping_email)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Phone')); ?> :</th>
                                    <td> <?php echo e($order->shipping_number); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('State')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->shipping_state)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Address')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->shipping_address)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Country')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->shipping_country)); ?></td>
                                </tr>
                                <tr>
                                    <th><?php echo e(__('Zip Code')); ?> :</th>
                                    <td><?php echo e(Helper::convertUtf8($order->shipping_zip)); ?></td>
                                </tr>
                            </table>
                    </div>
                </div>
            </div>
            <?php else: ?> 
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title mt-1"><?php echo e(__('Billing Details')); ?></h3>
                            </div>

                            <div class="card-body">
                                <table class="table  table-bordered">
                                    <tr>
                                        <th><?php echo e(__('Email')); ?> :</th>
                                        <td><?php echo e(Helper::convertUtf8($order->billing_email)); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Phone')); ?> :</th>
                                        <td> <?php echo e($order->billing_number); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('State')); ?> :</th>
                                        <td><?php echo e(Helper::convertUtf8($order->billing_state)); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Address')); ?> :</th>
                                        <td><?php echo e(Helper::convertUtf8($order->billing_address)); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Country')); ?> :</th>
                                        <td><?php echo e(Helper::convertUtf8($order->billing_country)); ?></td>
                                    </tr>
                                    <tr>
                                        <th><?php echo e(__('Zip Code')); ?> :</th>
                                        <td><?php echo e(Helper::convertUtf8($order->billing_zip)); ?></td>
                                    </tr>
                                </table>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1"><?php echo e(__('Order Product')); ?></h3>
                        </div>

                        <div class="card-body">
                            
                            <table class="table  table-bordered table-striped data_table">
                                <thead>
                                    <tr>
                                       <th>#</th>
                                       <th><?php echo e(__('Image')); ?></th>
                                       <th><?php echo e(__('Product')); ?></th>
                                       <th><?php echo e(__('Downloadable')); ?></th>
                                       <th><?php echo e(__('Quintity')); ?></th>
                                       <th><?php echo e(__('Price')); ?></th>
                                       <th><?php echo e(__('Total')); ?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                   
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                       <td><?php echo e($key+1); ?></td>
                                       <td>
                                           <img class="w-80" src="<?php echo e(asset('assets/front/img/'.$item['image'])); ?>" alt="product" >
                                    </td>
                                       <td><?php echo e(Helper::convertUtf8($item['title'])); ?></td>
                                       <td>
                                           <?php if($item['downloadable_file']): ?>
                                           <a class="btn btn-success btn-sm" href="<?php echo e(asset('assets/front/downloadable/'.$item['downloadable_file'])); ?>">Download File</a>
                                           <?php else: ?> 
                                           No File Available
                                           <?php endif; ?>
                                        
                                           
                                       </td>
                                       <td>
                                          <b><?php echo e(__('Quantity')); ?>:</b> <span><?php echo e($item['qty']); ?></span><br>
                                       </td>
                                       <td><?php echo e($order->currency_sign); ?> <?php echo e(Helper::showPriceInOrder($item['price'], $order->currency_value)); ?></td>

                                       <td><?php echo e($order->currency_sign); ?> <?php echo e(round( ($item['price'] * $item['qty'])  * $order->currency_value,2)); ?></td>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/admin/product/order/details.blade.php ENDPATH**/ ?>