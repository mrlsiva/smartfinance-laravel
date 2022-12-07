@extends('layouts.master')
@section('body')


<style type="text/css">

	body{
		background-image: url(../public/assets/img/header-bg.jpg)!important;
	}

</style>

<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Insurance</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">
					<a href="{{route('insurance')}}" class="text-white text-hover-primary">Insurance</a>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-white opacity-75 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">Details</li>
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
		<!--begin::insurance_card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Insurance Details</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Category</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fs-6 text-gray-800">{{$insurance->category}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				@if($insurance->sub_category != NULL)
					<!--begin::Row-->
					<div class="row mb-7">
						<!--begin::Label-->
						<label class="col-lg-4 fw-bold text-muted">Sub Category</label>
						<!--end::Label-->
						<!--begin::Col-->
						<div class="col-lg-8">
							<span class="fs-6 text-gray-800">{{$insurance->sub_category}}</span>
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				@endif
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Amount</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fs-6 text-gray-800">Rs {{$insurance->commafun($insurance->amount)}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Tenure</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fs-6 text-gray-800">{{$insurance->tenure}} Year</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Start Date</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						@php
							$date = Carbon\Carbon::parse($insurance->start_date)->formatLocalized('%d %b %Y');
						@endphp
						<span class="fs-6 text-gray-800">{{$date}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">End Date</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						@php
							$date = Carbon\Carbon::parse($insurance->end_date)->formatLocalized('%d %b %Y');
						@endphp
						<span class="fs-6 text-gray-800">{{$date}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Due</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						<span class="fs-6 text-gray-800">{{$insurance->due}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
				<!--begin::Row-->
				<div class="row mb-7">
					<!--begin::Label-->
					<label class="col-lg-4 fw-bold text-muted">Due Date</label>
					<!--end::Label-->
					<!--begin::Col-->
					<div class="col-lg-8">
						@php
							$date = Carbon\Carbon::parse($insurance->due_date)->formatLocalized('%d %b %Y');
						@endphp
						<span class="fs-6 text-gray-800">{{$date}}</span>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Row-->
			</div>
		</div>
		<!--end::insurance_card-->
		<!--begin::insurance-document-card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Insurance Documents</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<table class="table table-row-gray-300 align-middle gs-0 gy-4">
					<thead>
						<tr class="fw-bolder text-muted">
							<th class="">DOCUMENT</th>
							<th class="">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($insurance->document as $document)
							<tr>
								<td>
									Document {{ $loop->index+1 }}
								</td>
								<td>
									<a href="{{$document}}" target="_blank">
										<button type="button" class="btn btn-warning">View</button>
									</a>
									<a href="{{$document}}" download>
										<button type="button" class="btn btn-success">Download</button>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
		</div>
		<!--end::insurance-document-card-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<script>
    @if (session('alert'))
        Swal.fire(
            "{{ session('alert') }}",
            ' ',
            'success'
        )
    @endif
</script>


@endsection