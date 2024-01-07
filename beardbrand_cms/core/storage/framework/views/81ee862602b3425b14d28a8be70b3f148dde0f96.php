<!-- ======= About Section ======= -->
<section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h3>SIAPA KAMI?</h3>
            <h2><?php echo e($sectionInfo->about_title); ?></h2>
            <?php echo $sectionInfo->about_subtitle; ?>


          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$sectionInfo->about_image)); ?>" class="img-fluid" alt="">
        </div>

      </div>
    </div>

  </section><!-- End About Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/about-section.blade.php ENDPATH**/ ?>