<div class="col-lg-4">

    <div class="sidebar">

      <h3 class="sidebar-title">Search</h3>
      <div class="sidebar-item search-form">
        <form action="{{ route('front.blogs') }}" method="GET">
          <input type="text" name="term" value="{{ request('term') }}">
          <button type="submit"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End sidebar search formn-->

      <h3 class="sidebar-title">Categories</h3>
      <div class="sidebar-item categories">
        <ul>
            @foreach ($bcategories as $bcategory)
                <li><a href="{{ route('front.blogs',['category' => $bcategory->slug]) }}">{{ $bcategory->name }} <span>({{ $bcategory->count }})</span></a></li>
            @endforeach

        </ul>
      </div><!-- End sidebar categories-->

      <h3 class="sidebar-title">Recent Posts</h3>
      <div class="sidebar-item recent-posts">
        @foreach ($latestblogs as $latestblog)
        <div class="post-item clearfix">
            <img src="{{ asset('assets/kondangintech-landing/img/'.$latestblog->main_image) }}" alt="">
            <h4><a href="{{route('front.blogdetails', $latestblog->slug)}}">{{ $latestblog->title }}</a></h4>
            <time datetime="{{ \Carbon\Carbon::parse($latestblog->created_at)->format('Y-m-d') }}">{{ \Carbon\Carbon::parse($latestblog->created_at)->format('M d, Y') }}</time>
        </div>
        @endforeach
      </div><!-- End sidebar recent posts-->

      <h3 class="sidebar-title">Tags</h3>
      <div class="sidebar-item tags">
        <ul>
          @foreach ($latestTags as $latestTag)
          <li><a href="{{ route('front.blogs',['tag' => $latestTag]) }}">{{ $latestTag }}</a></li>
          @endforeach

        </ul>
      </div><!-- End sidebar tags-->

    </div><!-- End sidebar -->

  </div>