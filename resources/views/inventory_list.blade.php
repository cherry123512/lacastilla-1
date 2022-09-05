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
                        <h6 class="m-0 font-weight-bold text-primary">Inventory List</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table table-striped table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Activity Log</th>
                                    {{-- <th>Curator</th> --}}
                                    <th>Image</th>
                                    <th>reference Number</th>
                                    <th>type_of_object</th>
                                    <th>location_of_object</th>
                                    <th>description_title</th>
                                    <th>number_of_pieces</th>
                                    <th>length/height</th>
                                    <th>width</th>
                                    <th>weight</th>
                                    {{-- <th>height</th> --}}
                                    <th>diameter</th>
                                    <th>medium_and_material</th>
                                    <th>maker_artist</th>
                                    <th>location_of_signation</th>
                                    <th>date_of_birth</th>
                                    <th>location_of_date_on_object</th>
                                    <th>writing_other_than_signature</th>
                                    <th>place_of_origin</th>
                                    <th>Adopted To Another Used</th>
                                    <th>place_collected</th>
                                    <th>date_received</th>
                                    <th>original_as_shown</th>
                                    <th>object_original_used</th>
                                    <th>receipt</th>
                                    <th>item_description</th>
                                    <th>condition_of_object</th>
                                    <th>history</th>
                                    <th>purchase_or_received</th>
                                    <th>personal_story_of_this_object</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventory as $data)
                                    <tr>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_log{{ $data->id }}">
                                                Activity Log
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_log{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_date_received') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-sm table-hover">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Logs</th>
                                                                            <th>Updated</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($data->log as $details)
                                                                           <tr>
                                                                             <td>{{ $details->logs }}</td>
                                                                             <td>{{ $details->created_at }}</td>
                                                                           </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal{{ $data->id }}">
                                                Show Artifact Image
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Artifact </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="img img-thumbnail"
                                                                src="{{ asset('/storage/' . $data->inventory_image) }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_reference_number{{ $data->id }}">
                                                {{ $data->reference_number }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_reference_number{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_reference_number') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="reference_number"
                                                                    value="{{ $data->reference_number }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_type_of_object{{ $data->id }}">
                                                {{ $data->type_of_object }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_type_of_object{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_type_object') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="type_of_object"
                                                                    value="{{ $data->type_of_object }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_location_of_object{{ $data->id }}">
                                                {{ $data->location_of_object }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_location_of_object{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_location_object') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="location_of_object"
                                                                    value="{{ $data->location_of_object }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_description{{ $data->id }}">
                                                {{ $data->description_title }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_description{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_description_title') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="description_title"
                                                                    value="{{ $data->description_title }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_number_of_pieces{{ $data->id }}">
                                                {{ $data->number_of_pieces }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_number_of_pieces{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_number_of_pieces') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="number_of_pieces"
                                                                    value="{{ $data->number_of_pieces }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_lenght{{ $data->id }}">
                                                {{ $data->length }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_lenght{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_lenght') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="lenght"
                                                                    value="{{ $data->length }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_width{{ $data->id }}">
                                                {{ $data->width }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_width{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_width') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="width"
                                                                    value="{{ $data->width }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_weight{{ $data->id }}">
                                                {{ $data->weight }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_weight{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_weight') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="width"
                                                                    value="{{ $data->weight }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        {{-- <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_height{{ $data->id }}">
                                                {{ $data->height }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_height{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_height') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="height"
                                                                    value="{{ $data->height }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td> --}}
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_diameter{{ $data->id }}">
                                                {{ $data->diameter }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_diameter{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_diameter') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="diameter"
                                                                    value="{{ $data->diameter }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_medium_material{{ $data->id }}">
                                                {{ $data->medium_and_material }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_medium_material{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_medium_material') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="medium_and_material"
                                                                    value="{{ $data->medium_and_material }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_medium_maker_artist{{ $data->id }}">
                                                {{ $data->maker_artist }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_medium_maker_artist{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_maker_artist') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="maker_artist"
                                                                    value="{{ $data->maker_artist }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_medium_location_of_signature{{ $data->id }}">
                                                {{ $data->location_of_signation }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_medium_location_of_signature{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_location_of_signature') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="location_of_signation"
                                                                    value="{{ $data->location_of_signation }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_medium_date_of_birth{{ $data->id }}">
                                                {{ $data->date_of_birth }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_medium_date_of_birth{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_date_of_birth') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="date_of_birth"
                                                                    value="{{ $data->date_of_birth }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_location_of_date_on_object{{ $data->id }}">
                                                {{ $data->location_of_date_on_object }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_location_of_date_on_object{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_location_of_date_on_object') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="location_of_date_on_object"
                                                                    value="{{ $data->location_of_date_on_object }}"
                                                                    required class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_writing_other_than_signature{{ $data->id }}">
                                                {{ $data->writing_other_than_signature }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_writing_other_than_signature{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_writing_other_than_signature') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="writing_other_than_signature"
                                                                    value="{{ $data->writing_other_than_signature }}"
                                                                    required class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            @if ($data->place_of_origin != '')
                                                <i class="bi bi-check-lg"></i>
                                            @else
                                                <i class="bi bi-bookmark-x-fill"></i>
                                            @endif
                                        </td>
                                        <td>

                                            @if ($data->adopted_to_another_used != '')
                                                <i class="bi bi-check-lg"></i>
                                            @else
                                                <i class="bi bi-bookmark-x-fill"></i>
                                            @endif
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_place_collected{{ $data->id }}">
                                                {{ $data->place_collected }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_place_collected{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_place_collected') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="place_collected"
                                                                    value="{{ $data->place_collected }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_date_received{{ $data->id }}">
                                                {{ $data->date_received }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_date_received{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_date_received') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="date" name="date_received"
                                                                    value="{{ $data->date_received }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_original_as_shown{{ $data->id }}">
                                                {{ $data->original_as_shown }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_original_as_shown{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_original_as_shown') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="original_as_shown"
                                                                    value="{{ $data->original_as_shown }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_object_original_used{{ $data->id }}">
                                                {{ $data->object_original_used }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_object_original_used{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_object_original_used') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="object_original_used"
                                                                    value="{{ $data->object_original_used }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_date_receipt{{ $data->id }}">
                                                {{ $data->receipt }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_date_receipt{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_date_receipt') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="receipt"
                                                                    value="{{ $data->receipt }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_item_description{{ $data->id }}">
                                                {{ $data->item_description }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_item_description{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_item_description') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="item_description"
                                                                    value="{{ $data->item_description }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_condition_of_object{{ $data->id }}">
                                                {{ $data->condition_of_object }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_condition_of_object{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_condition_of_object') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="condition_of_object"
                                                                    value="{{ $data->condition_of_object }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_history{{ $data->id }}">
                                                {{ $data->history }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal_history{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('inventory_list_update_history') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="history"
                                                                    value="{{ $data->history }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_purchase_or_received{{ $data->id }}">
                                                {{ $data->purchase_or_received }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_purchase_or_received{{ $data->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_purchase_or_received') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text" name="purchase_or_received"
                                                                    value="{{ $data->purchase_or_received }}" required
                                                                    class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-default btn-sm"
                                                style="text-decoration: none;" data-toggle="modal"
                                                data-target="#exampleModal_personal_story_of_this_object{{ $data->id }}">
                                                {{ $data->personal_story_of_this_object }}
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade"
                                                id="exampleModal_personal_story_of_this_object{{ $data->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Data
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form
                                                            action="{{ route('inventory_list_update_personal_story_of_this_object') }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <input type="text"
                                                                    name="personal_story_of_this_object"
                                                                    value="{{ $data->personal_story_of_this_object }}"
                                                                    required class="form-control">
                                                                <input type="hidden" name="inventory_id"
                                                                    value="{{ $data->id }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary btn-sm">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $data->created_at }}</td>
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
        // $(document).ready(function() {
        //     $("#success-alert").fadeOut(10000);
        //     $("#danger-alert").fadeOut(10000);
        // });
    </script>
@endsection
