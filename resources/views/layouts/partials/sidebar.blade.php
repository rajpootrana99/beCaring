<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('index') }}" class="logo">
            <span style="color: #011592;">
                {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo-small" class="logo-sm">--}}
                <h4><strong>My Care Shift</strong></h4>
            </span>
            {{--<span>
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light">
            <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>--}}
        </a>
    </div>
    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <ul class="metismenu left-sidenav-menu">
            <li class="menu-label mt-0">Main</li>
            @if(Auth::user()->hasRole('Admin'))
            <li>
                <a href="{{ route('index') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>
            @endif
            @can('Manage Chat')
                <li class="{{ (request()->is('chat')) ? 'active' : '' }}">
                    <a href="{{ route('chat.index') }}" class="iq-waves-effect collapsed"><i data-feather="message-circle" class="align-self-center menu-icon"></i><span>Chat</span></a>
                </li>
            @endcan
            @can('Manage Nurse')
            <li class="{{ (request()->is('carer')) ? 'active' : '' }}">
                <a href="{{ route('carer.index') }}" class="iq-waves-effect collapsed"><i class="las la-user"></i><span>Carers</span></a>
            </li>
            @endcan
            @can('Manage Patient')
            <li class="{{ (request()->is('patient')) ? 'active' : '' }}">
                <a href="{{ route('patient.index') }}" class="iq-waves-effect collapsed"><i class="las la-users"></i><span>Patients</span></a>
            </li>
            @endcan
            @can('Manage Appointments')
            <li class="{{ (request()->is('appointment')) ? 'active' : '' }}">
                <a href="{{ route('appointment.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Appointments</span></a>
            </li>
            @endcan
            @can('Manage Earnings')
                <li class="{{ (request()->is('earnings')) ? 'active' : '' }}">
                    <a href="{{ route('earnings.index') }}" class="iq-waves-effect collapsed"><i class="las la-cash-register"></i><span>Earnings</span></a>
                </li>
            @endcan
            @can('Manage Medication')
            <li class="{{ (request()->is('medication')) ? 'active' : '' }}">
                <a href="{{ route('medication.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Medications</span></a>
            </li>
            @endcan
            @can('Manage Notification')
            <li class="{{ (request()->is('notification')) ? 'active' : '' }}">
                <a href="{{ route('notification.index') }}" class="iq-waves-effect collapsed"><i class="las la-bell"></i><span>Notifications</span></a>
            </li>
            @endcan
            @can('Manage Wish List')
            <li class="{{ (request()->is('wishList')) ? 'active' : '' }}">
                <a href="{{ route('wishList.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Wish Lists</span></a>
            </li>
            @endcan
            @can('Manage Company')
            <li class="{{ (request()->is('company')) ? 'active' : '' }}">
                <a href="{{ route('company.index') }}" class="iq-waves-effect collapsed"><i class="las la-building"></i><span>Company</span></a>
            </li>
            @endcan
            @can('Manage Role')
            <li class="{{ (request()->is('role')) ? 'active' : '' }}">
                <a href="{{ route('role.index') }}" class="iq-waves-effect collapsed"><i class="las la-building"></i><span>Role</span></a>
            </li>
            @endcan
            @can('Manage Training')
            <li class="{{ (request()->is('training')) ? 'active' : '' }}">
                <a href="{{ route('training.index') }}" class="iq-waves-effect collapsed"><i class="la la-gears"></i><span>Training</span></a>
            </li>
            @endcan
            @can('Manage Employee')
            <li class="{{ (request()->is('employee')) ? 'active' : '' }}">
                <a href="{{ route('employee.index') }}" class="iq-waves-effect collapsed"><i class="las la-users"></i><span>Employee</span></a>
            </li>
            @endcan
            @can('Manage Help')
                <li class="{{ (request()->is('help')) ? 'active' : '' }}">
                    <a href="{{ route('help.index') }}" class="iq-waves-effect collapsed"><i class="far fa-question-circle"></i><span>Help</span></a>
                </li>
            @endcan
            @can('Manage Feedback')
                <li class="{{ (request()->is('feedback')) ? 'active' : '' }}">
                    <a href="{{ route('feedback.index') }}" class="iq-waves-effect collapsed"><i class="far fa-comment-alt"></i><span>Feedback</span></a>
                </li>
            @endcan
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
