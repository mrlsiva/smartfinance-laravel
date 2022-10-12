@extends('layouts.master')
@section('body')

<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Account Overview-{{$user->role->name}}</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">
					<a href="{{route('dashboard')}}" class="text-white text-hover-primary">Dashboard</a>
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
									@if($user->is_profile_verified == 1 )
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
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$investment_count}}" data-kt-countup-prefix="No.">0</div>
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

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$amount}}" data-kt-countup-prefix="Rs.">{{$amount}}</div>
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

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$earning_amount}}" data-kt-countup-prefix="Rs.">10000</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Earnings</div>
										<!--end::Label-->
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$earning_percentage}}" data-kt-countup-prefix="%">5</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Earnings percentage</div>
										<!--end::Label-->
									</div>
									@if($user->is_reffer == 1  )

									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<div class="fs-2 fw-bolder" >{{$refferals->count()}}</div>

											
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Refferal</div>
										<!--end::Label-->
									</div>
									@endif
									<!-- <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3"> -->
										<!--begin::Number-->
										<!-- <div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="7" data-kt-countup-prefix="June">0</div>
										</div> -->
										<!--end::Number-->
										<!--begin::Label-->
										<!-- <div class="fw-bold fs-6 text-gray-400">Next payemnt</div> -->
										<!--end::Label-->
									<!-- </div> -->
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
					@if($user->is_reffer == 1  )
						<!--begin::Nav item-->
						<li class="nav-item mt-2">
							<a class="nav-link text-active-primary ms-0 me-10 py-5" id="reffer" onclick="reffer()">Refferal Details</a>
						</li>
						<!--end::Nav item-->
					@else
						<!--begin::Nav item-->
						<li class="nav-item mt-2" style="display:none;">
							<a class="nav-link text-active-primary ms-0 me-10 py-5" id="reffer" onclick="reffer()">Refferal Details</a>
						</li>
						<!--end::Nav item-->
					@endif
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
					@if($user_detail != NULL)
					<!--begin::Action-->
					<a href="#" class="btn align-self-center text-hover-primary" data-bs-toggle="modal" data-bs-target="#BasicModal">Edit Profile</a>
					<!--end::Action-->
					@endif
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
							<span class="fs-6 text-gray-800">{{$user->first_name}} {{$user->last_name}}</span>
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
							<span class="text-gray-800 fs-6">{{$user->email}}</span>
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
							<span class="fs-6 text-gray-800 me-2">+91 {{$user->phone}}</span>
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
							<span class="fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->address}}@endif</span>
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
							<span class="fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->city}}@endif</span>
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
							<span class="fs-6 text-gray-800 me-2">@if($user_detail == NULL) - @else{{$user_detail->pincode}}@endif</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Input group-->
					@if($user_detail != NULL && $user->is_profile_verified == 0)
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
									<div class="fs-6 text-gray-700">Your profile is under verification.</div>
								</div>
								<!--end::Content-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Notice-->
						@elseif($user_detail != NULL && $user->is_profile_updated == 1)
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
									<div class="fs-6 text-gray-700">Your profile updation is under verification.</div>
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
					@if($user_detail != NULL)
					<!--begin::Action-->
					<a href="#" class="btn align-self-center" data-bs-toggle="modal" data-bs-target="#AdditionalModal">Edit Profile</a>
					<!--end::Action-->
					@endif
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
							<span class="fs-6 text-gray-800">
								@if($user_detail == NULL)
								 - 
								@else
									@php
										$aadhaar_no = implode("-", str_split($user_detail->aadhaar_no, 4));
									@endphp
									{{$aadhaar_no}}
								@endif
							</span>
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
							<span class="text-gray-800 fs-6">@if($user_detail == NULL) - @else{{$user_detail->pan_card_no}}@endif</span>
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
						<label class="col-lg-4 fw-bold fs-6  text-muted">Pan Card</label>
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
						<div class="col-lg-4 ">
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
					@if($bank_detail != NULL)
					<!--begin::Action-->
					<a href="#" class="btn align-self-center" data-bs-toggle="modal" data-bs-target="#BankModal">Edit Profile</a>
					<!--end::Action-->
					@endif
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Bank Account Holder Name</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fs-6 text-gray-800">@if($bank_detail == NULL) - @else{{$bank_detail->name}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->number}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->ifsc_code}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->branch}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($bank_detail == NULL) - @else{{$bank_detail->city}}@endif</span>
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
					@if($nominee_detail != NULL)
					<!--begin::Action-->
					<a href="#" class="btn align-self-center" data-bs-toggle="modal" data-bs-target="#NomineeModal">Edit Profile</a>
					<!--end::Action-->
					@endif
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
							<span class="fs-6 text-gray-800">@if($nominee_detail == NULL) - @else{{$nominee_detail->name}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($nominee_detail == NULL) - @else{{$nominee_detail->relationship}}@endif</span>
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
							<span class="text-gray-800 fs-6">@if($nominee_detail == NULL) - @else{{$nominee_detail->age}}@endif</span>
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
							<span class="text-gray-800 fs-6">
								@if($nominee_detail == NULL)
									- 
								@else
									@php
										$nominee_aadhaar_no = implode("-", str_split($nominee_detail->aadhaar_no, 4));
									@endphp
									{{$nominee_aadhaar_no}}
								@endif
							</span>
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
		<!--begin::reffer View-->
		<div id="reffer_detail" style="display:none;">
			<div class="card mb-5 mb-xl-10">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Refferal Details</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--begin::Card header-->
				<!--begin::Card body-->
				<div class="card-body p-9">
					
					<table class="table align-middle table-row-dashed fs-6 gy-3" >
						<!--begin::Table head-->
						<thead>
							<!--begin::Table row-->
							<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
								<th class="">REFFERED</th>
								<th class="">MONTHLY INVESTMENT</th>
								<th class="">YEARLY INVESTMENT</th>
								<th class="">YEARLY MONTHLY INVESTMENT</th>     
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="fw-bolder text-gray-600">
							@foreach($refferals as $refferal)
								
									@php
										$month_finances = App\Models\Smartfinance::where([['user_id',$refferal->reffered],['plan_id',1],['is_status',1],['is_close',0]])->get();
										$month_amount = 0;
										if($month_finances != NULL){
											foreach($month_finances as $month_finance){
												$month_amount = $month_amount + $month_finance->amount;

											}

										}

										$year_finances = App\Models\Smartfinance::where([['user_id',$refferal->reffered],['plan_id',2],['is_status',1],['is_close',0]])->get();
										$year_amount = 0;
										if($year_finances != NULL){
											foreach($year_finances as $year_finance){
												$year_amount = $year_amount + $year_finance->amount;
											}
										}

										$yearm_finances = App\Models\Smartfinance::where([['user_id',$refferal->reffered],['plan_id',3],['is_status',1],['is_close',0]])->get();
										$yearm_amount = 0;
										if($yearm_finances != NULL){
											foreach($yearm_finances as $yearm_finance){
												$payments = App\Models\SmartfinancePayment::where([['smartfinance_id',$yearm_finance->id],['is_approve',1]])->get();
												foreach($payments as $payment){
													$yearm_amount = $yearm_amount + $payment->investment_amount;
												}
											}
										}
									@endphp
									<tr>
										<td>{{$refferal->reffer->first_name}} {{$refferal->reffer->last_name}}<span class="text-muted fw-bold text-muted d-block fs-7">#{{$refferal->reffer->id}}</span></td>
										<td>Rs. {{$month_amount}}</td>
										<td>Rs. {{$year_amount}}</td>
										<td>Rs. {{$yearm_amount}}</td>
									</tr>
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					
				</div>
				<!--end::Card body-->
			</div>
		</div>
		<!--end::reffer View-->

    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

<!-- Basic Modal -->
<div class="modal fade" id="BasicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Basic Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post"  action="{{route('edit_profile')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body" >
					<input type="hidden" name="profile_update" value="true">
					<input type="hidden" name="type" value="basic">
					<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">First Name</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="First Name"></i>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('first_name') is-invalid @enderror" placeholder="First Name" value="{{$user->first_name}}" name="first_name" id="first_name" />
								<!--end::Input-->
								@error('first_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="">Last Name</span>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid" placeholder="Last Name" value="{{$user->last_name}}" name="last_name" id="last_name" />
								<!--end::Input-->
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Email</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Email"></i>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="email" class="form-control form-control-solid @error('email') is-invalid @enderror" placeholder="Email" value="{{$user->email}}" name="email" id="email" />
								<!--end::Input-->
								@error('email')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Mobile</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Mobile"></i>
								</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input type="number" class="form-control form-control-solid  @error('phone') is-invalid @enderror" placeholder="Mobile" value="{{$user->phone}}" name="phone" id="phone" />
								<!--end::Input-->
								@error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Address</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Address"></i>
								</label>
								<!--end::Label-->
								@if($user_detail == NULL)
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Address" value="" name="address" id="address" required />
									<!--end::Input-->
								@else
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="Address" value="{{$user_detail->address}}" name="address" id="address" required />
									<!--end::Input-->
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">City</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="City"></i>
								</label>
								<!--end::Label-->
								@if($user_detail == NULL)
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="City" value="" name="city" id="city" required />
									<!--end::Input-->
								@else
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid" placeholder="City" value="{{$user_detail->city}}" name="city" id="city" required />
									<!--end::Input-->
								@endif
								
							</div>
						</div>
					</div>
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Pincode</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pincode"></i>
						</label>
						<!--end::Label-->
						@if($user_detail == NULL)
							<!--begin::Input-->
							<input type="number" class="form-control form-control-solid @error('pincode') is-invalid @enderror" placeholder="Pincode" value="" name="pincode" id="pincode"   />
							<!--end::Input-->
							@error('pincode')
                                <div class="text-danger">{{ $message }}</div>
                           	@enderror

						@else
							<!--begin::Input-->
							<input type="number" class="form-control form-control-solid @error('pincode') is-invalid @enderror" placeholder="Pincode" value="{{$user_detail->pincode}}" name="pincode" id="pincode" />
							<!--end::Input-->
							@error('pincode')
                                <div class="text-danger">{{ $message }}</div>
                           	@enderror
						@endif
							
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Basic Modal -->

<!-- Additional Modal -->
<div class="modal fade" id="AdditionalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Additional Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post"  action="{{route('edit_profile')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body" >
					<input type="hidden" name="profile_update" value="true">
					<input type="hidden" name="type" value="additional">
					<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Aadhaar Number</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Aadhaar Number"></i>
								</label>
								<!--end::Label-->
								@if($user_detail)
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid @error('aadhaar_no') is-invalid @enderror" placeholder="Aadhaar Number" value="{{$user_detail->aadhaar_no}}" name="aadhaar_no" id="aadhaar_no" />
									<!--end::Input-->
									@error('aadhaar_no')
                                    	<div class="text-danger">{{ $message }}</div>
                                	@enderror
								@else
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid @error('aadhaar_no') is-invalid @enderror" placeholder="Aadhaar Number" value="" name="aadhaar_no" id="aadhaar_no" />
									<!--end::Input-->
									@error('aadhaar_no')
                                    	<div class="text-danger">{{ $message }}</div>
                                	@enderror
								@endif
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Pan Card Number</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pan Card Number"></i>
								</label>
								<!--end::Label-->
								@if($user_detail)
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid @error('pan_card_no') is-invalid @enderror" placeholder="Pan Card Number" value="{{$user_detail->pan_card_no}}" name="pan_card_no" id="pan_card_no" />
									<!--end::Input-->
									@error('pan_card_no')
                                    	<div class="text-danger">{{ $message }}</div>
                                	@enderror
								@else
									<!--begin::Input-->
									<input type="text" class="form-control form-control-solid @error('pan_card_no') is-invalid @enderror" placeholder="Pan Card Number" value="" name="pan_card_no" id="pan_card_no" />
									<!--end::Input-->
									@error('pan_card_no')
                                    	<div class="text-danger">{{ $message }}</div>
                                	@enderror
								@endif
							</div>
						</div>
					</div>
					<!--begin::Input group-->
					<div class="fv-row mb-7">
						<label class="form-label fw-bolder text-dark fs-6">Profile Photo</label>
						<!--begin::Input-->
                        <input type="file" class="form-control form-control-solid custom-file-input" id="avatar" placeholder="Avatar" value="" name="avatar" accept="image/*" />
                        <div class="d-flex justify-content-center mt-3">
                        	@if($user_detail)
                            <img src="{{ $user_detail->avatar }}" id="preview-image-avatar"  style="max-height: 200px;">
                            @else
                            <img id="preview-image-avatar"  style="max-height: 200px;">
                            @endif
                        </div>
                        <!--end::Input-->
					</div>
					@error('avatar')
					<div class="text-danger">{{ $message }}</div>
					@enderror
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-7">
						<label class="form-label fw-bolder text-dark fs-6">Aadhaar Card</label>
						<!--begin::Input-->
                        <input type="file" class="form-control form-control-solid custom-file-input" id="aadhaar_card" placeholder="Aadhaar Card" value="" name="aadhaar_card" accept="image/*" />
                        <div class="d-flex justify-content-center mt-3">
                        	@if($user_detail)
                            <img src="{{$user_detail->aadhaar}}" id="preview-image-aadhaar_card" style="max-height: 200px;">
                            @else
                            <img id="preview-image-aadhaar_card" style="max-height: 200px;">
                            @endif
                        </div>
                        <!--end::Input-->
					</div>
					@error('aadhaar_card')
					<div class="text-danger">{{ $message }}</div>
					@enderror
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-7">
						<label class="form-label fw-bolder text-dark fs-6">Pan Card</label>
						<!--begin::Input-->
                        <input type="file" class="form-control form-control-solid custom-file-input" id="pan_card" placeholder="Pan Card" value="" name="pan_card" accept="image/*" />
                        <div class="d-flex justify-content-center mt-3">
                        	@if($user_detail)
                             <img src="{{$user_detail->pan}}" id="preview-image-pan_card" style="max-height: 200px;">
                            @else
                             <img id="preview-image-pan_card" style="max-height: 200px;">
                            @endif
                        </div>
                        <!--end::Input-->
					</div>
					@error('pan_card')
					<div class="text-danger">{{ $message }}</div>
					@enderror
					<!--end::Input group-->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Additional Modal -->

<!-- Bank Modal -->
<div class="modal fade" id="BankModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Bank Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post"  action="{{route('edit_profile')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body" >
					<input type="hidden" name="profile_update" value="true">
					<input type="hidden" name="type" value="bank">
					<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Bank Account Holder Name</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Account Holder Name"></i>
								</label>
								<!--end::Label-->
								@if($bank_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('holder_name') is-invalid @enderror" placeholder="Bank Account Holder Name" value="{{$bank_detail->name}}" name="holder_name" id="holder_name" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('holder_name') is-invalid @enderror" placeholder="Bank Account Holder Name" value="" name="holder_name" id="holder_name" />
								<!--end::Input-->
								@endif
								@error('holder_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Account No</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Account No"></i>
								</label>
								<!--end::Label-->
								@if($bank_detail)
								<!--begin::Input-->
								<input type="number" class="form-control form-control-solid @error('account_no') is-invalid @enderror" placeholder="Account No" value="{{$bank_detail->number}}" name="account_no" id="account_no" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('account_no') is-invalid @enderror" placeholder="Account No" value="" name="account_no" id="account_no" />
								<!--end::Input-->
								@endif
								@error('account_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">IFSC Code</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="IFSC Code"></i>
								</label>
								<!--end::Label-->
								@if($bank_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('ifsc_code') is-invalid @enderror" placeholder="IFSC Code" value="{{$bank_detail->ifsc_code}}" name="ifsc_code" id="ifsc_code" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('ifsc_code') is-invalid @enderror" placeholder="IFSC Code" value="" name="ifsc_code" id="ifsc_code" required />
								<!--end::Input-->
								@endif
								@error('ifsc_code')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Branch</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Branch"></i>
								</label>
								<!--end::Label-->
								@if($bank_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid  @error('branch') is-invalid @enderror" placeholder="Branch" value="{{$bank_detail->branch}}" name="branch" id="branch" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid  @error('branch') is-invalid @enderror" placeholder="Branch" value="" name="branch" id="branch" required />
								<!--end::Input-->
								@endif
								@error('branch')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
					</div>
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">City</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="City"></i>
						</label>
						<!--end::Label-->
						@if($bank_detail == NULL)
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid @error('city') is-invalid @enderror" placeholder="City" value="" name="city" id="city" required  />
							<!--end::Input-->
							

						@else
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid @error('city') is-invalid @enderror" placeholder="City" value="{{$bank_detail->city}}" name="city" id="city" required />
							<!--end::Input-->
							
						@endif
						@error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Bank Modal -->

<!-- Nominee Modal -->
<div class="modal fade" id="NomineeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nominee Details</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="post"  action="{{route('edit_profile')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body" >
					<input type="hidden" name="profile_update" value="true">
					<input type="hidden" name="type" value="nominee">
					<input type="hidden" name="user_id" value="{{$user->id}}">
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Nominee Name</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Name"></i>
								</label>
								<!--end::Label-->
								@if($nominee_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('nominee_name') is-invalid @enderror" placeholder="nominee_name" value="{{$nominee_detail->name}}" name="nominee_name" id="nominee_name" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('nominee_name') is-invalid @enderror" placeholder="Nominee Name" value="" name="nominee_name" id="nominee_name" />
								<!--end::Input-->
								@endif
								@error('nominee_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Relationship</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Relationship"></i>
								</label>
								<!--end::Label-->
								@if($nominee_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('relationship') is-invalid @enderror" placeholder="Relationship" value="{{$nominee_detail->relationship}}" name="relationship" id="relationship" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('relationship') is-invalid @enderror" placeholder="Relationship" value="" name="relationship" id="relationship" />
								<!--end::Input-->
								@endif
								@error('relationship')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Nominee Age</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Age"></i>
								</label>
								<!--end::Label-->
								@if($nominee_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('age') is-invalid @enderror" placeholder="Nominee Age" value="{{$nominee_detail->age}}" name="age" id="age" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid @error('age') is-invalid @enderror" placeholder="Nominee Age" value="" name="age" id="age" required />
								<!--end::Input-->
								@endif
								@error('age')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
						<div class="col-md-6">
							<div class="fv-row mb-8">
								<!--begin::Label-->
								<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
									<span class="required">Nominee Aadhaar Number</span>
									<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Aadhaar Number"></i>
								</label>
								<!--end::Label-->
								@if($nominee_detail)
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid  @error('nominee_aadhaar_no') is-invalid @enderror" placeholder="Nominee Aadhaar Number" value="{{$nominee_detail->aadhaar_no}}" name="nominee_aadhaar_no" id="nominee_aadhaar_no" required />
								<!--end::Input-->
								@else
								<!--begin::Input-->
								<input type="text" class="form-control form-control-solid  @error('nominee_aadhaar_no') is-invalid @enderror" placeholder="Nominee Aadhaar Number" value="" name="nominee_aadhaar_no" id="nominee_aadhaar_no" required />
								<!--end::Input-->
								@endif
								@error('nominee_aadhaar_no')
                                    <div class="text-danger">{{ $message }}</div>
                            	@enderror
							</div>
						</div>
					</div>
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Nominee Aadhar Card</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Nominee Aadhar Card"></i>
						</label>
						<!--end::Label-->
						@if($nominee_detail == NULL)
							<input type="file" class="form-control form-control-solid custom-file-input" id="nominee_aadhar" placeholder="Nominee Aadhar Card" value="" name="nominee_aadhar" accept="image/*" />
                            <div class="d-flex justify-content-center mt-3">
                                <img id="preview-image-nominee_aadhar" style="max-height: 200px;">
                            </div>
						@else
							<!--begin::Input-->
							<input type="file" class="form-control form-control-solid custom-file-input" id="nominee_aadhar" placeholder="Nominee Aadhar Card" value="" name="nominee_aadhar" accept="image/*" />
                            <div class="d-flex justify-content-center mt-3">
                                <img src="{{$nominee_detail->aadhaar}}" id="preview-image-nominee_aadhar" style="max-height: 200px;">
                            </div>
							<!--end::Input-->
							
						@endif
						@error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Nominee Modal -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- navigation -->
<script type="text/javascript">
	function basic() {

		document.getElementById("basic").classList.add("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.remove("active");
		document.getElementById("reffer").classList.remove("active");
		$('#basic_detail').show();
		$('#additional_detail').hide();
		$('#bank_detail').hide();
		$('#nominee_detail').hide();
		$('#reffer_detail').hide();

	}
	function additional() {

		document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.add("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.remove("active");
		document.getElementById("reffer").classList.remove("active");
		$('#basic_detail').hide();
		$('#additional_detail').show();
		$('#bank_detail').hide();
		$('#nominee_detail').hide();
		$('#reffer_detail').hide();

	}
	function bank() {

		document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.add("active");
		document.getElementById("nominee").classList.remove("active");
		document.getElementById("reffer").classList.remove("active");
		$('#basic_detail').hide();
		$('#additional_detail').hide();
		$('#bank_detail').show();
		$('#nominee_detail').hide();
		$('#reffer_detail').hide();

	}
	function nominee() {
		
		document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.add("active");
		document.getElementById("reffer").classList.remove("active");
		$('#basic_detail').hide();
		$('#additional_detail').hide();
		$('#bank_detail').hide();
		$('#nominee_detail').show();
		$('#reffer_detail').hide();

	}

	function reffer() {
		
		document.getElementById("basic").classList.remove("active");
		document.getElementById("additional").classList.remove("active");
		document.getElementById("bank").classList.remove("active");
		document.getElementById("nominee").classList.remove("active");
		document.getElementById("reffer").classList.add("active");
		$('#basic_detail').hide();
		$('#additional_detail').hide();
		$('#bank_detail').hide();
		$('#nominee_detail').hide();
		$('#reffer_detail').show();

	}
</script>
<!-- navigation end -->

<script type="text/javascript">    
    $(document).ready(function (e) { 
       $('#avatar').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-avatar').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });
</script>

<script type="text/javascript">    
    $(document).ready(function (e) {
       
       $('#aadhaar_card').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-aadhaar_card').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });
</script>

<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#pan_card').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-pan_card').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#nominee_aadhar').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-nominee_aadhar').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

@endsection