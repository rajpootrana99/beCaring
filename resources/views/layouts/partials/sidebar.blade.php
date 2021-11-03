<!-- Left Sidenav -->
<div class="left-sidenav">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{ route('index') }}" class="logo">
            <span style="color: #011592;">
                {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="logo-small" class="logo-sm">--}}
                <h4><strong>Be Caring</strong></h4>
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
            <li>
                <a href="{{ route('index') }}"> <i data-feather="home" class="align-self-center menu-icon"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ (request()->is('nurse')) ? 'active' : '' }}">
                <a href="{{ route('nurse.index') }}" class="iq-waves-effect collapsed"><i class="las la-user"></i><span>Nurses</span></a>
            </li>
            <li class="{{ (request()->is('patient')) ? 'active' : '' }}">
                <a href="{{ route('patient.index') }}" class="iq-waves-effect collapsed"><i class="las la-users"></i><span>Patients</span></a>
            </li>
            <li class="{{ (request()->is('appointment')) ? 'active' : '' }}">
                <a href="{{ route('appointment.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Appointments</span></a>
            </li>
            <li class="{{ (request()->is('medication')) ? 'active' : '' }}">
                <a href="{{ route('medication.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Medications</span></a>
            </li>
            <li class="{{ (request()->is('notification')) ? 'active' : '' }}">
                <a href="{{ route('notification.index') }}" class="iq-waves-effect collapsed"><i class="las la-bell"></i><span>Notifications</span></a>
            </li>
            <li class="{{ (request()->is('wishList')) ? 'active' : '' }}">
                <a href="{{ route('wishList.index') }}" class="iq-waves-effect collapsed"><i class="las la-clipboard"></i><span>Wish Lists</span></a>
            </li>
        </ul>
    </div>
</div>
<!-- end left-sidenav-->
