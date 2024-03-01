@extends('layouts.template')

@section('title', 'Update Anggota Tim')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/dashboard/team') }}">Kelola About Us</a></li>
                <li>Update Anggota Tim</li>
            </ol>
            <h2>Update Anggota Tim</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Update Anggota Tim</h2><br>

            <form method="post" action="{{ route('team.update', $team->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="{{ $team->nama }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control" value="{{ $team->jabatan }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="5">{{ $team->deskripsi }}</textarea>
                        </div><br>

                        <div class="form-group">
                            <label>Foto</label><br>
                            <input type="file" name="foto" class="form-control-file" accept="image/*">
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
