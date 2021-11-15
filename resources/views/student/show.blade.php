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
        <div class="text-center font-weight-bolder mt-3" style="font-size: large">Selections</div>
        <table class=" text-center table table-striped table-hover text-dark" style="font-size:medium">
            <thead>
            <tr>


                <th scope="col">Company</th>
                <th scope="col">Role</th>

                <th scope="col">CTC</th>

                <th scope="col">Category</th>


            </tr>
            </thead>
            <tbody>

            @for($i=0;$i<count($selected);$i++)
                @if($selected[$i])
                    <tr>

                        <td>{{$companies[$i]->company_name}}</td>
                        <td>{{$companies[$i]->job_role}}</td>
                        <td>{{$companies[$i]->CTC}}</td>
                        <td>
                            @if(intval($companies[$i]->CTC)<=7)
                                {{'B'}}
                            @elseif(intval($companies[$i]->CTC)<=12)
                                {{'A'}}
                            @else
                                {{'A+'}}
                            @endif

                        </td>
                    </tr>
                @endif
            @endfor
            </tbody>

        </table>
        <div class="text-center font-weight-bolder mt-5" style="font-size: large">Other Opportunities</div>
        <table class="mt-3 table table-striped table-hover text-dark" style="font-size:medium">
            <thead>
            <tr>


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

                @if($selected[$i])


                    @continue
                @endif
                @if($maxic=='A+')
                    @continue
                @elseif($maxic=='A' and ($companies[$i]->cat=='B' or $companies[$i]->cat=='A' ))
                    @continue
                @elseif($maxic=='B' and $companies[$i]->cat=='B')
                    @continue



                @endif

                <form action="/student/oncampus/apply/{{$companies[$i]->id}}" method="post">
                    @csrf
                    <tr>


                        <td>{{$companies[$i]->company_name}}</td>
                        <td>{{$companies[$i]->job_role}}</td>
                        <td>{{$companies[$i]->eligibility}}</td>
                        <td>{{$companies[$i]->CTC}}</td>
                        <td>{{$companies[$i]->minimum_CGPA}}</td>
                        <td>  {{date('M',strtotime($companies[$i]->last_date))}} {{date('j',strtotime($companies[$i]->last_date))}}
                            || {{date("h:i A", strtotime($companies[$i]->last_date))}} </td>
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


                            @if($selected[$i])
                                <button class="btn btn-info disabled">
                                    Selected
                                </button>
                            @elseif($students[0]->attempts=='0')
                                <div class="row text-info">
                                    No attempts remain
                                </div>
                            @elseif($applied[$i])
                                <button type="submit" class="btn btn-info" disabled
                                >Applied
                                </button>
                            @elseif($students[0]->attempts=='2')
                                <button type="submit" class="btn btn-info"
                                >Apply now
                                </button>


                            @else
                                <button type="submit" class="btn btn-info"
                                >Apply
                                </button>
                            @endif

                        </td>

                    </tr>
                </form>
            @endfor


            </tbody>
        </table>
    </div>


@endsection
