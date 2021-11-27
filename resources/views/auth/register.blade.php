@extends('auth.layout.app')

@section('tab')
<ul class="nav-border nav nav-pills" role="tablist">
    <li class="nav-item">
        <a class="nav-link active font-weight-semibold" data-toggle="tab" href="#personal_information_tab" role="tab">Personal Information</a>
    </li>
    <li class="nav-item">
        <a class="nav-link font-weight-semibold" data-toggle="tab" href="#business_tab" role="tab">Business</a>
    </li>
    <li class="nav-item">
        <a class="nav-link font-weight-semibold" data-toggle="tab" href="#needs_tab" role="tab">Needs</a>
    </li>
    <li class="nav-item">
        <a class="nav-link font-weight-semibold" data-toggle="tab" href="#document_tab" role="tab">Documents</a>
    </li>
</ul>
<!-- Tab panes -->
<form class="form-horizontal auth-form" method="post" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="tab-content">
        <div class="tab-pane active p-3" id="personal_information_tab" role="tabpanel">
            <div class="form-group mb-2">
                <label for="name">Your Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('name') }}</span>

            <div class="form-group mb-2">
                <label for="company_name">Company Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" id="company_name" placeholder="Enter Company Name">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('company_name') }}</span>

            <div class="form-group mb-2">
                <label for="company_website">Company Website</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="company_website" id="company_website" value="{{ old('company_website') }}" placeholder="Enter Company Website">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('company_website') }}</span>

            <div class="form-group mb-2">
                <label for="phone">Telephone Number</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Enter Telephone Number">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('phone') }}</span>

            <div class="form-group mb-2">
                <label for="name">Email</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Enter Email">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('email') }}</span>
            <!--end form-group-->

            <div class="form-group mb-2">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="Enter Password">
                </div>
            </div>
            <span class="text-danger error-text">{{ $errors->first('password') }}</span>
            <!--end form-group-->

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <a class="btn btn-primary btn-block waves-effect waves-light" data-toggle="tab" href="#business_tab" role="tab">Next <i class="fas fa-arrow-right ml-1"></i></a>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->
            <div class="m-3 text-center text-muted">
                <p class="mb-0">Have an account ? <a href="{{ route('login') }}" class="text-primary ml-2">Log In</a></p>
            </div>
        </div>
        <div class="tab-pane px-3 pt-3" id="business_tab" role="tabpanel">
            <div class="form-group mb-2">
                <label for="business_name">Your Business</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="business_name" value="{{ old('business_name') }}" id="business_name" placeholder="Enter Your Business">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('business_name') }}</span>

            <div class="form-group mb-2">
                <label for="address">Address</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" id="address" placeholder="Enter Address">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('address') }}</span>

            <div class="form-group row my-3">
                <div class="col-sm-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="contact" name="contact" value="1">
                        <label class="custom-control-label" for="contact">Same Person as Registration</label>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->

            <div class="form-group mb-2">
                <label for="contact_name">Name</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name') }}" id="contact_name" placeholder="Enter Name">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('contact_name') }}</span>

            <div class="form-group mb-2">
                <label for="mobile_number">Mobile Number</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="mobile_number" id="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter Mobile Number">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('mobile_number') }}</span>

            <div class="form-group mb-2">
                <label for="position">Position in Company</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="position" id="position" value="{{ old('position') }}" placeholder="Position in Company">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('position') }}</span>

            <div class="form-group mb-2">
                <label for="current_cqc_rating">Current CQC Rating</label>
                <div class="input-group">
                    <select class="form-control" name="current_cqc_rating" id="current_cqc_rating" style="width: 100%; height:36px;" data-placeholder="Current CQC Rating">
                        <option value="Outstanding">Outstanding</option>
                        <option value="Good">Good</option>
                        <option value="Requires Improvement">Requires Improvement</option>
                        <option value="Inadequate">Inadequate</option>
                    </select>
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('current_cqc_rating') }}</span>

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <button class="btn btn-primary btn-block waves-effect waves-light" data-toggle="tab" href="#needs_tab" role="tab">Next <i class="fas fa-arrow-right ml-1"></i></button>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->
        </div>
        <div class="tab-pane px-3 pt-3" id="needs_tab" role="tabpanel">
            <div class="form-group mb-2">
                <label for="your_needs">Your Needs</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="your_needs" value="{{ old('your_needs') }}" id="your_needs" placeholder="Your Needs">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('your_needs') }}</span>

            <div class="form-group mb-2">
                <label for="provide_staff">How quickly would you need us to provide staff for you?</label>
                <div class="input-group">
                    <select class="form-control" name="provide_staff" id="provide_staff" style="width: 100%; height:36px;" data-placeholder="How quickly would you need us to provide staff for you?">
                        <option value="Immediately">Immediately</option>
                        <option value="1-3 months">1-3 months</option>
                        <option value="3-6 months">3-6 months</option>
                        <option value="6-9 months">6-9 months</option>
                        <option value="9-12 months">9-12 months</option>
                    </select>
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('provide_staff') }}</span>

            <div class="form-group mb-2">
                <label for="staff_type">Are you looking for temp staff to fill a staff holiday, sickness or cover regular full time shifts?</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="staff_type" value="{{ old('staff_type') }}" id="staff_type">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('staff_type') }}</span>

            <div class="form-group mb-2">
                <label for="hours_per_week">How many hours per week are you looking to fill using our staffing service?</label>
                <div class="input-group">
                    <select class="form-control" name="hours_per_week" id="hours_per_week" style="width: 100%; height:36px;" data-placeholder="How many hours per week are you looking to fill using our staffing service?">
                        <option value="< 10 hours>">< 10 hours</option>
                        <option value="10-20 hours">10-20 hours</option>
                        <option value="20-30 hours">20-30 hours</option>
                        <option value="> 30 hours">> 30 hours</option>
                        <option value="Varies">Varies</option>
                    </select>
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('hours_per_week') }}</span>


            <div class="form-group mb-2">
                <label for="full_time_employees">How many full time employees do you currently have?</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="full_time_employees" value="{{ old('full_time_employees') }}" id="full_time_employees">
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('full_time_employees') }}</span>

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <button class="btn btn-primary btn-block waves-effect waves-light" data-toggle="tab" href="#document_tab" role="tab">Next <i class="fas fa-arrow-right ml-1"></i></button>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->
        </div>
        <div class="tab-pane px-3 pt-3" id="document_tab" role="tabpanel">
            <div class="form-group mb-2">
                <label for="cqc" class="col-form-label text-right">Uplod CQC</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" value="{{ old('cqc') }}" name="cqc" id="cqc">
                    <label class="custom-file-label" for="cqc">Choose file</label>
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('cqc') }}</span>

            <div class="form-group mb-2">
                <label for="insurance_proof" class="col-form-label text-right">Insurance Proof</label>
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" value="{{ old('insurance_proof') }}" name="insurance_proof" id="insurance_proof">
                    <label class="custom-file-label" for="insurance_proof">Choose file</label>
                </div>
            </div>
            <!--end form-group-->
            <span class="text-danger error-text">{{ $errors->first('insurance_proof') }}</span>

            <div class="form-group row my-3">
                <div class="col-sm-12">
                    <div class="custom-control custom-switch switch-success">
                        <input type="checkbox" class="custom-control-input" id="customSwitchSuccess2">
                        <label class="custom-control-label text-muted" for="customSwitchSuccess2">You agree to the MyCareShift <a href="#" class="text-primary">Terms of Use</a></label>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->

            <div class="form-group mb-0 row">
                <div class="col-12">
                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Register <i class="fas fa-sign-in-alt ml-1"></i></button>
                </div>
                <!--end col-->
            </div>
            <!--end form-group-->
        </div>
    </div>
</form>
@endsection
