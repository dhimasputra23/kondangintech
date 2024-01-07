<!-- ======= About Section ======= -->
<section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <div class="row gx-0">

        <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            <h3>SIAPA KAMI?</h3>
            <h2>{{ $sectionInfo->about_title }}</h2>
            {!! $sectionInfo->about_subtitle !!}

          </div>
        </div>

        <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/kondangintech-landing/img/'.$sectionInfo->about_image) }}" class="img-fluid" alt="">
        </div>

      </div>
    </div>

  </section><!-- End About Section -->