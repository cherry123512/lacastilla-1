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
                        <h6 class="m-0 font-weight-bold text-primary">New Services</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('services_save') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('title') is-invalid @enderror"
                                        name="title" placeholder="{{ __('Title') }}" value="{{ old('title') }}"
                                        autofocus>

                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('amount') is-invalid @enderror"
                                        name="amount" placeholder="{{ __('Amount') }}" value="{{ old('amount') }}"
                                        autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                    rows="5">
                                     {{ old('description') }}
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <input type="file" min="0"
                                    class="form-control form-control-user  @error('service_image') is-invalid @enderror"
                                    name="service_image" value="{{ old('service_image') }}" autofocus accept="image/*"
                                    id="imgInp" />

                                <img id="blah" src="#" alt="your image" class="img img-thumbnail" />

                                @error('service_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <br />
                                <button type="submit" class="btn btn-block btn-success btn-sm">Submit</button>
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
                        <h6 class="m-0 font-weight-bold text-primary">Services List</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-sm table-bordered table-hover">
                            <thead>
                                <th>title</th>
                                <th>description</th>
                                <th>amount</th>
                                <th>service_image</th>
                                <th>option</th>
                            </thead>
                            <tbody>
                                @foreach ($services as $data)
                                    <tr>
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td>{{ number_format($data->amount, 2, '.', ',') }}</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal"
                                                data-target="#exampleModal{{ $data->id }}">
                                                Show Services Image
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
                                                            <img src="{{ asset('/storage/'. $data->service_image) }}" class="img img-thumbnail" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><a href="{{ url('services_update', $data->id) }}" class="btn btn-sm btn-warning">Update</a></td>
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
