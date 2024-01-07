<!-- ======= Recent Blog Posts Section ======= -->
<section id="recent-blog-posts" class="recent-blog-posts">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Blog</h2>
        <p>{{ $sectionInfo->blog_title }}</p>
      </header>

      <div class="row">
        @foreach($blogs as $key => $blog)
        <div class="col-lg-4">
          <div class="post-box">
            <div class="post-img"><img src="{{ asset('assets/kondangintech-landing/img/'.$blog->main_image) }}" class="img-fluid" alt=""></div>
            <span class="post-date">{{ $blog->created_at->format('l, d F Y') }}</span>
            <h3 class="post-title">{{ $blog->title }}</h3>
            <a href="blog-single.html" class="readmore stretched-link mt-auto"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>
        </div>
        @endforeach
      </div>

    </div>

  </section><!-- End Recent Blog Posts Section -->