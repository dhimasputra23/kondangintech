<!-- ======= Features Section ======= -->
<section id="features" class="features">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Features</h2>
      <p><?php echo e($sectionInfo->feature_first_title); ?></p>
    </header>

    <div class="row">

      <div class="col-lg-6">
        <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_first_image)); ?>" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
        <div class="row align-self-center gy-4">
          <?php
            $subtitles = explode( ',', $sectionInfo->feature_first_subtitle );
            for ($i=0; $i < count($subtitles); $i++) { 
              
              echo "<div class='col-md-6' data-aos='zoom-out' data-aos-delay='200'>
                      <div class='feature-box d-flex align-items-center'>
                        <i class='bi bi-check'></i>
                        <h3>$subtitles[$i]</h3>
                      </div>
                    </div>";
            }
          ?>

        </div>
      </div>

    </div> <!-- / row -->

    <!-- Feature Tabs -->
    <div class="row feture-tabs" data-aos="fade-up">
      <div class="col-lg-6">
        <h3><?php echo e($sectionInfo->feature_second_title); ?></h3>

        <!-- Tabs -->
        <ul class="nav nav-pills mb-3">
          <?php $__currentLoopData = $featuresSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featureSecond): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li>
            <a class="nav-link <?php if($key === 0): ?> active <?php endif; ?>" data-bs-toggle="pill" href="#tab<?php echo e($key); ?>"><?php echo e($featureSecond->name); ?></a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
        </ul><!-- End Tabs -->

        <!-- Tab Content -->
        <div class="tab-content">
          <?php $__currentLoopData = $featuresSecond; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featureSecond): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="tab-pane fade <?php if($key === 0): ?> show active <?php endif; ?>" id="tab<?php echo e($key); ?>">
                  <?php echo $featureSecond->description; ?>

              </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

      </div>

      <div class="col-lg-6">
        <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_second_image)); ?>" class="img-fluid" alt="">
      </div>

    </div><!-- End Feature Tabs -->

    <!-- Feature Icons -->
    <div class="row feature-icons" data-aos="fade-up">
      <h3><?php echo e($sectionInfo->feature_third_title); ?></h3>

      <div class="row">

        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
          <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_third_image)); ?>" class="img-fluid p-4" alt="">
        </div>

        <div class="col-xl-8 d-flex content">
          <div class="row align-self-center gy-4">
            <?php $__currentLoopData = $featuresThird; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featureThird): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="<?php echo e($key * 100); ?>">
                <!-- <i class="ri-line-chart-line"></i> -->
                <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$featureThird->image)); ?>" width="50px" height="50px" alt="">&nbsp;&nbsp;&nbsp;
                <div>
                  <h4><?php echo e($featureThird->name); ?></h4>
                  <?php echo $featureThird->description; ?>

                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>

      </div>

    </div><!-- End Feature Icons -->

  </div>

</section><!-- End Features Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/features-section.blade.php ENDPATH**/ ?>