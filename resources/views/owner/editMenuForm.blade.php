@extends('layouts.OwnerNavbar')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" align="center"><h2>{{ __('EDIT FLAVOUR') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="/owner/updateMenu" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <input type="hidden" name="itemID" value="{{ ($items) ? $items['id'] : '' }}">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Flavour Name') }}</label>

                            <div class="col-md-6">
                                <input id="flavour" type="text" class="form-control{{ $errors->has('flavour') ? ' is-invalid' : '' }}" name="flavour" value="{{ ($items) ? $items['flavour'] : '' }}" required>

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
                                <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" autofocus>

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
                                    {{ __('Update Flavour') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
@include("layouts.footer")
@endsection
