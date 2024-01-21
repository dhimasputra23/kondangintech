@extends('kondangintech-landing.layout')
@section('meta-keywords', "$setting->meta_keywords")
@section('meta-description', "$setting->meta_description")

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Portfolio Details</li>
        </ol>
        <h2>{{ $portfolio->title }}</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
                @foreach ($images as $image)
                <div class="swiper-slide">
                  <img src="{{ asset('assets/kondangintech-landing/img/'.$image->image_path) }}" alt="">
                </div>
                @endforeach
                

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Informasi Proyek</h3>
              <ul>
                <li><strong>Kategori</strong>: {{ $portfolio->portfoliocategory->name }}</li>
                <li><strong>Klien</strong>: {{ $portfolio->client->name }}</li>
                <li><strong>Tanggal Proyek</strong>: {{ $portfolio->project_date }}</li>
                <li><strong>URL Proyek</strong>: <a href="{{ $portfolio->project_url }}">{{ $portfolio->project_url }}</a></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>{{ $portfolio->title }}</h2>
              {!! $portfolio->content !!}
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection

  