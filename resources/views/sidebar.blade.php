<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">اداره النظام</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">





    <!-- students -->
    <li class="nav-item {{str_contains(Request::url(),'students') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentCollapse" aria-expanded="true" aria-controls="studentCollapse">
            <i class="fas fa-users-cog"></i>
            <span>الطلاب</span>
        </a>
        <div id="studentCollapse" class="{{str_contains(Request::url(),'students') ? "collapse show" : 'collapse'}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach(\App\helper\SideBarLinks::studentLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- tests -->
    <li class="nav-item {{str_contains(Request::url(),'test' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#testCollapse" aria-expanded="true" aria-controls="testCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الامتحانات</span>
        </a>
        <div id="testCollapse" class="{{str_contains(Request::url(),'test' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::testLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- courses -->
    <li class="nav-item {{str_contains(Request::url(),'course' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#courseCollapse" aria-expanded="true" aria-controls="courseCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الكورسات</span>
        </a>
        <div id="courseCollapse" class="{{str_contains(Request::url(),'course' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::courseLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- instructors -->
    <li class="nav-item {{str_contains(Request::url(),'instructors' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#instructorCollapse" aria-expanded="true" aria-controls="instructorCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>المدربين</span>
        </a>
        <div id="instructorCollapse" class="{{str_contains(Request::url(),'instructors' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::instructorLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- rooms -->
    <li class="nav-item {{str_contains(Request::url(),'rooms' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roomCollapse" aria-expanded="true" aria-controls="roomCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الغرف</span>
        </a>
        <div id="roomCollapse" class="{{str_contains(Request::url(),'rooms' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::RoomLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- calendar -->
    <li class="nav-item {{str_contains(Request::url(),'calendar' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#calendarCollapse" aria-expanded="true" aria-controls="calendarCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>كالندر</span>
        </a>
        <div id="calendarCollapse" class="{{str_contains(Request::url(),'calendar' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::CalendarLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- employees -->
    <li class="nav-item {{str_contains(Request::url(),'employees') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employeeCollapse" aria-expanded="true" aria-controls="employeeCollapse">
            <i class="fas fa-users-cog"></i>
            <span>الموظفين</span>
        </a>
        <div id="employeeCollapse" class="{{str_contains(Request::url(),'employees') ? "collapse show" : "collapse"}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach(\App\helper\SideBarLinks::employeeLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- jobs -->
    <li class="nav-item {{str_contains(Request::url(),'jobs' )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jobCollapse" aria-expanded="true" aria-controls="jobCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الوظائف</span>
        </a>
        <div id="jobCollapse" class="{{str_contains(Request::url(),'jobs' )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::jobLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
