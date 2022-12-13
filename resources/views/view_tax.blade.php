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
						<h3 class="fw-bolder m-0">Tax Details ({{$tax_detail->assessment_year}})</h3>
					</div>
					<div class="text-end">
						@php
							$user = Auth::guard('web')->user();
						@endphp
						@if($user->id == $tax_detail->tax->user_id)
							<button type="button" class="btn btn-secondary mb-5" name="acknowledgement_upload" id="acknowledgement_upload" data-bs-toggle="modal" data-bs-target="#kt_modal_acknowledgement_upload">Acknowledgement</button>
						@else
							@if($tax_detail->acknowledgement != NULL)
								<span class="fw-bolder" style="margin-right: 30px;">Acknowledgement </span><br>
								<a href="{{$tax_detail->acknowledgement}}" target="_blank">
									<button type="button" class="btn btn-secondary">View</button>
								</a>
								<a href="{{$tax_detail->acknowledgement}}" download>
									<button type="button" class="btn btn-secondary">Download</button>
								</a><br><br>
							@endif
						@endif
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


<!-- begin::Modal -acknowledgement_upload- -->
<div class="modal fade" id="kt_modal_acknowledgement_upload" tabindex="-1" aria-hidden="true">
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
                    @if($tax_detail->acknowledgement != NULL)
                    	<div class="fs-4 fw-bolder mb-2"><a href="{{ $tax_detail->acknowledgement }}" download class="col-lg-4 fw-bold fs-6 text-start text-muted text-hover-primary">Acknowledgement <i class="fa fa-download"></i></a></div>
                    @else
                    	<div class="fs-4 fw-bolder mb-2">Acknowledgement</div>
                    @endif
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="post" action="{{route('save_acknowledgement')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tax_detail_id" value="{{$tax_detail->id}}">

	                    @if($tax_detail->acknowledgement != NULL)
	                    	<!--begin::Input group-->
	                    	<div class="fv-row mb-8">
                            	<!--begin::Input-->
                            	<input type="file" class="form-control form-control-solid custom-file-input " id="acknowledgement" placeholder="Acknowledgement" value="" name="acknowledgement" accept="image/*" required="" />
                            	<!--end::Input-->
                            	<div class="d-flex justify-content-center mt-3" >
                            		<img id="preview-image-acknowledgement" style="max-height: 200px;" src="{{$tax_detail->acknowledgement}}">
                            		<a href="#" class="text-hover-primary" onclick="delete_acknowledgement()"  style="display:none;" id="acknowledgement_image">X</a>
                            	</div>
	                    	</div>
	                    	<!--end::Input group-->
	                    @else
	                    	<!--begin::Input group-->
	                    	<div class="fv-row mb-8">
                            	<!--begin::Input-->
                            	<input type="file" class="form-control form-control-solid custom-file-input " id="acknowledgement" placeholder="Acknowledgement" value="" name="acknowledgement" accept="image/*" required="" />
                            	<!--end::Input-->
                            	<div class="d-flex justify-content-center mt-3" >
                            		<img id="preview-image-acknowledgement" style="max-height: 200px;">
                            		<a href="#" class="text-hover-primary" onclick="delete_acknowledgement()"  style="display:none;" id="acknowledgement_image">X</a>
                            	</div>
	                    	</div>
	                    	<!--end::Input group-->
	                    @endif
                        
                        <div class="d-flex justify-content-center" >
                            <button type="submit" class="btn  btn-primary mt-5 mb-3">Upload</button> 
                        </div>
                    </form>
                </div>
                <!--end::Users-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -loan- -->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- acknowledgement -->
<script type="text/javascript">    
    $(document).ready(function (e) { 
       $('#acknowledgement').change(function(){ 
            $('#acknowledgement_image').show();   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-acknowledgement').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });
</script>

<!-- acknowledgement delete -->
<script type="text/javascript">
    function delete_acknowledgement() {
    	document.getElementById('acknowledgement').value = null;
        $("#preview-image-acknowledgement").attr("src", '');
        $('#acknowledgement_image').hide();
    }
</script>
<!-- image delete end -->

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