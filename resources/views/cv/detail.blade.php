<div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="cv_{{ $result->id }}" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 80%;">
       <!--  <div class="modal-header bg-primary">
            <h4 class="modal-title" id="modalLabelfade">Application fo Emplyment</h4>
        </div> -->
        <div class="modal-content" >
            <div class="row pd-10">
                <div class="col-md-12 border">
                    <div class="row border-bottom">
                        <div class="col-md-12">
                            <h4>Application of Employment</h4>
                        </div>
                    </div>
                    <div class="row border-bottom">
                        <div class="col-md-3 border-right">
                            <h4>Full Name</h4>
                        </div>
                        <div class="col-md-9">
                            <h4>{{ $result->name }}</h4>
                        </div>
                        <!-- <div class="col-md-4">
                            <h4>&nbsp;</h4>
                        </div> -->
                    </div>
                    <div class="row border-bottom">
                        <div class="col-md-8 border-right">
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-condensed flip-content" >
                                        <tr>
                                            <td>Monthly Salary</td>
                                            <td>{{ $result->monthly_salary }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contract Period</td>
                                            <td>{{ $result->contract_period }}</td>
                                        </tr>
                                        <tr>
                                            <td>Passport Number</td>
                                            <td>{{ $result->passport_number }}</td>
                                        </tr>  
                                        <tr>
                                            <td>Home Address</td>
                                            <td>{{ $result->home_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>
                                                {{ \App\Models\User::$religion[$result->religion] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nationlaty</td>
                                            <td>{{ $result->nationalty }}</td>
                                        </tr>
                                        <tr>
                                            <td>Occupation</td>
                                            <td>{{ $result->occupation->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Martial Status</td>
                                            <td>{{ \App\Models\User::$martialStatus[$result->martial_stauts_id] }}</td>
                                        </tr>
                                        <tr>
                                            <td>DOB</td>
                                            <td>{{ $result->dob }}</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>{{ $result->age }}</td>
                                        </tr>
                                        <tr>
                                            <td>Place of Birth</td>
                                            <td>{{ $result->place_birth }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. of  Children</td>
                                            <td>{{ $result->children }}</td>
                                        </tr>
                                        <tr>
                                            <td>Educational Background </td>
                                            <td>{{ $result->educational_background }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row border-bottom">
                                <div class="col-md-12">
                                    @if($result->pic != null)
                                        <img src="{{ url('uploads/profile/'.$result->pic) }}" style="height:150px;margin: auto;" alt="team-image" class="img-responsive">
                                    @else
                                        <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive"> 
                                    @endif
                                </div>
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">&nbsp;</div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    @if($result->full_pic != null)
                                        <img src="{{ url('uploads/profile/'.$result->full_pic) }}" style="height:300px;margin: auto;" alt="team-image" class="img-responsive">
                                    @else
                                        <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive"> 
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col-md-12 border-bottom" style="background-color: #efef1f;">
                                    Photo Whole Body
                                </div>
                                <div class="col-md-12 border-bottom">
                                    Applicant Contact No
                                </div>
                                <div class="col-md-12 border-bottom">
                                    {{ $result->phone }}
                                </div> 
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-12">&nbsp;</div>
                                <div class="col-md-12 text-left" style="text-align: justify;font-size: 10px;">
                                    I HEREBY DECLARE THAT THE ABOVE PARTICULARS FURNISHED BY ME ARE TRUE AND ACCURATE THE BEST OF MY KNOWLEDGE.
                                </div>-->
                                <div class="col-md-12 text-center">
                                    @if($result->cv)
                                        <a target="_blank" href="{{ url('uploads/cv/'.$result->cv) }}"><span class="fa fa-eye"></span> View or Downlaod CV</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-condensed flip-content" >
                                <thead>
                                    <tr>
                                        <th colspan="2">
                                            <span>Previous Employment</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result->previouswork as $work)
                                        <tr>
                                            <td>Country</td>
                                            <td>{{ $work->country }}</td>
                                        </tr>
                                        <tr>
                                            <td>Period</td>
                                            <td>{{ $work->contract_period.'years' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-condensed flip-content" >
                                <thead>
                                    <tr>
                                        <th colspan="4">
                                            <span>Languages you can Speak or Write : </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Fluent</th>
                                        <th>Fair</th>
                                        <th>Poor</th>
                                    </tr>
                                    @foreach($result->languagegrip as $grip)
                                        <tr>
                                            <td>{{ $grip->language }}</td>
                                            <td>
                                                @if($grip->fluent == 1)
                                                    <img class = "tick" src = "{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                            <td>
                                                @if($grip->fair == 1)
                                                    <img class = "tick" src = "{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                            <td>
                                                @if($grip->poor == 1)
                                                    <img class = "tick" src = "{{ url('images/tick.png') }}" />
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-condensed flip-content" >
                                <tr>
                                    <th>Weight</th>
                                    <td>{{ $result->weight }}<strong>KLS</strong></td>
                                </tr>
                                <tr>
                                    <th>Height</th>
                                    <td>{{ $result->height }}</td>
                                </tr>
                                <tr>
                                    <th>Complexion</th>
                                    <td>{{ $result->complexion }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped table-condensed flip-content" >
                                <thead>
                                    <tr>
                                        <th colspan="6">
                                            <span>Work Experience : </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                         @foreach($result->workexperience as $experience)
                                            @if($experience->work_status == 0) @continue @endif
                                            @if(is_null($experience->work)) @continue @endif
                                            <td>
                                                {{ $experience->work }}
                                                <img class = "tick" src = "{{ url('images/tick.png') }}" />
                                            </td>
                                        @endforeach

                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ url('cvconnect/'.$result->id) }}" onclick = "return confirm('Are you sure you want to connect with this person')">
                    <button class="btn  btn-default">Connect</button>
                </a>

                <button class="btn  btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>