@extends('layouts.OwnerNavbar')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/sunny/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><h2>{{ __('ADD FLAVOUR') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="/owner/addMenu" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('New Flavour') }}</label>

                            <div class="col-md-6">
                                <input id="flavour" type="text" class="form-control{{ $errors->has('flavour') ? ' is-invalid' : '' }}" name="flavour" value="{{ old('flavour') }}" required autofocus>

                                @if ($errors->has('flavour'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('flavour') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>   
                                         

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Flavour') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <strong>A.O Soft Ice Cream Flavour</strong>
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                    @endif

                    <table class="table table-hover" id="delete_terminal" border="3">
                        <thead>
                            <hr style="margin-bottom: 0px; margin-top: 0px">
                            <tr style="opacity: 0.5; text-transform: uppercase; background-color: #F5F5F5">
                                <th>No</th>
                                <th>Flavour</th>                           
                                <th>Image</th>                           
                                <th>Edit</th>                          
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->flavour }}</td>
                                    <td><a href=../img/{{ $item->image }}>{{ $item->image }}</a></td>
                                    <td>
                                        <a href="/owner/editMenuForm/{{$item->id}}"><button class="editbtn btn btn-success">Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@include("layouts.footer")
@endsection
