<!-- ======= Testimonials Section ======= -->
<section id="testimonials" class="testimonials">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Testimonials</h2>
        <p>{{ $sectionInfo->testimonial_title }}</p>
      </header>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">
          @foreach($testimonials as $key => $testimonial)
          <div class="swiper-slide">
            <div class="testimonial-item">
              <div class="stars">
                @php
                    for ($i=0; $i < $testimonial->rating; $i++) { 
                      
                      echo "<i class='bi bi-star-fill'></i>";
                    }
                @endphp
              </div>
              <p>
                {{ $testimonial->message }}
              </p>
              <div class="profile mt-auto">
                <img src="{{ asset('assets/kondangintech-landing/img/'.$testimonial->image) }}" class="testimonial-img" alt="">
                <h3>{{ $testimonial->name }}</h3>
                <h4>{{ $testimonial->position }}</h4>
              </div>
            </div>
          </div><!-- End testimonial item -->
          @endforeach


        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>

  </section><!-- End Testimonials Section -->