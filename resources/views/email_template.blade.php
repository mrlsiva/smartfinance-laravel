@extends('layouts.master')
@section('body')


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Email Templates</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Templates</li>
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
		<!-- <div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<div class="card-header cursor-pointer">
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Email Templates</h3>
					</div>
				</div>
				<br><br>
				<form id="profile" method="POST" action="{{route('save_templates')}}" enctype="multipart/form-data">
                	@csrf
					<div class="fv-row mb-8">
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Name</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Name"></i>
						</label>
						<input type="text" class="form-control form-control-solid" placeholder="Name" value="" name="name" id="name" required />
					</div>
					<div class="fv-row mb-8">
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Subject</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Subject"></i>
						</label>
						<input type="text" class="form-control form-control-solid" placeholder="Subject" value="" name="subject" id="subject" required />
					</div>
					<div class="fv-row mb-8">
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Template</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Template"></i>
						</label>
						<textarea type="text" class="form-control form-control-solid ckeditor" placeholder="Template" name="template" required></textarea>
					</div>
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Submit</button>
					</div>
				</form>
			</div>
		</div> -->
		<!--end::template add card-->
		<!--begin::template view card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">List of Email Templates</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<div class="row">
					@foreach($templates as $template)
						<div class="col-6 border border-top-0 border-start-0 border-1">
							<br>
						 	<a class="text-hover-primary" href="{{route('edit_template', ['id' => $template->id])}}">
						 		<span class="fw-bolder fs-6 text-decoration-underline">{{$template->name}}</span>
						 	</a>
						 	@if($template->is_active == 1)
						 		<i class="fa fa-check-circle" style="color: green;"></i>
						 	@else
						 		<i class="fa fa-check-circle" style="color: red;"></i>
						 	@endif
						 	<br><br>					 	
						 	<p class="fs-4" style="margin-left: 40px;">{!! $template->description !!}</p>
						</div><br>
					@endforeach
				</div>
				<br><br>
				<div class="d-flex justify-content-end mb-5">
					{{$templates->links()}}
				</div>
				<!--end::Table-->
				<!-- <div class="d-flex justify-content-center">
					<a href="{{route('send_mail')}}">
						<button type="button"  class="btn btn-success mb-5">Send Mail</button>
					</a>
				</div> -->
			</div>
		</div>
		<!--end::template view card-->
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