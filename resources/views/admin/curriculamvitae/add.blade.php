@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Curriculam Vitae
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/search.select.css') }}"  />
    <style>
        .row{
            margin-bottom: 10px;
        }
        .intl-tel-input ,.allow-dropdown{
            width: 100%;
        }
        img {
            display: block;
            max-width: 100%;
        }
        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
    </style>
    <!-- end of page level css-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Curriculam Vitae</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('admin') }}">
                <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Curriculam Vitae</a>
        </li>
        <li class="active">Add</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <form method="POST" action="{{ url('admin/curriculamvitae/add') }}" id="myForm" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <label>Passport Number</label>
                        <input type="text" name="passport_number" id="passport_number" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}" />
                    <div class="col-md-6">
                        <label>Full Name</label>
                        <input type="text" name="name" value="" placeholder="Name Here" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="hidden" id = "countryCode" name="countryCode" value="">
                        <input id="phone" type="tel" name="phone" value="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Email</label>
                        <input type="email" name="email" value="" placeholder="Email Here" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Home Address</label>
                        <textarea name="home_address" class="form-control" rows="3" required></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Place of Birth</label>
                        <input type="text" name="place_birth" value="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Religion</label>
                        <select class="form-control selectpicker" name="religion" >
                            @foreach(\App\Models\User::$religion as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Children</label>
                        <input type="number" name="children" value="" placeholder="2" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Nationalty</label>
                        {!! Form::select('national_country_id', \App\Models\Country::selectbox(),null,['class' => 'form-control','data-live-search'=>'true']) !!}
                    </div>
                    <div class="col-md-6">
                        <label>Occupations</label>
                        {!! Form::select('occupation_id', \App\Models\Occupations::selectbox(),null,['class' => 'form-control','onchange' => 'return load_work_experience()','id' => 'occupation_id','data-live-search'=>'true']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Martial Staus</label>
                        <select class="form-control" name="martial_stauts_id">
                            @foreach(\App\Models\User::$martialStatus as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Date of Birth</label>
                        <input type="date" name="dob" value="" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Age(Years)</label>
                        <input type="number" name="age" value="" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Height</label>
                        <input type="number" step=".01" name="height" value="" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Height In</label>
                        <select class="form-control" name="height_in">
                            @foreach(\App\Models\User::$heightin as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Weight</label>
                        <input type="text" name="weight" value="" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Weight in</label>
                        <select class="form-control" name="weight_in">
                            @foreach(\App\Models\User::$weightin as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- <div class="col-md-4">
                        <label>Complexion(Color)</label>
                        <input type="text" name="complexion" value="" class="form-control" required>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Educagtional Background</label>
                        <textarea name="educational_background" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label>Monthly Salary</label>
                        <input type="number" name="monthly_salary" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label>Contract Period (Years)</label>
                        <input type="number" name="contract_period" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Work Experience</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" id="workhold">
                        @foreach(\App\Models\Occupations::where('enable',1)->first()->workhold as $val)
                            <div class="col-md-4">
                                <input type="checkbox" value="{{ $val }}" name="work_experience[]">&nbsp;&nbsp;&nbsp;{{ $val }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Previous Work Experience (Abroad)</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <input type="radio" checked name="previous_employment_dec" value="1" onClick="return previous_employment()">&nbsp;&nbsp;&nbsp;Experience
                    </div>
                    <div class="col-md-6">
                        <input type="radio" name="previous_employment_dec" value="0" onClick="return previous_employment()">&nbsp;&nbsp;&nbsp;No Experience
                    </div>
                </div>
                <div id="previous_employment">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Country</label>
                            {!! Form::select('previous_country_id[]', \App\Models\Country::selectbox(),null,['class' => 'form-control']) !!}
                        </div>
                        <div class="col-md-6">
                            <label>Contract(Years)</label>
                            <input type="number" class="form-control" name="previous_contract[]">
                        </div>
                    </div>
                </div>
                <div class="row" id="previous_employment_btn">
                    <div class="col-md-12">
                        <button class="btn btn-primary" onClick="return previous_employment_add_more()">Add More</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>Languages Grip</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"><strong>Languages</strong></div>
                    <div class="col-md-3"><strong>Fluent</strong></div>
                    <div class="col-md-3"><strong>Fair</strong></div>
                    <div class="col-md-3"><strong>Poor</strong></div>
                </div>
                @foreach(\App\Models\User::$languages as $key => $val)
                    <div class="row">
                        <div class="col-md-3">{{ $val }}</div>
                        <div class="col-md-3">
                            <input type="radio" name="langauge_grip[{{$key}}]" value="fluent">
                        </div>
                        <div class="col-md-3">
                            <input type="radio" name="langauge_grip[{{$key}}]" value="fair">
                        </div>
                        <div class="col-md-3">
                            <input type="radio" checked name="langauge_grip[{{$key}}]" value="poor">
                        </div>
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-md-12">
                        <label>Upload Profile Image</label>
                        <input type="hidden" id="cropper_top_img" name="cropper_top_img">
                        <input type="file" class="form-control image" name="pic">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Upload Full Image</label>
                        <input type="file" class="form-control" name="full_pic">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Upload CV</label>
                        <input type="file" class="form-control" name="cv">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label>Other Info</label>
                        <textarea name="other_info" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn btn-primary" id = "my-btn" value="Save"> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Image Model -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Image Cropper</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Crop</button>
            </div>
        </div>
    </div>
</div>
<!--Image Model -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        $('select').selectpicker();

        function previous_employment(){
            var previous_employment_dec = $('input[name="previous_employment_dec"]:checked').val();
            if (previous_employment_dec == 1){
                jQuery('#previous_employment').removeClass('hide');
                jQuery('#previous_employment_btn').removeClass('hide');
            } else {
                jQuery('#previous_employment').addClass('hide');
                jQuery('#previous_employment_btn').addClass('hide');
            }
        }
        var addMore = 1000;
        function remove_add_more_field(id){
            jQuery('#'+id).html('');
            return false;
        }
        function previous_employment_add_more(){
            var route = "{{ url('add_more_previous_employment') }}";

            var token =$("#token").val();

            $.ajax({

                url: route,

                headers: {'X-CSRF-TOKEN': token},

                type: 'POST',

                 //dataType: 'json',

                data: {
                    'addMore' : addMore
                },

                success: function(obj, status) { 

                    if(obj.st == 'ok'){
                        jQuery('#previous_employment').append(obj.html);

                        addMore = addMore +1;

                    }

                }

            });

            return false;
        }
        function load_work_experience(){
            var occupation_id = jQuery('#occupation_id').val();
            var route = "{{ url('load_work_experience') }}";

            var token =$("#token").val();

            $.ajax({

                url: route,

                headers: {'X-CSRF-TOKEN': token},

                type: 'POST',

                 //dataType: 'json',

                data: {
                    'occupation_id': occupation_id
                },

                success: function(obj, status) { 

                    if(obj.st == 'ok'){
                        jQuery('#workhold').html(obj.html);

                    }

                }

            });

            return false;
        }
        $('#passport_number').on("blur",function(){
            checkRecordAlreadyExist();
        });
        function checkRecordAlreadyExist(){
            var passport_number = jQuery('#passport_number').val();
            var route = "{{ url('checkRecordAlreadyExist') }}";

            var token =$("#token").val();

            $.ajax({

                url: route,

                headers: {'X-CSRF-TOKEN': token},

                type: 'POST',

                 //dataType: 'json',

                data: {
                    'passport_number': passport_number
                },

                success: function(obj, status) { 

                    if(obj.st == 'err'){
                        jQuery('#passport_number').css('border-color','red');
                        alert(obj.msg);
                        return false;
                    }else{
                        jQuery('#passport_number').css('border-color','#ccc');
                    }

                }

            });
            return true;
        }
        $("#phone").intlTelInput({
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
              });
            },
            /*preferredCountries: ['PK', 'AU'],*/
            // onlyCountries: ["pk", "au", "us"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js"
        });
        var form = document.getElementById("my_form");

        document.getElementById("my-btn").addEventListener("click", function () {
            jQuery('#countryCode').val(jQuery('.country-list .active').attr('data-dial-code'));
            form.submit();
        });
        $('.intl-tel-input').addClass('w-100');
        /***Image Cropper**/
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1,
                viewMode: 2,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
            });
            canvas.toBlob(function(blob) {
                var token =$("#token").val();
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob); 
                reader.onloadend = function() {
                    var base64data = reader.result; 
                    $.ajax({
                        type: "POST",
                        headers: {'X-CSRF-TOKEN': token},
                        dataType: "json",
                        url: "{{ url('crop-image-upload') }}",
                        data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                        success: function(data){
                            console.log(data);
                            $modal.modal('hide');
                            jQuery('#cropper_top_img').val(data.img_name);
                            alert(data.success);
                        }
                    });
                }
            });
        })
    </script>
@stop
