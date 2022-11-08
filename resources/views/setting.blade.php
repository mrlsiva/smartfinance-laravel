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
		<!--begin::general add card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">General Project Settings</h3>
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
							<input type="text" class="form-control form-control-solid " placeholder="Name" value="{{$project_name->value}}" name="project_name" id="project_name"  required />
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
							<input type="email" class="form-control form-control-solid" placeholder="Email" value="{{$email->value}}" name="email" id="email" required />
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
							<input type="number" class="form-control form-control-solid @error('phone') is-invalid @enderror" placeholder="Phone" value="{{$phone->value}}" name="phone" id="phone" required />
							<!--end::Input-->
							@error('phone')
                  				<div class="text-danger">{{ $message }}</div>
                			@enderror
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
		<!--end::general add card-->
		<!--begin::social add card-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Social Media Settings</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('save_social_media')}}" enctype="multipart/form-data">
                	@csrf
					<!--begin::Input group-->
					<div class="row mb-8">
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Name</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Name"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Name"  name="name" id="name"  required />
							<!--end::Input-->
						</div>
						<div class="col-md-6">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Link to Redirect</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Link"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Link"  name="social_link" id="social_link" required />
							<!--end::Input-->
						</div>
					</div>
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Logo</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Logo"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="file" class="form-control form-control-solid custom-file-input @error('logo') is-invalid @enderror" id="logo" placeholder="Logo" value="" name="logo" accept="image/*" />
						<div class="d-flex justify-content-center mt-3" >
							<img id="preview-logo" style="max-height: 200px;">
							<a href="#" class="text-hover-primary" onclick="delete_logo()"  style="display:none;" id="social_logo">X</a>
						</div>

						<!--end::Input-->
						@error('icon')
						<div class="text-danger">{{ $message }}</div>
						@enderror
					</div>
					<!--end::Input group-->
					<div class="d-flex justify-content-center">
						<button type="submit"  class="btn btn-primary mb-5">Submit</button>
					</div>
				</form>

				<div class="mb-5 mt-5">
					<h4 class="fw-bolder m-0">Uploaded Icon</h4>
				</div>
				<div class="row mb-5">
					@foreach($icons as $icon)
						<div class="col-md-3">
							<img src="{{$icon->logo}}" alt="logo">
							<a href="{{$icon->link}}" target="_blank">
								<span class="text-hover-primary fw-bold">{{$icon->name}}</span>
							</a><br><br>
							<div class="pa-inline-buttons">
								<a href="{{route('delete_logo', ['id' => $icon->id])}}">
									<button class="btn btn-sm btn-danger">Delete</button>
								</a>
								<button class="btn btn-sm btn-warning" name="update_logo" data-system_id="{{$icon->id}}" >Update</button>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
		<!--end::social add card-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->


<!-- Logo Modal -->
<div class="modal fade" id="updateLogoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="form w-100"  method="post" action="{{route('update_logo')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="logo_id" id="logo_id">
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Logo</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Logo"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="file" class="form-control form-control-solid custom-file-input" id="logo_s" placeholder="Logo" value="" name="logo_s" accept="image/*" />
						<div class="d-flex justify-content-center mt-3" >
							<img id="s_logo" style="max-height: 200px;">
						</div>
						<!--end::Input-->
					</div>
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="">Link to Redirect</span>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" placeholder="Link to Redirect" value="" name="s_link" id="s_link" />
						<!--end::Input-->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end logo modal -->

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

<!-- logo delete -->
<script type="text/javascript">
    function delete_logo() {
        document.getElementById('logo').value = null;
        $("#preview-logo").attr("src", '');
        $('#social_logo').hide();
    }
</script>
<!-- image delete end -->

<!-- logo display -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#logo').change(function(){ 
            $('#social_logo').show();  
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-logo').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#logo_s').change(function(){   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#s_logo').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<!-- logo display end -->

<!-- update logo -->
<script type="text/javascript">
	$(document).on('click', 'button[name^="update_logo"]', function(e) {
		var system_id = $(this).data("system_id");
        console.log(system_id);
        if(system_id != null)
        {
	        jQuery.ajax({
	        	url : 'get_logo',
	            type: 'GET',
	            dataType: 'json',
	            data: { id: system_id },
	            success:function(data)
	            {
	            	console.log(data);
	        		document.getElementById("logo_id").value = system_id;
	        		$("#s_logo").attr("src", data.logo);
	        		document.getElementById("s_link").value = data.link;
	            	jQuery('#updateLogoModal').modal('show');
	            }
	        });
	    }
	});
</script>
<!-- end update logo -->




@endsection