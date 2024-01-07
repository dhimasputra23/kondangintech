<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Clients</h2>
        <p><?php echo e($sectionInfo->clients_title); ?></p>
      </header>

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide"><img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$client->logo)); ?>" class="img-fluid" alt=""></div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/clients-section.blade.php ENDPATH**/ ?>