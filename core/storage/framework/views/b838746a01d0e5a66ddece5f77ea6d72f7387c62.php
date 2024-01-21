<!-- ======= Values Section ======= -->
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>OUR VALUES</h2>
        <p>
          <?php echo e($sectionInfo->value_title); ?></p>
      </header>

      <div class="row">
        <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$value->image)); ?>" class="img-fluid" alt="">
            <h3><?php echo e($value->name); ?></h3>
            <?php echo $value->description; ?>

          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

    </div>

  </section><!-- End Values Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/values-section.blade.php ENDPATH**/ ?>