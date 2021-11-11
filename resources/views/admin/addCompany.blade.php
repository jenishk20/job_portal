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
                            <input id="cname" name="cname" placeholder="Name of Company" type="text"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jr" class="col-4 col-form-label">Job Role</label>
                        <div class="col-8">
                            <input id="jr" name="jr" placeholder="Job Role " type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="eb[]" class="col-4 col-form-label">Eligible Branches</label>
                        <div class="col-8">

                            <select name="eb[]" id="eb[]" multiple class="table-bordered" style="width: 100px;">
                                <option value="CSE">CSE</option>
                                <option value="IC">IC</option>
                                <option value="ECE">ECE</option>
                                <option value="CL">CL</option>
                                <option value="EE">EE</option>
                                <option value="CH">CH</option>
                                <option value="ME">ME</option>

                            </select>


                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ctc" class="col-4 col-form-label">CTC (in LPA ) </label>
                        <div class="col-8">
                            <input id="ctc" name="ctc" placeholder="CTC " type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mcgpa" class="col-4 col-form-label">Minimum CGPA Required</label>
                        <div class="col-8">
                            <input id="mcgpa" name="mcgpa" placeholder="Minimum CGPA" type="text"
                                   class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ldate" class="col-4 col-form-label">Deadline</label>
                        <div class="col-8">
                            <input id="ldate" name="ldate"  type="datetime-local"
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
