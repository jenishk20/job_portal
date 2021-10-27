@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <table class="table table-striped table-hover text-dark" style="font-size:large">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">Company</th>
                <th scope="col">Role</th>
                <th scope="col">Branches</th>
                <th scope="col">CTC</th>
                <th scope="col">CGPA</th>
                <th scope="col">Job Description</th>
            </tr>
            </thead>
            <tbody>

            {{--            {{dd($companies)}}--}}
            @for($i=0;$i<count($companies);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$companies[$i]->company_name}}</td>
                    <td>{{$companies[$i]->job_role}}</td>
                    <td>{{$companies[$i]->eligibility}}</td>
                    <td>{{$companies[$i]->CTC}}</td>
                    <td>{{$companies[$i]->minimum_CGPA}}</td>
                    <td>
                        {{--                        <iframe--}}
                        {{--                            src="http://docs.google.com/gview?url={{asset($companies[$i]->job_description) }}&embedded=true"--}}
                        {{--                            style="width:300px; height:200px;"--}}
                        {{--                            frameborder="0">--}}
                        {{--                        </iframe>--}}

                        {{--                        <iframe--}}
                        {{--                            src="http://docs.google.com/gview?url={{asset($companies[$i]->job_description) }}&embedded=true"--}}
                        {{--                            style="width:100px; height:100px;"--}}
                        {{--                            frameborder="0">--}}
                        {{--                        </iframe>--}}

                        <iframe
                            src="/assets/{{$companies[$i]->job_description}}">

                        </iframe>


                    </td>
                </tr>
            @endfor


            </tbody>
        </table>
    </div>


@endsection
