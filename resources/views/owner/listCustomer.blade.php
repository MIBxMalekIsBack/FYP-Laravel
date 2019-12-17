@extends('layouts.OwnerNavbar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>A.O Soft Ice Cream Customer</strong>
{{--                     <span style="float: right">
                        <a href="/supervisor/register/volunteer" class="btn btn-primary text-right">Add</a>
                    </span> --}}
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-hover" id="delete_terminal">
                        <thead>
                            <hr style="margin-bottom: 0px; margin-top: 0px">
                            <tr style="opacity: 0.5; text-transform: uppercase; background-color: #F5F5F5">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                            </tr>
                        </thead>
                        <tbody data-link="row" class="rowlink">
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->phone_number }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
