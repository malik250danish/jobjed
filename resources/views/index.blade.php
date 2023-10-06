@extends('layouts/default')

{{-- Page title --}}
@section('title')
All CV's
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css starts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/tabbular.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/jquery.circliful.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/owl_carousel/css/owl.theme.css') }}">
<link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/timeline1.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/price.css') }}">
<style>
body {
    /*background:url('assets/images/logo-gray1.png') no-repeat center fixed;*/
    background-size: 100%;
}

.pd-10 {
    padding: 20px;
}

.border {
    border: 2px solid gray;
    border-radius: 5px;
}

.border-bottom {
    border-bottom: 2px solid #01BC8C;
}

.border-left {
    border-left: 2px solid gray;
}

.border-right {
    border-right: 2px solid gray;
}

.border-top {
    border-top: 2px solid gray;
}

.cv-img {
    margin-left: auto;
    margin-right: auto;
    height: 170px;
    width: 170px;
    object-fit: cover;
    border-radius: 50%;
    border: 1px solid #fff;

}

.panel-header {
    padding: 0 15px;

}

.panel-body {
    background: #000000c2;
    color: #fff;

}

.pl-0 {
    padding-left: 0;
}

.text-black {
    color: #000;
}

.section-top-space {
    margin-top: 100px;
}

.tab {
    padding: 2px 15px 2px;
    background: #1685C7;
    color: white;
    border-radius: 5px;
}

.w-100 {
    width: 100%;
}

.panel {
    box-shadow: 2px 2px 4px 3px #b1acac;
}

.custom-width {
    width: 210px;
    margin: 10px;
    float: left;
}

.panel-footer {
    background: #fff;
}

.bg-white {
    background: #fff;
}

.modal-content {
    color: #333;
    text-align: left;
}

.ml {
    margin-left: 2px;
}

.tab-content label {
    padding: 0;
}

.tab-content select {
    margin: 0;
}

.tick {
    width: 20px;
}



.round {
    border-radius: 15px !important;
}

.p-0 {
    padding: 0 !important;
}

.pl-10 {
    padding-left: 10px;
}

.purchae-hed {
    font-size: 18px;
}

.mt-0 {
    margin-top: 0 !important;
}

.mb-0 {
    margin-bottom: 0 !important;
}

.purchas-main {
    padding: 0 !important;
}

.bg-red {
    background: #ed4c49;
}

.bg-green {
    background: #1ec81e;
}

.imgBanner {
    width: 100%;
    height: auto;
}

@media (max-width: 576px) {
    .custom-width {
        /*width: auto;*/
        width: 100%;
        height: 100%;

    }

    .margin-remove {
        margin: unset !important;
    }

    a {
        display: inline-block;
        padding-top: 3.6% !important;
    }
}

@media (max-width: 768px) {
    .custom-width {
        /*width: auto;*/
        width: 100%;
        height: 100%;

    }

    .margin-remove {
        margin: unset !important;
    }

    a {
        display: inline-block;
        padding-top: 3.6% !important;
    }
}


#bar {
    display: none
}

.viewBTn {
    width: 100%;
    padding-inline: 5rem
}

.aboutHead {
    margin-top: 40px;
    margin-bottom: 40px;
    font-weight: bold;
}

/* Style the footer */
.footer {
    background-color: #333;
    color: #fff;
    padding: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

/* Style the footer columns */
.footer-column {
    flex-basis: calc(33.3333% - 20px);
    text-align: center;
}

/* Style the logo */
.footer-column img {
    max-width: 100%;
    height: auto;
}

/* Style the links */
.footer-column ul {
    list-style: none;
    padding: 0;
}

.footer-column ul li {
    margin-bottom: 10px;
}

.footer-column ul li a {
    text-decoration: none;
    color: #fff;
    display: block;
    transition: color 0.3s;
}

.footer-column ul li a:hover {
    color: #ffd700;
}

.footerlogo {
    height: 100px !important;
    width: 100px !important;
}

.footerThird {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

/* Add responsive styles */
@media screen and (max-width: 768px) {
    .footer {
        flex-direction: column;
        text-align: center;
    }

    .footer-column {
        flex-basis: 100%;
        margin-bottom: 20px;
    }

    .footerThird {
        margin-top: 50px !important;
    }

    .footerThird p {
        margin-top: 20px;
    }
}

.whyHead {
    font-weight: bold;
}
</style>
<!--end of page level css-->
@stop

{{-- slider --}}
@section('top')
@include('notifications')
<!--Carousel Start -->
<div id="owl-demo" class="owl-carousel owl-theme">
    <!-- <div class="item"><img src="{{ asset('assets/images/k1.jpeg') }}" alt="slider-image"></div> -->
    <div class="item"><img src="{{ asset('assets/images/ow1.jpeg') }}" alt="slider-image"></div>
    <div class="item"><img src="{{ asset('assets/images/ow2.jpg') }}" alt="slider-image"></div>

</div>
<!-- //Carousel End -->
@stop

{{-- content --}}
@section('content')

<section class="purchas-main">
    <div class="container ">
        <div class="text-center my-3 " data-wow-duration="3s">
            <h3 class="aboutHead "><span class=" border-bottom border-danger ">About</span></h3>

        </div>
        <div class="row">

            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti voluptatem, porro asperiores, eaque
                    voluptas possimus obcaecati eius repudiandae architecto illum veritatis itaque dolore, laudantium
                    nesciunt quas perspiciatis hic nulla vitae?Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Commodi autem, quibusdam ex, expedita consequuntur voluptate obcaecati nemo cum porro corporis vero
                    necessitatibus possimus aspernatur distinctio corrupti numquam optio, sequi voluptatem?Lorem ipsum
                    dolor sit amet consectetur adipisicing elit. Aliquid eveniet, veritatis dolore ipsum distinctio
                    doloribus harum, magni sequi ratione tempora non numquam est molestiae placeat perspiciatis quia et
                    eaque ducimus?Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam error pariatur esse
                    qui ab! Libero excepturi odit illo nobis repellendus repudiandae voluptates hic deleniti, architecto
                    ipsa ad! Maiores, veritatis ex?Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora,
                    veniam omnis ex alias voluptatem molestias ullam distinctio expedita beatae vero dolorem, facere
                    dolorum optio eius laborum nesciunt neque adipisci esse?</p>
            </div>
            <div class="col-md-6">
                <img class="imgAbout" src="./assets/images/about.jpeg" alt="">
            </div>
        </div>

        <div class="container">
            <div class="row section-top-space">
                <div class="wow flash" data-wow-duration="3s">
                    <h3 class="text-center whyHead"><span class="border-bottom border-danger ">Latest CV's</span></h3>
                    @if(Auth::check())
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row margin-remove sBox">
                        <div class="col-md-2">
                            <strong class="pl-10">Country</strong>
                            <select class="form-control" id="country">
                                <option value="0">All</option>
                                @foreach($activeCountries as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <strong class="pl-10">Occupation</strong>
                            <select class="form-control" id="occupation">
                                <option value="0">All</option>
                                @foreach($activeOcuupations as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <strong class="pl-10">Age</strong>
                            <select class="form-control" id="age">
                                @foreach(\App\Models\User::$agelimit as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <strong class="pl-10">Religion</strong>
                            <select class="form-control" id="religion">
                                <option value="0">All</option>
                                <option value="1">Muslim</option>
                                <option value="2">Non Muslim</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <strong class="pl-10">&nbsp;</strong>
                            <button class="btn btn-default round form-control"
                                onClick="return get_cvs()">Search</button>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-md-12">&nbsp;</div>
                </div>
                <div class="row margin-remove">
                    <div class="col-md-12">
                        <h5>Please select your required CV</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 my-2">
                        <div class="card  cvCard ">
                            <div class="row px-2">
                                <div class="col-12 col-lg-6 ">
                                    <div class="imgDiv ">
                                        <img class="cvImg" src="./assets/images/c2.jpg" alt="cv image">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="headerText text-success ">SA 0954</div>
                                    <div class="">
                                        <p>Name: Mark</p>
                                        <p>Agw: 30</p>
                                        <p>Religion:Christian</p>
                                        <p>Country: USA</p>
                                    </div>
                                    <div class="mt-2">
                                        <button class="btn w-100 btn-success btnView"><i class="fas fa-eye"></i> View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vestibulizzle Section Start -->
                <div id="cvs">
                    @php
                    $number = 1;
                    @endphp
                    @foreach($results as $result)
                    @php
                    $number++;
                    @endphp
                    <div class="custom-width">

                        <div class="panel panel-default text-center">

                            <div class="panel-header">

                                <span style="font-size: 24px;">SA {{ sprintf('%04d',$result->id) }}</span>
                                <!-- <span class="text-white" style="font-size: 24px;">{{ ucfirst($result->occupation->name) }}</span> -->

                            </div>

                            <div class="panel-body text-start">

                                <div>

                                    @if($result->pic != null)
                                    <img src="{{ url('uploads/profile/'.$result->pic) }}" alt="100x100"
                                        class="cv-img img-responsive rounded-circle">
                                    @else
                                    <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image"
                                        class="img-responsive cv-img">
                                    @endif

                                </div>

                                <h5 class="success text-white" style="text-align:start;">
                                    {{ substr_replace($result->name, "...", 15) }}</h5>

                                <div style="display: flex;justify-content: start; padding:16px 0px">

                                    <ul class="text-left pl-0 text-white">

                                        <li>Age: {{ $result->age }}</li>

                                        <li>
                                            Country:
                                            @if(!is_null($result->national_country_id))
                                            {{ \App\Models\Country::find($result->national_country_id)->name }}
                                            @else
                                            &nbsp;
                                            @endif
                                        </li>

                                        <li>Religion: {{ \App\Models\User::$religion[$result->religion] }}</li>

                                        <!-- <li>{{ $result->previouswork }}</li> -->

                                    </ul>

                                </div>
                                @if($result->connect && $result->connect->status == 0)
                                <span class="tab bg-red">Processing</span>
                                @elseif($result->connect && $result->connect->status == 1)
                                <span class="tab bg-green">Accepted</span>
                                @else

                                <a href="{{ url('detail/'.base64_encode($result->id)) }}" target="_blank"
                                    class="tab bg-white viewBTn"><i class="fas fa-eye"></i> View</a>

                                @endif



                            </div>

                        </div>

                    </div>

                    @endforeach
                </div>
                <div class="row" style="clear: both;">
                    <div class="col-md-12 text-center">
                        @if(Auth::check())
                        <a href="{{ url('all') }}" class="btn btn-success text-white ">More CV's</a>
                        @else
                        <a href="{{ url('/') }}" class="btn btn-success text-white">More CV's</a>
                        @endif

                    </div>
                </div>
            </div>


        </div>
        <!-- Service Section Start-->
        <div class="row section-top-space">
            <!-- Responsive Section Start -->
            <div class="text-center">
                <h3 class="whyHead"><span class="border-bottom border-danger  ">Why Choose Us</span></h3>
            </div>
            <div class="col-sm-6 col-md-3 wow bounceInLeft" data-wow-duration="3.5s">
                <div class="box">
                    <div class="box-icon">
                        <i class="livicon icon" data-name="desktop" data-size="55" data-loop="true" data-c="#01bc8c"
                            data-hc="#01bc8c"></i>
                    </div>
                    <div class="info">
                        <h3 class="success text-center">Cost effective</h3>
                        <p><br>Save on huge hiring costs by simply outsourcing recruitment process to human resource
                            consulting professionals. We will recruit best professionals in your budget.</p>
                        <!-- <div class="text-right primary"><a href="#">Read more</a></div> -->
                    </div>
                </div>
            </div>
            <!-- //Responsive Section End -->
            <!-- Easy to Use Section Start -->
            <div class="col-sm-6 col-md-3 wow bounceInDown" data-wow-duration="3s" data-wow-delay="0.4s">
                <!-- Box Start -->
                <div class="box">
                    <div class="box-icon box-icon1">
                        <i class="livicon icon1" data-name="gears" data-size="55" data-loop="true" data-c="#418bca"
                            data-hc="#418bca"></i>
                    </div>
                    <div class="info">
                        <h3 class="primary text-center">Professional Recruiters</h3>
                        <p>Our expert 3rd party recruitment consultants are well connected with industry professionals
                            and
                            hence are able to recruit the best candidate for any role, location and industry. </p>
                        <!-- <div class="text-right primary"><a href="#">Read more</a></div> -->
                    </div>
                </div>
            </div>
            <!-- //Easy to Use Section End -->
            <!-- Clean Design Section Start -->
            <div class="col-sm-6 col-md-3 wow bounceInUp" data-wow-duration="3s" data-wow-delay="0.8s">
                <div class="box">
                    <div class="box-icon box-icon2">
                        <i class="livicon icon1" data-name="doc-portrait" data-size="55" data-loop="true"
                            data-c="#f89a14" data-hc="#f89a14"></i>
                    </div>
                    <div class="info">
                        <h3 class="warning text-center">Time Saving</h3>
                        <p><br>Save your time and resources simply by skipping on an in-house HR department. Give us a
                            timeline and we'll find you the ideal human resource for you desired job role.</p>
                        <!-- <div class="text-right primary"><a href="#">Read more</a></div> -->
                    </div>
                </div>
            </div>
            <!-- //Clean Design Section End -->
            <!-- 20+ Page Section Start -->
            <div class="col-sm-6 col-md-3 wow bounceInRight" data-wow-duration="5s" data-wow-delay="1.2s">
                <div class="box">
                    <div class="box-icon box-icon3">
                        <i class="livicon icon1" data-name="folder-open" data-size="55" data-loop="true"
                            data-c="#FFD43C" data-hc="#FFD43C"></i>
                    </div>
                    <div class="info">
                        <h3 class="yellow text-center">Manpower Staffing</h3>
                        <p>We are one of the best International manpower supply company in Pakistan for Saudi Arabia. We
                            serve as a recruitment company in Pakistan for KSA, for all major industries including oil
                            and
                            gas and construction.</p>
                        <!-- <div class="text-right primary"><a href="#">Read more</a></div> -->
                    </div>
                </div>
            </div>
            <!-- //20+ Page Section End -->
        </div>
        <!-- //Services Section End -->
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">



            </div>
            <!-- <div class="col-md-5 col-sm-5 col-xs-12"><a href="#" class="btn btn-primary purchase-styl pull-right">Purchase now</a></div> -->
        </div>
    </div>
</section>



<div class="container-fluid bgCon">
    <div class="Create">
        <h2>WE ARE HIRING!</h2>
        <button class="btn btnCreate">Create account</button>
    </div>
</div>
<div class="container">


    <div class="row section-top-space">
        <!-- Accordions Start -->
        <div class="text-center wow flash" data-wow-duration="3s">
            <h3 class=" whyHead"><span class=" border-bottom border-danger ">Process Steps</span></h3>
            <label class=" text-center"> Following are the steps for the complete recuritment process.</label>
        </div>
        <!-- Accordions End -->
        <div class="col-md-12 col-sm-12 wow slideInLeft" data-wow-duration="1.5s">

            <ul class="timeline">

                <!-- Item 1 -->

                <li>

                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">

                        <div class="flag-wrapper">

                            <span class="hexa"></span>

                            <span class="flag">Upload CV.</span>

                            <span class="time-wrapper"><span class="time">Step 1</span></span>

                        </div>

                        <div class="desc">You can upload your CV directly from this website or provide your CV to admin.
                        </div>

                    </div>

                </li>



                <!-- Item 2 -->

                <li>

                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">

                        <div class="flag-wrapper">

                            <span class="hexa"></span>

                            <span class="flag">Locate by Employer.</span>

                            <span class="time-wrapper"><span class="time">Step 2</span></span>

                        </div>

                        <div class="desc">Your CV will be filtered out by employer search on this website.</div>

                    </div>

                </li>



                <!-- Item 3 -->

                <li>

                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">

                        <div class="flag-wrapper">

                            <span class="hexa"></span>

                            <span class="flag">Admin will Connect you.</span>

                            <span class="time-wrapper"><span class="time">Step 3</span></span>

                        </div>

                        <div class="desc">The website admin will connect you for further detail.</div>

                    </div>

                </li>



                <li>

                    <div class="direction-l wow slideInLeft" data-wow-duration="3.5s">

                        <div class="flag-wrapper">

                            <span class="hexa"></span>

                            <span class="flag">Admin will Connect Employer.</span>

                            <span class="time-wrapper"><span class="time">Step 4</span></span>

                        </div>

                        <div class="desc">The website admin Will Contact employeer.</div>

                    </div>

                </li>



                <!-- Item 5 -->

                <li>

                    <div class="direction-r wow slideInRight" data-wow-duration="3.5s">

                        <div class="flag-wrapper">

                            <span class="hexa"></span>

                            <span class="flag">Track CV.</span>

                            <span class="time-wrapper"><span class="time">Step 5</span></span>

                        </div>

                        <div class="desc">Employer can track there interested cv processing from the dashboard.</div>

                    </div>

                </li>

            </ul>

        </div>

    </div>
    <!-- <div class="row section-top-space">
            <div class="text-center wow flash" data-wow-duration="3s">
                <h3 class="border-primary"><span class="heading_border bg-primary">FAQ's</span></h3>
                <label class=" text-center"> Please review the following generaly ask questions.</label>
            </div>
            <div class="col-md-12 col-sm-12 wow slideInRight" data-wow-duration="3s">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <span class=" glyphicon glyphicon-minus text-white"></span>
                                <span class="text-white">Why Choose Us</span></a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <p>In 1972 a crack commando unit was sent to prison by a military court for a crime they didn't commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Here's the story of a man named Brady who was busy with three boys of his own. One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated? Till the one day when the lady met this fellow and they knew it was much more than a hunch. Baby if you've ever wondered.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <span class=" glyphicon glyphicon-plus text-white"></span>
                                <span class="text-white">Why Choose Us</span>
                            </a>
                        </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    In 1972 a crack commando unit was sent to prison by a military court for a crime they didn't commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Here's the story of a man named Brady who was busy with three boys of his own. One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated? Till the one day when the lady met this fellow and they knew it was much more than a hunch. Baby if you've ever wondered.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading text_bg">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <span class=" glyphicon glyphicon-plus text-white"></span>
                                <span class="text-white">Why Choose Us</span></a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <p>
                                    In 1972 a crack commando unit was sent to prison by a military court for a crime they didn't commit. These men promptly escaped from a maximum security stockade to the Los Angeles underground. Believe it or not I'm walking on air. I never thought I could feel so free. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Come and knock on our door. We've been waiting for you. Where the kisses are hers and hers and his. Three's company too. Flying away on a wing and a prayer. Who could it be? Believe it or not its just me. Here's the story of a man named Brady who was busy with three boys of his own. One two three four five six seven eight Sclemeel schlemazel hasenfeffer incorporated? Till the one day when the lady met this fellow and they knew it was much more than a hunch. Baby if you've ever wondered.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</div>

<!-- //Container End -->
<!-- faq section -->
<div class="container faqCon">
    <div class="text-center wow flash" data-wow-duration="3s">
        <h3 class=" whyHead"><span class=" border-bottom border-danger ">FAQs</span></h3>
        <label class=" text-center"> Following are the some frequently asked questions.</label>
    </div>
    <div id="accordion" class="py-5">


        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card-header p-0 border-0 bg-success text-white" id="heading-241">
                <button class="btn btn-link accordion-title border-0 collapsed w-100 text-white" data-toggle="collapse"
                    data-target="#collapse-241" aria-expanded="false" aria-controls="#collapse-241"><i
                        class="fas fa-minus   h-100 iconP"></i>How
                    are owners’ concerns handled? </button>
            </div>
            <div id="collapse-241" class="collapse " aria-labelledby="heading-241" data-parent="#accordion">
                <div class="card-body accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card-header p-0 border-0 bg-success" id="heading-242">
                <button class="btn btn-link accordion-title border-0 collapsed w-100 text-white" data-toggle="collapse"
                    data-target="#collapse-242" aria-expanded="false" aria-controls="#collapse-242"><i
                        class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100 iconP"></i>How
                    do I get repairs completed to my unit? </button>
            </div>
            <div id="collapse-242" class="collapse " aria-labelledby="heading-242" data-parent="#accordion">
                <div class="card-body accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card-header p-0 border-0 bg-success" id="heading-243">
                <button class="btn btn-link accordion-title border-0 collapsed w-100 text-white" data-toggle="collapse"
                    data-target="#collapse-243" aria-expanded="false" aria-controls="#collapse-243"><i
                        class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100 iconP"></i>What
                    are the duties of a property manager? </button>
            </div>
            <div id="collapse-243" class="collapse " aria-labelledby="heading-243" data-parent="#accordion">
                <div class="card-body accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card-header p-0 border-0 bg-success" id="heading-244">
                <button class="btn btn-link accordion-title border-0 collapsed w-100 text-white" data-toggle="collapse"
                    data-target="#collapse-244" aria-expanded="false" aria-controls="#collapse-244"><i
                        class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100 iconP"></i>Do
                    we receive copies of all invoices paid? </button>
            </div>
            <div id="collapse-244" class="collapse " aria-labelledby="heading-244" data-parent="#accordion">
                <div class="card-body accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <div class="card border-0 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <div class="card-header p-0 border-0 bg-success" id="heading-245">
                <button class="btn btn-link accordion-title border-0 collapsed w-100 text-white" data-toggle="collapse"
                    data-target="#collapse-245" aria-expanded="false" aria-controls="#collapse-245"><i
                        class="fas fa-minus text-center d-flex align-items-center justify-content-center h-100 iconP"></i>How
                    are arrears handled? </button>
            </div>
            <div id="collapse-245" class="collapse " aria-labelledby="heading-245" data-parent="#accordion">
                <div class="card-body accordion-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- footer content by ikram  --}}

<div class="">


    <footer class="footer">
        <div class="footer-column">
            <img class="footerlogo" src="{{ asset('assets/images/logo.png') }}" alt="slider-image">
        </div>
        <div class="footer-column">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-column footerThird">
            <h3>Contact Us</h3>
            <p>123 Main St, City</p>
            <p>Email: example@example.com</p>
            <p>Phone: +1 (123) 456-7890</p>
        </div>
    </footer>

</div>

{{-- footer content by ikram  --}}

<input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
@stop

{{-- footer scripts --}}
@section('footer_scripts')
<!-- page level js starts-->
<script type="text/javascript" src="{{ asset('assets/js/frontend/jquery.circliful.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/wow/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/owl_carousel/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/frontend/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js')}}"></script>
<script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>

<script>
jQuery(document).ready(function() {

    new WOW().init();

});

function get_all_cvs() {
    var age = 0;
    var country = 0;
    var occupation = 0;
    var religion = 0;

    jQuery('#cvs').css('opacity', '.2');

    var route = "{{ url('getcvs') }}";

    var token = $('#token').val();

    $.ajax({

        url: route,

        headers: {
            'X-CSRF-TOKEN': token
        },

        type: 'POST',

        //dataType: 'json',

        data: {
            'occupation': occupation,
            'country': country,
            'religion': religion,
            'age': age
        },

        success: function(obj, status) {

            if (obj.st == 'ok') {
                $("#country").val(0).change();
                $("#occupation").val(0).change();
                $("#age").val(0).change();
                jQuery('#cvs').css('opacity', '1');
                jQuery('#cvs').html(obj.html);
                //jQuery('#'+filter+'_'+id).addClass('active');

            } else if (obj.st == 'err') {
                window.location = "{{ url('login') }}";
            }

        }

    });

    return false;
}

function get_cvs() {

    var age = jQuery('#age').val();
    var country = jQuery('#country').val();
    var occupation = jQuery('#occupation').val();
    var religion = jQuery('#religion').val();

    jQuery('#cvs').css('opacity', '.2');

    var route = "{{ url('getcvs') }}";

    var token = $('#token').val();

    $.ajax({

        url: route,

        headers: {
            'X-CSRF-TOKEN': token
        },

        type: 'POST',

        //dataType: 'json',

        data: {
            'occupation': occupation,
            'religion': religion,
            'country': country,
            'age': age
        },

        success: function(obj, status) {

            if (obj.st == 'ok') {
                jQuery('#cvs').css('opacity', '1');
                jQuery('#cvs').html(obj.html);
                //jQuery('#'+filter+'_'+id).addClass('active');

            } else if (obj.st == 'err') {
                window.location = "{{ url('login') }}";
            }

        }

    });

    return false;
}
</script>
<!--page level js ends-->
@stop