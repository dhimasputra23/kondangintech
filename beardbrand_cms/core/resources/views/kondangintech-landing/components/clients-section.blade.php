<!-- ======= Clients Section ======= -->
<section id="clients" class="clients">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Our Clients</h2>
        <p>{{ $sectionInfo->clients_title }}</p>
      </header>

      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center">
          @foreach($clients as $key => $client)
          <div class="swiper-slide"><img src="{{ asset('assets/kondangintech-landing/img/'.$client->logo) }}" class="img-fluid" alt=""></div>
          @endforeach
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>

  </section><!-- End Clients Section -->