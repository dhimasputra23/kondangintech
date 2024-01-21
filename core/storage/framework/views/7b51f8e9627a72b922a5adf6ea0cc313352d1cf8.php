<div class="col-lg-4">

    <div class="sidebar">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="<?php echo e(route('front.blogs')); ?>" method="GET">
          <input type="text" name="term" value="<?php echo e(request('term')); ?>">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
        <ul>
            <?php $__currentLoopData = $bcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('front.blogs',['category' => $bcategory->slug])); ?>"><?php echo e($bcategory->name); ?> <span>(<?php echo e($bcategory->count); ?>)</span></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
      </div><!-- End sidebar categories-->

      <h3 class="sidebar-title">Recent Posts</h3>
      <div class="sidebar-item recent-posts">
        <?php $__currentLoopData = $latestblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="post-item clearfix">
            <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$latestblog->main_image)); ?>" alt="">
            <h4><a href="<?php echo e(route('front.blogdetails', $latestblog->slug)); ?>"><?php echo e($latestblog->title); ?></a></h4>
            <time datetime="<?php echo e(\Carbon\Carbon::parse($latestblog->created_at)->format('Y-m-d')); ?>"><?php echo e(\Carbon\Carbon::parse($latestblog->created_at)->format('M d, Y')); ?></time>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div><!-- End sidebar recent posts-->

      <h3 class="sidebar-title">Tags</h3>
      <div class="sidebar-item tags">
        <ul>
          <?php $__currentLoopData = $latestTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('front.blogs',['tag' => $latestTag])); ?>"><?php echo e($latestTag); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
      </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

  </div><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/sidebar-widget.blade.php ENDPATH**/ ?>