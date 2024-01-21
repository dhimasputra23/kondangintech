
<?php $__env->startSection('meta-keywords', "$setting->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$setting->meta_description"); ?>

<?php $__env->startSection('content'); ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <article class="entry">

                <div class="entry-img">
                  <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$blog->main_image)); ?>" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="<?php echo e(route('front.blogdetails', $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>Admin</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="<?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('Y-m-d')); ?>"><?php echo e(\Carbon\Carbon::parse($blog->created_at)->format('M j, Y')); ?></time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a>12 Comments</a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  <?php echo \Illuminate\Support\Str::of($blog->content)->limit(500, '...'); ?>

                  <div class="read-more">
                    <a href="<?php echo e(route('front.blogdetails', $blog->slug)); ?>">Read More</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

            <div class="blog-pagination">
              <ul class="justify-content-center">
                
                <?php echo e($blogs->links('kondangintech-landing.pagination.custom')); ?>

              </ul>
              
              
            </div>

          </div><!-- End blog entries list -->

          <?php echo $__env->make('kondangintech-landing.components.sidebar-widget', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('kondangintech-landing.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/blog.blade.php ENDPATH**/ ?>