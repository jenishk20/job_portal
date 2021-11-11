@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        @if($students[0]->attempts<3)
            <div class="card">
                <div class="card-header alert-info">
                    Hi <b>{{$students[0]->first_name}}</b>, you have <b>{{$students[0]->attempts}}</b> upgradation
                    attempts remaining.
                </div>
            </div>
        @endif

        @if(count($companies)==0)
            <div class="card">
                <div class="card-header alert-info">
                    Hi <b>{{$students[0]->first_name}}</b>, There are no Oncampus Opportunities as of now.
                    Tune in later.
                </div>
            </div>
        @endif
        <table class="table table-striped table-hover text-dark" style="font-size:medium">
            <thead>
            <tr>

                <th scope="col">No.</th>
                <th scope="col">Company</th>
                <th scope="col">Role</th>
                <th scope="col">Branches</th>
                <th scope="col">CTC</th>
                <th scope="col">CGPA</th>
                <th scope="col">Deadline</th>
                <th scope="col">Category</th>
                <th scope="col">JD</th>

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
                        <td>{{$companies[$i]->last_date}}</td>
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



                            @if($students[0]->attempts=='0')
                                <div class="row text-info">
                                    Out of Process
                                </div>
                            @elseif($students[0]->attempts=='2')
                                <button type="submit" class="btn btn-info"
                                >Apply now
                                </button>
                                {{--                                @if(intval($companies[$i]->CTC)<=7)--}}

                                {{--                                    <div class="row text-info">--}}
                                {{--                                        You are out of process--}}
                                {{--                                    </div>--}}
                                {{--                                @elseif(intval($companies[$i]->CTC)<=12 && !$applied[$i])--}}
                                {{--                                    <button type="submit" class="btn btn-info"--}}
                                {{--                                    >Apply Now--}}
                                {{--                                    </button>--}}
                            @elseif($applied[$i])
                                <button type="submit" class="btn btn-info" disabled
                                >Applied
                                </button>
                            @else
                                <button type="submit" class="btn btn-info"
                                >Apply
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
