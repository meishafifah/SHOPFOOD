@extends('templates.master')

@section('content')

<section>
    <div class="container block-center">
        <div class="block-acc">
            <div class="row justify-content-center">
                <img class="img-acc" src="{{ asset('assets/img/logo-02.png')}}" alt="">
            </div>
            <h1 class="righteous">SHOPFOOD</h1>
            
            <form method="POST" action="{{ route('login') }}">
            @csrf

                <div class="input">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="{{ asset('assets/img/name.png')}}" alt="">
                    </div>
                    <div class="col-md-11">
                        <input id="email" type="email" placeholder="Email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                  </div>
              </div>

              <div class="input">
                  <div class="row">
                    <div class="col-md-1">
                      <img src="{{ asset('assets/img/psswd.png')}}" alt="">
                    </div>
                    <div class="col-md-11">
                        <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                  </div>
              </div>

                <button type="submit" class="btn text-black mt-5">
                    {{ __('Login') }}
                </button>

            </form>
        </div>
    </div>
</section>

@endsection
