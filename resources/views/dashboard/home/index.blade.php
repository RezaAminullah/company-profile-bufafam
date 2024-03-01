@extends('layouts.template')

@section('title', 'Kelola Homepages')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kelola Homepages</li>
            </ol>
            <h2>Kelola Homepages</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            @if (Session::has('alert-success'))
                <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Pengumuman</h5>
                            <a href="{{url('/dashboard/home/card')}}" class="btn btn-primary">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Konten Home</h5>
                            <a href="{{url('/dashboard/home/kontenhome')}}" class="btn btn-primary">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card custom-card">
                        <div class="card-body">
                            <h5 class="card-title">Kelola Layanan</h5>
                            <a href="{{url('/dashboard/home/service')}}" class="btn btn-primary">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</main>
@endsection
