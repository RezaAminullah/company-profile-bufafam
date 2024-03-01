@extends('layouts.template')

@section('title', 'Edit Pengumuman')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/dashboard/home/card') }}">Kelola Kartu</a></li>
                <li>Edit Kartu</li>
            </ol>
            <h2>Edit Kartu</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Edit Kartu</h2><br>

            <form method="post" action="{{ route('home.card.update', $card->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Judul Kartu</label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $card->judul) }}" required>
                            @error('judul')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Deskripsi Kartu</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" required>{{ old('deskripsi', $card->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Konten Kartu</label>
                            <textarea name="konten" class="form-control @error('konten') is-invalid @enderror" rows="5" required>{{ old('konten', $card->konten) }}</textarea>
                            @error('konten')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br>

                        <div class="form-group">
                            <label>Gambar Kartu</label><br>
                            <input type="file" name="gambar" class="form-control-file @error('gambar') is-invalid @enderror" accept="image/*">
                            <!-- 'accept="image/*"' digunakan untuk membatasi jenis file yang dapat diunggah hanya berupa gambar -->
                            @error('gambar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div><br><br>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </section>

</main>
@endsection
