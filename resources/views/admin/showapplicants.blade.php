@extends('layouts.header')
@section('jk')

    <div class="container mt-5">

        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>View Applications</b></h4>
            </div>
            <div class="card-body">

                <form method="post" action="/admin/applicants/fetch">
                    @csrf

                    <div class="form-group row">
                        <label for="cname" class="col-4 col-form-label">Company Name</label>
                        <div class="col-8">
                            <select name="cn" id="cn">
                                @for($i=0;$i<count($company);$i++)

                                    <option>{{$company[$i]->company_name}}</option>

                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cname" class="col-4 col-form-label">Job Role</label>
                        <div class="col-8">
                            <select name="jr" id="jr">
                                @foreach($company as $cp)

                                    <option>{{$cp->job_role}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-7">
                            <label class="col-6 col-form-label"></label>
                            <button type="submit" class="btn btn-primary">Fetch Details</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@stop
