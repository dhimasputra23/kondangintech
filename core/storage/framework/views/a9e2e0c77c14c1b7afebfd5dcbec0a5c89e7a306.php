<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">
      <?php $__currentLoopData = $funfacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $funfact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php
          $colors = ['#4154f1', '#ee6c20', '#15be56', '#bb0852'];
          $colorIndex = $key % count($funfacts);
          $currentColor = $colors[$colorIndex];
      ?>
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="<?php echo e($funfact ->icon); ?>" style="color: <?php echo e($currentColor); ?>;"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="<?php echo e($funfact->value); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php echo e($funfact->name); ?></p>
          </div>
        </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

  </div>
</section><!-- End Counts Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/counts-section.blade.php ENDPATH**/ ?>