@extends('layouts.template')

@section('title', 'Edit Produk')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{url('/dashboard/product')}}">Kelola Produk</a></li>
                <li>Edit Produk</li>
            </ol>
            <h2>Edit Produk</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Edit Produk</h2><br>

            <form method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="namaproduk" class="form-control" value="{{ $product->namaproduk }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Harga Produk</label>
                            <input type="text" name="harga" class="form-control" value="{{ $product->harga }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Foto Produk</label><br>
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
