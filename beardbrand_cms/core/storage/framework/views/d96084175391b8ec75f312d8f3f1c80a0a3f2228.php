<?php $__env->startSection('content'); ?>
   <!-- Content Header (Page header) -->

   <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Welcome back,')); ?> <?php echo e($adminprofile->name); ?> !</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-info">
                  <span class="info-box-icon"><i class="fas fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Users')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($user->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-success">
                  <span class="info-box-icon"><i class="fas fa-box-open"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Package')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($packages->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-warning">
                  <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Service')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($service->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-danger">
                  <span class="info-box-icon"><i class="fas fa-code-branch"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Branch')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($branch->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-primary">
                  <span class="info-box-icon"><i class="fab fa-blogger-b"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Blogs')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($blogs->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-danger">
                  <span class="info-box-icon"><i class="fas fa-star"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Review')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($testimonial->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-info">
                  <span class="info-box-icon"><i class="fas fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Team Member')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($team->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-gradient-success">
                  <span class="info-box-icon"><i class="fas fa-shopping-cart"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Total Product')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($product->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary  card-outline">
              <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Latest 10 Package :')); ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-striped table-bordered">
                  <thead>
                      <tr>
                          <th><?php echo e(__('#')); ?></th>
                          <th><?php echo e(__('Name')); ?></th>
                          <th><?php echo e(__('Price')); ?></th>
                          <th><?php echo e(__('Discount Price')); ?></th>
                          <th><?php echo e(__('Speed')); ?></th>
                          <th><?php echo e(__('Status')); ?></th>
                      </tr>
                  </thead>
                  <tbody>

                      <?php $__currentLoopData = $latestpackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td>
                              <?php echo e($id); ?>

                          </td>
                          <td>
                              <?php echo e($package->name); ?>

                          </td>
                          <td>
                              <?php echo e(Helper::showCurrency()); ?><?php echo e($package->price); ?>

                          </td>
                          <td>
                              <?php if($package->discount_price): ?>
                              <?php echo e(Helper::showCurrency()); ?><?php echo e($package->discount_price); ?>

                              <?php else: ?> 
                              <span class="badge badge-info"><?php echo e(__('No Discount')); ?></span>
                              <?php endif; ?>
                          </td>
                          <td>
                              <?php echo e($package->speed); ?><?php echo e(__(' / mbps')); ?>

                          </td>
                          <td>
                              <?php if($package->status == 1): ?>
                                  <span class="badge badge-success"><?php echo e(__('Publish')); ?></span>
                              <?php else: ?>
                                  <span class="badge badge-warning"><?php echo e(__('Unpublish')); ?></span>
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
          <div class="col-md-6">
            <div class="card card-primary  card-outline">
              <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Latest 10 Blog Post :')); ?></h3>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="idtable" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th><?php echo e(__('Image')); ?></th>
                          <th><?php echo e(__('Title')); ?></th>
                          <th><?php echo e(__('Category')); ?></th>
                          <th><?php echo e(__('Status')); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      
                      <?php $__currentLoopData = $latestblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td><?php echo e(++$id); ?></td>
                          <td>
                              <img class="w-80" src="<?php echo e(asset('assets/front/img/'.$blog->main_image)); ?>" alt="">
                          </td>
                          <td>
                              <?php echo e($blog->title); ?>

                          </td> 
                          <td>
                              <?php echo e($blog->bcategory->name); ?>

                          </td> 
                          <td>
                                  <?php if($blog->status == 1): ?>
                                      <span class="badge badge-success"><?php echo e(__('Publish')); ?></span>
                                  <?php else: ?>
                                      <span class="badge badge-warning"><?php echo e(__('Unpublish')); ?></span>
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
      <!-- Main row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\skynet\core\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>