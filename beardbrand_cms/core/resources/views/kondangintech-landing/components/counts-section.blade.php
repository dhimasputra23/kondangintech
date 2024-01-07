<!-- ======= Counts Section ======= -->
<section id="counts" class="counts">
  <div class="container" data-aos="fade-up">

    <div class="row gy-4">
      @foreach($funfacts as $key => $funfact)
      @php
          $colors = ['#4154f1', '#ee6c20', '#15be56', '#bb0852'];
          $colorIndex = $key % count($funfacts);
          $currentColor = $colors[$colorIndex];
      @endphp
      <div class="col-lg-3 col-md-6">
        <div class="count-box">
          <i class="{{ $funfact ->icon}}" style="color: {{ $currentColor }};"></i>
          <div>
            <span data-purecounter-start="0" data-purecounter-end="{{ $funfact->value }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>{{ $funfact->name }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</section><!-- End Counts Section -->