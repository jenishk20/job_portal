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

                {{--                <form method="post" action="/admin/applicants/fetch">--}}
                {{--                    @csrf--}}

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


                {{--                </form>--}}
            </div>
            <form method="post" action="/admin/applicants/update">
                @csrf
                <table class="table table-striped table-hover text-dark" style="font-size:large">
                    <thead>
                    <tr>


                        <th scope="col">Roll Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Selection</th>
                        <th scope="col">Rejections</th>

                    </tr>
                    </thead>
                    <tbody id="myTable">

                    </tbody>
                </table>
            </form>
        </div>

        {{--        {{dd($students)}}--}}
        <script>
            var app = @json($students);
            var profile =@json($profile);
            console.log(app);
            var data = app;

            function build() {
                var table = document.getElementById('myTable');
                table.innerHTML = '';
                var cp = document.getElementById('cn').value;
                var jr = document.getElementById('jr').value;
                //  console.log(cp, jr);
                for (var i = 0; i < data.length; i++) {
                    // console.log(data[i].company_name);
                    if (data[i].company_name == cp && data[i].job_role == jr) {
                        for (var j = 0; j < profile.length; j++) {
                            //    console.log(profile[j]);
                            if (profile[j].roll_no == data[i].rollno) {

                                var row = `<tr>
                         <td>${profile[j].roll_no}</td>
                            <td>${profile[j].first_name}</td>
                          <td>${data[i].status}</td>
                          <td><button type="submit" name="select" class="btn btn-success" value="${data[i].id}">Select</button></td>
                          <td><button type="submit" name="reject" class="btn btn-danger" value="${data[i].id}">Reject</button></td>


                        <tr>`
                                table.innerHTML += row;
                            }

                        }

                    }
                }
            }


        </script>
@endsection

