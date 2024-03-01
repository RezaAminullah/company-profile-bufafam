@extends('layouts.template')

@section('title', 'Edit Layanan')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/home/service')}}">Daftar Layanan</a></li>
                <li>Edit Layanan</li>
            </ol>
            <h2>Edit Layanan</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $service->judul }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $service->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="konten" class="form-label">Konten</label>
                                    <textarea class="form-control" id="konten" name="konten" rows="6" required>{{ $service->konten }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                    <img src="{{ asset('uploads/'.$service->gambar) }}" alt="Gambar Layanan" style="max-width: 100px; margin-top: 10px;">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
