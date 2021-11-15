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



@endsection

