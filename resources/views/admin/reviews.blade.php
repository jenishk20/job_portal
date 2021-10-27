@extends('layouts.header')
@section('jk')

    <div class="container mt-5">

        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>Pending Profile Reviews</b></h4>
            </div>
            <div class="card-body">
                @if($sql->isEmpty())

                    {{('No Pending Reviews')}}


                @else
                    <form method="post" action="/admin/review/confirm">
                        @csrf
                        <table class="table table-striped table-hover text-dark" style="font-size:large">
                            <thead>
                            <tr>


                                <th scope="col">Roll Number</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">CGPA</th>
                                <th scope="col">Branch</th>
                                <th scope="col">Verification Status</th>

                            </tr>
                            </thead>
                            <tbody>

                            @for($i=0;$i<count($sql);$i++)

                                <tr>

                                    <td>{{$sql[$i]->roll_no}}</td>
                                    <td>{{$sql[$i]->first_name}}</td>
                                    <td>{{$sql[$i]->last_name}}</td>
                                    <td>{{$sql[$i]->cumulative_gpa}}</td>
                                    <td>{{$sql[$i]->branch}}</td>
                                    <input type="hidden" name="submit" value="{{$sql[$i]->id}}">
                                    <td><input type="submit" value="Verify" class="btn btn-success"></td>

                                </tr>
                            @endfor

                            </tbody>
                        </table>
                    </form>

            </div>
            @endif
        </div>
    </div>
@stop
