@extends('layouts.header')
@section('jk')

    <div class="container mt-5">

        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>Add Company</b></h4>
            </div>
            <div class="card-body">

                <form method="post" action="/admin/addCompany/confirm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="cname" class="col-4 col-form-label">Company Name</label>
                        <div class="col-8">
                            <input id="cname" name="cname" placeholder="Enter Name of Company" type="text"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jr" class="col-4 col-form-label">Job Role</label>
                        <div class="col-8">
                            <input id="jr" name="jr" placeholder="Enter Job Role " type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="eb[]" class="col-4 col-form-label">Eligible Branches</label>
                        <div class="col-8">

                            <select name="eb[]" id="eb[]" multiple class="table-bordered">
                                <option  value="CSE">CSE</option>
                                <option  value="IC">IC</option>
                                <option value="ECE">ECE</option>
                                <option value="CL">CL</option>
                                <option value="EE">EE</option>
                                <option value="CH">CH</option>
                                <option value="ME">ME</option>

                            </select>
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i1" value="CSE">--}}
{{--                                <label class="form-check-label" for="i1">CSE</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i2" value="EC">--}}
{{--                                <label class="form-check-label" for="i2">EC</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i3" value="IC">--}}
{{--                                <label class="form-check-label" for="i3">IC</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i4" value="Chemical">--}}
{{--                                <label class="form-check-label" for="i4">CH</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i5" value="Civil">--}}
{{--                                <label class="form-check-label" for=i5">CL</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i6" value="Electrical">--}}
{{--                                <label class="form-check-label" for="i6">EE</label>--}}
{{--                            </div>--}}
{{--                            <div class="form-check form-check-inline">--}}
{{--                                <input class="form-check-input" type="checkbox" id="i7" value="Mechanical">--}}
{{--                                <label class="form-check-label" for="i7">ME</label>--}}
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ctc" class="col-4 col-form-label">CTC (in  LPA ) </label>
                        <div class="col-8">
                            <input id="ctc" name="ctc" placeholder="Enter CTC " type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mcgpa" class="col-4 col-form-label">Minimum CGPA Required</label>
                        <div class="col-8">
                            <input id="mcgpa" name="mcgpa" placeholder="Enter Minimum CGPA" type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="file" class="col-4 col-form-label">Job Description</label>
                        <div class="col-8">
                        <input type="file" name="file" class="form-control-file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Add Company</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@stop
