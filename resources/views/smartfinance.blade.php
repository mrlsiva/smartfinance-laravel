@extends('layouts.master')
@section('body')
<style type="text/css">
body{
	background-image: url(../public/assets/img/header-bg.jpg)!important;
}
#notification{
	background-image: url(../public/assets/media/misc/pattern-1.jpg)!important;
}
.scroll {
	-ms-overflow-style: none; /* for Internet Explorer, Edge */
	scrollbar-width: none; /* for Firefox */
	overflow-y: scroll; 
}

.scroll::-webkit-scrollbar {
	display: none; /* for Chrome, Safari, and Opera */
}
</style>
<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Smartfinance</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Smartfinance</li>
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
	<div class="content flex-row-fluid" id="kt_content">
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="{{ $smartfinance->user->avatar }}" alt="image" />
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
									<span class="text-gray-900 fs-2 fw-bolder me-1">{{$smartfinance->user->first_name}} {{$smartfinance->user->last_name}}</span>
									
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
										@php
										$user_detail = DB::table('user_details')->where('user_id',$smartfinance->user->id)->first();
										@endphp
										<!--end::Svg Icon-->{{$user_detail->city}}
									</p>
									<p class="d-flex align-items-center text-gray-400  mb-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
												<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->{{$smartfinance->user->email}}
									</p>&nbsp;&nbsp;&nbsp;
									<p class="d-flex align-items-center text-gray-400  mb-2">
										<i class="fa fa-bookmark"></i>&nbsp;Plan - {{$smartfinance->plan->name}}
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
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-value="{{$smartfinance->amount}}" data-kt-countup-prefix="Rs">0</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Invesment Amount</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true"  data-kt-countup-prefix="">{{$smartfinance->investment_date}}</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Investment Date</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-prefix="">{{$smartfinance->accepted_date}}</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Accepted Date</div>
										<!--end::Label-->
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">

											<div class="fs-2 fw-bolder" data-kt-countup="true"  data-kt-countup-prefix="%">{{$smartfinance->percentage}} %</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Percentage</div>
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
			</div>
		</div>
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<div class="card-body pt-9 pb-0">
				@php
				$user = Auth::guard('web')->user();
				@endphp

				<!--begin::Table-->
				<table class="table align-middle table-row-dashed fs-6 gy-3" >
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
							@if($smartfinance->plan->type == 'month')
							<th class="">MONTH</th>
							@else
							<th class="">YEAR</th>
							@endif
							<th class="">NEXT PAYMENT DATE</th>
							@if($smartfinance->plan->type == 'month')
							<th class="">MONTHLY RETURN</th>
							@else
							<th class="">YEARLY RETRUN</th>
							@endif
							<th class="">STATUS</th>
							@if($user->role_id == 1 || $user->role_id == 2) 
							<th class="">ACTION</th> 
							@endif         
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-bolder text-gray-600">
						@foreach($smartfinance_payments as $smartfinance_payment)
						<tr>
							<td>
								@if($smartfinance->plan->type == 'month')
								{{$smartfinance_payment->month}}
								@else
								{{$smartfinance_payment->year}}
								@endif
							</td>
							<td>{{$smartfinance_payment->payment_date}}</td>
							
							<td>Rs {{$smartfinance_payment->amount}}</td>
							<td>
								@if($smartfinance_payment->is_status == 0)
								<span class="badge py-3 px-4 fs-7 badge-light-warning">Un Paid</span>
								@elseif($smartfinance_payment->is_status == 1)
								<span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
								@endif
							</td>
							@if($user->role_id == 1 || $user->role_id == 2)
							<td>
								<!--begin::Select-->
								<select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select..." name="payment_status" id="payment_status">
									<option value="0" {{ ("0" == $smartfinance_payment->is_status ) ? "selected":"" }}>Pending</option>
									<option value="1" {{ ("1" == $smartfinance_payment->is_status ) ? "selected":"" }}>Paid</option>
								</select>
								<!--end::Select-->
								<input type="hidden" name="payment_id" id="payment_id" value="{{$smartfinance_payment->id}}">
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
					<!--end::Table body-->
				</table>
				<!--end::Table-->
			</div>
		</div>
		@if($finances_count != 0)
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<div class="card-header border-0 pt-5">
				<h3 class="card-title align-items-start flex-column">
					<span class="card-label fw-bolder text-dark">Other Investments</span>
				</h3>
			</div>
			<div class="card-body pt-9 pb-0">
				@php
				$user = Auth::guard('web')->user();
				@endphp
				@if($user->role_id == '3')
					<!--begin::Table container-->
					<div class="table-responsive">
						<!--begin::Table-->
						<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
							<!--begin::Table head-->
							<thead>
								<tr class="fw-bolder text-muted">
									<th class="">PLAN</th>
									<th class="">INVESTMENT YEAR</th>
									<th class="">INVESTMENT AMOUNT</th>
									<th class="">INVESTED DATE</th>
									<th class="">APPROVED DATE</th>
									<th class="">RATE OF INTEREST</th>
									<th class="">STATUS</th>
									<th class="">ACTION</th>
								</tr>
							</thead>
							<!--end::Table head-->
							<!--begin::Table body-->
							<tbody>
								@foreach($finances as $finance)
								<tr>
									@php
									$plan = App\Models\Plan::where('id',$finance->plan_id)->first();
									@endphp
									@if($plan != Null)
									@if($plan->type == 'month')
									<td class="">Month</td>
									@else
									<td class="">Year</td>
									@endif
									@endif
									<td>
										@if($finance->no_of_year != Null)
										{{$finance->no_of_year}}
										@else
										-
										@endif
									</td>
									<td>Rs {{$finance->amount}}</td>
									<td>{{$finance->investment_date}}</td>
									@if($finance->accepted_date != NULL)
									<td>{{$finance->accepted_date}}</td>
									@else
									<td>-</td>
									@endif
									@if($finance->percentage != NULL)
									<td>{{$finance->percentage}}</td>
									@else
									<td>-</td>
									@endif
									@if($finance->is_status == 2)
									<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
									@elseif($finance->is_status == 1)
									<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
									@elseif($finance->is_status == 0)
									<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
									@endif
									<td>
										<div class=" flex-shrink-0">
											<a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_finance', ['id' => $finance->id])}}">
												<!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
												<span class="svg-icon svg-icon-2">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black"></rect>
														<path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black"></path>
													</svg>
												</span>
												<!--end::Svg Icon-->
											</a>
										</div>
									</td>
								</tr>

								@endforeach
							</tbody>
							<!--end::Table body-->
						</table>
						<!--end::Table-->

						<div class="d-flex justify-content-end mb-3">
							{{ $finances->links() }}
						</div>
					</div>
          <!--end::Table container-->
				@else
					<!--begin::Table-->
					<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
						<!--begin::Table head-->
						<thead>
							<!--begin::Table row-->
							<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
								<th class="">CUSTOMER</th>
								<th class="">PLAN</th>
								<th class="">INVESTMENT YEAR</th>
								<th class="">TOTAL AMOUNT INVESTED</th>
								<th class="">INVESTMENT DATE</th>
								<th class="">APPROVED DATE</th>
								<th class="">RATE OF INTEREST</th>
								<th class="">STATUS</th>
								<th class="">ACTION</th>               
							</tr>
							<!--end::Table row-->
						</thead>
						<!--end::Table head-->
						<!--begin::Table body-->
						<tbody class="fw-bolder text-gray-600">
							@foreach($finances as $finance)
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="symbol symbol-45px me-5">
											@php
											$avatar = App\Models\UserDetail::where('user_id',$finance->user->id)->first();
											@endphp
											@if($avatar != NULL)
											<img src="{{ $avatar->avatar}}" alt="" />
											@endif
										</div>
										<div class="d-flex justify-content-start flex-column">
											<a href="{{route('user', ['id' => $user->id])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$finance->user->first_name}} {{$finance->user->last_name}}</a>
											<span class="text-muted fw-bold text-muted d-block fs-7">#{{$smartfinance->user->id}}</span>
										</div>
									</div>
								</td>
								@php
								$plan = App\Models\Plan::where('id',$finance->plan_id)->first();
								@endphp
								@if($plan != Null)
								@if($plan->type == 'month')
								<td class="">Month</td>
								@else
								<td class="">Year</td>
								@endif
								@endif
								<td>
									@if($finance->no_of_year != Null)
									{{$finance->no_of_year}}
									@else
									-
									@endif
								</td>
								<td class="">Rs {{$finance->amount}}</td>
								<td class="">
									{{$finance->investment_date}}
								</td>
								@if($finance->accepted_date != NULL)
								<td>{{$finance->accepted_date}}</td>
								@else
								<td>-</td>
								@endif
								@if($finance->percentage != NULL)
								<td>{{$finance->percentage}}</td>
								@else
								<td>-</td>
								@endif
								@if($finance->is_status == 2)
								<td><span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span></td>
								@elseif($finance->is_status == 1)
								<td><span class="badge py-3 px-4 fs-7 badge-light-success">Approved</span></td>
								@elseif($finance->is_status == 0)
								<td><span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span></td>
								@endif      
								<td class="">

									<button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary"name="approve_finance" data-system_id="{{$finance->id}}" title="Edit"><i class="fas fa-pencil-alt" id="fa"></i></button>

									<a class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" href="{{route('view_finance', ['id' => $finance->id])}}">
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
							@endforeach
						</tbody>
						<!--end::Table body-->
					</table>
					<!--end::Table-->
					<div class="d-flex justify-content-end mb-3">
						{{ $finances->links() }}
					</div>
				@endif
			</div>
		</div>
		@endif
	</div>
</div>
<!--end::Container-->


<!-- begin::Modal -approve-investment- -->
<div class="modal fade" id="modal_approve_smart_finance" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->

                <!--end::Google Contacts Invite-->
                <!--begin::Separator-->
                <!--end::Separator-->
                <!--begin::Textarea-->
                <!--end::Textarea-->
                <!--begin::Users-->
                <div class="mb-10">
                    <!--begin::Heading-->
                    <div class="fs-4 fw-bolder mb-2">Approval of user investment</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('approve_smart_finance')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="finance_id" id="finance_id">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <a href="" download class="col-lg-4 fw-bold fs-6 text-start text-muted text-hover-primary" id="receipt"><span class="fs-6 fw-bold form-label mb-2" >Receipt</span>&nbsp;&nbsp;&nbsp;<i class="fa fa-download"></i></a>
                            </label>
                            <!--end::Label-->
                            <img src="" alt="image" id="bill" width="60%" height="40%" />
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Rate of intrest</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Rate of intrest"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid @error('intrest') is-invalid @enderror" placeholder="Intrest" value="" name="intrest" id="intrest" />
                            <!--end::Input-->
                            <div class="" id="intrest_error"></div>
                            @error('intrest')intrest_error
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Select..." name="is_status" id="is_status">
                                <option value="">Select</option>
                                <option value="0">Reject</option>
                                <option value="1">Approve</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Investment Date</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Investment Date"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-solid " placeholder="Investment Date" value="" name="investment_date" id="investment_date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="">Accepted Date</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Accepted Date"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="date" class="form-control form-control-solid " placeholder="Accepted Date" value="" name="accepted_date" id="accepted_date" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button>
                            
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -approve-investment- -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- smartfinance -->
<script type="text/javascript">
    $(document).on('click', 'button[name^="approve_finance"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10) {
          dd = '0'+dd
        } 

        if(mm<10) {
          mm = '0'+mm
        } 
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        if(system_id !== null)
        {
          jQuery.ajax({
            url : '../get_smart_finance',
            type: 'GET',
            dataType: 'json',
            data: { id: system_id },
            success:function(data)
            { 
                  jQuery('#modal_approve_smart_finance').modal('show');
                  document.getElementById("finance_id").value = system_id;
                  $("#bill").attr("src", data.bill);
                  $("#receipt").prop("href", data.bill);
                  document.getElementById("investment_date").value = data.investment_date;
                  if(data.accepted_date !== null){
                    document.getElementById("accepted_date").value = data.accepted_date;
                  }
                  else{
                    document.getElementById("accepted_date").value = today;

                  }
            }
          });
        }
      });
</script>
<!-- end-finance -->

<script type="application/javascript">
	jQuery(document).ready(function ()
	{
		jQuery('select[name="payment_status"]').on('change',function(){
			var payment = jQuery(this).val();
			var payment_id = jQuery("#payment_id").val();
			if(payment_id)
			{
				jQuery.ajax({
					url : '../payment',
					type: 'GET',
					dataType: 'json',
					data: { "payment": payment,"payment_id" : payment_id },
					success:function(data)
					{
						
						console.log(data);
						window.location.reload(); 

					}
				});
			}
		});
	});
</script>
@endsection