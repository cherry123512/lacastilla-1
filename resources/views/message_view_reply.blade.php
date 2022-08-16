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
                    <div class="alert alert-warning" style="text-align: justify;padding:20px;" role="alert">
                        <b>Sender: </b>{{ ucfirst($message->name) }}
                        <br />
                        <b>Subject: </b>{{ ucfirst($message->subject) }}
                        <br />
                        <b> Message:</b> {{ ucfirst($message->message) }}
                        <br /><br />
                        <span class="float-right;padding:5px;">
                            <b>Date:</b> {{ date('F j, Y H:i a', strtotime($message->created_at)) }}
                        </span>
                    </div>

                    <div class="alert alert-info" style="text-align: justify;padding:20px;" role="alert">
                        <b>Sender: </b>{{ ucfirst($message->curator->name) }}
                        <br />
                       
                        <b> Message:</b> {{ ucfirst($message->curator_reply) }}
                        <br /><br />
                        <span class="float-right;">
                            <b>Date:</b> {{ date('F j, Y H:i a', strtotime($message->updated_at)) }}
                        </span>
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
