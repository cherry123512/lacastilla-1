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
        <a class="navbar-brand" href="#">Lacastilla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('booking') }}">Book</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('client_reservation') }}">Reservations</a>
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
                    @guest
                        <a style="color:white" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a style="color:white" href="{{ route('register') }}">Register</a>
                        @endif
                    @else
                        <a style="color:white" href="{{ route('logout') }}">Logout</a>
                        @endif
                    </div>

                </form>
            </div>
        </nav>
        <br />
        <div class="content-fluid" style="margin-left:50px;margin-right:50px;">
            <div class="row">
                @foreach ($reservations as $data)
                    <div class="col-md-12">
                        <div class="card" style="width: 100%;">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6">
                                        <span style="font-weight: bold">Reservation No:</span> {{ $data->id }}
                                    </div>
                                    <div class="col-md-6">
                                        <span style="font-weight:bold;">Remarks:</span> <span
                                            class="badge badge-warning">{{ $data->remarks }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @guest
                                    Please Login First.<a href="{{ url('login') }}">Click here to login.</a>
                                @else
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table class="table table-sm table-borderless">
                                                <tr>
                                                    <th style="text-align: right">Reservation Date:</th>
                                                    <td>{{ $data->sched_details->date }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: right">Time Start:</th>
                                                    <td>{{ date('h:i a', strtotime($data->sched_details->time_from)) }}</td>
                                                </tr>
                                                <tr>
                                                    <th style="text-align: right">Time End:</th>
                                                    <td>{{ date('h:i a', strtotime($data->sched_details->time_to)) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-sm table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Service(s)</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data->reservation_details as $details)
                                                        <tr>
                                                            <td>{{ $details->services->title }}</td>
                                                            <td>
                                                                @php
                                                                    $sum[] = $details->services->amount;
                                                                @endphp
                                                                {{ number_format($details->services->amount, 2, '.', ',') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td>Total:</td>
                                                        <td style="text-decoration: overline">
                                                            {{ number_format(array_sum($sum), 2, '.', ',') }}</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                
                            </div>
            </div>
            <br />
            </div>
            @endforeach
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
