@extends('layouts.template')

@section('title', 'About Us')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>About Us</li>
            </ol>
            <h2>About Us</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
        <div class="section-title">
            <h2>Meet Our Team</h2>
        </div>

        <div class="container">
            <div class="row justify-content-center">
              @foreach($teams as $team)

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="{{ asset('uploads/' . $team->foto) }}" alt="">
                        <h4>{{ $teams->nama }}</h4>
                        <span>{{ $teams->jabatan }}</span>
                        <p>{{ $teams->deskripsi }}</p>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- End Team Section -->

</main><!-- End #main -->
@endsection