<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="/" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img height="80px" width="180px" src="{{ asset('backend/img/logo.png') }}" alt="">
        </span>

      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ $data['active_menu'] == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

        {{-- Dont REmove this Please --}}

        {{-- court panel --}}
        {{-- <li class="menu-item {{ $data['active_menu']  == 'lower'  ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">Court Panel</div>
            </a>
            <ul class="menu-sub {{ $data['active_menu'] == 'lower' ? 'active' : '' }}">
              <li class="menu-item ">
                <a href="{{ route('lowerCourt') }}" class="menu-link">
                  <div data-i18n="Without menu">Create Lower Court</div>
                </a>
              </li>
            </ul>
            <ul class="menu-sub {{ $data['active_menu'] == 'lower' ? 'active' : '' }}">
                <li class="menu-item ">
                  <a href="{{ route('highCourt') }}" class="menu-link">
                    <div data-i18n="Without menu">Create High Court</div>
                  </a>
                </li>
              </ul>

          </li> --}}


      {{-- User panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'user' || $data['active_menu']  == 'userApprove' ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Student Panel</div>
        </a>
        <ul class="menu-sub ">

          <li class="menu-item {{ $data['active_menu'] == 'userCreate' ? 'active' : '' }}">
            <a href="{{ route('user_create') }}" class="menu-link">
              <div data-i18n="Without menu">Student Create</div>
            </a>
          </li>
          <li class="menu-item {{ $data['active_menu'] == 'userApprove' ? 'active' : '' }}">
            <a href="{{ route('user_approve') }}" class="menu-link">
              <div data-i18n="Without navbar">Student Approve List</div>
            </a>
          </li>
          <li class="menu-item {{ $data['active_menu'] == 'userall' ? 'active' : '' }}">
            <a href="{{ route('user_all') }}" class="menu-link">
              <div data-i18n="Without menu">All Student(High Court)</div>
            </a>
          </li>
          <li class="menu-item {{ $data['active_menu'] == 'useralll' ? 'active' : '' }}">
            <a href="{{ route('user_all_high') }}" class="menu-link">
              <div data-i18n="Without menu">All Student(Lower Court)</div>
            </a>
          </li>
        </ul>
      </li>
 {{-- Course Pay --}}
 <li class="menu-item {{ $data['active_menu']  == 'course_Pay'  ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Course Pay</div>
    </a>
    <ul class="menu-sub {{ $data['active_menu'] == 'course_Pay_create' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('course.pay') }}" class="menu-link">
          <div data-i18n="Without menu">Course Pay Form</div>
        </a>
      </li>
    </ul>
    <ul class="menu-sub {{ $data['active_menu'] == 'course_Pay_list' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('course.list') }}" class="menu-link">
          <div data-i18n="Without menu">Course Pay list</div>
        </a>
      </li>
    </ul>
  </li>
  {{-- Attendance panel --}}
  <li class="menu-item {{ $data['active_menu']  == 'attendance'  ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Attendance Panel</div>
    </a>

    <ul class="menu-sub {{ $data['active_menu'] == 'attendance_list' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('absent.list') }}" class="menu-link">
          <div data-i18n="Without menu">Absent List</div>
        </a>
      </li>
    </ul>
    <ul class="menu-sub {{ $data['active_menu'] == 'attendance_list' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('attendance.list') }}" class="menu-link">
          <div data-i18n="Without menu">Attendance </div>
        </a>
      </li>
    </ul>
    <ul class="menu-sub d-none {{ $data['active_menu'] == 'qrcode_list' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('qrocde') }}" class="menu-link">
          <div data-i18n="Without menu">Qrcode</div>
        </a>
      </li>
    </ul>
  </li>
   {{-- Notice panel --}}
   <li class="menu-item {{ $data['active_menu']  == 'notice'  ? 'active open' : '' }}">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-layout"></i>
      <div data-i18n="Layouts">Notice Panel</div>
    </a>
    <ul class="menu-sub {{ $data['active_menu'] == 'notice' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{ route('notice.create') }}" class="menu-link">
          <div data-i18n="Without menu">Notice Create</div>
        </a>
      </li>
    </ul>
    <ul class="menu-sub {{ $data['active_menu'] == 'notice' ? 'active' : '' }}">
      <li class="menu-item ">
        <a href="{{  route('admin.noticeList') }}" class="menu-link">
          <div data-i18n="Without menu">Notice List</div>
        </a>
      </li>
    </ul>
  </li>
      {{-- Event panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'Event'  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Course Panel</div>
        </a>
        <ul class="menu-sub {{ $data['active_menu'] == 'Event' ? 'active' : '' }}">
            <li class="menu-item ">
              <a href="{{ route('eventCreate') }}" class="menu-link">
                <div data-i18n="Without menu">Course Create</div>
              </a>
            </li>
          </ul>
        <ul class="menu-sub {{ $data['active_menu'] == 'Event' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('event') }}" class="menu-link">
              <div data-i18n="Without menu">All Course</div>
            </a>
          </li>
        </ul>
        
      </li>
           {{-- Batch Panel --}}
           <li class="menu-item {{ $data['active_menu']  == 'batch_panel'  ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-layout"></i>
              <div data-i18n="Layouts">Batch Pannel</div>
            </a>
            <ul class="menu-sub {{ $data['active_menu'] == 'batch_panel' ? 'active' : '' }}">
              <li class="menu-item ">
                <a href="{{ route('batch.create') }}" class="menu-link">
                  <div data-i18n="Without menu">Batch Create</div>
                </a>
              </li>
            </ul>
            <ul class="menu-sub {{ $data['active_menu'] == 'batch_panel' ? 'active' : '' }}">
              <li class="menu-item ">
                <a href="{{ route('batch.list') }}" class="menu-link">
                  <div data-i18n="Without menu">Batch list</div>
                </a>
              </li>
            </ul>
          </li>
            {{-- Real Event panel --}}
            <li class="menu-item {{ $data['active_menu']  == 'realEvent'  ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-layout"></i>
                  <div data-i18n="Layouts">Event Panel</div>
                </a>
                <ul class="menu-sub {{ $data['active_menu'] == 'realEvent' ? 'active' : '' }}">
                    <li class="menu-item ">
                      <a href="{{ route('realEventCreate') }}" class="menu-link">
                        <div data-i18n="Without menu">Event Create</div>
                      </a>
                    </li>
                  </ul>
                <ul class="menu-sub {{ $data['active_menu'] == 'realEvent' ? 'active' : '' }}">
                  <li class="menu-item ">
                    <a href="{{ route('RealEvent') }}" class="menu-link">
                      <div data-i18n="Without menu">All Event</div>
                    </a>
                  </li>
                </ul>

              </li>







      {{-- Advocate panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'ourTeam'  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Our Team Panel</div>
        </a>
        <ul class="menu-sub {{ $data['active_menu'] == 'ourTeam' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('admin.ourTeamCreate') }}" class="menu-link">
              <div data-i18n="Without menu">Our Team Create</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub {{ $data['active_menu'] == 'ourTeam' ? 'active' : '' }}">
            <li class="menu-item ">
              <a href="{{ route('admin.ourTeamList') }}" class="menu-link">
                <div data-i18n="Without menu">Our Team List</div>
              </a>
            </li>
        </ul>
      </li>
      {{-- Advocate panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'advocate'  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Advocate Panel</div>
        </a>
        <ul class="menu-sub {{ $data['active_menu'] == 'advocate' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('advocate.create') }}" class="menu-link">
              <div data-i18n="Without menu">Advocate Create</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub {{ $data['active_menu'] == 'advocate' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('advocate.list') }}" class="menu-link">
              <div data-i18n="Without menu">Advocate List</div>
            </a>
          </li>
        </ul>
      </li>

      {{-- List panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'list_panel'  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">List Panel</div>
        </a>
        <ul class="menu-sub {{ $data['active_menu'] == 'list_panel' ? 'active' : '' }}">
            <li class="menu-item ">
              <a href="{{ route('contactList') }}" class="menu-link">
                <div data-i18n="Without menu">Contact List</div>
              </a>
            </li>
          </ul>
        <ul class="menu-sub {{ $data['active_menu'] == 'list_panel' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('reviewList') }}" class="menu-link">
              <div data-i18n="Without menu">Review List</div>
            </a>
          </li>
        </ul>

      </li>
      {{-- report panel --}}
      <li class="menu-item {{ $data['active_menu']  == 'report'  ? 'active open' : '' }}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Report Panel</div>
        </a>
        <ul class="menu-sub {{ $data['active_menu'] == 'report' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('student.report') }}" class="menu-link">
              <div data-i18n="Without menu">Students Report</div>
            </a>
          </li>
        </ul>
        <ul class="menu-sub {{ $data['active_menu'] == 'report' ? 'active' : '' }}">
          <li class="menu-item ">
            <a href="{{ route('student.deuReport') }}" class="menu-link">
              <div data-i18n="Without menu">Students Due Report</div>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </aside>
  <!-- / Menu -->
