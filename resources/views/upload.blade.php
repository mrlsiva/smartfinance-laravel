@extends('layouts.master')
@section('body')


<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Uploads</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Upload</li>
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
		<!--begin::upload table-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Uploads</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				<br><br>
				<form id="profile" method="POST" action="{{route('save_uploads')}}" enctype="multipart/form-data">
                @csrf
					<!--begin::Input group-->
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Type of Upload</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Upload Type"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<select class="form-select form-select-solid form-select-sm" data-control="select2" data-hide-search="true" name="type" id="type">
							<option value="">Select</option>
							<option value="banner">Banner</option>
							<option value="youtube">Youtube</option>

						</select>
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<div class="" id="banner" style="display:none">
						<div class="fv-row mb-8">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Banner</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Banner Image"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="file" class="form-control form-control-solid custom-file-input @error('banner_img') is-invalid @enderror" id="banner_img" placeholder="Banner Image" value="" name="banner_img" accept="image/*" />
							<div class="d-flex justify-content-center mt-3" >
								<img id="preview-image-banner" style="max-height: 200px;">
								<a href="#" class="text-hover-primary" onclick="delete_banner()"  style="display:none;" id="banner_image">X</a>
							</div>

							<!--end::Input-->
							@error('banner_img')
							<div class="text-danger">{{ $message }}</div>
							@enderror
						</div>
						<div class="fv-row mb-8">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="">Link to Redirect</span>
								
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Link to Redirect" value="" name="banner_link" id="banner_link" />
							<!--end::Input-->
						</div>
						<div class="d-flex justify-content-center mb-5" > 
							<button type="submit" class="btn btn-lg btn-success" >Add</button> 
						</div>
					</div>
					<div class="" id="youtube" style="display:none">
						<div class="fv-row mb-8">
							<!--begin::Label-->
							<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
								<span class="required">Code</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Youtube Code"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Youtube Code" value="" name="youtube_link" id="youtube_link" />
							<!--end::Input-->
						</div>
						<div class="d-flex justify-content-center mb-5" > 
							<button type="submit" class="btn btn-lg btn-success" >Add</button> 
						</div>
					</div>
				</form>
			</div>
		</div>
		<!--end::upload table-->
		<!--begin::upload table-->
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0" id="banner_detail" style="display:none;">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Uploaded Banners</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				@php
					$banners = App\Models\Upload::where('type','banner')->get();
				@endphp
				<br><br>
				<div class="row g-lg-10 mb-5">
					@foreach($banners as $banner)
						<div class="col-lg-4">
							<img width="70%" height="90%" src="{{$banner->banner}}" alt="banner">
							<br><br>
							<a href="{{route('delete_upload', ['id' => $banner->id])}}">
							<button class="btn btn-sm btn-danger mb-5">Delete</button></a>
							<button class="btn btn-sm btn-warning mb-5" name="banner_update" data-system_id="{{$banner->id}}" >Update</button>
						</div>
					@endforeach
				</div>
			</div>
			<div class="card-body pt-9 pb-0" id="youtube_detail" style="display:none;">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Uploaded Youtube Codes</h3>
					</div>
					<!--end::Card title-->
				</div>
				<!--end::Card header-->
				@php
					$youtubes = App\Models\Upload::where('type','youtube')->get();
				@endphp
				<br><br>
				<div class="row g-lg-10 mb-10 mb-lg-20">
					@foreach($youtubes as $youtube)
						<a href="https://www.youtube.com/embed/{{$youtube->youtube_link}}" target="_blank" class="fw-bold fs-3 text-hover-primary">{{$youtube->youtube_link}}</a>
						<div class="pa-inline-buttons mt-5 mb-5">
							<a href="{{route('delete_upload', ['id' => $youtube->id])}}">
								<button class="btn btn-sm btn-danger">Delete</button>
							</a>
							<button class="btn btn-sm btn-warning" name="youtube_update" data-system_id="{{$youtube->id}}" >Update</button>
						</div>
					@endforeach
				</div>
			</div>
		</div>

		<!--end::upload detail table-->
    </div>
    <!--end::Post-->
</div>
<!--end::Container-->


<!-- Banner Modal -->
<div class="modal fade" id="updateBannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Banner</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="form w-100"  method="post" action="{{route('update_banner')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="banner_id" id="banner_id">
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="required">Banner</span>
							<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Banner Image"></i>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="file" class="form-control form-control-solid custom-file-input" id="image_b" placeholder="Banner Image" value="" name="image_b" accept="image/*" />
						<div class="d-flex justify-content-center mt-3" >
							<img id="b_img" style="max-height: 200px;">
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
						<input type="text" class="form-control form-control-solid" placeholder="Link to Redirect" value="" name="b_link" id="b_link" />
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
<!-- end banner modal -->

<!-- Youtube Modal -->
<div class="modal fade" id="updateYoutubeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Youtube Codes</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form class="form w-100"  method="post" action="{{route('update_youtube')}}" enctype="multipart/form-data">
				@csrf
				<div class="modal-body">
					<input type="hidden" name="youtube_id" id="youtube_id">
					
					<div class="fv-row mb-8">
						<!--begin::Label-->
						<label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
							<span class="">Code</span>
						</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input type="text" class="form-control form-control-solid" placeholder="Youtube Code" value="" name="code" id="code" />
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
<!-- end youtube modal -->

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

<!-- Type -->
<script type="text/javascript">
    jQuery(document).ready(function ()
    {
        jQuery('select[name="type"]').on('change',function(){
            var type = jQuery(this).val();
            if(type == 'banner'){
            	$('#banner').show();
            	$('#youtube').hide();
            	$('#banner_detail').show();
            	$('#youtube_detail').hide();
            }
            else if(type == 'youtube'){
            	$('#banner').hide();
            	$('#youtube').show();
            	$('#banner_detail').hide();
            	$('#youtube_detail').show();
            }
            else{
            	$('#banner').hide();
            	$('#youtube').hide();
            	$('#banner_detail').hide();
            	$('#youtube_detail').hide();
            }
            
        });
    });
</script>

<!-- image delete -->
<script type="text/javascript">
    function delete_banner() {
        document.getElementById('banner_img').value = null;
        $("#preview-image-banner").attr("src", '');
        $('#banner_image').hide();
    }
</script>
<!-- image delete end -->

<!-- banner image -->
<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#banner_img').change(function(){ 
            $('#banner_image').show();  
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-banner').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>

<script type="text/javascript">    
    $(document).ready(function (e) {
       $('#image_b').change(function(){  
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#b_img').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });
    });
</script>
<!-- end -->

<!-- update banner -->
<script type="text/javascript">
	$(document).on('click', 'button[name^="banner_update"]', function(e) {
		var system_id = $(this).data("system_id");
        console.log(system_id);
        if(system_id != null)
        {
	        jQuery.ajax({
	        	url : 'get_upload',
	            type: 'GET',
	            dataType: 'json',
	            data: { id: system_id },
	            success:function(data)
	            {
	            	console.log(data);
	        		document.getElementById("banner_id").value = system_id;
	        		$("#b_img").attr("src", data.banner);
	        		document.getElementById("b_link").value = data.banner_link;
	            	jQuery('#updateBannerModal').modal('show');
	            }
	        });
	    }
	});
</script>
<!-- end update banner -->

<!-- update youtube -->
<script type="text/javascript">
	$(document).on('click', 'button[name^="youtube_update"]', function(e) {
		var system_id = $(this).data("system_id");
        console.log(system_id);
        if(system_id != null)
        {
	        jQuery.ajax({
	        	url : 'get_upload',
	            type: 'GET',
	            dataType: 'json',
	            data: { id: system_id },
	            success:function(data)
	            {
	            	console.log(data);
	            	document.getElementById("youtube_id").value = system_id;
	        		document.getElementById("code").value = data.youtube_link;
	            	jQuery('#updateYoutubeModal').modal('show');
	            }
	        });
	    }
	});
</script>
<!-- end update banner -->



@endsection