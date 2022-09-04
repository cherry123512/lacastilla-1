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
        @if ($about_count != 0)
            <div class="col-lg-12 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="row">
                            <h6 class="m-0 font-weight-bold text-primary">About Us</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about_us_process') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="about_us" class="form-control" required id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <br />
                                    <button type="submit" class="btn btn-success btn-sm float-right">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <h6 class="m-0 font-weight-bold text-primary">Data</h6>
                    </div>
                </div>
                <div class="card-body">
                    <p>{{ $about_us->about_us }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ url('about_us_update', $about_us->id) }}"
                        class="btn btn-sm float-right btn-warning">Update</a>
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
