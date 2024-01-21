<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>"Discover Our Exciting Newsletter
              Dapatkan wawasan menarik dan informasi terkini di buletin kami. Temukan yang terbaik, bergabunglah sekarang!"</p>
          </div>
          <div class="col-lg-6">
            <form action="<?php echo e(route('front.newsletter')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="<?php echo e(asset('assets/kondangintech-landing/img/'.$commonsetting->footer_logo)); ?>" alt="">
              <!-- <span>FlexStart</span> -->
            </a>
            <p><?php echo e($commonsetting->footer_text); ?></p>
            <div class="social-links mt-3">
              <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a href="<?php echo e($social->url); ?>" target="_blank">
                <i class="<?php echo e($social->icon); ?>"></i>
              </a>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <!-- <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li> -->
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Landing Page Sale</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Company Profile Corporate</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Content Management System</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Web Corporate ERP (Enterprise Resource Planing) System</a></li>
     
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              <?php echo $commonsetting->address; ?>

              <?php
              $number = explode( ',', $commonsetting->number );
              for ($i=0; $i < count($number); $i++) {
                $index = $i + 1;
                echo "<strong>Phone $index:</strong> $number[$i]<br>";
              }
              ?>
              <strong>Email:</strong> <?php echo e($commonsetting->contactemail); ?><br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        <?php echo $commonsetting->copyright_text; ?>

      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
 
      </div>
    </div>
</footer>
<!-- End Footer --><?php /**PATH C:\xampp-portable-windows-x64-7.4.33-0-VC15\xampp\htdocs\cms-bearbrand\core\resources\views/kondangintech-landing/components/footer.blade.php ENDPATH**/ ?>