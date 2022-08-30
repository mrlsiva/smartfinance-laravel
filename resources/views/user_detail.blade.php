@extends('layouts.master')
@section('body')
<style type="text/css">
	body{
		background-image: url(../public/assets/img/header-bg.jpg)!important;
	}
	#notification{
		background-image: url(../public/assets/media/misc/pattern-1.jpg)!important;
	}
</style>

<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Account Overview</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">
					<a href="{{route('dashboard')}}" class="text-white text-hover-primary">Home</a>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-white opacity-75 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">Overview</li>
				<!--end::Item-->
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title-->
	</div>
	<!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Container-->
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
	<!--begin::Post-->
	<div class="content flex-row-fluid" id="kt_content">
		<!--begin::Navbar-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							@if($user_detail == NULL )
								<img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="image" />
							@else
								<img src="{{ $user_detail->avatar }}" alt="image" />
							@endif
							<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<span class="text-gray-900 fs-2 fw-bolder me-1">{{$user->first_name}} {{$user->last_name}}</span>
									@if($user->is_active == 1 )
										<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24">
												<path d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z" fill="#00A3FF" />
												<path class="permanent" d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z" fill="white" />
											</svg>
										</span>
										<!--end::Svg Icon-->
									@endif
									@if($user->is_finanace == 1 )
										<a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Inverster</a>
									@endif
								</div>
								<!--end::Name-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
									<p class="d-flex align-items-center text-gray-400  me-5 mb-2">
										<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
												<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->@if($user_detail == NULL)- @else{{$user_detail->city}}@endif
									</p>
									<p class="d-flex align-items-center text-gray-400  mb-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
												<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->{{$user->email}}
									</p>
								</div>
								<!--end::Info-->
							</div>
							<!--end::User-->
						</div>
						<!--end::Title-->
						<!--begin::Stats-->
						<div class="d-flex flex-wrap flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<!--begin::Stats-->
								<div class="d-flex flex-wrap">
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->

											<!--end::Svg Icon-->
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="5" data-kt-countup-prefix="No.">0</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">No.Inversments</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="500000" data-kt-countup-prefix="Rs.">0</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Total Invertment</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="Rs.">10000</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Earnings</div>
										<!--end::Label-->
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%">5</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Earnings percentage</div>
										<!--end::Label-->
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="June">0</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Next payemnt</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Progress-->

							<!--end::Progress-->
						</div>
						<!--end::Stats-->
					</div>
					<!--end::Info-->
				</div>
				<!--end::Details-->
				<!--begin::Navs-->
				<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder">
					<!--begin::Nav item-->
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 py-5 active" id="basic" onclick="basic()">Basic Details</a>
					</li>
					<!--end::Nav item-->
					<!--begin::Nav item-->
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 py-5" id="additional" onclick="additional()">Additional Details</a>
					</li>
					<!--end::Nav item-->
					<!--begin::Nav item-->
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 py-5" id="bank" onclick="bank()">Bank Details</a>
					</li>
					<!--end::Nav item-->
					<!--begin::Nav item-->
					<li class="nav-item mt-2">
						<a class="nav-link text-active-primary ms-0 me-10 py-5" id="nominee" onclick="nominee()">Nominee Details</a>
					</li>
					<!--end::Nav item-->
				</ul>
				<!--begin::Navs-->
			</div>
		</div>
		<!--end::Navbar-->
		<!--begin::basic View-->
		<div id="basic_detail">
			<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Basic Details</h3>
					</div>
					<!--end::Card title-->
					<!--begin::Action-->
					<!-- <a href="#" class="btn align-self-center">Edit Profile</a> -->
					<!--end::Action-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Full Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fw-bolder fs-6 text-gray-800">{{$user->first_name}} {{$user->last_name}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Mail ID</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">{{$user->email}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Contact Phone
							
						</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 d-flex align-items-center">
							<span class="fw-bolder fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else+91 {{$user_detail->phone}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Address
							
						</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 d-flex align-items-center">
							<span class="fw-bolder fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->address}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">City
							
						</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 d-flex align-items-center">
							<span class="fw-bolder fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->city}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Pincode
							
						</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 d-flex align-items-center">
							<span class="fw-bolder fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->pincode}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Alternate Email
							
						</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 d-flex align-items-center">
							<span class="fw-bolder fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->email}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					@if($user->is_active == 0)
						<!--begin::Notice-->
						<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
							<!--begin::Icon-->
							<!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
							<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black" />
									<rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black" />
									<rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<!--end::Icon-->
							<!--begin::Wrapper-->
							<div class="d-flex flex-stack flex-grow-1">
								<!--begin::Content-->
								<div class="fw-bold">
									<h4 class="text-gray-900 fw-bolder">Attention!</h4>
									<div class="fs-6 text-gray-700">Inverster Waiting for your apprvel. <a class="fw-bolder" href="{{route('approve_user', ['id' => $user->id])}}">Verify Now</a>.</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Notice-->
					@endif
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::basic View-->
		<!--begin::additional View-->
		<div id="additional_detail" style="display:none;">
			<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Additional Details</h3>
					</div>
					<!--end::Card title-->
					<!--begin::Action-->
					<!-- <a href="#" class="btn align-self-center">Edit Profile</a> -->
					<!--end::Action-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Aadhaar Number</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fw-bolder fs-6 text-gray-800">@if($user_detail == NULL) - @else{{$user_detail->aadhaar_no}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Pan Card Number</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($user_detail == NULL) - @else{{$user_detail->pan_card_no}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group--><hr>
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold fs-6 text-start text-muted">Profile Picture</label>
						<!--end::Label-->
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold fs-6  text-muted">Aadhaar Card</label>
						<!--end::Label-->
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold fs-6 text-center text-muted">Pan Card</label>
						<!--end::Label-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<div class="col-lg-4">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed ">
								@if($user_detail == NULL) 
								<img src="{{ asset('public/assets/media/misc/image.png') }}" alt="image" />
								@else
								<img src="{{ $user_detail->avatar }}" alt="image" />
								@endif
							</div>
						</div>
						<div class="col-lg-4">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed ">
								@if($user_detail == NULL) 
								<img src="{{ asset('public/assets/media/misc/image.png') }}" alt="image" />
								@else
								<img src="{{ $user_detail->aadhaar }}" alt="image" />
								@endif
							</div>
						</div>
						<div class="col-lg-4 text-center">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
								@if($user_detail == NULL) 
								<img src="{{ asset('public/assets/media/misc/image.png') }}" alt="image" />
								@else
								<img src="{{ $user_detail->pan }}" alt="image" />
								@endif
							</div>
						</div>
					</div>
					<!--end::Input group-->
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::additional View-->
		<!--begin::bank View-->
		<div id="bank_detail" style="display:none;">
			<div class="card mb-5 mb-xl-10">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Bank Details</h3>
					</div>
					<!--end::Card title-->
					<!--begin::Action-->
					<!-- <a href="#" class="btn align-self-center">Edit Profile</a> -->
					<!--end::Action-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Account Holder Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fw-bolder fs-6 text-gray-800">@if($bank_detail == NULL) - @else{{$bank_detail->name}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Account Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->number}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">IFSC Code</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->ifsc_code}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Branch</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->branch}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">City</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->city}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::bank View-->
		<!--begin::nominee View-->
		<div id="nominee_detail" style="display:none;">
			<div class="card mb-5 mb-xl-10">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Nominee Details</h3>
					</div>
					<!--end::Card title-->
					<!--begin::Action-->
					<!-- <a href="#" class="btn align-self-center">Edit Profile</a> -->
					<!--end::Action-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Nominee Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fw-bolder fs-6 text-gray-800">@if($nominee_detail == NULL) - @else{{$nominee_detail->name}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Relationship</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($nominee_detail == NULL) - @else{{$nominee_detail->relationship}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Age</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($nominee_detail == NULL) - @else{{$nominee_detail->age}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Aadhaar Number</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<span class="fw-bold text-gray-800 fs-6">@if($nominee_detail == NULL) - @else{{$nominee_detail->aadhaar_no}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Aadhaar Card</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8 fv-row">
							<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
								@if($nominee_detail == NULL)
								<img src="{{ asset('public/assets/media/misc/image.png') }}" alt="image" />
								@else
								<img src="{{ $nominee_detail->aadhaar }}" alt="image" />
								@endif
							</div>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::nominee View-->
		<!--begin::Row-->
		<div class="row gy-5 g-xl-8">
			<div class="col-xl-12 mb-5 mb-xl-10">
				<!--begin::Table Widget 4-->
				<div class="card card-flush h-xl-100">
					<!--begin::Card header-->
					<div class="card-header pt-7">
						<!--begin::Title-->
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label fw-bolder text-dark">Smart Inverstment</span>
							<span class="text-gray-400 mt-1 fw-bold fs-6">10000 yearly scheme</span>
						</h3>
						<!--end::Title-->
						<!--begin::Actions-->
						<div class="card-toolbar">
							<!--begin::Filters-->
							<div class="d-flex flex-stack flex-wrap gap-4">
								<!--begin::Destination-->
								<!--end::Destination-->
								<!--begin::Status-->
								<div class="d-flex align-items-center fw-bolder">
									<!--begin::Label-->
									<div class="text-muted fs-7 me-2">Status</div>
									<!--end::Label-->
									<!--begin::Select-->
									<select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bolder py-0 ps-3 w-auto" data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
										<option></option>
										<option value="Show All" selected="selected">Show All</option>
										<option value="Shipped">Approved</option>
										<option value="Confirmed">Confirmed</option>
										<option value="Rejected">Rejected</option>
										<option value="Pending">Pending</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Status-->
								<!--begin::Search-->
								<div class="position-relative my-1">
									<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
									<span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
											<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
										</svg>
									</span>
									<!--end::Svg Icon-->
									<input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search" />
								</div>
								<!--end::Search-->
							</div>
							<!--begin::Filters-->
						</div>
						<!--end::Actions-->
					</div>
					<!--end::Card header-->
					<!--begin::Card body-->
					<div class="card-body">
						<!--begin::Table-->
						<table class="table align-middle table-row-dashed fs-6 gy-3" id="kt_table_widget_4_table">
							<!--begin::Table head-->
							<thead>
								<!--begin::Table row-->
								<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
									<th class="min-w-100px">Customer</th>
									<th class="text-end min-w-125px">INVESTMENT DATE</th>
									<th class="text-end min-w-100px">TOTAL AMOUNT INVESTED</th>
									<th class="text-end min-w-100px">RATE OF INTEREST</th>
									<th class="text-end min-w-100px">Profit</th>
									<th class="text-end min-w-50px">Status</th>
									<th class="text-end"></th>          
								</tr>
								<!--end::Table row-->
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody class="fw-bolder text-gray-600">
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<div class="symbol symbol-45px me-5">
												<img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" />
											</div>
											<div class="d-flex justify-content-start flex-column">
												<a href="#" class="text-dark fw-bolder text-hover-primary fs-6">Siva</a>
												<span class="text-muted fw-bold text-muted d-block fs-7">+91 9994090424</span>
											</div>
										</div>
									</td>
									<td class="text-end">13 June 2022, 11:52 pm</td>
									<!-- <td class="text-end">3000000</td> -->
									<td class="text-end">
										<a href="" class="text-dark text-hover-primary">3000000</a>
									</td>
									<td class="text-end">3%</td>
									<td class="text-end">
										<span class="text-dark fw-bolder">Rs. 60000</span>
									</td>
									<td class="text-end">
										<span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
									</td>
									<td class="text-end">
										<a href="#" class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
											<span class="svg-icon svg-icon-2">
												<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
													<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
													<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
												</svg>
											</span>
											<!--end::Svg Icon-->
										</a>
									</td>
								</tr>
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Table Widget 4-->
			</div>
		</div>
		<!--end::Row-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	function basic() {

		document.getElementById("basic").classList.add("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.remove("active");
		$('#basic_detail').show();
        $('#additional_detail').hide();
        $('#bank_detail').hide();
        $('#nominee_detail').hide();

	}
	function additional() {

        document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.add("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.remove("active");
		$('#basic_detail').hide();
        $('#additional_detail').show();
        $('#bank_detail').hide();
        $('#nominee_detail').hide();

	}
	function bank() {

		document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.add("active");
		document.getElementById("nominee").classList.remove("active");
		$('#basic_detail').hide();
        $('#additional_detail').hide();
        $('#bank_detail').show();
        $('#nominee_detail').hide();

	}
	function nominee() {
		
        document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.add("active");
		$('#basic_detail').hide();
        $('#additional_detail').hide();
        $('#bank_detail').hide();
        $('#nominee_detail').show();

	}
</script>

@endsection