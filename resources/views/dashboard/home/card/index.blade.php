@extends('layouts.template')

@section('title', 'Kelola Pengumuman')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/home')}}">Kelola Homepages</a></li>
                <li>Kelola Pengumuman</li>
            </ol>
            <h2>Kelola Pengumuman</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{url('/dashboard/home/card-create')}}" class="btn btn-success">
                Tambah Pengumuman
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>List Card</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Deskripsi</th>
                                    <th>Konten</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cards as $card)
                                <tr>
                                    <td>{{ $card->id }}</td>
                                    <td>{{ $card->judul }}</td>
                                    <td>{{ $card->slug }}</td>
                                    <td>{{ $card->deskripsi }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($card->konten, 50) }}</td>
                                    <td><img src="{{ asset('uploads/'.$card->gambar) }}" alt="Gambar Card" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('home.card.edit', $card->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('home.card.destroy', $card->id) }}" method="POST">
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
