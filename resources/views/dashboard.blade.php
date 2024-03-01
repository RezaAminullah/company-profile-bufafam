@extends('layouts.template')

@section('title','dashboard')

@section('content')


@section('extracss')
<style>
    .img-icon{
        height: 90px;
        width: 90px;
        object-fit: cover;
    }
</style>
@endsection
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li>Dashboard</li>
          </ol>
          <h2>Dashboard</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->

<section class="inner-page mt-4" style="height: 60vh;">
    <div class="container">
     <div class="row">
        <div class="col-md-4 text-center">
            <a href="{{url('/dashboard/berita')}}">

                <img src="{{asset('/images/icon/news_bnw.png')}}" class="img-icon">
                <p>
                   Kelola Berita
                </p>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="{{url('/dashboard/product')}}">

                <img src="{{asset('/images/icon/product_bnw.png')}}" class="img-icon">
                <p>
                   Kelola Produk
                </p>
            </a>
       </div>
       <div class="col-md-4 text-center">
        <a href="{{url('/dashboard/team')}}">

            <img src="{{asset('/images/icon/team_bnw.png')}}" class="img-icon">
            <p>
               Kelola Team
            </p>
        </a>
         </div><br>
         <div class="col-md-4 text-center">
            <a href="{{url('/dashboard/home')}}">
    
                <img src="{{asset('/images/icon/home_bnw.png')}}" class="img-icon">
                <p>
                   Kelola Homepages
                </p>
            </a>
        </div>
        <div class="col-md-4 text-center">
            <a href="{{url('/dashboard/contact')}}">
                <img src="{{ asset('/images/icon/contact_bnw.png') }}" class="img-icon">
                <p>Kelola Contact</p>
            </a>
        </div>
        
       {{-- <div class="col-md-4 text-center">
        <a href="{{url('/dashboard/user')}}">

            <img src="{{asset('/images/icon/user_bnw.png')}}" class="img-icon">
            <p>
               Kelola User
            </p>
        </a>
        </div> --}}

     </div>
    </div>
  </section>

</main>
@endsection