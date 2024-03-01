@extends('layouts.template')

@section('title', 'Tambah Anggota Tim')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/dashboard/team') }}">Kelola About Us</a></li>
                <li>Tambah Anggota Tim</li>
            </ol>
            <h2>Tambah Anggota Tim</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Tambahkan Anggota Tim</h2><br>

            <form method="post" action="{{ route('team.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
                        </div><br>

                        <div class="form-group">
                            <label>Foto</label><br>
                            <input type="file" name="foto" class="form-control-file" accept="image/*" required>
                            <!-- 'accept="image/*"' digunakan untuk membatasi jenis file yang dapat diunggah hanya berupa gambar -->
                        </div><br><br>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary float-right"> Simpan </button>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </section>

</main>
@endsection
