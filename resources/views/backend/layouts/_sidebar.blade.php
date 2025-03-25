

  <!-- Sidebar -->
  <div class="sidebar">

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img style="height: 40px;width: 40px;" src="{{ Auth::user()->getProfileDirectory() }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#" x-ref="profileLink">Profile</a>
            <a class="dropdown-item" href="#" x-ref="changePasswordLink">Change Password</a>
            <a class="dropdown-item" href="#">Settings</a>
            <div class="dropdown-divider"></div>

        </div>
      </div>

    </div>
    @php 
$EmployeeStatus = App\Models\EmployeeStatus::getRecord();
    @endphp
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @if(Auth::user()->is_role == 1)
          <li class="nav-item">
          <a href="{{url('admin/dashboard')}}" class="nav-link @if(Request::segment(2) == 'dashboard') active @endif">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
                Dashboard
            </p>
          </a>
        </li>
       @if(Auth::user()->parent_id == 2)
        <li class="nav-item">
            <a href="{{ url('admin/users') }}" class="nav-link @if(Request::segment(2) == 'users') active @endif">
            <i class="nav-icon far fa-angry"></i>
              <p>
                  System Users
              </p>
            </a>
          </li>
          @endif
        
         

          <!-- //supervisor start -->

          <li class="nav-item  @if(Request::segment(2) == 'supervisor') menu-is-opening menu-open  @endif">
             <a href="#" class="nav-link  @if(Request::segment(2) == 'supervisor') active  @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Manage Supervisors
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           @foreach($EmployeeStatus as $supervisor)
              <li class="nav-item">
            <a href="{{ url('admin/supervisor/'.$supervisor->id) }}" class="nav-link @if(Request::segment(3) == $supervisor->id) active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              {{$supervisor->name}} Supervisors
              </p>
            </a>
          </li>

           @endforeach

          

            </ul>
          </li>
          <!-- //supervisor end -->
           <!-- //employees start -->

          <li class="nav-item  @if(Request::segment(2) == 'employee') menu-is-opening menu-open  @endif">
             <a href="#" class="nav-link  @if(Request::segment(2) == 'employee') active  @endif">
              <i class="nav-icon fas fa-users"></i>
              <p>
              Manage Employees
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           @foreach($EmployeeStatus as $employees)
              <li class="nav-item">
            <a href="{{ url('admin/employee/'.$employees->id) }}" class="nav-link @if(Request::segment(3) == $employees->id) active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              {{$employees->name}} Employees
              </p>
            </a>
          </li>

           @endforeach

          

            </ul>
          </li>
          <!-- //employee end -->
          <li class="nav-item">
            <a href="{{ url('admin/admin_positions') }}" class="nav-link @if(Request::segment(2) == 'admin_positions') active @endif">
            <i class="nav-icon fas fa-book-reader"></i>
              <p>
              Admin Postions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/staff') }}" class="nav-link @if(Request::segment(2) == 'staff') active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
              Manage Admin Staff
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{ url('admin/positions') }}" class="nav-link @if(Request::segment(2) == 'positions') active @endif">
            <i class="nav-icon fas fa-cash-register"></i>
              <p>
               Employee Designation
              </p>
            </a>
          </li>
          
          <li class="nav-item  @if(Request::segment(2) == 'department') menu-is-opening menu-open  @endif">
             <a href="#" class="nav-link  @if(Request::segment(2) == 'department') active  @endif">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Departments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
           
              <li class="nav-item">
            <a href="{{ url('admin/department') }}" class="nav-link @if(Request::segment(2) == 'department') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
                Manage Departments
              </p>
            </a>
          </li>

           

          <li class="nav-item">
            <a href="{{ url('admin/assign_line_to_supervisor') }}" class="nav-link @if(Request::segment(2) == 'assign_line_to_supervisor') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Assign Supervisor - Department
              </p>
            </a>
          </li>

            </ul>
          </li>

         
          <li class="nav-item  @if(Request::segment(2) == 'attendance') menu-is-opening menu-open  @endif">
             <a href="#" class="nav-link  @if(Request::segment(2) == 'attendance') active  @endif">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
              Attendance
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
            <a href="{{ url('admin/attendance/employee') }}" class="nav-link @if(Request::segment(3) == 'employee') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Employee Attendance
              </p>
            </a>
          </li>

          </li>
          <li class="nav-item">
            <a href="{{ url('admin/attendance/attendance_report') }}" class="nav-link @if(Request::segment(3) == 'attendance_report') active @endif">
            <i class="far fa-circle nav-icon"></i>
              <p>
              Attendance Report
              </p>
            </a>
          </li>
           </ul>
          </li>
      
          <li class="nav-item">
            <a href="{{ url('admin/employee_status') }}" class="nav-link @if(Request::segment(2) == 'employee_status') active @endif">
            <i class="nav-icon fas fa-book-reader"></i>
              <p>
              Employee Status
              </p>
            </a>
          </li>
          <li class="nav-item  @if(Request::segment(2) == 'communicate') menu-is-opening menu-open  @endif">
            <a href="#" class="nav-link  @if(Request::segment(2) == 'communicate') active  @endif">
             <i class="nav-icon far fa-comments"></i>
             <p>
                Communicate
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
           <a href="{{ url('admin/communicate/notice_board') }}" class="nav-link @if(Request::segment(3) == 'notice_board') active @endif">
           <i class="far fa-circle nav-icon"></i>
             <p>
               Notice Board
             </p>
           </a>
         </li>

         </li>
         <li class="nav-item">
           <a href="{{ url('admin/communicate/send_email') }}" class="nav-link @if(Request::segment(3) == 'send_email') active @endif">
           <i class="far fa-circle nav-icon"></i>
             <p>
             Send Email
             </p>
           </a>
         </li>
          </ul>
         </li>

 

          <li class="nav-item">
            <a href="{{ url('admin/settings') }}" class="nav-link @if(Request::segment(2) == 'settings') active @endif">
            <i class="nav-icon fas fa-cogs"></i>
              <p>
                  Settings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/account') }}" class="nav-link @if(Request::segment(2) == 'account') active @endif">
            <i class="nav-icon fas fa-user-circle"></i>
                          <p>
                  My Account
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('admin/change_password') }}" class="nav-link @if(Request::segment(2) == 'change_password') active @endif">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                 Change Password
              </p>
            </a>
          </li> 
       
          @endif

        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link" >
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                  Logout
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link" >
              
              <p>
                 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link" >
              
              <p>
                 
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link" >
              
              <p>
                 
              </p>
            </a>
          </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
