<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Blog</h2>
        <p><?php echo e($sectionInfo->blog_title); ?></p>
      </header>

      <div class="row">
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$blog->main_image)); ?>" class="img-fluid" alt=""></div>
            <span class="post-date"><?php echo e($blog->created_at->format('l, d F Y')); ?></span>
            <h3 class="post-title"><?php echo e($blog->title); ?></h3>
            <a href="<?php echo e(route('front.blogdetails', $blog->slug)); ?>" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

    </div>

  </section><!-- End Recent Blog Posts Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/blogs-section.blade.php ENDPATH**/ ?>