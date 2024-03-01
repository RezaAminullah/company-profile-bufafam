@extends('layouts.template')

@section('title','news')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>News</li>
        </ol>
        <h2>News</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">
          <div class="row">
              <div class="col-lg-8 entries">
                  @foreach($beritas as $berita)
                  <article class="entry">
                    <div class="entry-img">
                        <img src="{{ asset('uploads/'.$berita->gambar) }}" alt="Card image cap" class="img-fluid">
                    </div>
                
                    <h2 class="entry-title">
                        <a href="{{ route('berita.show', $berita->slug) }}">{{ $berita->judul }}</a>
                    </h2>
                
                    <div class="entry-meta">
                        <ul>
                            {{-- <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">John Doe</a></li> --}}
                            <li class="d-flex align-items-center">
                                <i class="bi bi-clock"></i>
                                <a href="blog-single.html">
                                    <time datetime="{{ $berita->created_at }}">{{ $berita->created_at->format('M d, Y') }}</time>
                                </a>
                            </li>
                            <!-- Jika Anda memiliki kolom komentar, Anda bisa menambahkan logika untuk menghitung jumlah komentar -->
                            <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">{{ $berita->comments_count }} Comments</a></li> -->
                        </ul>
                    </div>
                
                    <div class="entry-content">
                        <p>
                            <?php
                            $content = $berita->content; // Konten berita
                            $maxLength = 70; // Panjang maksimum per baris
                    
                            // Memecah teks menjadi baris-baris dengan panjang maksimum
                            $wrappedText = wordwrap($content, $maxLength, "\n", true);
                    
                            // Membatasi jumlah baris yang ditampilkan
                            $wrappedLines = explode("\n", $wrappedText);
                            $limitedLines = array_slice($wrappedLines, 0, 3); // Batasi hingga 3 baris
                    
                            // Menggabungkan kembali baris-baris yang telah dibatasi
                            $limitedContent = implode("\n", $limitedLines);
                    
                            echo $limitedContent;
                            ?>
                        </p>
                        <div class="read-more">
                            <a href="{{ route('berita.show', $berita->slug) }}">Read More</a>
                        </div>
                    </div>
                    
                </article>
                
                
                  @endforeach
                  <div class="blog-pagination">
                      <!-- Jika Anda ingin menambahkan navigasi halaman, Anda bisa melakukannya di sini -->
                  </div>
              </div><!-- End blog entries list -->
  
              <!-- Sisipkan bagian sidebar di sini -->
  
          </div>
      </div>
  </section><!-- End Blog Section -->
  

  </main><!-- End #main -->
@endsection