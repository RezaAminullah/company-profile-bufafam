@extends('layouts.template')

@section('title', 'Edit Contact')

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/dashboard/contact') }}">Kelola Contact</a></li>
                <li>Edit Contact</li>
            </ol>
            <h2>Edit Contact</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page mt-4">
        <div class="container">
            <h2>Edit Contact</h2><br>

            <form method="post" action="{{ route('contact.update', $contact->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email Perusahaan</label>
                            <input type="email" name="emailperusahaan" class="form-control" value="{{ $contact->emailperusahaan }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Nomor Telepon Perusahaan</label>
                            <input type="text" name="notelperusahaan" class="form-control" value="{{ $contact->notelperusahaan }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Alamat Perusahaan</label>
                            <input type="text" name="alamatperusahaan" class="form-control" value="{{ $contact->alamatperusahaan }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Nama CP 1</label>
                            <input type="text" name="namacp1" class="form-control" value="{{ $contact->namacp1 }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Nomor CP 1</label>
                            <input type="text" name="nocp1" class="form-control" value="{{ $contact->nocp1 }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Nama CP 2</label>
                            <input type="text" name="namacp2" class="form-control" value="{{ $contact->namacp2 }}" required>
                        </div><br>

                        <div class="form-group">
                            <label>Nomor CP 2</label>
                            <input type="text" name="nocp2" class="form-control" value="{{ $contact->nocp2 }}" required>
                        </div><br>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary float-right"> Update </button>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </section>

</main>
@endsection
