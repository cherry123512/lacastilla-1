<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background:#8d221c">
        <a class="navbar-brand" href="#">Lacastilla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('booking') }}">Book</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                {{-- @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a style="color:white" href="{{ url('/home') }}">Home</a>
                        @else
                            
                        @endauth
                    </div>
                @endif --}}
                <div class="top-right links">
                    <a style="color:white" href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a style="color:white" href="{{ route('register') }}">Register</a>
                    @endif
                </div>

            </form>
        </div>
    </nav>
    <br />
    <div class="content-fluid" style="margin-left:50px;margin-right:50px;">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            @if ($carousel_first)
                                <img class="d-block w-100" src="{{ asset('upload_image/' . $carousel_first->image) }}"
                                    alt="First slide">
                            @else
                                Carousel
                            @endif
                        </div>
                        @if ($carousel)
                            @foreach ($carousel as $data)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('upload_image/' . $data->image) }}"
                                        alt="Second slide">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="width: 100%;">
                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                @for ($i = 1; $i < count($services); $i++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}">
                                    </li>
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    @if ($services_first)
                                        <img class="d-block w-100"
                                            src="{{ asset('upload_image/' . $services_first->service_image) }}"
                                            alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{ $services_first->title }}</h5>
                                            <p>{{ $services_first->description }}</p>
                                        </div>
                                    @else
                                        Carousel
                                    @endif

                                </div>
                                @if ($services)
                                    @foreach ($services as $data)
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="{{ asset('upload_image/' . $data->service_image) }}"
                                                alt="Second slide">

                                            <div class="carousel-caption d-none d-md-block">
                                                <h5>{{ $data->title }}</h5>
                                                <p>{{ $data->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 100%;">
                    <div class="card-header">
                        <h5 style="color:#8d221c" style="font-weight:bold;">Contact Us</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('message_submit') }}" method="post">
                            @csrf
                            <div class="row">
                                @if (session('status'))
                                    <div class="alert alert-success border-left-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" min="0"
                                            class="form-control form-control-user  @error('user_name') is-invalid @enderror"
                                            name="user_name" placeholder="{{ __('Name') }}"
                                            value="{{ old('user_name') }}" autofocus>

                                        @error('user_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" min="0"
                                            class="form-control form-control-user  @error('email') is-invalid @enderror"
                                            name="email" placeholder="{{ __('Email') }}"
                                            value="{{ old('email') }}" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" min="0"
                                            class="form-control form-control-user  @error('subject') is-invalid @enderror"
                                            name="subject" placeholder="{{ __('Subject') }}"
                                            value="{{ old('subject') }}" autofocus>

                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="" cols="30"
                                            rows="5">
                                        Message {{ old('message') }}
                                    </textarea>

                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="float-right btn btn-sm"
                                        style="background:#8d221c;color:white">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br /><br />

    <div class="fixed-bottom-sm" style="background:#8d221c">
        <p style="color:white;text-align:center">La-castilla@2022 All Rights Reserved.</p>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script>
    $('.carousel').carousel()
</script>

</html>
