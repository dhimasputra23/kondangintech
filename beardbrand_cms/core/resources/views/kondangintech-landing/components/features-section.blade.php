<!-- ======= Features Section ======= -->
<section id="features" class="features">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Features</h2>
      <p>{{ $sectionInfo->feature_first_title }}</p>
    </header>

    <div class="row">

      <div class="col-lg-6">
        <img src="{{ asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_first_image) }}" class="img-fluid" alt="">
      </div>

      <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
        <div class="row align-self-center gy-4">
          @php
            $subtitles = explode( ',', $sectionInfo->feature_first_subtitle );
            for ($i=0; $i < count($subtitles); $i++) { 
              
              echo "<div class='col-md-6' data-aos='zoom-out' data-aos-delay='200'>
                      <div class='feature-box d-flex align-items-center'>
                        <i class='bi bi-check'></i>
                        <h3>$subtitles[$i]</h3>
                      </div>
                    </div>";
            }
          @endphp

        </div>
      </div>

    </div> <!-- / row -->

    <!-- Feature Tabs -->
    <div class="row feture-tabs" data-aos="fade-up">
      <div class="col-lg-6">
        <h3>{{ $sectionInfo->feature_second_title }}</h3>

        <!-- Tabs -->
        <ul class="nav nav-pills mb-3">
          @foreach ($featuresSecond as $key => $featureSecond)
          <li>
            <a class="nav-link @if($key === 0) active @endif" data-bs-toggle="pill" href="#tab{{ $key }}">{{ $featureSecond->name }}</a>
          </li>
          @endforeach
          {{-- <li>
            <a class="nav-link active" data-bs-toggle="pill" href="#tab1">Integrasi Sistem Enterprise</a>
          </li>
          <li>
            <a class="nav-link" data-bs-toggle="pill" href="#tab2">Personalisasi Konten Dinamis</a>
          </li>
          <li>
            <a class="nav-link" data-bs-toggle="pill" href="#tab3">Analisis Big Data</a>
          </li> --}}
        </ul><!-- End Tabs -->

        <!-- Tab Content -->
        <div class="tab-content">
          @foreach ($featuresSecond as $key => $featureSecond)
              <div class="tab-pane fade @if($key === 0) show active @endif" id="tab{{ $key }}">
                  {!! $featureSecond->description !!}
              </div>
          @endforeach
        </div>

      </div>

      <div class="col-lg-6">
        <img src="{{ asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_second_image) }}" class="img-fluid" alt="">
      </div>

    </div><!-- End Feature Tabs -->

    <!-- Feature Icons -->
    <div class="row feature-icons" data-aos="fade-up">
      <h3>{{ $sectionInfo->feature_third_title }}</h3>

      <div class="row">

        <div class="col-xl-4 text-center" data-aos="fade-right" data-aos-delay="100">
          <img src="{{ asset('assets/kondangintech-landing/img/'.$sectionInfo->feature_third_image) }}" class="img-fluid p-4" alt="">
        </div>

        <div class="col-xl-8 d-flex content">
          <div class="row align-self-center gy-4">
            @foreach ($featuresThird as $key => $featureThird)
              <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="{{ $key * 100 }}">
                <!-- <i class="ri-line-chart-line"></i> -->
                <img src="{{ asset('assets/kondangintech-landing/img/'.$featureThird->image) }}" width="50px" height="50px" alt="">&nbsp;&nbsp;&nbsp;
                <div>
                  <h4>{{ $featureThird->name }}</h4>
                  {!! $featureThird->description !!}
                </div>
              </div>
            @endforeach
          </div>
        </div>

      </div>

    </div><!-- End Feature Icons -->

  </div>

</section><!-- End Features Section -->