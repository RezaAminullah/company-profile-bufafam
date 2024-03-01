@extends('layouts.template')

@section('title', 'Tambah Produk')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/product')}}">Kelola Produk</a></li>
                <li>Tambah Produk</li>
            </ol>
            <h2>Tambah Produk</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2> Tambahkan Produk </h2><br>

            <form method="post" action="{{ route('product.save') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="namaproduk" class="form-control" value="{{ old('namaproduk') }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="text" name="harga" class="form-control" value="{{ old('harga') }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Foto Produk</label><br>
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
