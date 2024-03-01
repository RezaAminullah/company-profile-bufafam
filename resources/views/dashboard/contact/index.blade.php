@extends('layouts.template')

@section('title', 'Daftar Kontak')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Daftar Kontak</li>
            </ol>
            <h2>Daftar Kontak</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            @if (Session::has('alert-success'))
                <div class="alert alert-success">
                    {{ Session::get('alert-success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Email Perusahaan</th>
                            <th>Nomor Telepon Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>Nama CP 1</th>
                            <th>Nomor CP 1</th>
                            <th>Nama CP 2</th>
                            <th>Nomor CP 2</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->emailperusahaan }}</td>
                                <td>{{ $contact->notelperusahaan }}</td>
                                <td>{{ $contact->alamatperusahaan }}</td>
                                <td>{{ $contact->namacp1 }}</td>
                                <td>{{ $contact->nocp1 }}</td>
                                <td>{{ $contact->namacp2 }}</td>
                                <td>{{ $contact->nocp2 }}</td>
                                <td>
                                    <a href="{{ route('contact.edit', ['id' => $contact->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                    {{-- <form action="{{ route('dashboard.contact.destroy', ['id' => $contact->id]) }}" method="POST" style="display: inline;"> --}}
                                        {{-- @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button> --}}
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</main>
@endsection
