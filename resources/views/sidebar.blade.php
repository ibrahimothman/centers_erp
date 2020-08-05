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
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Test::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::studentLinks() ) ||strpos(Request::url(), 'students')? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studentCollapse" aria-expanded="true" aria-controls="studentCollapse">
                <i class="fas fa-users-cog"></i>
                <span>الطلاب</span>
            </a>
            <div id="studentCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::studentLinks() )||strpos(Request::url(), 'students') ? "collapse show" : 'collapse'}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach(\App\helper\SideBarLinks::studentLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Student::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- tests -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Test::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::testLinks() )||strpos(Request::url(), 'test')? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#testCollapse" aria-expanded="true" aria-controls="testCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>الامتحانات</span>
            </a>
            <div id="testCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::testLinks() )||strpos(Request::url(), 'test')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::testLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Test::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- courses -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Course::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::courseLinks() ) ||strpos(Request::url(), 'course') ? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#courseCollapse" aria-expanded="true" aria-controls="courseCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>الكورسات</span>
            </a>
            <div id="courseCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::courseLinks() ) || strpos(Request::url(), 'course')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::courseLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Course::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- diplomas -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Diploma::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::diplomaLinks() )||strpos(Request::url(), 'diploma')? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#diplomaCollapse" aria-expanded="true" aria-controls="diplomaCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>الدبلومات</span>
            </a>
            <div id="diplomaCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::diplomaLinks() )||strpos(Request::url(), 'diploma')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::diplomaLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Diploma::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- categories -->
    <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::categoryLinks() )||strpos(Request::url(), 'categories')? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse" aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>التصنيفات</span>
        </a>
        <div id="categoryCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::categoryLinks() )||strpos(Request::url(), 'categories')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::categoryLinks() as $linkKey => $linkValue)
{{--                    @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Test::class)--}}
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
{{--                    @endcanany--}}
                @endforeach

            </div>
        </div>
    </li>

    <!-- instructors -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Instructor::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::instructorLinks() )||strpos(Request::url(), 'instructors')? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#instructorCollapse" aria-expanded="true" aria-controls="instructorCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>المدربين</span>
            </a>
            <div id="instructorCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::instructorLinks() )||strpos(Request::url(), 'instructors')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::instructorLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Instructor::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- rooms -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Room::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::RoomLinks() )||strpos(Request::url(), 'rooms')? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#roomCollapse" aria-expanded="true" aria-controls="roomCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>الغرف</span>
            </a>
            <div id="roomCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::RoomLinks() )||strpos(Request::url(), 'rooms')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::RoomLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Room::class)
                            <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- calendar -->
    <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::CalendarLinks() )? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#calendarCollapse" aria-expanded="true" aria-controls="calendarCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>كالندر</span>
        </a>
        <div id="calendarCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::CalendarLinks() )? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::CalendarLinks() as $linkKey => $linkValue)
                    <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                @endforeach

            </div>
        </div>
    </li>

    <!-- employees -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Employee::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::employeeLinks() ) ||strpos(Request::url(), 'employees')? 'active' : ''}}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#employeeCollapse" aria-expanded="true" aria-controls="employeeCollapse">
                <i class="fas fa-users-cog"></i>
                <span>الموظفين</span>
            </a>
            <div id="employeeCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::employeeLinks() ) ||strpos(Request::url(), 'employees')? "collapse show" : "collapse"}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @foreach(\App\helper\SideBarLinks::employeeLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Employee::class)
                                <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany
                    @endforeach

                </div>
            </div>
        </li>
    @endcanany

    <!-- jobs -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Job::class)
        <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::jobLinks() )||strpos(Request::url(), 'jobs')? 'active' : ''}}"  >
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jobCollapse" aria-expanded="true" aria-controls="jobCollapse">
                <i class="fas fa-fw fa-wrench"></i>
                <span>الوظائف</span>
            </a>
            <div id="jobCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::jobLinks() )||strpos(Request::url(), 'jobs')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    @foreach(\App\helper\SideBarLinks::jobLinks() as $linkKey => $linkValue)
                        @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Job::class)
                                <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                        @endcanany

                    @endforeach

                </div>
            </div>
        </li>
    @endcanany


    <!-- finance -->
    @canany(['create', 'update', 'view', 'viewAny', 'delete'], App\Transaction::class)
    <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::financeLinks())||strpos(Request::url(), 'revenues') ||strpos(Request::url(), 'expenses')||strpos(Request::url(), 'salaries') ||strpos(Request::url(), 'refund') ||strpos(Request::url(), 'finance')? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#financeCollapse" aria-expanded="true" aria-controls="financeCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الماليات</span>
        </a>
        <div id="financeCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::financeLinks() )||strpos(Request::url(), 'revenues') ||strpos(Request::url(), 'expenses')||strpos(Request::url(), 'salaries') ||strpos(Request::url(), 'refund') ||strpos(Request::url(), 'finance')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::financeLinks() as $linkKey => $linkValue)
                    @canany(App\helper\PolicyHelper::checkPolicyFromRoute($linkKey), App\Job::class)
                        <a class="collapse-item {{ Request::url() == $linkKey ? 'active' : '' }}" href="{{ $linkKey }}">{{ $linkValue }}</a>
                    @endcanany
                @endforeach

            </div>
        </div>
    </li>
    @endcan

    <!-- settings -->
    <li class="nav-item {{array_key_exists(Request::url(),\App\helper\SideBarLinks::settingLinks() )||strpos(Request::url(), 'settings')? 'active' : ''}}"  >
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#settingsCollapse" aria-expanded="true" aria-controls="settingsCollapse">
            <i class="fas fa-fw fa-wrench"></i>
            <span>الاعدادات</span>
        </a>
        <div id="settingsCollapse" class="{{array_key_exists(Request::url(),\App\helper\SideBarLinks::settingLinks() )||strpos(Request::url(), 'settings')? 'collapse show' : 'collapse'}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                @foreach(\App\helper\SideBarLinks::settingLinks() as $linkKey => $linkValue)
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
