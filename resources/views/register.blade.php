<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Smart Finance</title>
    <meta charset="utf-8" />
    <meta name="description" content=" " />
    <meta name="keywords" content=" " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('public/assets/img/logo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('public/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #f4b500">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="{{route('home')}}" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('public/assets/img/logo.png') }}" class="h-60px" />
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #000000;">welcome to Smart Finance</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="fw-bold fs-2" style="color: #000;">We make sure to Select the best interest rates from the market</p>
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Illustration-->
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(public/assets/media/illustrations/sigma-1/13.png);"></div>
                    <!--end::Illustration-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-600px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" method="post"  action="{{route('register')}}" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Heading-->
                            <div class="mb-10 text-center">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Create an Account</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">Already have an account?
                                    <a href="{{route('sign_in')}}" class="link-primary fw-bolder">Sign in here</a></div>
                                <!--end::Link-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Separator-->

                            <!--end::Separator-->
                            <!-- Status msg -->
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <!-- Status msg end-->
                            <!--begin::Input group-->
                            <div class="row fv-row mb-7">
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">First Name</label>
                                    <input class="form-control form-control-lg form-control-solid @error('first_name') is-invalid @enderror" type="text" placeholder="" name="first_name" value="{{old('first_name')}}" autocomplete="off" required />
                                    @error('first_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col-xl-6">
                                    <label class="form-label fw-bolder text-dark fs-6">Last Name</label>
                                    <input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="last_name" value="{{old('last_name')}}" autocomplete="off" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Email</label>
                                <input class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" type="email" placeholder="" name="email" value="{{old('email')}}" autocomplete="off" required />
                            </div>
                            @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <label class="form-label fw-bolder text-dark fs-6">Phone</label>
                                <input class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror" type="number" placeholder="" name="phone" value="{{old('phone')}}" autocomplete="off" required />
                            </div>
                            @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="" name="password"  autocomplete="off" required />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
												<i class="bi bi-eye-slash fs-2"></i>
												<i class="bi bi-eye fs-2 d-none"></i>
											</span>
                                    </div>
                                    <!--end::Input wrapper-->
                                    
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror  
                            </div>
                            <!--end::Input group=-->

                            <!--begin::Input group-->
                            <div class="mb-10 fv-row" data-kt-password-meter="true">
                                <!--begin::Wrapper-->
                                <div class="mb-1">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                    <!--end::Label-->
                                    <!--begin::Input wrapper-->
                                    <div class="position-relative mb-3">
                                        <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password_confirmation"  autocomplete="off" required />
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    <!--end::Input wrapper-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <label class="form-check form-check-custom form-check-solid form-check-inline">
									<input class="form-check-input @error('terms_and_conditions') is-invalid @enderror" type="checkbox" name="terms_and_conditions" />
										<span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
										<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
								</label>
                                @error('terms_and_conditions')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
										<span class="indicator-label">Submit</span>
										<span class="indicator-progress">Please wait...
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
									</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    <!-- <div class="d-flex flex-center fw-bold fs-6">
                        <a href="" class="text-muted text-hover-primary px-2" target="_blank">About</a>
                        <a href="" class="text-muted text-hover-primary px-2" target="_blank">Support</a>
                        <a href="" class="text-muted text-hover-primary px-2" target="_blank">Purchase</a>
                    </div> -->
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('public/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('public/assets/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>