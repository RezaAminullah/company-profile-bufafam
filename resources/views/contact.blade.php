@extends('layouts.template')

@section('title','contact')

@section('extracss')

<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>

@endsection

@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li>Contact</li>
        </ol>
        <h2>Contact</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>{{ $contact->alamatperusahaan }}</p>
          </div>
          
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>{{ $contact->emailperusahaan }}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>{{ $contact->notelperusahaan }}</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
            <!-- Leaflet Map -->
            <div id="map" style="border: 0; width: 100%; height: 384px;"></div>
          </div>
          {{-- <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="assets\img\lokasi_bufafam.png" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div> --}}
          

          <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info-box mb-4">
                        <i class="bx bx-user"></i>
                        <h3>Contact Person 1</h3>
                        <p>Nama: {{ $contact->namacp1 }}<br>Telepon: {{ $contact->nocp1 }}</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="info-box mb-4">
                        <i class="bx bx-user"></i>
                        <h3>Contact Person 2</h3>
                        <p>Nama: {{ $contact->namacp2 }}<br>Telepon: {{ $contact->nocp2 }}</p>
                    </div>
                </div>
            </div>
        </div>
         

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  @section('extrajs')

  <!-- Leaflet JavaScript -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <!-- Your custom JavaScript -->
  <script>
    // Initialize Leaflet Map
    var map = L.map('map').setView([-7.3108672309251865, 112.74947769381632], 15);

    // Add OpenStreetMap tile layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Add marker to the map
    L.marker([-7.3108672309251865, 112.74947769381632]).addTo(map)
      .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
      .openPopup();
  </script>

  @endsection


@endsection