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
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Services Update</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('services_update_process') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $services->title }}"
                                    required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control" required id="" cols="30" rows="10">{{ $services->description }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Amount</label>
                                <input type="text" name="amount" value="{{ $services->amount }}" required
                                    class="form-control">
                            </div>
                            <div class="col-md-12">
                                <br />
                                <input type="hidden" name="services_id" value="{{ $services->id }}">
                                <button class="float-right btn btn-sm btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Services Image</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('services_update_image') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <input type="file" id="imgInp" name="file" class="form-control" required>
                                <img id="blah" src="#" alt="your image" class="img img-thumbnail" />
                            </div>
                            <div class="col-md-12">
                                <br />
                                <input type="hidden" value="{{ $services->id }}" name="services_id">
                                <button class="btn btn-success btn-sm float-right" type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
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
