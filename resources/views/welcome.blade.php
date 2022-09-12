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
                        <a class="dropdown-item" href="#get_here">Getting Here</a>
                        <a class="dropdown-item" href="{{ url('booking') }}">Book</a>
                        <a class="dropdown-item" href="#contact_us">Contact Us</a>
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Artifacts</div>
                    <div class="card-body">
                        <div id="carouselExampleSlidesOnly1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    @if ($inventory_first)
                                        <img class="d-block w-100"
                                            src="{{ asset('/storage/' . $inventory_first->inventory_image) }}"
                                            alt="First slide">
                                    @else
                                        Inventory
                                    @endif
                                </div>
                                @if ($inventory)
                                    @foreach ($inventory as $data)
                                        <div class="carousel-item">
                                            <img class="d-block w-100"
                                                src="{{ asset('/storage/' . $data->inventory_image) }}"
                                                alt="Second slide">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">History</div>
                    <div class="card-body" style="height:100%;">
                        <p>
                            What is Lorem Ipsum?
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.

                            Why do we use it?
                            It is a long established fact that a reader will be distracted by the readable content of a
                            page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here', making it look like readable English. Many desktop publishing packages and web page
                            editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will
                            uncover many web sites still in their infancy. Various versions have evolved over the years,
                            sometimes by accident, sometimes on purpose (injected humour and the like).
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <br />

        <div class="card" id="get_here">
            <div class="card-header">How to get here</div>
            <div class="card-body">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3946.114883223187!2d124.63775191056901!3d8.488209594155691!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32fff32040628031%3A0xb45a2fa16068c47!2sLa%20Castilla!5e0!3m2!1sen!2sph!4v1662941671096!5m2!1sen!2sph"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <br />
        <div class="card" id="contact_us">
            <div class="card-header">Contact Us</div>
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
                                    name="email" placeholder="{{ __('Email') }}" value="{{ old('email') }}"
                                    autofocus>

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
                                    name="subject" placeholder="{{ __('Subject') }}" value="{{ old('subject') }}"
                                    autofocus>

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
