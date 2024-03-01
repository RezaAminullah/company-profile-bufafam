@if(old())
    @php
        $namaproduk = old('namaproduk');
        $harga = old('harga');
        $foto = old('foto');
    @endphp
@else
    @php
        $namaproduk = $data->namaproduk;
        $harga = $data->harga;
        $foto = $data->foto;
    @endphp
@endif

@extends('layouts.template')

@section('title','update produk')

@section('content')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Update Produk</li>
            </ol>
            <h2>Update Produk</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Update Produk</h2><br>
            <form method="post" action="{{ route('product.update', $data->id) }}" onsubmit="return konfirmasiSubmit()">
                @csrf
                @method('PUT') <!-- Menambahkan metode PUT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="namaproduk" class="form-control" value="{{ $namaproduk }}" required>
                        </div><br>
                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="text" name="harga" class="form-control" value="{{ $harga }}" required>
                        </div><br>
                        <div class="form-group">
                            <label>Foto Produk</label><br>
                            <input type="file" name="foto" class="form-control-file" accept="image/*" value="{{ $foto }}" required>
                            <!-- 'accept="image/*"' digunakan untuk membatasi jenis file yang dapat diunggah hanya berupa gambar -->
                        </div><br><br>
                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
@endsection
