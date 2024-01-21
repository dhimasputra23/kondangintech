<!-- ======= Values Section ======= -->
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>OUR VALUES</h2>
        <p>
          {{ $sectionInfo->value_title }}</p>
      </header>

      <div class="row">
        @foreach($values as $key => $value)
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
          <div class="box">
            <img src="{{ asset('assets/kondangintech-landing/img/'.$value->image) }}" class="img-fluid" alt="">
            <h3>{{ $value->name }}</h3>
            {!! $value->description !!}
          </div>
        </div>
        @endforeach
      </div>

    </div>

  </section><!-- End Values Section -->