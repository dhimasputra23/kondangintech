<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Portfolio</h2>
        <p>{{ $sectionInfo->plan_title }}</p>
      </header>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($portfoliocategories as $portfoliocategory)
              <li data-filter=".filter-{{ str_replace(['(', ')', '-'], '', $portfoliocategory->slug) }}">{{ $portfoliocategory->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>


      <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
        @foreach ($portfolios as $portfolio)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{ str_replace(['(', ')', '-'], '', $portfoliocategory->slug) }}">
          <div class="portfolio-wrap">
            <img src="{{ asset('assets/kondangintech-landing/img/'.$portfolio->image_path) }}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>{{ $portfolio->title}}</h4>
              <p>{{ $portfolio->client_name }}</p>
              <div class="portfolio-links">
                <a href="{{ asset('assets/kondangintech-landing/img/'.$portfolio->image_path) }}" data-gallery="portfolioGallery" class="portfokio-lightbox" title="{{ $portfolio->title }}"><i class="bi bi-plus"></i></a>
                <a href="{{route('front.portfoliodetails', $portfolio->slug)}}" title="More Details"><i class="bi bi-link"></i></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        

      </div>

    </div>

  </section><!-- End Portfolio Section -->