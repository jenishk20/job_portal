@extends('layouts.app')
@section('content')

    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color: #9C27B0;
            background: linear-gradient(to right, #7851a9 0%, #ffd700 100%);
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204px;
            height: 104px;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
    </style>
    </head>

    <body oncontextmenu='return false' class='snippet-body'>
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-14 col-sm-12 col-md-10 col-lg-9 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>III Cell - Nirma University</strong></h2>
                    <p>Fill all form field to go to next step</p>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform" method="post" enctype="multipart/form-data"
                                  action="/student/profile/confirm">
                            @csrf
                            <!-- progressbar -->
                                <ul id="progressbar">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                    <li id="personal"><strong>Education</strong></li>
                                    <li id="personal"><strong>Social</strong></li>
                                    <li id="confirm"><strong>Finish</strong></li>
                                </ul> <!-- fieldsets -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Personal Information</h2>
                                        <br>
                                        <input type="text" name="rollno" id="rollno" placeholder="Roll No."/>
                                        <input type="text" name="fname" id="fname" placeholder="First Name"/>
                                        <input type="text" name="lname" id="lname" placeholder="Last Name"/>
                                        <div class="row">
                                            <div class="col-9">
                                                <select style="font-family: FontAwesome;" class="list-dt" id="gender"
                                                        name="gender">
                                                    <option style="font-family: FontAwesome;" selected>Gender</option>
                                                    <option style="font-family: FontAwesome;">Male</option>
                                                    <option style="font-family: FontAwesome;">Female</option>
                                                    <option style="font-family: FontAwesome;">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>

                                        <input type="email" name="Pemail" id="Pemail"
                                               value="{{auth()->user()->email}}" placeholder="Primary Email Id"
                                               disabled/>
                                        <input type="email" name="Semail" id="Semail"
                                               placeholder="Secondary Email Id"/>
                                        <input type="tel" name="Wnumber" id="Wnumber" placeholder="Whatsapp Number"/>

                                    </div>
                                    <input type="button" name="next" id="next" class="next action-button"
                                           value="Next Step"/>
                                </fieldset>
                                <!-- 10th  per
                                12th / Diploma per
                                Degree ( b.tech,m.tech,mca)  ( Dropdown )
                                branch of engineering ( dropdown )
                                year of graduation ( 2022,2023 )
                                year of postgraduation


                                Semester Details
                                Active BackLog or no -->
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Education Information</h2>
                                        <br>
                                        <input type="number" name="per10" id="per10" placeholder="10th Percentage"/>
                                        <input type="number" name="per12" id="per12"
                                               placeholder="12th/Diploma Percentage"/>
                                        <div class="row">
                                            <div class="col-6">
                                                <select style="font-family: FontAwesome;" class="list-dt" id="degree"
                                                        name="degree">
                                                    <option style="font-family: FontAwesome;" selected>Degree</option>
                                                    <option style="font-family: FontAwesome;">B.Tech</option>
                                                    <option style="font-family: FontAwesome;">M.Tech</option>
                                                    <option style="font-family: FontAwesome;">MCA</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select style="font-family: FontAwesome;" class="list-dt" id="branch"
                                                        name="branch">
                                                    <option style="font-family: FontAwesome;" selected>Branch</option>
                                                    <option style="font-family: FontAwesome;">CSE</option>
                                                    <option style="font-family: FontAwesome;">IT</option>
                                                    <option style="font-family: FontAwesome;">ECE</option>
                                                    <option style="font-family: FontAwesome;">IC</option>
                                                    <option style="font-family: FontAwesome;">EE</option>
                                                    <option style="font-family: FontAwesome;">ME</option>
                                                    <option style="font-family: FontAwesome;">CL</option>
                                                    <option style="font-family: FontAwesome;">CH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-9">
                                                <select style="font-family: FontAwesome;" class="list-dt"
                                                        id="yearofpass" name="yearofpass">
                                                    <option style="font-family: FontAwesome;" selected>Year of
                                                        graduation
                                                    </option>
                                                    <option style="font-family: FontAwesome;">2021</option>
                                                    <option style="font-family: FontAwesome;">2022</option>
                                                    <option style="font-family: FontAwesome;">2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-9">
                                                <select style="font-family: FontAwesome;" class="list-dt" id="yearofpg"
                                                        name="yearofpg">
                                                    <option style="font-family: FontAwesome;" selected>Year of
                                                        post-graduation
                                                    </option>
                                                    <option style="font-family: FontAwesome;">NA</option>
                                                    <option style="font-family: FontAwesome;">2021</option>
                                                    <option style="font-family: FontAwesome;">2022</option>
                                                    <option style="font-family: FontAwesome;">2023</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <input type="number" name="perug" id="perug"
                                               placeholder="Graduation Percentage"/>
                                        <input type="number" name="cgpaug" id="cgpaug" placeholder="Graduation CGPA"/>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem1spi" id="sem1spi"
                                                       onchange="func(this.value,'sem1per');"
                                                       placeholder="Semester 1 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem1per" id="sem1per"
                                                       placeholder="Semester 1 Percentage" disabled/>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem2spi" id="sem2spi"
                                                       onchange="func(this.value,'sem2per');"
                                                       placeholder="Semester 2 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem2per" id="sem2per"
                                                       placeholder="Semester 2 Percentage" disabled/>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem3spi" id="sem3spi"
                                                       onchange="func(this.value,'sem3per');"
                                                       placeholder="Semester 3 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem3per" id="sem3per"
                                                       placeholder="Semester 3 Percentage" disabled/>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem4spi" id="sem4spi"
                                                       onchange="func(this.value,'sem4per');"
                                                       placeholder="Semester 4 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem4per" id="sem4per"
                                                       placeholder="Semester 4 Percentage" disabled/>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem5spi" id="sem5spi"
                                                       onchange="func(this.value,'sem5per');"
                                                       placeholder="Semester 5 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem5per" id="sem5per"
                                                       placeholder="Semester 5 Percentage" disabled/>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" name="sem6spi" id="sem6spi"
                                                       onchange="func(this.value,'sem6per');"
                                                       placeholder="Semester 6 SPI"/>
                                            </div>
                                            <div class="col-6">
                                                <input type="number" name="sem6per" id="sem6per"
                                                       placeholder="Semester 6 Percentage" disabled/>
                                            </div>

                                        </div>
                                        {{--                                        <div class="row">--}}
                                        {{--                                            <div class="col-6">--}}
                                        {{--                                                <input type="number" name="overall" id="overall"--}}
                                        {{--                                                       placeholder="Overall Percentage"/>--}}
                                        {{--                                            </div>--}}
                                        {{--                                            <div class="col-6">--}}
                                        {{--                                                <input type="number" name="overallcgpa" id="overallvgpa"--}}
                                        {{--                                                       placeholder="Overall CGPA"/>--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        <div class="row">
                                            <div class="col-6">
                                                <select style="font-family: FontAwesome;" class="list-dt" id="backlog"
                                                        name="backlog">
                                                    <option style="font-family: FontAwesome;" selected>Any Backlog
                                                    </option>
                                                    <option style="font-family: FontAwesome;">Yes</option>
                                                    <option style="font-family: FontAwesome;">No</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <select style="font-family: FontAwesome;" class="list-dt"
                                                        id="actbacklog" name="actbacklog">
                                                    <option style="font-family: FontAwesome;" selected>Active Backlog
                                                    </option>
                                                    <option style="font-family: FontAwesome;">NA</option>
                                                    <option style="font-family: FontAwesome;">Yes</option>
                                                    <option style="font-family: FontAwesome;">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="text" name="ifsolved" id="ifsolved"
                                                       placeholder="IF Solved (ex. Machine Learning) / NA "/>
                                            </div>
                                            <div class="col-6">
                                                <input type="text" name="ifactive" id="ifactive"
                                                       placeholder="IF Active (ex. Machine Learning) / NA"/>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/> <input type="button" name="next"
                                                                     class="next action-button"
                                                                     value="Next Step"/>
                                </fieldset>

                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Social Information</h2>
                                        <br>
                                        <input type="text" name="linkedin" id="linkedin" placeholder="LinkedIn ID"/>
                                        <input type="text" name="facebook" id="facebook" placeholder="Facebook ID"/>
                                        <input type="text" name="skype" id="skype" placeholder="Skype ID"/>
                                        <input type="text" name="github" id="github" placeholder="Github ID"/>

                                        <label style="font-family: FontAwesome;">Upload Resume</label>
                                        <br>
                                        <input type="file" name="file"/>


                                        <label style="font-family: FontAwesome;">Declaration -All the above shared
                                            information is true and correct according to my knowledge and belief. In
                                            case any information found incomplete or incorrect I will be responsible
                                            for my own actions</label>

                                        <select style="font-family: FontAwesome;" class="list-dt" id="Declaration"
                                                name="Declaration">
                                            <option style="font-family: FontAwesome;" selected>Agreed
                                            </option>
                                            <option style="font-family: FontAwesome;">No</option>

                                        </select>

                                        <br>
                                    </div>
                                    <input type="button" name="previous" class="previous action-button-previous"
                                           value="Previous"/>
                                    <input type="submit" name="make_payment" class="next action-button"
                                           value="Submit"/>
                                </fieldset>
                                {{--                                <fieldset>--}}
                                {{--                                    <div class="form-card">--}}
                                {{--                                        <h2 class="fs-title text-center">Success !</h2> <br><br>--}}
                                {{--                                        <div class="row justify-content-center">--}}
                                {{--                                            <div class="col-3"><img--}}
                                {{--                                                    src="https://img.icons8.com/color/96/000000/ok--v2.png"--}}
                                {{--                                                    class="fit-image"></div>--}}
                                {{--                                        </div>--}}
                                {{--                                        <br><br>--}}
                                {{--                                        <div class="row justify-content-center">--}}
                                {{--                                            <div class="col-7 text-center">--}}
                                {{--                                                <h5>You Have Successfully Signed Up</h5>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </fieldset>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function func(x, y) {
            document.getElementById(y).value = (x - 0.5) * 10;
        }
    </script>

    <script type='text/javascript'>$(document).ready(function () {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function () {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $(".previous").click(function () {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({opacity: 0}, {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function () {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function () {
                return false;
            })

        });</script>
    </body>
@endsection
