@extends('layouts.template')

@section('title', $service->judul)

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Layanan</a></li>
                <li>{{ $service->judul }}</li>
            </ol>
            <h2>{{ $service->judul }}</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section id="service-detail" class="service-detail">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6">
                    <div class="service-detail-content">
                        <h3>{{ $service->judul }}</h3>
                        <p>{{ $service->deskripsi }}</p>
                        <p>{{ $service->konten }}</p>
                 
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-detail-img">
                        <img src="{{ asset('uploads/'.$service->gambar) }}" alt="Gambar Layanan" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Service Detail Section -->
</main><!-- End #main -->
@endsection
