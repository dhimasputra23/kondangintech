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
            <form action="{{ route('front.newsletter') }}" method="POST">
              @csrf
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
              <img src="{{ asset('assets/kondangintech-landing/img/'.$commonsetting->footer_logo) }}" alt="">
              <!-- <span>FlexStart</span> -->
            </a>
            <p>{{ $commonsetting->footer_text }}</p>
            <div class="social-links mt-3">
              @foreach($socials as $key => $social)
              <a href="{{ $social->url }}" target="_blank">
                <i class="{{ $social->icon }}"></i>
              </a>
              
              @endforeach
             
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
              {!! $commonsetting->address !!}
              @php
              $number = explode( ',', $commonsetting->number );
              for ($i=0; $i < count($number); $i++) {
                $index = $i + 1;
                echo "<strong>Phone $index:</strong> $number[$i]<br>";
              }
              @endphp
              <strong>Email:</strong> {{ $commonsetting->contactemail }}<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        {!! $commonsetting->copyright_text !!}
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
 
      </div>
    </div>
</footer>
<!-- End Footer -->