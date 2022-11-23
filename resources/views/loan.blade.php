@extends('layouts.master')
@section('body')
<style type="text/css">

body{
	background-image: url(../public/assets/img/header-bg.jpg)!important;
}
#notification{
	background-image: url(../public/assets/media/misc/pattern-1.jpg)!important;
}
.scroll {
	-ms-overflow-style: none; /* for Internet Explorer, Edge */
	scrollbar-width: none; /* for Firefox */
	overflow-y: scroll; 
}

.scroll::-webkit-scrollbar {
	display: none; /* for Chrome, Safari, and Opera */
}
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@php
$user = Auth::guard('web')->user();
@endphp
<!--begin::Toolbar-->
<div class="toolbar py-5 py-lg-15" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
		<!--begin::Page title-->
		<div class="page-title d-flex flex-column me-3">
			<!--begin::Title-->
			<h1 class="d-flex text-white fw-bolder my-1 fs-3">Loan</h1>
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
				<li class="breadcrumb-item text-white opacity-75">Loan</li>
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
	<div class="content flex-row-fluid" id="kt_content">
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="{{ $loan->user->avatar }}" alt="image" />
							<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<span class="text-gray-900 fs-2 fw-bolder me-1">{{$loan->user->first_name}} {{$loan->user->last_name}}</span>
									
								</div>
								<!--end::Name-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
									<p class="d-flex align-items-center text-gray-400  me-5 mb-2">
										<!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="black" />
												<path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="black" />
											</svg>
										</span>
										@php
										$user_detail = DB::table('user_details')->where('user_id',$loan->user->id)->first();
										@endphp
										<!--end::Svg Icon-->{{$user_detail->city}}
									</p>
									<p class="d-flex align-items-center text-gray-400  mb-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="black" />
												<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->{{$loan->user->email}}
									</p>&nbsp;&nbsp;&nbsp;
									@if($loan->is_close == 1)
										<span class="badge py-3 px-4 fs-7 badge-danger">Closed</span>
									@endif
								</div>
								<!--end::Info-->
							</div>
							<!--end::User-->
						</div>
						<!--end::Title-->
						<!--begin::Stats-->
						<div class="d-flex flex-wrap flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<!--begin::Stats-->
								<div class="d-flex flex-wrap">
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->

											<!--end::Svg Icon-->
											<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-prefix="Rs">{{$loan->commafun($loan->amount)}}</div>
											
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Loan Amount</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											@php
												$date = Carbon\Carbon::parse($loan->requested_on)->formatLocalized('%d %b %Y');
											@endphp
											<div class="fs-2 fw-bolder" data-kt-countup="true"  data-kt-countup-prefix="">{{$date}}</div>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Request Date</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											@php
												$date = Carbon\Carbon::parse($loan->approved_on)->formatLocalized('%d %b %Y');
											@endphp
											@if($loan->approved_on == Null)
												<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-prefix="">-</div>
											@else
												<div class="fs-2 fw-bolder" data-kt-countup="true" data-kt-countup-prefix="">{{$date}}</div>

											@endif
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Accepted Date</div>
										<!--end::Label-->
									</div>
									<div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											@if($loan->intrest == Null)
												<div class="fs-2 fw-bolder" data-kt-countup="true"  data-kt-countup-prefix="%">0 %</div>
											@else
												<div class="fs-2 fw-bolder" data-kt-countup="true"  data-kt-countup-prefix="%">{{$loan->intrest}} %</div>
											@endif
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-bold fs-6 text-gray-400">Percentage</div>
										<!--end::Label-->
									</div>
									@php
										$user = Auth::guard('web')->user();
									@endphp
									<!--end::Stat-->
								</div>
								<!--end::Stats-->
							</div>
							<!--end::Wrapper-->
							<!--begin::Progress-->

							<!--end::Progress-->
						</div>
						<!--end::Stats-->
					</div>
					<!--end::Info-->
				</div>
				<!--end::Details-->
			</div>
		</div>
		<div class="card mb-5 mb-xl-10">
			<div class="card-body pt-9 pb-0">
				<table class="table align-middle table-row-dashed fs-6 gy-3" >
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

							<th class="">PAYEMNT MONTH</th>
							<th class="">AMOUNT</th>
							<th class="">PAID ON</th>
							<th class="">STATUS</th>
							<th class="">ACTION</th>       
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<tbody class="fw-bolder text-gray-600">
						@foreach($loan_payments as $loan_payment)
							<tr>
								@php
								 $month = Carbon\Carbon::parse($loan_payment->payment_date)->format('F');
								 $year = Carbon\Carbon::parse($loan_payment->payment_date)->format('Y');
								@endphp
								<td>{{$month}}-{{$year}}</td>
								<td>{{$loan_payment->amount}}</td>
								@if($loan_payment->paid_on != NULL)
									@php
										$date = Carbon\Carbon::parse($loan_payment->paid_on)->formatLocalized('%d %b %Y');
									@endphp
									<td>{{$date}}</td>
								@else
									<td>-</td>
								@endif
								@if($loan_payment->is_status == 3)
									<td>
										<span class="badge py-3 px-4 fs-7 badge-secondary">Un Paid</span>	
									</td>
								@elseif($loan_payment->is_status == 2)
									<td>
										<span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
									</td>
								@elseif($loan_payment->is_status == 1)
									<td>
										<span class="badge py-3 px-4 fs-7 badge-light-success">Paid</span>
									</td>
								@else
									<td>
										<span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
									</td>
								@endif
								@if($user->role_id == 1 || $user->role_id == 2)
									<td>
										<button type="button" class="btn  btn-light mb-5" data-system_id="{{$loan_payment->id}}" name="payment-approve"><i class="fas fa-pencil-alt" id="fa"></i></button> 
										<button type="button" class="btn  btn-light mb-5" data-system_id="{{$loan_payment->id}}" name="payment"><i class="fa fa-rupee" id="fa" style="font-size:16px"></i></button> 
									</td>
								@endif
								@if($user->role_id == 3)
									<td>
										<button type="button" class="btn  btn-light mb-5" data-system_id="{{$loan_payment->id}}" name="loan_payment"><i class="fa fa-rupee" id="fa" style="font-size:16px"></i></button> 
									</td>
								@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
	</div>
</div>
<!--end::Container-->

<!-- begin::Modal-loan_payment- -->
<div class="modal fade" id="loan_payment_modal" tabindex="-1" aria-hidden="true">
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
                    <div class="fs-4 fw-bolder mb-2">Loan Payment</div>
                    <!--end::Heading-->
                    <form class="form w-100" novalidate="novalidate" id="selectform" method="post" action="{{route('loan_payment')}}" enctype="multipart/form-data">
                        @csrf
                        <br>
                        <input type="hidden" name="loan_payment_id" id="loan_payment_id">
                        <input type="hidden" name="loan_id" id="loan_id" value="{{$loan->id}}">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">Payment Copy</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Payment Copy"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" class="form-control form-control-solid custom-file-input " id="payment_copy" placeholder="Payment Copy" value="" name="payment_copy" accept="image/*" />
                            <!--end::Input-->
                            <div class="d-flex justify-content-center mt-3" >
                                <img id="preview-image-payment_copy" style="max-height: 200px;">
                                <a href="#" class="text-hover-primary" onclick="delete_payment_copy()"  style="display:none;" id="payment_copy_image">X</a>
                            </div>
                        </div>
                        <!--end::Input group-->

                        
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit"  class="btn  btn-primary mt-5 mb-3">Submit</button> 
                        </div>
                    </form>
                </div>
                <!--end::Users-->
                <!--begin::Notice-->
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
            <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!-- end::Modal -loan_payment- -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- loan payemnt -->
<script type="text/javascript">
    $(document).on('click', 'button[name^="loan_payment"]', function(e) {
        var system_id = $(this).data("system_id");
        console.log(system_id);
        if(system_id)
        {
        	jQuery('#loan_payment_modal').modal('show');
        	document.getElementById("loan_payment_id").value = system_id;
        }
    });
</script>

<!-- payment copy -->
<script type="text/javascript">    
    $(document).ready(function (e) { 
       $('#payment_copy').change(function(){ 
            $('#payment_copy_image').show();   
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#preview-image-payment_copy').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
       });

    });

    function delete_payment_copy() {
        document.getElementById('payment_copy').value = null;
        $("#preview-image-payment_copy").attr("src", '');
        $('#payment_copy_image').hide();
    }
</script>

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

    @if (session('error_alert'))
        Swal.fire(
            "{{ session('error_alert') }}",
            ' ',
            'error'
        )
    @endif
</script>

@endsection