@extends('layouts.master')
@section('body')


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Change Password</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Change Password</li>
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
		<!--begin::password add card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Change Password</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('save_password')}}" enctype="multipart/form-data">
                	@csrf
                	<!--begin::Input group-->
                	<div class="fv-row mb-8">
                		<!--begin::Label-->
                		<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                			<span class="required">Old Password</span>
                			<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Old Password"></i>
                		</label>
                		<!--end::Label-->
                		<!--begin::Input-->
                		<input type="text" class="form-control form-control-solid" placeholder="Old Password" value="" name="old_password" id="old_password" />
                		<!--end::Input-->
                	</div>
                	<!--end::Input group-->

                	<!--begin::Input group-->
                	<div class="fv-row mb-8">
                		<!--begin::Label-->
                		<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                			<span class="required">New Password</span>
                			<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="New Password"></i>
                		</label>
                		<!--end::Label-->
                		<!--begin::Input-->
                		<input type="text" class="form-control form-control-solid" placeholder="New Password" value="" name="new_password" id="new_password" />
                		<!--end::Input-->
                	</div>
                	<!--end::Input group-->

                	<!--begin::Input group-->
                	<div class="fv-row mb-8">
                		<!--begin::Label-->
                		<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                			<span class="required">Confirm Password</span>
                			<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Confirm Password"></i>
                		</label>
                		<!--end::Label-->
                		<!--begin::Input-->
                		<input type="text" class="form-control form-control-solid" placeholder="Confirm Password" value="" name="confirm_password" id="confirm_password" />
                		<!--end::Input-->
                	</div>
                	<!--end::Input group-->
					
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Submit</button>
					</div>
				</form>
			</div>
		</div>
		<!--end::password add card-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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