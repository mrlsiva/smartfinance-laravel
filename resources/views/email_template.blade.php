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
					<a href="{{route('dashboard')}}" class="text-white text-hover-primary">Dashboard</a>
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
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Email Templates</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('save_templates')}}" enctype="multipart/form-data">
                	@csrf
					<!--begin::Input group-->
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Name</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Name"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" placeholder="Name" value="" name="name" id="name" required />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Subject</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Subject"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" placeholder="Subject" value="" name="subject" id="subject" required />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Template</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Template"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<textarea type="text" class="form-control form-control-solid ckeditor" placeholder="Template" name="template" required></textarea>
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Submit</button>
					</div>
				</form>
			</div>
		</div>
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
				<!--begin::Table-->
				<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
					<!--begin::Table head-->
					<thead>
						<tr class="fw-bolder text-muted">
							<th class="">NAME</th>
							<th class="">STATUS</th>
							<th class="">ACTION</th>
						</tr>
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody>
						@foreach($templates as $template)
							<tr>
								<td>{{$template->name}}</td>
								<td>
									@if($template->is_active == 1)
										<span class="badge py-3 px-4 fs-7 badge-light-success">Active</span>
									@else
										<span class="badge py-3 px-4 fs-7 badge-light-danger">Deactive</span>
									@endif
								</td>
								<td>
									<a class="text-hover-primary text-white opacity-75" href="{{route('edit_template', ['id' => $template->id])}}">
										<button type="button"  class="btn  btn-light mb-5" ><i class="fas fa-pencil-alt" id="fa"></i></button>
									</a>
								</td>
							</tr>
						@endforeach
					</tbody>
					<!--end::Table body-->
				</table>
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