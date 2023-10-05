@php
    $number = 1;
@endphp
@if(count($results))
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

                <div class="panel-body text-center">

                    <div>

                        @if($result->pic != null)
                            <img src="{{ url('uploads/profile/'.$result->pic) }}" alt="100x100" class="cv-img img-responsive rounded-circle">
                        @else
                            <img src="{{ asset('assets/images/not_found.png') }}" alt="team-image" class="img-responsive cv-img"> 
                        @endif

                    </div>

                    <h5 class="success text-white">{{ substr_replace($result->name, "...", 15) }}</h5>

                    <div style="display: flex;justify-content: center;">

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

                            <li>Religion: 
                                {{ \App\Models\User::$religion[$result->religion] }}
                            </li>

                            <!-- <li>{{ $result->previouswork }}</li> -->

                        </ul>

                    </div>
                    @if($result->connect && $result->connect->status == 0)
                        <span class="tab bg-red">Processing</span>
                    @elseif($result->connect && $result->connect->status == 1)
                        <span class="tab bg-green">Accepted</span>
                    @else
                        <a href="{{ url('detail/'.base64_encode($result->id)) }}" target="_blank" class="tab bg-white" >View</a>
                        @include('cv.detail')
                    @endif
                    
                    

                </div>

            </div>

        </div>

    @endforeach
@else

    <h3 class="text-info">Record Not Found</h3>

    <button class="btn btn-primary" onClick = "return get_all_cvs()">Get All</button>

@endif
            