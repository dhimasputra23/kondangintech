<!-- ======= Team Section ======= -->
<section id="team" class="team">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>Team</h2>
        <p>"Tim kami bekerja keras untuk memberikan kualitas terbaik. Keunggulan dan profesionalisme kami adalah fondasi kesuksesan Anda."</p>
      </header>

      <div class="row gy-4">
        @foreach($teams as $key=>$team)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="member">
            <div class="member-img">
              <img src="{{ asset('assets/kondangintech-landing/img/'.$team->image) }}" class="img-fluid" alt="">
              <div class="social">
                @php
                    if ($team->icon1 && $team->url1) {
                      echo "<a target='_blank' href='$team->url1''><i class='$team->icon1'></i></a>";
                    }
                    if ($team->icon2 && $team->url2) {
                      echo "<a target='_blank' href='$team->url2''><i class='$team->icon2'></i></a>";
                    }
                    if ($team->icon3 && $team->url3) {
                      echo "<a target='_blank' href='$team->url3''><i class='$team->icon3'></i></a>";
                    }
                @endphp
              </div>
            </div>
            <div class="member-info">
              <h4>{{ $team->name }}</h4>
              <span>{{ $team->dagenation }}</span>
              {!! $team->description !!}
            </div>
          </div>
        </div>
        @endforeach
        

      </div>

    </div>

  </section><!-- End Team Section -->