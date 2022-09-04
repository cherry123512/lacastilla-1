@extends('layouts.admin')

@section('main-content')
    {{-- <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Inventory') }}</h1> --}}

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">New Messages</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Client</th>
                                    <th>Email</th>
                                    <th>Contact No</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Number of Persons</th>
                                    <th>Validation Date</th>
                                    <th>Curator</th>
                                    <th>Remarks</th>
                                    <th>Services</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $data)
                                    <tr>
                                        <td>{{ $data->user->first_name}} {{ $data->user->middle_name}} {{ $data->user->last_name}}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->user->contact_number }}</td>
                                        <td>{{ $data->sched_details->date }}</td>
                                        <td>{{ date('h:i a', strtotime($data->sched_details->time_from)) }} to
                                            {{ date('h:i a', strtotime($data->sched_details->time_to)) }}</td>
                                        <td>{{ $data->number_of_persons }}</td>
                                        <td>{{ $data->validation_date }}</td>
                                        <td>
                                            @if ($data->curator_id)
                                                {{ $data->curator->first_name }}   {{ $data->curator->middle_name }}
                                                {{ $data->curator->last_name }}                                            @endif
                                        </td>
                                        <td>{{ $data->remarks }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $data->id }}">
                                                Services
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-sm table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Service</th>
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
                                                                                {{ number_format($details->services->amount,2,".",",") }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>Total:</th>
                                                                        <th>{{ number_format(array_sum($sum),2,".",",") }}</th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            @if ($data->remarks == 'Pending Approval')
                                                <a class="btn btn-warning btn-sm btn-block"
                                                    href="{{ url('reservation_approved', $data->id) }}">Approved ?</a>
                                                {{-- @elseif($data->remarks == 'Approved')
                                                <a class="btn btn-warning btn-sm btn-block"
                                                    href="{{ url('reservation_approved', $data->id) }}">Paid ?</a> --}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
