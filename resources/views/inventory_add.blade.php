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
                        <h6 class="m-0 font-weight-bold text-primary">Inventory Add</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('inventory_add_save') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('reference_number') is-invalid @enderror"
                                        name="reference_number" placeholder="{{ __('Reference No') }}"
                                        value="{{ old('reference_number') }}" autofocus>

                                    @error('reference_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user  @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" placeholder="{{ __('Age of artifact') }}"
                                        value="{{ old('date_of_birth') }}" autofocus>

                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user  @error('type_of_object') is-invalid @enderror"
                                        name="type_of_object" placeholder="{{ __('type of object') }}"
                                        value="{{ old('type_of_object') }}" autofocus>

                                    @error('type_of_object')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <input type="text"
                                    class="form-control form-control-user  @error('location_of_object') is-invalid @enderror"
                                    name="location_of_object" placeholder="{{ __('Location of Object') }}"
                                    value="{{ old('location_of_object') }}" autofocus>

                                @error('location_of_object')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <input type="text"
                                    class="form-control form-control-user  @error('description_title') is-invalid @enderror"
                                    name="description_title" placeholder="{{ __('Description / Title') }}"
                                    value="{{ old('description_title') }}" autofocus>

                                @error('description_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-3">
                                <input type="text" min="0"
                                    class="form-control form-control-user  @error('number_of_pieces') is-invalid @enderror"
                                    name="number_of_pieces" placeholder="{{ __('No of Pcs') }}"
                                    value="{{ old('number_of_pieces') }}" autofocus>

                                @error('number_of_pieces')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('length') is-invalid @enderror"
                                        name="length" placeholder="{{ __('length/height') }}" value="{{ old('length') }}"
                                        autofocus>

                                    @error('length')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('height') is-invalid @enderror"
                                        name="height" placeholder="{{ __('height') }}" value="{{ old('height') }}"
                                        autofocus>

                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('width') is-invalid @enderror"
                                        name="width" placeholder="{{ __('width') }}" value="{{ old('width') }}"
                                        autofocus>

                                    @error('width')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('diameter') is-invalid @enderror"
                                        name="diameter" placeholder="{{ __('diameter') }}" value="{{ old('diameter') }}"
                                        autofocus>

                                    @error('diameter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('weight') is-invalid @enderror"
                                        name="weight" placeholder="{{ __('weight') }}" value="{{ old('weight') }}"
                                        autofocus>

                                    @error('weight')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-3">
                                <input type="text" min="0"
                                    class="form-control form-control-user  @error('medium_and_material') is-invalid @enderror"
                                    name="medium_and_material" placeholder="{{ __('Medium and Material') }}"
                                    value="{{ old('medium_and_material') }}" autofocus>

                                @error('medium_and_material')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>





                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('maker_artist') is-invalid @enderror"
                                        name="maker_artist" placeholder="{{ __('Maker / Artist') }}"
                                        value="{{ old('maker_artist') }}" autofocus>

                                    @error('maker_artist')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <input type="text" min="0"
                                    class="form-control form-control-user  @error('location_of_signation') is-invalid @enderror"
                                    name="location_of_signation"
                                    placeholder="{{ __('Location of Signation/Makers Mark') }}"
                                    value="{{ old('location_of_signation') }}" autofocus>

                                @error('location_of_signation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-3">
                                <input type="number" min="0"
                                    class="form-control form-control-user  @error('date_of_birth') is-invalid @enderror"
                                    name="date_of_birth" placeholder="{{ __('Age of Artifact') }}"
                                    value="{{ old('date_of_birth') }}" autofocus>

                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('location_of_date_on_object') is-invalid @enderror"
                                        name="location_of_date_on_object"
                                        placeholder="{{ __('Location of date on object') }}"
                                        value="{{ old('location_of_date_on_object') }}" autofocus>

                                    @error('location_of_date_on_object')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('writing_other_than_signature') is-invalid @enderror"
                                        name="writing_other_than_signature"
                                        placeholder="{{ __('Writing other than signature and date') }}"
                                        value="{{ old('writing_other_than_signature') }}" autofocus>

                                    @error('writing_other_than_signature')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('place_of_origin') is-invalid @enderror"
                                        name="place_of_origin" placeholder="{{ __('Place of origin') }}"
                                        value="{{ old('place_of_origin') }}" autofocus>

                                    @error('place_of_origin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('place_collected') is-invalid @enderror"
                                        name="place_collected" placeholder="{{ __('Place collected/Received') }}"
                                        value="{{ old('place_collected') }}" autofocus>

                                    @error('place_collected')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user  @error('date_received') is-invalid @enderror"
                                        name="date_received" placeholder="{{ __('Date Collected/Received') }}"
                                        value="{{ old('date_received') }}" autofocus>

                                    @error('date_received')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    {{-- <input type="text" min="0"
                                        class="form-control form-control-user  @error('original_as_shown') is-invalid @enderror"
                                        name="original_as_shown" placeholder="{{ __('Original as shown') }}"
                                        value="{{ old('original_as_shown') }}" autofocus> --}}
                                    <div class="form-check">
                                        <input class="form-check-input" name="original_as_shown" type="checkbox" value="original_as_shown"
                                            id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Original as shown
                                        </label>
                                    </div>
                                    <br />
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="adapted_to_another_used" value="adapted_to_another_used" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                          Adapted to another Used. Objects's Original Used
                                        </label>
                                      </div>

                                    @error('original_as_shown')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('object_original_used') is-invalid @enderror"
                                        name="object_original_used" placeholder="{{ __('Object original used') }}"
                                        value="{{ old('object_original_used') }}" autofocus>

                                    @error('object_original_used')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('receipt') is-invalid @enderror"
                                        name="receipt" placeholder="{{ __('Receipt') }}" value="{{ old('receipt') }}"
                                        autofocus>

                                    @error('receipt')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('item_description') is-invalid @enderror"
                                        name="item_description" placeholder="{{ __('Item description') }}"
                                        value="{{ old('item_description') }}" autofocus>

                                    @error('item_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('condition_of_object') is-invalid @enderror"
                                        name="condition_of_object" placeholder="{{ __('Condition of object') }}"
                                        value="{{ old('condition_of_object') }}" autofocus>

                                    @error('condition_of_object')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('history') is-invalid @enderror"
                                        name="history" placeholder="{{ __('History or Provinance') }}"
                                        value="{{ old('history') }}" autofocus>

                                    @error('history')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('purchase_or_received') is-invalid @enderror"
                                        name="purchase_or_received"
                                        placeholder="{{ __('How was this purchase or Received') }}"
                                        value="{{ old('purchase_or_received') }}" autofocus>

                                    @error('purchase_or_received')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-md-8">
                                <textarea name="personal_story_of_this_object"
                                    class="form-control @error('personal_story_of_this_object') is-invalid @enderror" id="" cols="30"
                                    rows="10">
                                    Personal Story in Relation to this object {{ old('personal_story_of_this_object') }}
                                </textarea>

                                @error('personal_story_of_this_object')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <input type="file" min="0"
                                    class="form-control form-control-user  @error('inventory_image') is-invalid @enderror"
                                    name="inventory_image" value="{{ old('inventory_image') }}" autofocus
                                    accept="image/*" id="imgInp" />

                                <img id="blah" src="#" alt="your image" class="img img-thumbnail" />

                                @error('inventory_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                            </div>


                            <div class="col-md-12">
                                <br />
                                <button type="submit" class="btn btn-success btn-sm btn-block">Submit</button>
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
