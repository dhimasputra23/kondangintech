<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Pertanyaan yang Sering Diajukan (FAQ) - Kontech Jasa Pembuatan Website</p>
      </header>

      <div class="row">
        <?php
            $totalfaqs = count($faqs);
            $firstArraySize = ceil($totalfaqs / 2);

            $firstFaqs = array_slice($faqs->toArray(), 0, $firstArraySize);
            $secondFaqs = array_slice($faqs->toArray(), $firstArraySize);
        ?>
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            <?php $__currentLoopData = $firstFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $firstFaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?php echo e($key+1); ?>">
                  <?php echo e($firstFaq['title']); ?>

                </button>
              </h2>
              <div id="faq-content-<?php echo e($key+1); ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  <?php echo $firstFaq['content']; ?>

                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">
            <?php $__currentLoopData = $secondFaqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $secondFaq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-<?php echo e($key+1); ?>">
                  <?php echo e($secondFaq['title']); ?>

                </button>
              </h2>
              <div id="faq2-content-<?php echo e($key+1); ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  <?php echo $secondFaq['content']; ?>

                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            

          </div>
        </div>

      </div>

    </div>

  </section><!-- End F.A.Q Section --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/faq-section.blade.php ENDPATH**/ ?>