@extends('layouts.template')
@section('judul','login')

@section('extracss')
<style>
  .bg-image-vertical {
    position: relative;
    overflow: hidden;
    background-repeat: no-repeat;
    background-position: right center;
    background-size: auto 100%;
  }

  @media (min-width: 1025px) {
    .h-custom-2 {
      height: 100%;
    }
  }
</style>
@endsection

@section('content')
<section class="inner-page mt-4">
  <div class="container">
    <section class="vh-80">
      <div class="container-fluid">

        <div class="row">
          <div class="col-sm-6 text-black">

            <div class="px-5 ms-xl-4">
              <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
              <span class="h1 fw-bold mb-0">Admin Pages</span>
            </div>

            <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

              <form method="post" action="{{url('/login')}}" style="width: 23rem;">
                @csrf

                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" required />
                  <label class="form-label" for="email">Email address</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" required />
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="pt-1 mb-4">
                  <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                </div>

              </form>

            </div>

          </div>
          <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img3.webp"
              alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
          </div>
        </div>
      </div>
    </section>
  </div>
</section>
@endsection
