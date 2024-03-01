@extends('layouts.template')

@section('title', 'Daftar Layanan')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Daftar Layanan</li>
            </ol>
            <h2>Daftar Layanan</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{url('/dashboard/home/service-create')}}" class="btn btn-success">
                Tambah Layanan
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>List Layanan</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Konten</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->judul }}</td>
                                    <td>{{ $service->deskripsi }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($service->konten, 50) }}</td>
                                    <td><img src="{{ asset('uploads/'.$service->gambar) }}" alt="Gambar Layanan" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('home.service.edit', $service->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('home.service.destroy', $service->id) }}" method="POST">
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
