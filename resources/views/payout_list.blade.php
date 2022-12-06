@extends('layouts.master')
@section('body')


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Next Month Payout List</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">
					<a href="{{route('user_management')}}" class="text-white text-hover-primary">Dashboard</a>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-white opacity-75 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">Payout List</li>
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
		<!--begin::payout table-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Payout List</h3>
					</div>
					@if(count($payouts) != 0)
						<a href="{{url('export-excel-csv-file/xlsx')}}" class="btn btn-sm btn-light btn-active-primary align-self-center">Export data</a>
					@endif

					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<table class="table align-middle table-row-dashed fs-6 gy-3" >
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
							<th class="">NAME</th>
							<th class="">DATE</th>
							<th class="">NEXT PAYOUT AMOUNT</th>     
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-bolder text-gray-600">
						@foreach($payouts as $payout)

						<tr>
							<td class="">
								<div class="d-flex align-items-center">
									<div class="symbol symbol-45px me-5">
										@if($payout->user->avatar != NULL)
										<img src="{{$payout->user->avatar}}" alt="" />
										@else
										<img src="{{ asset('public/assets/media/avatars/blank.png') }}" alt="" />
										@endif
									</div>
									<div class="d-flex justify-content-start flex-column">
										<a href="{{route('user', ['id' => $payout->user->id,'flag' => 'user'])}}" class="text-dark fw-bolder text-hover-primary fs-6">{{$payout->user->first_name}} {{$payout->user->last_name}}</a>
										<span class="text-muted fw-bold text-muted d-block fs-7">#{{$payout->user->id}}</span>
									</div>
								</div>
							</td>
							<td class="">
								@php
									$date = Carbon\Carbon::parse($payout->date)->formatLocalized('%d %b %Y');
								@endphp
								{{$date}}
							</td>
							<td class="">
								{{$payout->commafun($payout->next_payout_amount)}}
							</td>
						</tr>

						@endforeach
					</tbody>
					<!--end::Table body-->
				</table>
			</div>
		</div>
		<!--end::payout table-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection