
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Be Caring</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/logo-sm-dark.png') }}">

<!-- App css -->
    <link href="{{ asset('plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/dropify/css/dropify.min.css') }}" rel="stylesheet">

</head>

<body>

@include('layouts.partials.sidebar')

<div class="page-wrapper">
    @include('layouts.partials.header')

    <div class="page-content">
        @yield('content')

        @include('layouts.partials.footer')
    </div>
</div>

<!-- jQuery  -->
<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
<script src="{{ asset('assets/js/waves.js') }}"></script>
<script src="{{ asset('assets/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/moment.js') }}"></script>
<script src="{{ asset('plugins/select2/select2.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('plugins/apex-charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.analytics_dashboard.init.js') }}"></script>

<script src="{{ asset('plugins/dropify/js/dropify.min.js') }}"></script>
<script src="{{ asset('assets/pages/jquery.form-upload.init.js') }}"></script>

<script src="{{ asset('plugins/timepicker/bootstrap-material-datetimepicker.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}"></script>
<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/pages/jquery.forms-advanced.js')}}"></script>
<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
