@extends('layouts/default')

{{-- Page title --}}
@section('title')
All CVs
@parent
@stop
@section('header_styles')
<!--page level css starts-->
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
    border-bottom: 2px solid gray;
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
    height: 100px;
    width: 90px;
    border: 2px solid #fff;
    border-radius: 10px;
}

.panel-header {
    padding: 0 15px;
    background: #1685C7;
    color: #fff;
}

.panel-body {
    background: #1685C7;
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

select {
    background-color: #1685C7 !important;
    color: #fff !important;
    border-radius: 15px !important;
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

@media (max-width: 576px) {
    .custom-width {
        /*width: auto;*/
        width: 160px;
        height: 315px;
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
        width: 160px;
        height: 315px;
    }

    .margin-remove {
        margin: unset !important;
    }

    a {
        display: inline-block;
        padding-top: 3.6% !important;
    }
}
</style>
<!--end of page level css-->
@stop


<div class="container candidates-list">
    <section class="section-box-2">
        <div class="container">
            <div class="banner-hero banner-company">
                <div class="block-banner text-center">
                    {{--  <h3 class="wow animate__animated animate__fadeInUp">{!! BaseHelper::clean($shortcode->title) !!}</h3>
                    <div class="font-sm color-text-paragraph-2 mt-10 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">{!! BaseHelper::clean($shortcode->description) !!}</div>  --}}
                    <div class="box-list-character">
                        <ul>
                            @foreach(range('a', 'z') as $char)
                            <li>
                                <a href="javascript:void(0)"
                                    class="keyword @if(request()->query('keyword') == $char) active @endif"
                                    data-keyword="{{ $char }}">{{ $char }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  <form action="{{ route('public.ajax.candidates') }}" class="candidate-filter-form"> --}}
    {{--  <input type="hidden" name="keyword" value="{{ BaseHelper::stringify(request()->query('keyword')) }}">
    <input type="hidden" name="per_page" value="{{ BaseHelper::stringify(request()->query('per_page', 12)) }}">
    <input type="hidden" name="sort_by" value="{{ BaseHelper::stringify(request()->query('sort_by', 'newest')) }}">
    <input type="hidden" name="page" value="{{ BaseHelper::stringify(request()->query('page', 1)) }}"> --}}
    </form>
    <section class="mt-30">
        <div class="container position-relative">
            <div class="content-page">
                {{--  {!! Theme::partial('loading') !!}  --}}
                <div class="box-filters-job">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5">
                            {{--  <span class="text-small text-showing">
                                {{ __('Showing :from-:to of :total candidate(s)', [
                                    'from' => $candidates->firstItem() ?: 0,
                                    'to' => $candidates->lastItem() ?: 0,
                                    'total' => $candidates->total(),
                                ]) }}
                            </span> --}}
                        </div>
                        <div class="col-xl-6 col-lg-7 text-lg-end mt-sm-15">
                            <div class="display-flex2">
                                <div class="box-border mr-10">
                                    <span class="text-sort_by">{{ __('Show') }}:</span>
                                    <div class="dropdown dropdown-sort">
                                        <button class="btn dropdown-toggle" id="dropdownSort" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
                                            <span>12</span>
                                            <i class="fi-rr-angle-small-down"></i>
                                        </button>
                                        <ul class="dropdown-menu js-dropdown-clickable dropdown-menu-light"
                                            aria-labelledby="dropdownSort">
                                            {{--  @foreach(JobBoardHelper::getPerPageParams() as $perPage)
                                                <li>
                                                    <a class="dropdown-item per-page" data-per-page="{{ $perPage }}">{{ $perPage }}</a>
                                            </li>
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </div>
                                {{--  <div class="box-border">
                                    @include(Theme::getThemeNamespace('views.job-board.partials.sort-by-dropdown'))
                                </div>  --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{--  <div class="row candidate-list">
                    @include(Theme::getThemeNamespace('views.job-board.partials.candidate-list'))
                </div>  --}}
            </div>
        </div>
    </section>
</div>

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