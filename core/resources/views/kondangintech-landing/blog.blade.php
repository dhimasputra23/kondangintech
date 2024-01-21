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
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach ($blogs as $blog)
              <article class="entry">

                <div class="entry-img">
                  <img src="{{ asset('assets/kondangintech-landing/img/'.$blog->main_image)}}" alt="" class="img-fluid">
                </div>

                <h2 class="entry-title">
                  <a href="{{route('front.blogdetails', $blog->slug)}}">{{ $blog->title }}</a>
                </h2>

                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a>Admin</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a><time datetime="{{ \Carbon\Carbon::parse($blog->created_at)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($blog->created_at)->format('M j, Y') }}</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a>12 Comments</a></li>
                  </ul>
                </div>

                <div class="entry-content">
                  {!! \Illuminate\Support\Str::of($blog->content)->limit(500, '...') !!}
                  <div class="read-more">
                    <a href="{{route('front.blogdetails', $blog->slug)}}">Read More</a>
                  </div>
                </div>

              </article><!-- End blog entry -->
            @endforeach
            

            <div class="blog-pagination">
              <ul class="justify-content-center">
                {{-- <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li> --}}
                {{ $blogs->links('kondangintech-landing.pagination.custom') }}
              </ul>
              
              
            </div>

          </div><!-- End blog entries list -->

          @include('kondangintech-landing.components.sidebar-widget')

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
@endsection