<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>

<?php $__env->startSection('style'); ?>
	  <!-- DataTable css -->
	  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.css')); ?>">
	  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.css')); ?>">
	  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

	<!--Main Breadcrumb Area Start -->
	<div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-title-item text-center">
						<h2 class="title"><?php echo e(__('Dashboard')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Dashboard')); ?></li>
						</ul>
					</div> <!-- page title -->
				</div>
			</div> <!-- row -->
		</div> <!-- container -->
	</div> 
	
	<!--Main Breadcrumb Area End -->

    <!-- User Dashboard Start -->
	<section class="user-dashboard-area section-gap">
		<div class="container">
		  <div class="row">
			<div class="col-lg-3">
				<?php if ($__env->exists('user.dashboard-sidenav')) echo $__env->make('user.dashboard-sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</div>
			<div class="col-lg-9 ">
			  <div class="dashboard-inner">
				<?php if( $visibility->is_shop == 1): ?>
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
							  <p><?php echo e(__('Total Product Order')); ?></p>
							  <h5 class="card-title"><?php echo e($orders->count()); ?></h5>
							</div>
						  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="user-table-wrapper">
							<div class="user-table">
								<table class="table table-bordered table-striped data_table">
									<thead>
										<tr>
											<th><?php echo e(__('Order Number')); ?></th>
											<th><?php echo e(__('Total')); ?></th>
											<th><?php echo e(__('Quintity')); ?></th>
											<th><?php echo e(__('Payment Status')); ?></th>
											<th><?php echo e(__('Action')); ?></th>
										</tr>
									</thead>
									<tbody>
				
										<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<tr>
				
										  <td><?php echo e($order->order_number); ?></td>
											<td>
												
												<?php echo e($order->currency_sign); ?> <?php echo e($order->total); ?>

											</td>
											<td>
											   <?php echo e($order->qty); ?>

											</td>
				
											<td>
												<?php if($order->payment_status == 0): ?>
													<span class="badge badge-info"><?php echo e(__('Pending')); ?></span>
												<?php elseif($order->payment_status == 1): ?>
													<span class="badge badge-success"><?php echo e(__('Paid')); ?></span>
												<?php endif; ?>
				
											</td>
				
											
											<td>
												<button type="button" data-href="<?php echo e(route('user.order.details', $order->id)); ?>"  class="btn btn-primary view_order_details btn-sm" data-toggle="modal" data-target="#view_order_details_modal">
												<?php echo e(__('Details')); ?>

												  </button>
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
			</div>
		  </div>
		</div>
	
	  </section>
    <!-- User Dashboard End -->


	<div class="modal fade" id="view_order_details_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-xl" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('View Order Details')); ?></h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" id="order_info_view">
	
					</div>
				</div>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
			</div>
		  </div>
		</div>
	  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
	<!-- DataTable js -->
<script src="<?php echo e(asset('assets/admin/plugins/data-table/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/data-table/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/data-table/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/data-table/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/data-table/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/plugins/data-table/buttons.bootstrap4.min.js')); ?>"></script>

<script>
	 $(".data_table").DataTable();
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet41\multipurpose_website_cms\core\resources\views/user/dashboard.blade.php ENDPATH**/ ?>