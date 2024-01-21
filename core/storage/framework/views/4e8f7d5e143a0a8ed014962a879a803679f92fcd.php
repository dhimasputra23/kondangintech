<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Portfolio</h2>
        <p><?php echo e($sectionInfo->plan_title); ?></p>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <?php $__currentLoopData = $portfoliocategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfoliocategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li data-filter=".filter-<?php echo e(str_replace(['(', ')', '-'], '', $portfoliocategory->slug)); ?>"><?php echo e($portfoliocategory->name); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        </div>
      </div>


      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo e(str_replace(['(', ')', '-'], '', $portfoliocategory->slug)); ?>">
          <div class="portfolio-wrap">
            <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$portfolio->image_path)); ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?php echo e($portfolio->title); ?></h4>
              <p><?php echo e($portfolio->client_name); ?></p>
              <div class="portfolio-links">
                <a href="<?php echo e(asset('assets/kondangintech-landing/img/'.$portfolio->image_path)); ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?php echo e($portfolio->title); ?>"><i class="bi bi-plus"></i></a>
                <a href="<?php echo e(route('front.portfoliodetails', $portfolio->slug)); ?>" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

      </div>

    </div>

  </section><!-- End Portfolio Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/portfolio-section.blade.php ENDPATH**/ ?>