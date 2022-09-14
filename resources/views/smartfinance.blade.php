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
										Plan - {{$smartfinance->plan->name}}
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
							<th class="">MONTH</th>
							<th class="">NEXT PAYMENT DATE</th>
							<th class="">MONTHLY RETURN</th>
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
							<td>{{$smartfinance_payment->month}}</td>
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
	</div>
</div>
<!--end::Container-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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