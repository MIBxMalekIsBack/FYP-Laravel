@extends('layouts.CustomerNavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 style="text-align: center">Welcome {{ Auth::user()->name }}</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 style="text-align: center">You are logged in!<h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
