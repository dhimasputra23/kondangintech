<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Testimonials</h2>
        <p><?php echo e($sectionInfo->testimonial_title); ?></p>
      </header>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">
          <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                <?php
                    for ($i=0; $i < $testimonial->rating; $i++) { 
                      
                      echo "<i class='bi bi-star-fill'></i>";
                    }
                ?>
              </div>
              <p>
                <?php echo e($testimonial->message); ?>

              </p>
              <div class="profile mt-auto">
                <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$testimonial->image)); ?>" class="testimonial-img" alt="">
                <h3><?php echo e($testimonial->name); ?></h3>
                <h4><?php echo e($testimonial->position); ?></h4>
              </div>
            </div>
          </div><!-- End testimonial item -->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- End Testimonials Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/testimonials-section.blade.php ENDPATH**/ ?>