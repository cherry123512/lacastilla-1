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
                        <h6 class="m-0 font-weight-bold text-primary">Schedules</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('schedule_process') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <label for="date">Date:</label>
                                <input type="date" min="0"
                                    class="form-control form-control-user  @error('date') is-invalid @enderror"
                                    name="date" placeholder="{{ __('date') }}" value="{{ old('date') }}" autofocus>

                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="time_from">Time From:</label>
                                <input type="time" min="0"
                                    class="form-control form-control-user  @error('time_from') is-invalid @enderror"
                                    name="time_from" placeholder="{{ __('time_from') }}" value="{{ old('time_from') }}"
                                    autofocus>

                                @error('time_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="time_to">Time To:</label>
                                <input type="time" min="0"
                                    class="form-control form-control-user  @error('time_to') is-invalid @enderror"
                                    name="time_to" placeholder="{{ __('time_to') }}" value="{{ old('time_to') }}"
                                    autofocus>

                                @error('time_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br />
                                <button type="submit" class="btn btn-sm btn-success btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">List</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>Curator</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Time From</th>
                                    <th>Time To</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedule as $data)
                                    <tr>
                                        <td>{{ $data->curator->name }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->schedule_details[0]->date }}</td>
                                        <td>{{ date('h:i:s a', strtotime($data->schedule_details[0]->time_from)) }}</td>
                                        <td>{{ date('h:i:s a', strtotime($data->schedule_details[0]->time_to)) }}</td>
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
