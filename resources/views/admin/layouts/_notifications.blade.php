@php
    $notifications = \App\Models\Notification::where('status',0)->get();
@endphp
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f"
           data-hovercolor="#e9573f" data-size="28"></i>
        <span class="label label-warning">{{ count($notifications) }}</span>
    </a>
    <ul class=" notifications dropdown-menu drop_notify">
        <li class="dropdown-title">You have {{ count($notifications) }} notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach($notifications as $notification)
                @php
                    $cv = \App\Models\CurriculumVitae::find($notification->cv_id);
                @endphp
                <li>
                    <i class="livicon danger" data-n="hand-right" data-s="20" data-c="white"
                       data-hc="white"></i>
                    <a href="{{ url('detail/'.base64_encode($notification->cv_id)) }}" target="_blank">
                        {!! $cv->name.' ('.$cv->passport_number.') CV Uploaded' !!}
                    </a>
                    <small class="pull-right">
                        <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                        {{ date('d M Y',strtotime($notification->created_at)) }}
                    </small>
                </li>
                @endforeach
            </ul>
        </li>
        <!-- <li class="footer">
            <a href="#">View all</a>
        </li> -->
    </ul>
</li>