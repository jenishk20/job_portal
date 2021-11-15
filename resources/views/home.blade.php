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

                        {{ __('You are logged in successfully! ')}}
                        <br>
                        <p class="mt-3" style="font-weight: bolder">
                            You are requested to read the placement
                            policy first and then apply to the
                            opportunities
                        </p>

                        <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#myModal">Preview
                        </button>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">
                                    <div class="modal-body">
                                        {{--                                        {{var_dump(  $companies[$i]->job_description)}}--}}
                                        <embed src="/assets/policy.pdf" frameborder="0"
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

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

