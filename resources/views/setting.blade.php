@extends('layouts.master')
@section('body')


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Settings</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Setting</li>
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
		<!--begin::template add card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Project Settings</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('save_setting')}}" enctype="multipart/form-data">
                	@csrf

                	@php
                		$project_name = App\Models\Setting::where('key','project_name')->first();
                		$email = App\Models\Setting::where('key','email')->first();
                		$phone = App\Models\Setting::where('key','phone')->first();
                		$address = App\Models\Setting::where('key','address')->first();
                		$admin_email = App\Models\Setting::where('key','admin_email')->first();
                		$cc_email = App\Models\Setting::where('key','cc_email')->first();
                	@endphp
					<!--begin::Input group-->
					<div class="row mb-8">
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Project Name</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Project Name"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Name" value="{{$project_name->value}}" name="project_name" id="project_name"  required />
							<!--end::Input-->
						</div>
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Email</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Email"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Email" value="{{$email->value}}" name="email" id="email" required />
							<!--end::Input-->
						</div>
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-8">
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Complete Address</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Address"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Address" value="{{$address->value}}" name="address" id="address" required />
							<!--end::Input-->
						</div>
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Phone</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Phone"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="number" class="form-control form-control-solid" placeholder="Phone" value="{{$phone->value}}" name="phone" id="phone" required />
							<!--end::Input-->
						</div>
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="row mb-8">
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Admin Email</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Admin Email"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="email" class="form-control form-control-solid" placeholder="Admin Email" value="{{$admin_email->value}}" name="admin_email" id="admin_email" required />
							<!--end::Input-->
						</div>
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">CC Email</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="CC Email"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="email" class="form-control form-control-solid" placeholder="CC Email" value="{{$cc_email->value}}" name="cc_email" id="cc_email" required />
							<!--end::Input-->
						</div>
					</div>
					<!--end::Input group-->
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<!--end::template add card-->
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