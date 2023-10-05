<ul id="menu" class="page-sidebar-menu">
    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ url('admin') }}">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <!-- <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li> -->
            <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ url('admin/users/show',Auth::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <!-- <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li> -->
        </ul>
    </li>
    <li {!! (Request::is('admin/company') || Request::is('admin/company/company') || Request::is('admin/company') || Request::is('admin/company/*') || Request::is('admin/company') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Company</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/company/add-company') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/company/add-company') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Add company
                </a>
            </li>
            <li {!! (Request::is('admin/company/company') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/company/company') }}">
                    <i class="fa fa-angle-double-right"></i>
                    company
                </a>
            </li>


        </ul>
    </li>
    <li {!! (Request::is('admin/curriculamvitae') || Request::is('admin/curriculamvitae/add') || Request::is('admin/curriculamvitae/connect') || Request::is('admin/curriculamvitae/completed') || Request::is('admin/curriculamvitae/canceled') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="gear" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Curriculam Vitae</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/curriculamvitae') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/curriculamvitae') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Curriculams
                </a>
            </li>
            <li {!! (Request::is('admin/curriculamvitae/add') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/curriculamvitae/add') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add
                </a>
            </li>
            <li {!! (Request::is('admin/curriculamvitae/connect') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/curriculamvitae/connect') }}">
                    <i class="fa fa-angle-double-right"></i>
                    New Requests
                </a>
            </li>
            <li {!! (Request::is('admin/curriculamvitae/completed') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/curriculamvitae/completed') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Completed Requests
                </a>
            </li>
            <li {!! (Request::is('admin/curriculamvitae/canceled') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/curriculamvitae/canceled') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Canceled Requests
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/settings') || Request::is('admin/settings/countries') || Request::is('admin/settings/occupations') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="gear" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Settings</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/settings/countries') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/settings/countries') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Countries
                </a>
            </li>
            <li {!! (Request::is('admin/settings/occupations') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/settings/occupations') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Occupations
                </a>
            </li>
        </ul>
    </li>
    <!-- Menus generated by CRUD generator -->
    @include('admin/layouts/menu')
</ul>
