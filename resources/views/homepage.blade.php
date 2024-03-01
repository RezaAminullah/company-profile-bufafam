@extends('layouts.template')

@section('title','home')

@section('extracss')

<style>
    

  .text-white {
      color: white; /* Warna teks putih */
      text-shadow: -1px -1px 0 #000,  
                    1px -1px 0 #000,
                    -1px 1px 0 #000,
                    1px 1px 0 #000; /* Outline hitam */
  }
</style>

@endsection

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          @foreach($cards as $index => $card)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" style="background-image: url({{ asset('uploads/' . $card->gambar) }})">
              <div class="carousel-container">
                  <div class="carousel-content">
                      <h2 class="animate__animated animate__fadeInDown">{{ $card->judul }}</h2>
                      <p class="animate__animated animate__fadeInUp">{{ $card->deskripsi }}</p>
                      <a href="{{ route('home.card.show', $card->id) }}" class="btn-get-started animate__animated animate__fadeInUp">Read More</a>
                  </div>
              </div>
          </div>
          @endforeach
      
      </div>
      

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">

        <div class="row">
          <div class="col-lg-4">
            <div class="icon-box">
              <i class="bi bi-card-checklist"></i>
              <h3><a href="">PROFESIONAL</a></h3>
              <p>Pekerjaan dilakukan sesuai dengan standar demi penyediaan kualitas produk yang kompetitif.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-bar-chart"></i>
              <h3><a href="">INOVATIF</a></h3>
              <p>Kemampuan dan pengetahuan saja tidak cukup, melainkan inovasi juga dibutuhkan untuk menyediakan solusi digital yang terbaik.</p>
            </div>
          </div>
          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="bi bi-binoculars"></i>
              <h3><a href="">TIM</a></h3>
              <p>Bekerja secara tim demi pelayanan yang terbaik bagi pelanggan dengan penuh semangat dan komitmen.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Featured Section -->

    <section id="about" class="about">
      <div class="container">
  
          <div class="row">
              <div class="col-lg-12">
                  <div id="aboutCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                          @foreach($kontenhomes as $index => $kontenhome)
                          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                              <div class="row">
                                  <div class="col-lg-6">
                                      <img src="{{ asset('uploads/' . $kontenhome->gambar) }}" class="img-fluid" alt="About Image">
                                  </div>
                                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                                      <h3>{{ $kontenhome->judul }}</h3>
                                      <p>{{ $kontenhome->deskripsi }}</p>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                      </div>
  
                      <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                      </button>
                  </div>
              </div>
          </div>
  
      </div>
  </section><!-- End About Section -->
  

  <section id="services" class="services">
    <div class="container">
      <h2>Our Services :</h2>
        <div class="row">
            @foreach($services as $service)
            <div  class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="icon-box" style="background-image: url('{{ asset('uploads/'.$service->gambar) }}');">
                    <div class="icon-overlay"></div>
                    <h4 class="text-white"><a href="{{ route('home.service.show', $service->id) }}" class="text-white">{{ $service->judul }}</a></h4>
                    <p class="text-white">{{ $service->deskripsi }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section><!-- End Services Section -->













    {{-- <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <h2>Our Services :</h2>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="icon-box" style="background-image: url('assets\img\about.jpg');">
                <div class="icon"><i class="bx bx-line-chart"></i></div>
                <h4><a href="#">Analisa Masalah Dampak Lingkungan</a></h4>
                <p>Menyediakan solusi untuk mengatasi dampak negatif terhadap lingkungan.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="icon-box" style="background-image: url('path/to/image2.jpg');">
                <div class="icon"><i class="bx bx-bar-chart"></i></div>
                <h4><a href="#">Bussiness Feasibility Study</a></h4>
                <p>Studi untuk menilai kelayakan dan potensi bisnis suatu proyek atau usaha.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
            <div class="icon-box" style="background-image: url('path/to/image3.jpg');">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4><a href="#">Riset dan Perencanaan Ekonomi</a></h4>
                <p>Melakukan studi dan perencanaan ekonomi untuk pengembangan bisnis yang berkelanjutan.</p>
            </div>
        </div>
      
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                  <div class="icon"><i class="bx bx-globe"></i></div>
                  <h4><a href="#">Riset dan Perencanaan Sosial</a></h4>
                  <p>Melakukan studi dan perencanaan sosial untuk membantu masyarakat secara efektif.</p>
              </div>
          </div>
      
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
              <div class="icon-box">
                  <div class="icon"><i class="bx bx-bar-chart-alt-2"></i></div>
                  <h4><a href="#">Analis Masalah Dampak Lingkungan</a></h4>
                  <p>Menganalisis dampak lingkungan dari suatu proyek atau kegiatan dan memberikan solusi.</p>
              </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
            <div class="icon-box">
                <div class="icon"><i class="bx bx-arch"></i></div>
                <h4><a href="#">Detail Engineering Design</a></h4>
                <p>Menghasilkan desain teknis terperinci untuk implementasi proyek yang efisien.</p>
            </div>
        </div>

        

        </div>

      </div>
    </section><!-- End Services Section --> --}}

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Our Approach : Partnership</h2>
          <p>Bufafam didirikan oleh beberapa profesional muda yang telah berpengalaman luas dalam industri konsultan baik di dunia bisnis maupun pemerintahan. Bufafam berdiri di pertengahan Tahun 2011, menghimpun expert dengan beragam keahlian dan pengalaman dalam satu team yang mengutamakan mutu dan kerja profesional. 
          </p>

          <br>
          <p>Dengan pengantar ini kami perkenalkan kemampuan kerja, kompetensi, yang menjamin kerja sama berkelanjutan. Bufafam percaya bahwa membangun Partnership adalah pilihan yang tepat untuk mengelola organisasi beserta layanan dan produk yang anda miliki.
          </p>

          <br>
          <p>Bufafam akan bekerja berdampingan dengan anda agar anda mampu memenangkan persaingan, menghasilkan yang terbaik bagi organisasi, pelanggan, dan masyarakat yang menjadi fokus anda.  
          </p>

          <br>
          <p>Bufafam memiliki kemampuan yang akan memberikan solusi dan makin memampukan anda untuk mencapai tujuan dan target organisasi yang diharapkan.
          </p>
        </div>

        {{-- <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div> --}}

      </div>
    </section><!-- End Clients Section -->

  </main><!-- End #main -->
@endsection