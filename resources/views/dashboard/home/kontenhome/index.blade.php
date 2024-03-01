@extends('layouts.template')

@section('title', 'Kelola Konten Home')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kelola Konten Home</li>
            </ol>
            <h2>Kelola Konten Home</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{ url('/dashboard/home/kontenhome-create') }}" class="btn btn-success">
                Tambah Konten Home
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>Daftar Konten Home</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kontenhomes as $kontenhome)
                                <tr>
                                    <td>{{ $kontenhome->id }}</td>
                                    <td>{{ $kontenhome->judul }}</td>
                                    <td>{{ $kontenhome->deskripsi }}</td>
                                    <td>
                                        @if($kontenhome->gambar)
                                            <img src="{{ asset('uploads/'.$kontenhome->gambar) }}" alt="Gambar Konten Home" style="max-width: 100px;">
                                        @else
                                            <span>Tidak ada gambar</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('home.kontenhome.edit', $kontenhome->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('home.kontenhome.destroy', $kontenhome->id) }}" method="POST">
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
