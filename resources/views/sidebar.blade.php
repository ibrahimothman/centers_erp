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





    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{str_contains(Request::url(),'students') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentCollapse" aria-expanded="true" aria-controls="studentCollapse">
            <i class="fas fa-users-cog"></i>
            <span>الطلاب</span>
        </a>
        <div id="studentCollapse" class="{{str_contains(Request::url(),'students') ? "collapse show" : "collapse"}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach(\App\helper\SideBarLinks::studentLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{str_contains(Request::url(),'tests' )? 'active' : ''}}"  >
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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{str_contains(Request::url(),'admins') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employeeCollapse" aria-expanded="true" aria-controls="employeeCollapse">
            <i class="fas fa-users-cog"></i>
            <span>الموظفين</span>
        </a>
        <div id="employeeCollapse" class="{{str_contains(Request::url(),'admins') ? "collapse show" : "collapse"}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @foreach(\App\helper\SideBarLinks::employeeLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-fw fa-wrench"></i>--}}
{{--            <span>الدورات</span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
{{--            <div class="bg-white py-2 collapse-inner rounded">--}}
{{--                <a class="collapse-item" href="">تسجيل الدورات</a>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
