<!-- ======= Services Section ======= -->
<section id="services" class="services">

  <div class="container" data-aos="fade-up">

    <header class="section-header">
      <h2>Services</h2>
      <p>{{ $sectionInfo->service_title }}</p>
    </header>

    <div class="row gy-4">
      @foreach($services as $key => $service)
        @php
            $colors = ['blue', 'orange', 'green', 'red'];
            $colorIndex = $key % count($colors);
            $currentColor = $colors[$colorIndex];
        @endphp
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($key+2) * 100 }}">
        <div class="service-box {{ $currentColor }}">
          <!-- <i class="ri-discuss-line icon"></i> -->
          <img src="{{ asset('assets/kondangintech-landing/img/'.$service->icon) }}" width="80px" alt="landing page" >
          <br><br>
          <h3>{{ $service->name }}</h3>
          {!! $service->content !!}
          <!-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> -->
        </div>
      </div>
      @endforeach
    </div>

  </div>

</section><!-- End Services Section -->