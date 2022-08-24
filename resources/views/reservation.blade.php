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
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $data)
                                    <tr>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->user->contact_number }}</td>
                                        <td>{{ $data->sched_details->date }}</td>
                                        <td>{{ date('h:i a', strtotime($data->sched_details->time_from)) }} to
                                            {{ date('h:i a', strtotime($data->sched_details->time_to)) }}</td>
                                        <td>{{ $data->number_of_persons }}</td>
                                        <td>{{ $data->validation_date }}</td>
                                        <td>
                                            @if ($data->curator_id)
                                                {{ $data->curator->name }}
                                            @endif
                                        </td>
                                        <td>{{ $data->remarks }}</td>
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
