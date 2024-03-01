@extends('layouts.template')

@section('title', 'Tambah Berita')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/berita')}}">Kelola Berita</a></li>
                <li>Tambah Berita</li>
            </ol>
            <h2>Tambah Berita</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Tambahkan Berita</h2><br>

            <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Judul Berita</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Konten Berita</label>
                            <textarea name="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                        </div><br>

                        <div class="form-group">
                            <label>Gambar Berita</label><br>
                            <input type="file" name="gambar" class="form-control-file" accept="image/*">
                            <!-- 'accept="image/*"' digunakan untuk membatasi jenis file yang dapat diunggah hanya berupa gambar -->
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
