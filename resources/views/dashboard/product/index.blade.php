@extends('layouts.template')

@section('title', 'Kelola produk')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Kelola Produk</li>
            </ol>
            <h2>Kelola Produk</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <a href="{{ url('/dashboard/product-create') }}" class="btn btn-success">
                Tambah Produk
            </a>

            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>List Produk</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->namaproduk }}</td>
                                    <td>{{ $product->harga }}</td>
                                    <td><img src="{{ asset('uploads/'.$product->foto) }}" alt="Foto Produk" style="max-width: 100px;"></td>
                                    <td>
                                      

                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST">
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
