<!-- ======= Pricing Section ======= -->
<section id="pricing" class="pricing">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Pricing</h2>
        <p>{{ $sectionInfo->plan_title }}</p>
      </header>

      <div class="row gy-4" data-aos="fade-left">
        @foreach($plans as $key => $plan)
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <div class="box">
            @php
                $colors = ['#07d5c0', '#65c600', '#ff901c', '#ff0071'];
                $colorIndex = $key % count($colors);
                $currentColor = $colors[$colorIndex];
            @endphp
            <h3 style="color: {{ $currentColor }};">{{ $plan->name }}</h3>
            
            <div class="price">
              @php
								if ($plan->start_price && $plan->end_price) {
                  if ($plan->start_price >= 1000000) {
                    $formattedStartPrice = number_format($plan->start_price / 1000000, 0) . ' jt';
                  }else{
                    $formattedStartPrice = number_format($plan->start_price / 1000, 0) . ' rb';
                  }
                  if ($plan->end_price >= 1000000) {
                    $formattedEndPrice = number_format($plan->end_price / 1000000, 0) . ' jt';
                  }else{
                    $formattedEndPrice = number_format($plan->end_price / 1000, 0) . ' rb';
                  }
                  
                  echo "<sup>Rp</sup>{$formattedStartPrice} - {$formattedEndPrice}";
                }
							@endphp
              
            </div>
            <img src="{{ asset('assets/kondangintech-landing/img/'.$plan->image) }}" class="img-fluid" alt="">
            <ul>
              @php
								$feature = explode( ',', $plan->feature );
								for ($i=0; $i < count($feature); $i++) { 
									
                  echo "<li>$feature[$i]</li>";
								}
							@endphp
            </ul>
            <a href="#" class="btn-buy">Hubungi Kami <i class="fab fa-whatsapp"></i></a>
          </div>
        </div>
        @endforeach

      </div>

    </div>

  </section><!-- End Pricing Section -->