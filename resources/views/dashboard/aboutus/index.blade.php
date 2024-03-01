@extends('layouts.template')

@section('title', 'Kelola About Us')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kelola About Us</li>
            </ol>
            <h2>Kelola About Us</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{ url('/dashboard/aboutus-create') }}" class="btn btn-success">
                Tambah Anggota Tim
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>Daftar Anggota Tim</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Deskripsi</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($aboutUs as $aboutus)
                                <tr>
                                    <td>{{ $aboutus->id }}</td>
                                    <td>{{ $aboutus->nama }}</td>
                                    <td>{{ $aboutus->jabatan }}</td>
                                    <td>{{ $aboutus->deskripsi }}</td>
                                    <td><img src="{{ asset('uploads/'.$aboutus->foto) }}" alt="Foto Anggota Tim" style="max-width: 100px;"></td>
                                    <td>
                                        <a href="{{ route('aboutus.edit', $aboutus->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('aboutus.destroy', $aboutus->id) }}" method="POST">
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
