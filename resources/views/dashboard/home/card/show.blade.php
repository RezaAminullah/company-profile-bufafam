@extends('layouts.template')

@section('title', $card->judul)

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a>Pengumuman</a></li>
                <li>{{ $card->judul }}</li>
            </ol>
            <h2>{{ $card->judul }}</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="card-detail" class="card-detail">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-detail-img">
                        <img src="{{ asset('uploads/'.$card->gambar) }}" alt="Card image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-detail-content">
                        <p>{{ $card->deskripsi }}</p>
                        <p>{{ $card->konten }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Card Detail Section -->
</main><!-- End #main -->
@endsection
