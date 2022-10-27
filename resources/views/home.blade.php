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

<body id="kt_body" style="background-image: url(public/assets/media/patterns/header-bg.jpg)" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200" class="bg-white position-relative">
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
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center w-100 min-h-350px min-h-lg-500px px-9">
                    <div class="tns tns-default">
                        <!--begin::Slider-->
                        <div data-tns="true" data-tns-loop="true" data-tns-swipe-angle="false" data-tns-speed="2000" data-tns-autoplay="true" data-tns-autoplay-timeout="18000" data-tns-controls="true" data-tns-nav="false" data-tns-items="1" data-tns-center="false" data-tns-dots="false"
                            data-tns-prev-button="#kt_team_slider_prev1" data-tns-next-button="#kt_team_slider_next1">
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="{{ asset('public/assets/img/slider.jpg') }}" class="card-rounded shadow mw-100" alt="" />
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="{{ asset('public/assets/img/slider-2.jpg') }}" class="card-rounded shadow mw-100" alt="" />
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="text-center px-5 pt-5 pt-lg-10 px-lg-10">
                                <img src="{{ asset('public/assets/img/slider-3.jpg') }}" class="card-rounded shadow mw-100" alt="" />
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Slider-->
                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_prev1">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg-->
								<span class="svg-icon svg-icon-3x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
                        <!--end::Slider button-->
                        <!--begin::Slider button-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_team_slider_next1">
								<!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
								<span class="svg-icon svg-icon-3x">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<path d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z" fill="black" />
									</svg>
								</span>
								<!--end::Svg Icon-->
							</button>
                        <!--end::Slider button-->
                    </div>
                </div>
                <!--end::Landing hero-->
            </div>
            <!--end::Wrapper-->

        </div>
        <!--end::Header Section-->
        <!--begin::Container-->
        <div class="container">
            <!--begin::Heading-->
            <div class="text-center mb-17">
                <!--begin::Title-->
                <h3 class="fs-2hx text-dark mb-5" id="our-services" data-kt-scroll-offset="{default: 100, lg: 150}">Our Services</h3>
                <!--end::Title-->
                <!--begin::Text-->
                <!-- <div class="fs-5 text-muted fw-bold">Save thousands to millions of bucks by using single tool
                    <br />for different amazing and great useful admin</div> -->
                <!--end::Text-->
            </div>
            <!--end::Heading-->
            <!--begin::Row-->
            <div class="row w-100 gy-10 mb-md-20">
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('public/assets/img/money-bag.svg') }}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">1</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Smart Investment</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">Our PREMIMUM financial service where we smartly invest your hard earned money into a diversified set of instruments to give you the best returns even in hard times.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('public/assets/img/savings.svg') }}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">2</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Mutual Funds</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted text-center">In finance, investment is buying or creating an asset with the expectation of capital appreciation, dividends (profit), interest earnings, rents, or some combination of these returns.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('public/assets/img/heart-rate.svg') }}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">3</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Insurance</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">Ensure you are PROTECTING your world with INSURANCE. It is a means of protection from financial loss. It is a form of risk management primarily used to hedge against the risk of a contingent, uncertain loss.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-3 px-5">
                    <!--begin::Story-->
                    <div class="text-center mb-10 mb-md-0">
                        <!--begin::Illustration-->
                        <img src="{{ asset('public/assets/img/pie-chart.svg') }}" class="mh-125px mb-9" alt="" />
                        <!--end::Illustration-->
                        <!--begin::Heading-->
                        <div class="d-flex flex-center mb-5">
                            <!--begin::Badge-->
                            <span class="badge badge-circle badge-light-success fw-bolder p-5 me-3 fs-3">4</span>
                            <!--end::Badge-->
                            <!--begin::Title-->
                            <div class="fs-5 fs-lg-3 fw-bolder text-dark">Taxation</div>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Description-->
                        <div class="fw-bold fs-6 fs-lg-4 text-muted">Don't let TAXES RUIN your DREAM Making decisions at the last minute on TAX PLANNING will often lead to a bad decision. One can either lock up money for years or watch your money grow at a very slow pace. Save Smart</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Story-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->

        <!--begin::Statistics Section-->
        <div class="mt-sm-n10">

            <!--begin::Wrapper-->
            <div class="pb-15 pt-18 landing-dark-bg black">
                <!--begin::Container-->
                <div class="container">
                    <!--begin::Heading-->
                    <div class="text-center mt-15 mb-18" id="about-us" data-kt-scroll-offset="{default: 100, lg: 150}">
                        <!--begin::Title-->
                        <h3 class="fs-2hx text-white fw-bolder mb-5">About us</h3>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="fs-5 text-gray-700 fw-bold">Smart Financial Solutions is an independent financial service firm dedicated to helping people make educated decisions about their money and insurance. Our company does this by offering personalized, independent, and objective
                            analysis while providing the highest level of service to every client. We offer a variety of investment and insurance options for our diverse clients to reach their long term goals. An important part of financial analysis is
                            the recognition that everyone’s economic and life situation is unique. We believe personalized service is essential when matching clients with the right financial products and services. We strive to provide financial analysis
                            to each of our client’s unique needs. As an independent firm, Smart Financial Solutions has none of its financial products to sell, therefore clients receive objective advice. Our recommendations are based on what is most appropriate
                            for our clients after listening and evaluating their needs and goals.</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Statistics-->
                    <div class="d-flex flex-center">
                        <!--begin::Items-->
                        <div class="d-flex flex-wrap flex-center justify-content-lg-between mb-15 mx-auto w-xl-900px">
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" >
                                <!--begin::Symbol-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-white mb-3 rounded-img">
									<img src="{{ asset('public/assets/img/user.gif') }}" class="w-100" alt="" />

									</span>
                                <!--end::Svg Icon-->
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="mb-0">
                                    <!--begin::Value-->
                                    <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="700" data-kt-countup-suffix="+">0</div>
                                    </div>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Trusted customers</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" >
                                <!--begin::Symbol-->
                                <!--begin::Svg Icon | path: icons/duotune/graphs/gra008.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-white mb-3 rounded-img">
									<img src="{{ asset('public/assets/img/money-bag.gif') }}" class="w-100" alt="" />

									</span>
                                <!--end::Svg Icon-->
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="mb-0">
                                    <!--begin::Value-->
                                    <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="80" data-kt-countup-suffix="K+">0</div>
                                    </div>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Loan Distributed</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex flex-column flex-center h-200px w-200px h-lg-250px w-lg-250px m-3 bgi-no-repeat bgi-position-center bgi-size-contain" >
                                <!--begin::Symbol-->
                                <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                <span class="svg-icon svg-icon-2tx svg-icon-white mb-3 rounded-img">
									<img src="{{ asset('public/assets/img/shield.gif') }}" class="w-100" alt="" />

									</span>
                                <!--end::Svg Icon-->
                                <!--end::Symbol-->
                                <!--begin::Info-->
                                <div class="mb-0">
                                    <!--begin::Value-->
                                    <div class="fs-lg-2hx fs-2x fw-bolder text-white d-flex flex-center">
                                        <div class="min-w-70px" data-kt-countup="true" data-kt-countup-value="100" data-kt-countup-suffix="%">0</div>
                                    </div>
                                    <!--end::Value-->
                                    <!--begin::Label-->
                                    <span class="text-gray-600 fw-bold fs-5 lh-0">Secured Money</span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Items-->
                    </div>
                    <!--end::Statistics-->

                </div>
                <!--end::Container-->
            </div>
            <!--end::Wrapper-->

        </div>


        <!--begin::Projects Section-->
        <div class="mb-lg-n15 position-relative z-index-2">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card" style="filter: drop-shadow(0px 0px 40px rgba(68, 81, 96, 0.08))">
                    <!--begin::Card body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Heading-->
                        <div class="text-center mb-5 mb-lg-10">
                            <!--begin::Title-->
                            <h3 class="fs-2hx text-dark mb-5" id="our-Videos" data-kt-scroll-offset="{default: 100, lg: 150}">Our Projects</h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tabs wrapper-->
                        <div class="d-flex flex-center mb-5 mb-lg-15">
                            <!--begin::Tabs-->
                            <!-- <ul class="nav border-transparent flex-center fs-5 fw-bold">
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6 active" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_latest">Latest</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_web_design">Web Design</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_mobile_apps">Mobile Apps</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-gray-500 text-active-primary px-3 px-lg-6" href="#" data-bs-toggle="tab" data-bs-target="#kt_landing_projects_development">Development</a>
                                </li>
                            </ul> -->
                            <!--end::Tabs-->
                        </div>
                        <iframe width="420" height="315" src="https://www.youtube.com/embed/eI4an8aSsgw" allowfullscreen>
</iframe>
                        <!--end::Tabs wrapper-->
                        <!--begin::Tabs content-->
                        <div class="tab-content">
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade show active" id="kt_landing_projects_latest">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="#">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('public/assets/img/video.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="#">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/img/video.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="#">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/img/video.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="#">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/img/video.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_web_design">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-11.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('public/assets/media/stock/600x600/img-11.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="public/assets/media/stock/600x600/img-12.jpg">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-12.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-21.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-21.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="../assets/media/stock/600x400/img-20.jpg">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-20.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_mobile_apps">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-16.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-16.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-12.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-12.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x400/img-15.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-15.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-23.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('public/assets/media/stock/600x600/img-23.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                            <!--begin::Tab pane-->
                            <div class="tab-pane fade" id="kt_landing_projects_development">
                                <!--begin::Row-->
                                <div class="row g-10">
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay h-lg-100" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-15.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-lg-100 min-h-250px" style="background-image:url('public/assets/media/stock/600x600/img-15.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-lg-6">
                                        <!--begin::Row-->
                                        <div class="row g-10 mb-10">
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-22.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-22.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                            <!--begin::Col-->
                                            <div class="col-lg-6">
                                                <!--begin::Item-->
                                                <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x600/img-21.jpg') }}">
                                                    <!--begin::Image-->
                                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-21.jpg')"></div>
                                                    <!--end::Image-->
                                                    <!--begin::Action-->
                                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                        <i class="bi bi-eye-fill fs-3x text-white"></i>
                                                    </div>
                                                    <!--end::Action-->
                                                </a>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                        <!--begin::Item-->
                                        <a class="d-block card-rounded overlay" data-fslightbox="lightbox-projects" href="{{ asset('public/assets/media/stock/600x400/img-14.jpg') }}">
                                            <!--begin::Image-->
                                            <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded h-250px" style="background-image:url('public/assets/media/stock/600x600/img-14.jpg')"></div>
                                            <!--end::Image-->
                                            <!--begin::Action-->
                                            <div class="overlay-layer card-rounded bg-dark bg-opacity-25">
                                                <i class="bi bi-eye-fill fs-3x text-white"></i>
                                            </div>
                                            <!--end::Action-->
                                        </a>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Tab pane-->
                        </div>
                        <!--end::Tabs content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Projects Section-->
        <!--end::Statistics Section-->
        <div class="mt-20 mb-n20 position-relative z-index-2">
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
                     <a href="{{route('review_rating')}}" class="text-primary text-center text-decoration-underline fs-5 fw-bold">View More</a>
                </div>
                <!--end::Row-->
                <!--begin::Highlight-->
                <div class="d-flex flex-stack flex-wrap flex-md-nowrap card-rounded shadow p-8 p-lg-12 mb-n5 mb-lg-n13" style="background: linear-gradient(90deg, #fff200 0%, #a0b40e 100%);">
                    <!--begin::Content-->
                    <div class="my-2 me-5">
                        <!--begin::Title-->
                        <div class="fs-1 fs-lg-2qx fw-bolder text-white mb-2">Get in touch with us
                            <!-- <span class="fw-normal">Speed Up Development!</span> -->
                        </div>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <!-- <div class="fs-6 fs-lg-5 text-white fw-bold opacity-75">Join over 100,000 Professionals Community to Stay Ahead</div> -->
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                    <!--begin::Link-->
                    <a href="#" class="btn btn-lg btn-outline border-2 btn-outline-white flex-shrink-0 my-2">Call Us</a>
                    <!--end::Link-->
                </div>
                <!--end::Highlight-->
            </div>
            <!--end::Container-->
        </div>
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