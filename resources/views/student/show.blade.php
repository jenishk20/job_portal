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
{{--                                            {{var_dump($companies[$i]->job_description)}}--}}


{{--                        <iframe style="width:1350px; height:1000px;"--}}
{{--                                src="/assets/{{$companies[$i]->job_description}}">--}}
{{--                        </iframe>--}}


                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                data-target="#myModal{{$i}}">Preview
                        </button>

                        <div id="myModal{{$i}}" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">
                                    <div class="modal-body">
{{--                                        {{var_dump(  $companies[$i]->job_description)}}--}}
                                        <embed src="/assets/{{$companies[$i]->job_description}}" frameborder="0"
                                               width="100%" height="400px">

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                Close
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
            @endfor


            </tbody>
        </table>
    </div>


@endsection
