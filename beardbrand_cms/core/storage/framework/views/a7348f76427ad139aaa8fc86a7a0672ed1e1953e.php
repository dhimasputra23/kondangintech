<!-- ======= Services Section ======= -->
<section id="services" class="services">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Services</h2>
      <p><?php echo e($sectionInfo->service_title); ?></p>
    </header>

    <div class="row gy-4">
      <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $colors = ['blue', 'orange', 'green', 'red'];
            $colorIndex = $key % count($colors);
            $currentColor = $colors[$colorIndex];
        ?>
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo e(($key+2) * 100); ?>">
        <div class="service-box <?php echo e($currentColor); ?>">
          <!-- <i class="ri-discuss-line icon"></i> -->
          <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$service->icon)); ?>" width="80px" alt="landing page" >
          <br><br>
          <h3><?php echo e($service->name); ?></h3>
          <?php echo $service->content; ?>

          <!-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> -->
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  </div>

</section><!-- End Services Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/services-section.blade.php ENDPATH**/ ?>