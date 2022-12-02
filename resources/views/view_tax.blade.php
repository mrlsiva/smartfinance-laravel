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
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Tax</h1>
			<!--end::Title-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-white opacity-75">
					<a href="{{route('tax')}}" class="text-white text-hover-primary">Tax</a>
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
		<!--begin::password_reset_card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Password Reset</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('update_password')}}" enctype="multipart/form-data">
                	@csrf
                	@php
                		$tax = App\Models\Tax::where('id',$tax_detail->tax_id)->first();
                	@endphp

                	<input type="hidden" name="tax_id" value="{{$tax->id}}">

					<!--begin::Input group-->
					<div class="row mb-8">
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Pan Card</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Pan Card"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid " placeholder="Pan Card" value="{{$tax->pan_card}}" name="pan_card" id="pan_card"  readonly="" />
							<!--end::Input-->
						</div>
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Password</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Password"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Password" value="{{$tax->password}}" name="password" id="password" required />
							<!--end::Input-->
						</div>
					</div>
					<!--end::Input group-->
					
					
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Update</button>
					</div>
				</form>
			</div>
		</div>
		<!--end::password_reset_card-->
		<!--begin::tax-document-card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Tax Details ({{$tax_detail->start_year}} - {{$tax_detail->end_year}})</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				
				<table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
					<thead>
						<tr class="fw-bolder text-muted">
							<th class="">DOCUMENT</th>
							<th class="">ACTION</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tax_detail->document as $document)
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
		<!--end::tax-document-card-->
		
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