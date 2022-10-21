<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <title>Smart Finanace</title>
    <meta charset="utf-8" />
    <meta name="description" content=" " />
    <meta name="keywords" content=" " />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('public/assets/img/logo.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('public/assets/css/custom.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('public/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('public/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"  data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style=" padding-bottom: 50px; margin-bottom: 80px;">
                <!--begin::Header-->
                <div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <!--begin::Container-->
                    <div class="container">
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center justify-content-between">
                            <!--begin::Logo-->
                            <div class="d-flex align-items-center flex-equal">
                                <!--begin::Mobile menu toggle-->
                                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
										<span class="svg-icon svg-icon-2hx">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
												<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									</button>
                                <!--end::Mobile menu toggle-->
                                <!--begin::Logo image-->
                                <a href="">
                                    <img alt="Logo" src="{{ asset('public/assets/img/full-logo.png') }}" class="logo-default h-25px h-lg-30px" />
                                    <img alt="Logo" src="{{ asset('public/assets/img/full-logo.png') }}" class="logo-sticky h-20px h-lg-25px" />
                                </a>
                                <!--end::Logo image-->
                            </div>
                            <!--end::Logo-->
                            <!--begin::Menu wrapper-->
                            <div class="d-lg-block" id="kt_header_nav_wrapper">
                                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle"
                                    data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
                                    <!--begin::Menu-->
                                    <div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-5 fw-bold" id="kt_landing_menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Home</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#our-services" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">our Services</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#about-us" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">About Us</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#our-Videos" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Our Videos</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item">
                                            <!--begin::Menu link-->
                                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#clients" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Feedbacks</a>
                                            <!--end::Menu link-->
                                        </div>
                                        <!--end::Menu item-->

                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Menu wrapper-->
                            <!--begin::Toolbar-->
                            <div class="flex-equal text-end  ms-1">
                                <a href="{{route('sign_in')}}" class="btn landing-dark-bg ">Sign In</a>
                            </div>
                            <!--end::Toolbar-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Header Section-->
        <!--end::Statistics Section-->
        <div class="mb-n20 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Heading-->
                <div class="text-center mb-17">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-5" id="clients" data-kt-scroll-offset="{default: 125, lg: 150}">What Our Clients Say</h3>
                    <!--end::Title-->
                    <!--begin::Description-->
                    <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                        <br />for different amazing and great useful admin</div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->
                <!--begin::Row-->
                <div class="row g-lg-10 mb-10 mb-lg-20">
                    @foreach($reviews as $review)
                        <!--begin::Col-->
                        <div class="col-lg-4">
                            <!--begin::Testimonial-->
                            <div class="d-flex flex-column justify-content-between h-lg-100 px-10 px-lg-0 pe-lg-10 mb-15 mb-lg-0">
                                <!--begin::Wrapper-->
                                <div class="mb-7">
                                    <!--begin::Rating-->
                                    @if($review->rating == 1)
                                        <div class="rating mb-6">
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                        </div>
                                    @elseif($review->rating == 2)
                                        <div class="rating mb-6">
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                        </div>
                                    @elseif($review->rating == 3)
                                        <div class="rating mb-6">
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                        </div>
                                    @elseif($review->rating == 4)
                                        <div class="rating mb-6">
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                        </div>
                                    @elseif($review->rating == 5)
                                        <div class="rating mb-6">
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                            <div class="rating-label me-2 checked ">
                                                <i class="bi bi-star-fill fs-5"></i>
                                            </div>
                                        </div>
                                    @endif
                                    <!--end::Rating-->
                                    <!--begin::Title-->
                                    <div class="fs-2 fw-bolder text-dark mb-3">{{$review->review_title}}</div>
                                    <!--end::Title-->
                                    <!--begin::Feedback-->
                                    <div class="text-gray-500 fw-bold fs-4">{{$review->review}}</div>
                                    <!--end::Feedback-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Author-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-circle symbol-50px me-5">
                                        <img src="{{$review->user->avatar}}" class="" alt="" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="flex-grow-1">
                                        <a href="#" class="text-dark fw-bolder text-hover-primary fs-6">{{$review->user->first_name}}</a>
                                        <span class="text-muted d-block fw-bold">{{$review->user->email}}</span>
                                    </div>
                                    <!--end::Name-->
                                </div>
                                <!--end::Author-->
                            </div>
                            <!--end::Testimonial-->
                        </div>
                        <!--end::Col-->
                    @endforeach
                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <br><br><br>
        <!--begin::Footer Section-->
        <div class="mb-0">
            <!--begin::Wrapper-->
            <div class="landing-dark-bg black pt-20">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Row-->
                    <div class="row py-10 py-lg-20">
                        <!--begin::Col-->
                        <div class="col-lg-6 pe-lg-16 mb-10 mb-lg-0">
                            <!--begin::Block-->
                            <div class="rounded landing-dark-border p-9 mb-10">
                                <!--begin::Title-->
                                <h2 class="text-white">Would you need a any clarity?</h2>
                                <!--end::Title-->
                                <!--begin::Text-->
                                <span class="fw-normal fs-4 text-gray-700">Email us to
									<a href="#" class="text-white opacity-50 text-hover-primary">support@smartfin.com</a></span>
                                <!--end::Text-->
                            </div>
                            <!--end::Block-->

                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-lg-6 ps-lg-16">
                            <!--begin::Navs-->
                            <div class="d-flex justify-content-center">
                                <!--begin::Links-->
                                <div class="d-flex fw-bold flex-column me-20">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-400 mb-6">Short Links</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Link-->
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Sign in</a>
                                    <!--end::Link-->

                                    <!--begin::Link-->
                                    <a href="#" class="text-white opacity-50 text-hover-primary fs-5 mb-6">Supports</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Links-->
                                <!--begin::Links-->
                                <div class="d-flex fw-bold flex-column ms-lg-20">
                                    <!--begin::Subtitle-->
                                    <h4 class="fw-bolder text-gray-400 mb-6">Stay Connected</h4>
                                    <!--end::Subtitle-->
                                    <!--begin::Link-->
                                    <a href="#" class="mb-6">
                                        <img src="{{ asset('public/assets/media/svg/brand-logos/facebook-4.svg') }}" class="h-20px me-2" alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Facebook</span>
                                    </a>
                                    <!--end::Link-->

                                    <!--begin::Link-->
                                    <a href="#" class="mb-6">
                                        <img src="{{ asset('public/assets/media/svg/brand-logos/instagram-2-1.svg') }}" class="h-20px me-2" alt="" />
                                        <span class="text-white opacity-50 text-hover-primary fs-5 mb-6">Instagram</span>
                                    </a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Links-->
                            </div>
                            <!--end::Navs-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
                <!--begin::Separator-->
                <div class="landing-dark-separator"></div>
                <!--end::Separator-->
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-column flex-md-row flex-stack py-7 py-lg-10">
                        <!--begin::Copyright-->
                        <div class="d-flex align-items-center order-2 order-md-1">
                            <!--begin::Logo-->
                            <a href="">
                                <img alt="Logo" src="{{ asset('public/assets/img/logo.png') }}" class="h-15px h-md-20px" />
                            </a>
                            <!--end::Logo image-->
                            <!--begin::Logo image-->
                            <span class="mx-5 fs-6 fw-bold text-gray-600 pt-1" href="">© 2022 Smart Finance Inc.</span>
                            <!--end::Logo image-->
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold fs-6 fs-md-5 order-1 mb-5 mb-md-0">
                            <li class="menu-item">
                                <a href="" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item mx-5">
                                <a href="" target="_blank" class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="" target="_blank" class="menu-link px-2">Contact</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Footer Section-->
        <!--begin::Scrolltop-->
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
            <span class="svg-icon">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
						<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
					</svg>
				</span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Scrolltop-->
    </div>
    <!--end::Root-->
    <!--end::Main-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "public/assets/";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('public/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('public/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom/landing.js') }}"></script>
    <script src="{{ asset('public/assets/js/custom/pages/pricing/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>