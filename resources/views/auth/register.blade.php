@extends('layouts.auth')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <img src="{{ asset('upload_image/97778307_4046907505326833_5487494686908088320_n (1).jpg') }}"
                                    class="img img-thumbnail" style="border:0px;" alt="">
                                    <br ><br/>
                                    <form method="POST" action="{{ route('register') }}" class="user">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user  @error('first_name') is-invalid @enderror"
                                                name="first_name" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}"
                                                autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user  @error('middle_name') is-invalid @enderror"
                                                name="middle_name" placeholder="{{ __('Middle Name') }}" value="{{ old('middle_name') }}"
                                                autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user  @error('last_name') is-invalid @enderror"
                                                name="last_name" placeholder="{{ __('Name') }}" value="{{ old('last_name') }}"
                                                autofocus>
                                        </div>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group">
                                            <input type="text"
                                                class="form-control form-control-user  @error('contact_number') is-invalid @enderror"
                                                name="contact_number" placeholder="{{ __('Contact Number') }}"
                                                value="{{ old('contact_number') }}">
                                        </div>

                                        @error('contact_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group">
                                            <input type="email"
                                                class="form-control form-control-user  @error('email') is-invalid @enderror"
                                                name="email" placeholder="{{ __('E-Mail Address') }}"
                                                value="{{ old('email') }}">

                                            <input type="hidden" name="user_type" value="client">
                                        </div>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group">
                                            <input type="password"
                                                class="form-control form-control-user  @error('password') is-invalid @enderror"
                                                name="password" placeholder="{{ __('Password') }}">
                                        </div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">
                                            {{ __('Already have an account? Login!') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
