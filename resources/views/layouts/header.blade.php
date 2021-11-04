@extends('layouts.app')
@section('content')

{{--    <style>--}}
{{--        body {--}}
{{--            background-image: url({{url('images/b8.png')}});--}}
{{--            background-size: cover;--}}
{{--            background-repeat: no-repeat;--}}
{{--            min-height: 700px;--}}
{{--            position: center;--}}


{{--        }--}}
{{--    </style>--}}

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/admin')}}">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/addCompany')}}">Add Company <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/review')}}">Pending Reviews</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/applicants')}}">Applications</a>
                    </li>


                </ul>
            </div>

        </nav>
        @yield('jk')
    </div>



@endsection
