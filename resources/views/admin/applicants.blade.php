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
                            <select name="cn" id="cn" onchange="build()">
                                @foreach($ucompanies as $companies)

                                    <option>{{$companies}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cname" class="col-4 col-form-label">Job Role</label>
                        <div class="col-8">
                            <select name="jr" id="jr" onchange="build()">
                                @foreach($uroles as $roles)

                                    <option>{{$roles}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class=" form-group row">
                        <div class="col-7">
                            <label class="col-6 col-form-label"></label>
                            <button type="submit" id='fetch' class="btn btn-primary">Fetch Details</button>
                        </div>
                    </div>

                </form>
            </div>

            <table class="table table-striped table-hover text-dark" style="font-size:large">
                <thead>
                <tr>


                    <th scope="col">Roll Number</th>

                    <th scope="col">Status</th>


                </tr>
                </thead>
                <tbody id="myTable">

                </tbody>
            </table>

        </div>

        {{--        {{dd($students)}}--}}
        <script>
            var app = @json($students);
            //console.log(app);
            var data=app;
            function build() {
                var table = document.getElementById('myTable');
                table.innerHTML = '';
                var cp = document.getElementById('cn').value;
                var jr = document.getElementById('jr').value;
              //  console.log(cp, jr);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data[i].company_name);
                    if (data[i].company_name == cp && data[i].job_role == jr) {

                        var row = `<tr>
                         <td>${data[i].rollno}</td>
                          <td>${data[i].status}</td>
                        <tr>`
                        table.innerHTML += row;
                    }
                }
            }

            build(app);

        </script>
@endsection

