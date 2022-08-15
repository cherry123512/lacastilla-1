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
                        <h6 class="m-0 font-weight-bold text-primary">Reply to Mr/Ms. {{ $message->name }}</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('message_process') }}" method="post">
                        @csrf<div clas="row">
                            <div class="col-md-12">
                                <div class="alert alert-warning" style="text-align: justify;padding:20px;" role="alert">
                                    <b>Subject: </b>{{ ucfirst($message->subject) }}
                                    <br />
                                    <b> Message:</b> {{ ucfirst($message->message) }}
                                    <br /><br />
                                    <span class="float-right">
                                        <b>Date:</b> {{ date('F j, Y H:i a', strtotime($message->created_at)) }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" min="0"
                                        class="form-control form-control-user  @error('subject') is-invalid @enderror"
                                        name="subject" placeholder="{{ __('Subject') }}" value="{{ old('subject') }}"
                                        autofocus>

                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" id="" cols="30"
                                    rows="10">
                                               {{ old('message') }}
                                              </textarea>

                                @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <br />
                                <input type="hidden" name="message_id" value="{{ $message->id }}">
                                <button class="btn btn-sm btn-success float-right">Submit</button>
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
