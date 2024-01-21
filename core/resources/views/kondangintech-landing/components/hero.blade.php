<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">{{ $sectionInfo->hero_title }}</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">{!! $sectionInfo->hero_subtitle !!}</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a id="whatsappButton2" href="#" target="_blank" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Hubungi Kami</span>
                <i class="fab fa-whatsapp"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('assets/kondangintech-landing/img/'.$sectionInfo->hero_image) }}" width="400px" height="299px" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  
  </section><!-- End Hero -->