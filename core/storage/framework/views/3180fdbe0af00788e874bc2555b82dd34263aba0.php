
<?php $__env->startSection('meta-keywords', "$setting->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$setting->meta_description"); ?>

<?php $__env->startSection('content'); ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2><?php echo e($portfolio->title); ?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="swiper-slide">
                  <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$image->image_path)); ?>" alt="">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Informasi Proyek</h3>
              <ul>
                <li><strong>Kategori</strong>: <?php echo e($portfolio->portfoliocategory->name); ?></li>
                <li><strong>Klien</strong>: <?php echo e($portfolio->client->name); ?></li>
                <li><strong>Tanggal Proyek</strong>: <?php echo e($portfolio->project_date); ?></li>
                <li><strong>URL Proyek</strong>: <a href="<?php echo e($portfolio->project_url); ?>"><?php echo e($portfolio->project_url); ?></a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2><?php echo e($portfolio->title); ?></h2>
              <?php echo $portfolio->content; ?>

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
<?php $__env->stopSection(); ?>

  
<?php echo $__env->make('kondangintech-landing.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/portfolio-details.blade.php ENDPATH**/ ?>