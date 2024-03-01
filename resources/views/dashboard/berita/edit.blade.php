@extends('layouts.template')

@section('title', 'Edit Berita')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/berita')}}">Kelola Berita</a></li>
                <li>Edit Berita</li>
            </ol>
            <h2>Edit Berita</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container" data-aos="fade-up">

            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('berita.update', $berita->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" id="judul" class="form-control" value="{{ $berita->judul }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Konten</label>
                            <textarea name="content" id="content" class="form-control" rows="6" required>{{ $berita->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control-file">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->
@endsection
