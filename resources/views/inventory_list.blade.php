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
                    <a href="{{ route('inventory_add') }}" class="btn btn-outline-danger btn-sm float-right"><i
                            class="bi bi-clipboard-plus"></i></a>
                    <br /><br />
                    <div class="row">
                        @foreach ($inventory as $data)
                            <div class="col-md-4">
                                <div class="card" style="width: 100%;">
                                    <img class="card-img-top" height=200px;
                                        src="{{ asset('/storage/' . $data->inventory_image) }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->description_title }}</h5>
                                        <p class="card-text">{{ $data->personal_story_of_this_object }}</p>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm float-right"
                                            data-toggle="modal" data-target="#exampleModal{{ $data->id }}">
                                            Details
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ $data->description_title }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Curator</th>
                                                                        <th>reference Number</th>
                                                                        <th>type_of_object</th>
                                                                        <th>location_of_object</th>
                                                                        <th>description_title</th>
                                                                        <th>number_of_pieces</th>
                                                                        <th>length</th>
                                                                        <th>width</th>
                                                                        <th>weight</th>
                                                                        <th>height</th>
                                                                        <th>diameter</th>
                                                                        <th>medium_and_material</th>
                                                                        <th>maker_artist</th>
                                                                        <th>location_of_signation</th>
                                                                        <th>date_of_birth</th>
                                                                        <th>location_of_date_on_object</th>
                                                                        <th>writing_other_than_signature</th>
                                                                        <th>place_of_origin</th>
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

                                                                    <tr>
                                                                        <td>{{ $data->curator->name }}</td>
                                                                        <td>{{ $data->reference_number }}</td>
                                                                        <td>{{ $data->type_of_object }}</td>
                                                                        <td>{{ $data->location_of_object }}</td>
                                                                        <td>{{ $data->description_title }}</td>
                                                                        <td>{{ $data->number_of_pieces }}</td>
                                                                        <td>{{ $data->length }}</td>
                                                                        <td>{{ $data->width }}</td>
                                                                        <td>{{ $data->weight }}</td>
                                                                        <td>{{ $data->height }}</td>
                                                                        <td>{{ $data->diameter }}</td>
                                                                        <td>{{ $data->medium_and_material }}</td>
                                                                        <td>{{ $data->maker_artist }}</td>
                                                                        <td>{{ $data->location_of_signation }}</td>
                                                                        <td>{{ $data->date_of_birth }}</td>
                                                                        <td>{{ $data->location_of_date_on_object }}</td>
                                                                        <td>{{ $data->writing_other_than_signature }}</td>
                                                                        <td>{{ $data->place_of_origin }}</td>
                                                                        <td>{{ $data->place_collected }}</td>
                                                                        <td>{{ $data->date_received }}</td>
                                                                        <td>{{ $data->original_as_shown }}</td>
                                                                        <td>{{ $data->object_original_used }}</td>
                                                                        <td>{{ $data->receipt }}</td>
                                                                        <td>{{ $data->item_description }}</td>
                                                                        <td>{{ $data->condition_of_object }}</td>
                                                                        <td>{{ $data->history }}</td>
                                                                        <td>{{ $data->purchase_or_received }}</td>
                                                                        <td>{{ $data->personal_story_of_this_object }}</td>
                                                                        <td>{{ $data->created_at }}</td>
                                                                    </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary btn-sm"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#success-alert").fadeOut(10000);
            $("#danger-alert").fadeOut(10000);
        });
    </script>
@endsection
