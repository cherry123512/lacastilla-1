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
        <a class="navbar-brand" href="#">La Castilla Museum</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <div class="dropdown">
                    <button style="color:white" class="btn btn-default dropdown-toggle" type="button"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Visit
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('view_about_us') }}">About Us</a>
                        <a class="dropdown-item" href="#">Getting Here</a>
                        <a class="dropdown-item" href="{{ url('booking') }}">Book</a>
                        <a class="dropdown-item" href="#">Contact Us</a>
                    </div>
                </div>
                {{-- <li class="nav-item">
                    <a class="nav-link active" href="{{ url('/') }}">Visit Us <span
                            class="sr-only">(current)</span></a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ url('booking') }}">Book</a>
                </li> --}}
                @if (isset(auth()->user()->id))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('client_reservation') }}">Reservations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @if ($carousel_first)
                    <img class="d-block w-100" src="{{ asset('/storage/' . $carousel_first->image) }}"
                        alt="First slide">
                @else
                    Carousel
                @endif
            </div>
            @if ($carousel)
                @foreach ($carousel as $data)
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('/storage/' . $data->image) }}" alt="Second slide">
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <br />
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">About Us</div>
                    <div class="card-body">
                        <p style="text-align:justify">
                            @if (isset($about_us))
                                {{ $about_us->about_us }}
                            @else
                                No Data Yet
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
    <br />

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
