@extends('layouts.template')

@section('title', $berita->judul)

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('berita.index') }}">News</a></li>
                <li>{{ $berita->judul }}</li>
            </ol>
            <h2>{{ $berita->judul }}</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                
                    <article class="entry">
                        <div class="entry-img">
                            <img src="{{ asset('uploads/'.$berita->gambar) }}" alt="Card image cap" class="img-fluid">
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
                                $limitedLines = array_slice($wrappedLines, 0, 100); // Batasi hingga 3 baris
                        
                                // Menggabungkan kembali baris-baris yang telah dibatasi
                                $limitedContent = implode("\n", $limitedLines);
                        
                                echo $limitedContent;
                                ?>
                            </p>
                        </div>
                    </article>
                

                <!-- Sisipkan bagian sidebar di sini -->

            </div>
        </div>
    </section><!-- End Blog Section -->
</main><!-- End #main -->
@endsection
