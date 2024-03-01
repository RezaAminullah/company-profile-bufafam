@extends('layouts.template')

@section('title', 'Edit Konten Home')

@section('content')
<main id="main">

    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ route('home.kontenhome.index') }}">Kelola Konten Home</a></li>
                <li>Edit Konten Home</li>
            </ol>
            <h2>Edit Konten Home</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('home.kontenhome.update', $kontenhome->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $kontenhome->judul }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $kontenhome->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                    @if($kontenhome->gambar)
                                    <img src="{{ asset('uploads/'.$kontenhome->gambar) }}" alt="Gambar Konten Home" style="max-width: 200px; margin-top: 10px;">
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('home.kontenhome.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
