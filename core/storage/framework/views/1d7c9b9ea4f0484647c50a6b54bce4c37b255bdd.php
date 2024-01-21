<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Pricing</h2>
        <p><?php echo e($sectionInfo->plan_title); ?></p>
      </header>

      <div class="row gy-4" data-aos="fade-left">
        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            <?php
                $colors = ['#07d5c0', '#65c600', '#ff901c', '#ff0071'];
                $colorIndex = $key % count($colors);
                $currentColor = $colors[$colorIndex];
            ?>
            <h3 style="color: <?php echo e($currentColor); ?>;"><?php echo e($plan->name); ?></h3>
            
            <div class="price">
              <?php
								if ($plan->start_price && $plan->end_price) {
                  if ($plan->start_price >= 1000000) {
                    $formattedStartPrice = number_format($plan->start_price / 1000000, 0) . ' jt';
                  }else{
                    $formattedStartPrice = number_format($plan->start_price / 1000, 0) . ' rb';
                  }
                  if ($plan->end_price >= 1000000) {
                    $formattedEndPrice = number_format($plan->end_price / 1000000, 0) . ' jt';
                  }else{
                    $formattedEndPrice = number_format($plan->end_price / 1000, 0) . ' rb';
                  }
                  
                  echo "<sup>Rp</sup>{$formattedStartPrice} - {$formattedEndPrice}";
                }
							?>
              
            </div>
            <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$plan->image)); ?>" class="img-fluid" alt="">
            <ul>
              <?php
								$feature = explode( ',', $plan->feature );
								for ($i=0; $i < count($feature); $i++) { 
									
                  echo "<li>$feature[$i]</li>";
								}
							?>
            </ul>
            <a href="#" class="btn-buy">Hubungi Kami <i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

      </div>

    </div>

  </section><!-- End Pricing Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/pricing-section.blade.php ENDPATH**/ ?>