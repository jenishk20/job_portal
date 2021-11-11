@extends('layouts.app')

@section('content')
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $(document).on('click', '.add', function (e) {--}}
    {{--                e.preventDefault();--}}
    {{--                var data = {--}}
    {{--                    'content': $('.cont').val()--}}
    {{--                }--}}
    {{--                console.log(data);--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in! Check On-Campus Opportunities') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>


        input:focus {
            outline: 0px !important;
            box-shadow: none !important;
        }

        .card-text {
            border: 2px solid #ddd;
            border-radius: 8px;
        }
    </style>
    <form method="post" action="/home">
        @csrf
        <div class="container mt-4">
            <div class="card mx-auto" style="max-width:800px">
                <div class="card-header">
                    Discussion Forum

                </div>
                <div class="card-body p-4 mb-3" style="height: 500px; overflow: auto;">
                    @for($i=0;$i<count($sql);$i++)

                        @if($sql[$i]->user_id==auth()->user()->id)



                            <div class="d-flex align-items-baseline text-end justify-content-end mb-4">
                                <div class="pe-2">

                                    <div>
                                        <div class="card card-text d-inline-block p-2 px-3 m-1">
                                            <div class="text-black-50"
                                                 style="font-size: 0.9vw">
                                                @for($j=0;$j<count($user);$j++)
                                                    @if($user[$j]->email==env('WEBSITE_OWNER_EMAIL')and $user[$j]->id==$sql[$i]->user_id )
                                                        {{('III Cell Admin')}}
                                                        @break
                                                    @endif
                                                    @if($user[$j]->id==$sql[$i]->user_id)
                                                        {{$user[$j]->name}}
                                                    @endif
                                                @endfor

                                            </div>
                                            <div>
                                                {{$sql[$i]->content}}
                                            </div>
                                            <div>
                                                @if(date('d/M/y',strtotime($sql[$i]->created_at))==date('d/M/y'))

                                                    <span
                                                        class="text-black-50 font-weight-bold" style="font-size: 0.9vw">{{'Today'}} | {{date("h:i A", strtotime($sql[$i]->created_at))}}</span>
                                                @else
                                                    <span
                                                        class="text-black-50 font-weight-bold" style="font-size: 0.9vw">{{date("h:i A", strtotime($sql[$i]->created_at))}} | {{date('M',strtotime($sql[$i]->created_at))}}
                                                        {{date('j',strtotime($sql[$i]->created_at))}}</span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        @else
                            <div class="d-flex align-items-baseline mb-4">

                                <div class="pe-2">

                                    <div>

                                        <div class="card card-text d-inline-block p-2 px-3 m-1">
                                            <div class="text-black-50"
                                                 style="font-size: 0.9vw">
                                                @for($j=0;$j<count($user);$j++)
                                                    @if($user[$j]->email==env('WEBSITE_OWNER_EMAIL') and $user[$j]->id==$sql[$i]->user_id  )
                                                        {{('III Cell Admin')}}
                                                        @break
                                                    @endif
                                                    @if($user[$j]->id==$sql[$i]->user_id)
                                                        {{$user[$j]->name}}
                                                    @endif
                                                @endfor
                                                {{--                                                {{$user[0][$sql[$i]->user_id]->name}}</div>--}}
                                            </div>
                                            <div>
                                                {{$sql[$i]->content}}
                                            </div>
                                            <div>
                                                @if(date('d/M/y',strtotime($sql[$i]->created_at))==date('d/M/y'))

                                                    <span
                                                        class="text-black-50 font-weight-bold" style="font-size: 0.9vw">{{'Today'}} | {{date("h:i A", strtotime($sql[$i]->created_at))}}</span>
                                                @else
                                                    <span
                                                        class="text-black-50 font-weight-bold" style="font-size: 0.9vw">{{date("h:i A", strtotime($sql[$i]->created_at))}} | {{date('M',strtotime($sql[$i]->created_at))}}
                                                        {{date('j',strtotime($sql[$i]->created_at))}}</span>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor


                    <div class="card-footer bg-white position-absolute bottom-0" style="width: 750px">
                        <div class="input-group" style="z-index:11">
                            <input id="content" name="content" type="text"
                                   class="form-control cont" required="required">
                            {{--                            <input type="text" id='content' class="form-control border-0" placeholder="Write a message...">--}}

                            <button class="btn btn-outline-primary add" type="submit">
                                Send
                            </button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

