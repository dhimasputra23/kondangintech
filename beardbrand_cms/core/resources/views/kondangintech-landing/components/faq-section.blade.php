<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <h2>F.A.Q</h2>
        <p>Pertanyaan yang Sering Diajukan (FAQ) - Kontech Jasa Pembuatan Website</p>
      </header>

      <div class="row">
        @php
            $totalfaqs = count($faqs);
            $firstArraySize = ceil($totalfaqs / 2);

            $firstFaqs = array_slice($faqs->toArray(), 0, $firstArraySize);
            $secondFaqs = array_slice($faqs->toArray(), $firstArraySize);
        @endphp
        <div class="col-lg-6">
          <!-- F.A.Q List 1-->
          <div class="accordion accordion-flush" id="faqlist1">
            @foreach($firstFaqs as $key => $firstFaq)
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-{{ $key+1 }}">
                  {{ $firstFaq['title'] }}
                </button>
              </h2>
              <div id="faq-content-{{ $key+1 }}" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  {!! $firstFaq['content'] !!}
                </div>
              </div>
            </div>
            @endforeach
            

          </div>
        </div>

        <div class="col-lg-6">

          <!-- F.A.Q List 2-->
          <div class="accordion accordion-flush" id="faqlist2">
            @foreach($secondFaqs as $key => $secondFaq)
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2-content-{{ $key+1 }}">
                  {{ $secondFaq['title'] }}
                </button>
              </h2>
              <div id="faq2-content-{{ $key+1 }}" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                <div class="accordion-body">
                  {!! $secondFaq['content'] !!}
                </div>
              </div>
            </div>
            @endforeach

            

          </div>
        </div>

      </div>

    </div>

  </section><!-- End F.A.Q Section -->