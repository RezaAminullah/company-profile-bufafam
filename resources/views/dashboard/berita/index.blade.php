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
            <a href="{{ route('berita.create') }}" class="btn btn-success">
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
                                @foreach($beritas as $berita)
                                <tr>
                                    <td>{{ $berita->id }}</td>
                                    <td>{{ $berita->judul }}</td>
                                    <td>{{ $berita->slug }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($berita->content, 50) }}</td>
                                    <td><img src="{{ asset('uploads/'.$berita->gambar) }}" alt="Gambar Berita" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('berita.edit', $berita->slug) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('berita.destroy', $berita->slug) }}" method="POST">
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
