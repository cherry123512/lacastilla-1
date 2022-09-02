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
                        <h6 class="m-0 font-weight-bold text-primary">Carousel List</h6>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>note</th>
                                <th>image</th>
                                <th>status</th>
                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousel as $data)
                                <tr>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ $data->Note }}</td>
                                    <td>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal"
                                            data-target="#exampleModal{{ $data->id }}">
                                            Show Carousel Image
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Carousel Image</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset('/storage/' . $data->image) }}"
                                                            class="img img-thumbnail" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if ($data->status == '')
                                            <a href="{{ url('carousel_status', $data->id) }}"
                                                class="btn btn-sm btn-success btn-block">Actived</a>
                                        @else
                                            <a href="{{ url('carousel_status', $data->id) }}"
                                                class="btn btn-sm btn-danger  btn-block">Deactivated</a>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('carousel_update', $data->id) }}" class="btn btn-sm btn-warning btn-block">Update</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
