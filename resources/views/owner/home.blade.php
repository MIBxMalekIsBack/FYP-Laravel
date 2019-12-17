@extends('layouts.OwnerNavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><strong>A.O Soft Ice Cream</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4 style="text-align: center">Welcome Admin: <strong>{{ Auth::user()->name }}</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
