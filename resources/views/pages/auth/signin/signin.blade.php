@extends('pages.auth.auth')
@section('content')
    <style>
        body {
            min-height: 100vh
        }

        @media screen and (min-width:576px) {
            #content-container {
                width: 67%;
            }
        }
    </style>
    <main class="container-fluid" style="min-height:100vh;">
        <aside class="d-none d-sm-block bg-dark-subtle z-3 rounded-3 position-fixed overflow-auto shadow"
            style="top: 25px; bottom: 25px; left:25px; width: 30%">
            <header class="text-center py-3 position-sticky top-0 bg-body-secondary ">
                <h2>Informasi</h2>
            </header>
        </aside>
        <div class="container row align-items-center ms-sm-auto" style="min-height:100vh;" id="content-container">
            <div id="content" class="col-10 mx-auto col-lg-7">
                <form method="POST" action="{{ route('signin.submit') }}" id="login-form">
                    @csrf
                    <img class="text-center" src="" alt=""
                        style="height: 100px; display: block; margin: 0 auto;">
                    <p class="h6 mb-3 fw-bold text-center" style="color: #760712">Selamat Datang!</p>
                    <div class="form-floating mb-2">
                        <input type="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                            id="floatingInputEmail" name="email" placeholder="name@example.com"
                            value="{{ old('email') ?? '' }}" required>
                        @if ($errors->first('email'))
                            <div class="invalid-feedback" id="floatingInputEmail">{{ $errors->first('email') }}</div>
                        @endif
                        <label for="floatingInputEmail">Email address</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                            id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        <span toggle="#floatingPassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        @if ($errors->first('password'))
                            <div class="invalid-feedback" id="floatingPassword">{{ $errors->first('password') }}</div>
                        @endif
                    </div>

                    <div class="form-check mt-2 mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="flexCheckRemember">
                        <label class="form-check-label" for="flexCheckRemember">
                            Ingatkan Saya di Perangkat ini
                        </label>
                    </div>
                    <button class="w-100 btn " style="background: #760712; color: white" type="submit"
                        id="login-form-button">Masuk</button>
                    <p class="mt-3 mb-4 text-end  ">Ingin daftar menjadi santri? <a href="{{ route('santri-daftar') }}">KLIK
                            disini!!!</a>
                    </p>
                    <p class="mb-3 text-muted">2024 © ICT PPM Syafiur Rohman</p>
                </form>
            </div>
        </div>
    </main>
@endsection
