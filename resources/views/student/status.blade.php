@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped table-hover text-dark" style="font-size:large">
                            <thead>
                            <tr>


                                <th scope="col">Roll Number</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Verification Status</th>

                            </tr>
                            </thead>
                            <tbody>


                            <tr>

                                <td>{{$sql[0]->roll_no}}</td>
                                <td>{{$sql[0]->first_name}}</td>
                                <td>{{$sql[0]->last_name}}</td>
                                @if($sql[0]->status=='Pending')
                                    <td class="btn btn-primary btn-danger">{{$sql[0]->status}}</td>
                                @else
                                    <td class="btn btn-primary btn-success">{{$sql[0]->status}}</td>
                                @endif
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
