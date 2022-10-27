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
					<a href="{{route('dashboard')}}" class="text-white text-hover-primary">Dashboard</a>
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
								<span class="required">Link</span>
								<i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Youtube_link"></i>
							</label>
							<!--end::Label-->
							<!--begin::Input-->
							<input type="text" class="form-control form-control-solid" placeholder="Youtube Link" value="" name="youtube_link" id="youtube_link" />
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
				<div class="row g-lg-10 mb-10 mb-lg-20">
					@foreach($banners as $banner)
						<div class="col-lg-4">
							<img width="70%" height="90%" src="{{$banner->banner}}" alt="banner">
							<br><br>
							<a href="{{route('delete_upload', ['id' => $banner->id])}}">
							<button class="btn btn-sm btn-danger">Delete</button></a>
							
						</div>
					@endforeach
				</div>
			</div>
			<div class="card-body pt-9 pb-0" id="youtube_detail" style="display:none;">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Uploaded Links</h3>
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
						<a href="{{$youtube->youtube_link}}" target="_blank" class="fw-bold fs-3 text-hover-primary">{{$youtube->youtube_link}}</a>
						<a href="{{route('delete_upload', ['id' => $youtube->id])}}">
						<button class="btn btn-sm btn-danger">Delete</button></a>
					@endforeach
				</div>
			</div>
		</div>

		<!--end::upload detail table-->
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



@endsection