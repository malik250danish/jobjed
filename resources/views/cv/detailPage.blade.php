<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        CV Detail | {{ env('APP_NAME') }}
    </title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <style>
    body {
        overflow-x: hidden;
        /*background:url('../../assets/images/logo-gray1.png') center fixed;*/
        background-size: 100%;
    }

    .logo_position {
        width: 100px !important;
        margin-top: 14px
    }

    .outer {
        border: 2px solid #aeb3af;
        margin: 10px;
        /*background-color: #a8bfcc;*/
    }

    .upper-img {
        height: 100px;
        width: 100px;
        margin: 10px;
        border-radius: 50%;
        border: 1px solid #000
    }

    .cv-head {
        background-color: #4A95CF;
    }

    .cv-sub-head {
        background-color: #4A95CF;
    }

    .row {
        margin: 0;
    }

    .w-100 {
        width: 100%;
    }

    .p-0 {
        padding: 0;
    }

    .b-0 {
        border: 0;
    }

    .main-row {
        margin: 2px;
        display: flex;
    }

    th,
    td {
        padding: 5px;
    }

    .light-pink-bg {
        background-color: #e6e6e6;
    }

    table {
        border: 2px solid #6b6d6c;
    }

    .bl {
        border-left: 2px solid #6b6d6c;
    }

    .br {
        border-right: 2px solid #6b6d6c;
    }

    tr {
        border-bottom: 2px solid #6b6d6c;
    }

    .full-img {
        height: 100%;
        width: 100%;
        margin: auto;
        object-fit: cover;
    }

    .tick {
        width: 18px;
    }

    .bb-0 {
        border-bottom: 0;
    }

    .container {
        padding-left: 5%;
        padding-right: 5%;
    }

    .logo_position {
        width: 236px;
    }

    .w-60 {
        width: 60%
    }

    .w-40 {
        width: 40%
    }

    .w-m {
        width: 100%;
    }

    @media (max-width: 576px) {
        .custom-width {
            width: auto;
        }

        .w-60 {
            width: 100%;

        }

        .w-m {
            width: auto;
        }

        .w-40 {
            width: 100%;
            margin-top: 20px;
        }

        .main-row {
            display: block;
        }

        .logo_position {
            width: 150px;
        }
    }

    @media (max-width: 768px) {
        .custom-width {
            width: auto;
        }

        .main-row {
            display: block;
        }

        .w-60 {
            width: 100%;
        }

        .w-m {
            width: auto;
        }

        .w-40 {
            width: 100%;
            margin-top: 20px;
        }

        .logo_position {
            width: 150px;
        }

    }
    </style>
</head>

<body>
    <div class="container">
        @include('notifications')
        <section class="outer">
            <div class="row">
                <div class="col-md-12">
                    @if($result->pic != null)
                    <img src="{{ url('uploads/profile/'.$result->pic) }}" alt="team-image" class="upper-img">
                    @else
                    <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image">
                    @endif
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" class="logo_position pull-right">
                </div>
            </div>
            <div class="row main-row">
                <div class="p-0 w-60">
                    <table class="w-m">
                        <tr class="cv-head">
                            <th>Personal Detail</th>
                            <th colspan="2" class="text-center">التفاصيل الشخصية</th>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td class="light-pink-bg bl">{{  $result->name }}</td>
                            <td class="bl">الاسم الكامل</td>
                        </tr>
                        <tr>
                            <td>Nationalty</td>
                            <td class="light-pink-bg bl">{{  $result->nationalty }}</td>
                            <td class="bl">اجنسية</td>
                        </tr>
                        <tr>
                            <td>Religion</td>
                            <td class="light-pink-bg bl">
                                {{ \App\Models\User::$religion[$result->religion] }}
                            </td>
                            <td class="bl">الأديان</td>
                        </tr>
                        <tr>
                            <td>DOB</td>
                            <td class="light-pink-bg bl">
                                {{ $result->dob }}
                            </td>
                            <td class="bl">تاريخ الميلاد</td>
                        </tr>
                        <tr>
                            <td>Age</td>
                            <td class="light-pink-bg bl">
                                {{ $result->age }}
                            </td>
                            <td class="bl">العمر</td>
                        </tr>
                        <tr>
                            <td>Place of Birth</td>
                            <td class="light-pink-bg bl">
                                {{ $result->place_birth }}
                            </td>
                            <td class="bl">مكان الميلاد</td>
                        </tr>
                        <tr>
                            <td>Home Address</td>
                            <td class="light-pink-bg bl">
                                {{ $result->home_address }}
                            </td>
                            <td class="bl">عنوان المنزل</td>
                        </tr>
                        <tr>
                            <td>Martial Status</td>
                            <td class="light-pink-bg bl">
                                {{ \App\Models\User::$martialStatus[$result->martial_stauts_id] }}
                            </td>
                            <td class="bl">الحالة الحالة الإجتماعية</td>
                        </tr>
                        <tr>
                            <td>No. of Children</td>
                            <td class="light-pink-bg bl">
                                {{ $result->children }}
                            </td>
                            <td class="bl">عدد الاطفال</td>
                        </tr>
                        <tr>
                            <td>Educational Background</td>
                            <td class="light-pink-bg bl">
                                {{ $result->educational_background }}
                            </td>
                            <td class="bl">خلفية تعليمية</td>
                        </tr>
                        <tr class="cv-sub-head">
                            <th>Previous Work Experience</th>
                            <th colspan="2" class="text-center">خبرة العمل السابق</th>
                        </tr>
                        @if(count($result->previouswork))
                        @foreach($result->previouswork as $work)
                        <tr>
                            <td>{{ $work->country }}</td>
                            <td colspan="2" class="light-pink-bg bl">{{ $work->contract_period.'years' }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="1">No Experience</td>
                            <td colspan="2" class="light-pink-bg bl">بدون خبرة</td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        @endif
                        <tr>
                            <td colspan="3" class="p-0">
                                <table class="w-100 b-0">
                                    <tr class="cv-sub-head">
                                        <th colspan="{{ count($result->workexperience) }}">
                                            <span>Work Experience : </span>
                                            <span class="text-center">خبرة في العمل</span>
                                        </th>
                                    </tr>
                                    <tr class="bb-0">
                                        <td>
                                            @foreach($result->workexperience as $experience)
                                            @if($experience->work_status == 0) @continue @endif
                                            @if(is_null($experience->work)) @continue @endif
                                            <span>
                                                <img class="tick"
                                                    src="{{ url('images/tick.png') }}" />&nbsp;{{ $experience->work }}
                                            </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @endforeach
                                        </td>

                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="p-0">
                                <table class="w-100 b-0">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="cv-sub-head">Languages you can speak or
                                                write:<br>Arabic/ Urdu /English</th>
                                            <th class="text-center cv-sub-head">اللغات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Languages</th>
                                            <th class="bl">Fluent</th>
                                            <th class="bl">Fair</th>
                                            <th class="bl">Poor</th>
                                        </tr>
                                        @foreach($result->languagegrip as $grip)
                                        <tr>
                                            <td>{{ $grip->language }}</td>
                                            <td class="bl">
                                                @if($grip->fluent == 1)
                                                <img class="tick" src="{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                            <td class="bl">
                                                @if($grip->fair == 1)
                                                <img class="tick" src="{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                            <td class="bl">
                                                @if($grip->poor == 1)
                                                <img class="tick" src="{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="p-0 w-40">
                    <table class="w-100">
                        <tr class="cv-head">
                            <th>Postion Applied</th>
                            <th class="text-center bl">{{ $result->occupation->name }}</th>
                            <th class="text-right bl">تم تطبيق الموقع</th>
                        </tr>
                        <tr>
                            <td>Monthly Salary</td>
                            <td class="light-pink-bg text-center bl">{{ $result->monthly_salary }}</td>
                            <td class="text-right bl">راتب شهري</td>
                        </tr>
                        <tr>
                            <td>Contract Period</td>
                            <td class="light-pink-bg text-center bl">{{ $result->contract_period }}</td>
                            <td class="text-right bl">مدة العقد</td>
                        </tr>
                        <tr>
                            <td>Passport Number</td>
                            <td class="light-pink-bg text-center bl">{{ $result->passport_number }}</td>
                            <td class="text-right bl">رقم جواز السفر</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                @if($result->full_pic != null)
                                <img src="{{ url('uploads/profile/'.$result->full_pic) }}" alt="team-image"
                                    class="img-responsive full-img">
                                @else
                                <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image"
                                    class="img-responsive full-img">
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="text-align:justify;">
                                I HEREBY DECLARE THAT THE ABOVE PARTICULARS FURNISHED BY ME ARE TRUE AND ACCURTE THE
                                BEST OF MY KNOWELDGE.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="cv-sub-head">&nbsp;<br>&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Weight:</th>
                            <td class="bl text-center">{{ $result->weight.' '.$result->weight_in }}</td>
                            <td class="bl text-right">وزن</td>
                        </tr>
                        <tr>
                            <th>Height:</th>
                            <td class="bl text-center">{{ $result->height.' '.$result->height_in }}</td>
                            <td class="bl text-right">ارتفاع</td>
                        </tr>
                        <tr>
                            <th colspan="3" class="bb">&nbsp;</th>
                        </tr>
                        <!-- <tr>
                                <th>Complexion: {{ $result->complexion }}</th>
                                <td class="bl">&nbsp;</td>
                                <td class="bl">بشرة</td>
                            </tr> -->
                    </table>
                </div>
            </div>

        </section>
        @if(Auth::check())
        @if(Auth::user()->role_id == 1)
        <div class="row">
            <div class="col-md-12">
                @if($result->status == 0)
                <a href="{{ url('admin/curriculamvitae/changestatus/1/'.$result->id) }}"
                    onClick="javascript: return confirm('Are you sure want to activate this record?');"
                    class="btn btn-warning">Activate</a>

                @else
                <a href="{{ url('admin/curriculamvitae/changestatus/0/'.$result->id) }}"
                    onClick="javascript: return confirm('Are you sure want to inactivate this record?');"
                    class="btn btn-success">Inactivate</a>
                <!-- <a href="{{ url('cvconnect/'.$result->id) }}" onclick = "return confirm('Are you sure you want to connect with this person')">
                                    <button class="btn  btn-primary">Connect</button>
                                </a> -->
                @endif
                <a href="{{ url('admin/curriculamvitae/print/'.base64_encode($result->id)) }}" class="btn btn-info">
                    Print
                </a>
            </div>
        </div>
        @elseif(Auth::user()->role_id == 2)
        <form action="{{ url('cvconnect/'.$result->id) }}" method="GET">
            @csrf
            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_MSj7jeM96LeEaeVDIIqezMrS" data-amount="1000" data-name="JobJed Payment"
                data-label="Connect" data-description="Find a CV with JobJed"
                data-image="{{ asset('assets/images/logo.png') }}" data-locale="auto" data-currency="usd">
            </script>
        </form>
        <!-- <a href="{{ url('cvconnect/'.$result->id) }}" onclick = "return confirm('Are you sure you want to connect with this person')">
                        <button class="btn  btn-primary">Connect</button>
                    </a> -->
        @endif
        @endif
    </div>
</body>

<script type="text/javascript" src="{{ asset('assets/js/frontend/lib.js') }}"></script>

</html>