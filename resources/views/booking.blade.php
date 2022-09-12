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
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

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
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
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
    <br />
    <div class="content-fluid" style="margin-left:50px;margin-right:50px;">
        <div class="card" style="width: 100%;">
            <h6 class="card-header">Reserved Lacastilla Tour Now!</h6>
            <div class="card-body">
                @guest
                    Please Login First.<a href="{{ url('login') }}">Click here to login.</a>
                @else
                    <form action="{{ route('booking_process') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                @if (session('success'))
                                    <div class="alert alert-success border-left-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="available_schedules">Available Schedules:</label>
                                <select name="available_schedules" id="available_schedules"
                                    class="form-control @error('available_schedules') is-invalid @enderror">
                                    <option value="" default>Select</option>
                                    @foreach ($sched as $data)
                                        @foreach ($data->schedule_details as $details)
                                            <option value="{{ $details->id }}"
                                                {{ old('available_schedules') == $data->id ? 'selected' : '' }}>
                                                {{ date('F j, Y', strtotime($details->date)) . ' ' . date('h:i:s a', strtotime($details->time_from)) . ' - ' . date('h:i:s a', strtotime($details->time_to)) }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>

                                @error('available_schedules')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="services">Services:</label>
                                <select class="selectpicker form-control @error('services') is-invalid @enderror" multiple
                                    data-live-search="true" name="services[]" id="services">
                                    <option value="" default>Select</option>
                                    @foreach ($services as $data)
                                        <option value="{{ $data->id }}"
                                            {{ old('services') == $data->id ? 'selected' : '' }}>{{ $data->title }} -
                                            ₱{{ number_format($data->amount, 2, '.', ',') }}</option>
                                    @endforeach
                                </select>

                                @error('services')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="number_of_attending_persons">Number of attending persons:</label>
                                <input type="text"
                                    class="form-control @error('number_of_attending_persons') is-invalid @enderror"
                                    {{ old('number_of_attending_persons') }}" id="number_of_attending_persons"
                                    name="number_of_attending_persons">

                                @error('number_of_attending_persons')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br />
                                <button type="submit" class="btn btn-sm btn-danger float-right">Submit</button>
                            </div>
                        </div>
                    </form>
                    @endif




                </div>
            </div>

        </div>

        <br /><br /><br /><br />
        <br /><br /><br /><br /><br /><br /><br /><br />
        <br /><br /><br />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $('.carousel').carousel();
        $('.select').selectpicker();
    </script>

    </html>
