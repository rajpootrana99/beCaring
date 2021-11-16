@extends('auth.layout.app')

@section('tab')
    <ul class="nav-border nav nav-pills" role="tablist">
        <li class="nav-item">
            <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab">Register</a>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">
            <form class="form-horizontal auth-form" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="name">Email</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email">
                    </div>
                </div><!--end form-group-->

                <div class="form-group mb-2">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                    </div>
                </div><!--end form-group-->

                <div class="form-group row my-3">
                    <div class="col-sm-6">
                        <div class="custom-control custom-switch switch-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitchSuccess">
                            <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                        </div>
                    </div><!--end col-->
                </div><!--end form-group-->

                <div class="form-group mb-0 row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                    </div><!--end col-->
                </div> <!--end form-group-->
            </form><!--end form-->
            <div class="m-3 text-center text-muted">
                <p class="mb-0">Don't have an account ?  <a href="auth-register.html" class="text-primary ml-2">Free Resister</a></p>
            </div>
            <div class="account-social">
                <h6 class="mb-3">Or Login With</h6>
            </div>
            <div class="btn-group btn-block">
                <button type="button" class="btn btn-sm btn-outline-secondary">Facebook</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Twitter</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Google</button>
            </div>
        </div>
        <div class="tab-pane px-3 pt-3" id="Register_Tab" role="tabpanel">
            <form class="form-horizontal auth-form" method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group mb-2">
                    <label for="first_name">First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                    </div>
                </div><!--end form-group-->
                <span class="text-danger error-text">{{ $errors->first('first_name') }}</span>

                <div class="form-group mb-2">
                    <label for="last_name">First Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                    </div>
                </div><!--end form-group-->
                <span class="text-danger error-text">{{ $errors->first('last_name') }}</span>

                <div class="form-group mb-2">
                    <label for="user-email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" id="user-email" placeholder="Enter Email">
                    </div>
                </div><!--end form-group-->
                <span class="text-danger error-text">{{ $errors->first('email') }}</span>

                <div class="form-group mb-2">
                    <label for="user-password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="user-password" placeholder="Enter password">
                    </div>
                </div><!--end form-group-->

                <div class="form-group mb-2">
                    <label for="conf_password">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="password_confirmation" id="conf_password" placeholder="Enter Confirm Password">
                    </div>
                </div><!--end form-group-->
                <span class="text-danger error-text">{{ $errors->first('password') }}</span>

                <div class="form-group mb-2">
                    <label for="phone">Mobile Number</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Mobile Number">
                    </div>
                </div><!--end form-group-->
                <span class="text-danger error-text">{{ $errors->first('phone') }}</span>

                <div class="form-group row my-3">
                    <div class="col-sm-12">
                        <div class="custom-control custom-switch switch-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitchSuccess2">
                            <label class="custom-control-label text-muted" for="customSwitchSuccess2">You agree to the Metrica <a href="#" class="text-primary">Terms of Use</a></label>
                        </div>
                    </div><!--end col-->
                </div><!--end form-group-->

                <div class="form-group mb-0 row">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                    </div><!--end col-->
                </div> <!--end form-group-->
            </form><!--end form-->
            <p class="my-3 text-muted">Already have an account ?<a href="auth-login.html" class="text-primary ml-2">Log in</a></p>
        </div>
    </div>
@endsection
