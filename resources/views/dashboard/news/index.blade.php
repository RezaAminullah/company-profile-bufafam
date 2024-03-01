@extends('layouts.template')

@section('title', 'Kelola Berita')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kelola Berita</li>
            </ol>
            <h2>Kelola Berita</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{ url('/dashboard/news/create') }}" class="btn btn-success">
                Tambah Berita
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>List Berita</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Content</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $news)
                                <tr>
                                    <td>{{ $news->id }}</td>
                                    <td>{{ $news->judul }}</td>
                                    <td>{{ $news->slug }}</td>
                                    <td>{{ $news->content }}</td>
                                    <td><img src="{{ asset('uploads/'.$news->gambar) }}" alt="Gambar Berita" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('news.show', $news->slug) }}" class="btn btn-primary">Detail</a>
                                        <a href="{{ route('news.edit', $news->slug) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('news.destroy', $news->slug) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@endsection
