@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <table class="table table-striped table-hover text-dark" style="font-size:medium">
            <thead>
            <tr>

                <th scope="col">No.</th>
                <th scope="col">Company</th>
                <th scope="col">Role</th>
                <th scope="col">Branches</th>
                <th scope="col">CTC</th>
                <th scope="col">CGPA</th>
                <th scope="col">Category</th>
                <th scope="col">Job Description</th>

                <th scope="col">Apply</th>
            </tr>
            </thead>
            <tbody>

            @for($i=0;$i<count($companies);$i++)
                <form action="/student/oncampus/apply/{{$companies[$i]->id}}" method="post">
                    @csrf
                    <tr>
                        <th scope="row">{{$i+1}}</th>
                        <td>{{$companies[$i]->company_name}}</td>
                        <td>{{$companies[$i]->job_role}}</td>
                        <td>{{$companies[$i]->eligibility}}</td>
                        <td>{{$companies[$i]->CTC}}</td>
                        <td>{{$companies[$i]->minimum_CGPA}}</td>
                        <td>
                            @if(intval($companies[$i]->CTC)<=7)
                                {{'B'}}
                            @elseif(intval($companies[$i]->CTC)<=12)
                                {{'A'}}
                            @else
                                {{'A+'}}
                            @endif

                        </td>
                        <td>

                            <button type="button" class="btn btn-info" data-toggle="modal"
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
                        <td>
                            {{--                            {{dd($app[0]->status)}}--}}
                            @if($applied[$i])
                                <button type="submit" class="btn btn-info"
                                        disabled>You have applied
                                </button>
                            @else
                                <button type="submit" class="btn btn-info"
                                >Apply Now
                                </button>
                            @endif
                            {{--                            <button type="submit" class="btn btn-info"--}}
                            {{--                            >Apply Now--}}
                            {{--                            </button>--}}
                        </td>
                    </tr>
                </form>
            @endfor


            </tbody>
        </table>
    </div>


@endsection
